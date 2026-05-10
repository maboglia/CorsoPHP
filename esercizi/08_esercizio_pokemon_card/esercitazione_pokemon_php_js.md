# 🎴 Esercitazione Finale — PokéAlbum Exchange
### PHP + JavaScript + MySQL | 6 ore

---

## 🎯 Obiettivo Generale

Realizzare un **album virtuale di scambio carte Pokémon** utilizzando PHP lato server e JavaScript lato client. L'applicazione gestisce un catalogo di carte, permette agli utenti di collezionarle, offrirle per lo scambio e sfogliare l'album con effetti visivi.

---

## 📦 Risorse di partenza

| Risorsa | URL |
|---|---|
| Lista Pokémon (CSV) | `https://raw.githubusercontent.com/maboglia/ProgrammingResources/refs/heads/master/tabelle/games/pokemon.csv` |
| Immagini Pokémon (CSV) | `https://raw.githubusercontent.com/maboglia/ProgrammingResources/refs/heads/master/tabelle/games/pokemon_pics.csv` |

---

## 🗂️ Struttura del Progetto

```
pokealbum/
├── index.php               # Homepage: album personale
├── catalogo.php            # Tutte le carte disponibili
├── scambi.php              # Bacheche scambi
├── api/
│   ├── pokemon.php         # Endpoint REST: lista pokemon
│   ├── collezione.php      # Endpoint REST: aggiunge/rimuove dalla collezione
│   └── scambi.php          # Endpoint REST: propone/accetta scambi
├── includes/
│   ├── db.php              # Connessione PDO al database
│   ├── csv_reader.php      # Lettura file CSV remoti
│   └── functions.php       # Funzioni helper
├── assets/
│   ├── style.css
│   └── app.js
└── sql/
    └── schema.sql          # Schema del database
```

---

## 🛢️ PARTE 1 — Database (45 min)

### 1.1 Schema SQL

Creare il file `sql/schema.sql` ed eseguirlo su MySQL:

```sql
CREATE DATABASE IF NOT EXISTS pokealbum CHARACTER SET utf8mb4;
USE pokealbum;

CREATE TABLE utenti (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) UNIQUE NOT NULL,
    email VARCHAR(100) NOT NULL,
    created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE pokemon (
    id INT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    tipo1 VARCHAR(50),
    tipo2 VARCHAR(50),
    hp INT,
    attacco INT,
    difesa INT,
    immagine_url VARCHAR(255)
);

CREATE TABLE collezione (
    id INT AUTO_INCREMENT PRIMARY KEY,
    utente_id INT NOT NULL,
    pokemon_id INT NOT NULL,
    quantita INT DEFAULT 1,
    data_acquisizione TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (utente_id) REFERENCES utenti(id),
    FOREIGN KEY (pokemon_id) REFERENCES pokemon(id),
    UNIQUE KEY unica_carta (utente_id, pokemon_id)
);

CREATE TABLE scambi (
    id INT AUTO_INCREMENT PRIMARY KEY,
    offerente_id INT NOT NULL,
    pokemon_offerto_id INT NOT NULL,
    pokemon_cercato_id INT NOT NULL,
    stato ENUM('aperto','accettato','annullato') DEFAULT 'aperto',
    creato_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (offerente_id) REFERENCES utenti(id),
    FOREIGN KEY (pokemon_offerto_id) REFERENCES pokemon(id),
    FOREIGN KEY (pokemon_cercato_id) REFERENCES pokemon(id)
);
```

### 1.2 Connessione PDO (`includes/db.php`)

```php
<?php
define('DB_HOST', 'localhost');
define('DB_NAME', 'pokealbum');
define('DB_USER', 'root');
define('DB_PASS', '');

function getDB(): PDO {
    static $pdo = null;
    if ($pdo === null) {
        try {
            $pdo = new PDO(
                "mysql:host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=utf8mb4",
                DB_USER,
                DB_PASS,
                [
                    PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                    PDO::ATTR_EMULATE_PREPARES   => false,
                ]
            );
        } catch (PDOException $e) {
            http_response_code(500);
            die(json_encode(['errore' => 'Connessione DB fallita: ' . $e->getMessage()]));
        }
    }
    return $pdo;
}
```

---

## 📄 PARTE 2 — Lettura File CSV Remoti (45 min)

### 2.1 Reader CSV (`includes/csv_reader.php`)

```php
<?php
/**
 * Legge un file CSV da URL remoto e restituisce un array associativo.
 * La prima riga viene usata come intestazione (chiavi).
 *
 * @param string $url     URL del file CSV
 * @param string $sep     Separatore di colonna (default: virgola)
 * @return array          Array di record associativi
 * @throws RuntimeException se il file non è raggiungibile
 */
function leggiCSVRemoto(string $url, string $sep = ','): array {
    $contenuto = @file_get_contents($url);
    if ($contenuto === false) {
        throw new RuntimeException("Impossibile leggere il file: $url");
    }

    // Normalizza i fine riga
    $righe = explode("\n", str_replace("\r\n", "\n", trim($contenuto)));
    if (count($righe) < 2) return [];

    $intestazioni = str_getcsv(array_shift($righe), $sep);
    $risultati = [];

    foreach ($righe as $riga) {
        if (trim($riga) === '') continue;
        $valori = str_getcsv($riga, $sep);
        // Allinea il numero di colonne
        while (count($valori) < count($intestazioni)) $valori[] = null;
        $risultati[] = array_combine($intestazioni, $valori);
    }

    return $risultati;
}
```

### 2.2 Importazione Pokémon da CSV al DB

Creare lo script `import_pokemon.php` (da eseguire una volta sola):

```php
<?php
require_once 'includes/db.php';
require_once 'includes/csv_reader.php';

$URL_POKEMON = 'https://raw.githubusercontent.com/maboglia/ProgrammingResources/refs/heads/master/tabelle/games/pokemon.csv';
$URL_IMMAGINI = 'https://raw.githubusercontent.com/maboglia/ProgrammingResources/refs/heads/master/tabelle/games/pokemon_pics.csv';

$pokemon  = leggiCSVRemoto($URL_POKEMON);
$immagini = leggiCSVRemoto($URL_IMMAGINI);

// Crea mappa id => url immagine
$mappaImg = [];
foreach ($immagini as $img) {
    $mappaImg[$img['id']] = $img['url'] ?? $img['pic'] ?? '';
}

$db  = getDB();
$sql = "INSERT IGNORE INTO pokemon (id, nome, tipo1, tipo2, hp, attacco, difesa, immagine_url)
        VALUES (:id, :nome, :tipo1, :tipo2, :hp, :attacco, :difesa, :immagine_url)";
$stmt = $db->prepare($sql);

$importati = 0;
foreach ($pokemon as $p) {
    $stmt->execute([
        ':id'          => (int)($p['#'] ?? $p['id']),
        ':nome'        => $p['Name'] ?? $p['nome'],
        ':tipo1'       => $p['Type 1'] ?? $p['tipo1'],
        ':tipo2'       => $p['Type 2'] ?? $p['tipo2'] ?? null,
        ':hp'          => (int)($p['HP'] ?? 0),
        ':attacco'     => (int)($p['Attack'] ?? 0),
        ':difesa'      => (int)($p['Defense'] ?? 0),
        ':immagine_url'=> $mappaImg[$p['#'] ?? $p['id']] ?? '',
    ]);
    $importati++;
}

echo "✅ Importati $importati Pokémon nel database.";
```

> **Consegna parziale**: verifica l'importazione con una query MySQL `SELECT COUNT(*) FROM pokemon;`

---

## 🔌 PARTE 3 — API REST con PHP (90 min)

Tutte le API rispondono in formato JSON e rispettano i metodi HTTP.

### 3.1 API Lista Pokémon (`api/pokemon.php`)

```php
<?php
require_once '../includes/db.php';
header('Content-Type: application/json');

$metodo = $_SERVER['REQUEST_METHOD'];
$db     = getDB();

if ($metodo === 'GET') {
    // Parametri opzionali: ?tipo=fire&cerca=char&pagina=1&per_pagina=20
    $tipo     = $_GET['tipo']     ?? null;
    $cerca    = $_GET['cerca']    ?? null;
    $pagina   = max(1, (int)($_GET['pagina']    ?? 1));
    $perPag   = min(100, (int)($_GET['per_pagina'] ?? 20));
    $offset   = ($pagina - 1) * $perPag;

    $condizioni = [];
    $parametri  = [];

    if ($tipo) {
        $condizioni[] = "(tipo1 = :tipo OR tipo2 = :tipo)";
        $parametri[':tipo'] = $tipo;
    }
    if ($cerca) {
        $condizioni[] = "nome LIKE :cerca";
        $parametri[':cerca'] = "%$cerca%";
    }

    $where = $condizioni ? 'WHERE ' . implode(' AND ', $condizioni) : '';

    // Conta totale
    $totale = $db->prepare("SELECT COUNT(*) FROM pokemon $where");
    $totale->execute($parametri);
    $totaleRighe = (int)$totale->fetchColumn();

    // Risultati paginati
    $stmt = $db->prepare("SELECT * FROM pokemon $where LIMIT :limit OFFSET :offset");
    foreach ($parametri as $k => $v) $stmt->bindValue($k, $v);
    $stmt->bindValue(':limit',  $perPag, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);
    $stmt->execute();

    echo json_encode([
        'dati'       => $stmt->fetchAll(),
        'totale'     => $totaleRighe,
        'pagina'     => $pagina,
        'per_pagina' => $perPag,
        'pagine'     => ceil($totaleRighe / $perPag),
    ]);
}
```

### 3.2 API Collezione (`api/collezione.php`)

```php
<?php
require_once '../includes/db.php';
header('Content-Type: application/json');

// Simuliamo utente loggato (in produzione usare sessioni/JWT)
$utenteId = (int)($_GET['utente'] ?? $_POST['utente'] ?? 1);
$metodo   = $_SERVER['REQUEST_METHOD'];
$db       = getDB();

switch ($metodo) {

    case 'GET':
        // Lista delle carte nella collezione dell'utente
        $stmt = $db->prepare("
            SELECT p.*, c.quantita, c.data_acquisizione
            FROM collezione c
            JOIN pokemon p ON p.id = c.pokemon_id
            WHERE c.utente_id = :uid
            ORDER BY p.nome
        ");
        $stmt->execute([':uid' => $utenteId]);
        echo json_encode($stmt->fetchAll());
        break;

    case 'POST':
        // Aggiunge una carta alla collezione (o incrementa quantità)
        $body      = json_decode(file_get_contents('php://input'), true);
        $pokemonId = (int)($body['pokemon_id'] ?? 0);

        if (!$pokemonId) {
            http_response_code(400);
            echo json_encode(['errore' => 'pokemon_id obbligatorio']);
            break;
        }

        $stmt = $db->prepare("
            INSERT INTO collezione (utente_id, pokemon_id, quantita)
            VALUES (:uid, :pid, 1)
            ON DUPLICATE KEY UPDATE quantita = quantita + 1
        ");
        $stmt->execute([':uid' => $utenteId, ':pid' => $pokemonId]);
        http_response_code(201);
        echo json_encode(['messaggio' => 'Carta aggiunta!']);
        break;

    case 'DELETE':
        // Rimuove una carta dalla collezione
        $body      = json_decode(file_get_contents('php://input'), true);
        $pokemonId = (int)($body['pokemon_id'] ?? 0);

        $stmt = $db->prepare(
            "DELETE FROM collezione WHERE utente_id = :uid AND pokemon_id = :pid"
        );
        $stmt->execute([':uid' => $utenteId, ':pid' => $pokemonId]);
        echo json_encode(['messaggio' => 'Carta rimossa']);
        break;

    default:
        http_response_code(405);
        echo json_encode(['errore' => 'Metodo non supportato']);
}
```

### 3.3 API Scambi (`api/scambi.php`)

```php
<?php
require_once '../includes/db.php';
header('Content-Type: application/json');

$metodo   = $_SERVER['REQUEST_METHOD'];
$db       = getDB();
$utenteId = (int)($_GET['utente'] ?? 1);

switch ($metodo) {

    case 'GET':
        // Lista scambi aperti (tutti o solo del corrente utente)
        $soloMiei = isset($_GET['miei']);
        $sql = "
            SELECT s.*,
                   po.nome AS pokemon_offerto,  po.immagine_url AS img_offerto,
                   pc.nome AS pokemon_cercato,  pc.immagine_url AS img_cercato,
                   u.username AS offerente
            FROM scambi s
            JOIN pokemon po ON po.id = s.pokemon_offerto_id
            JOIN pokemon pc ON pc.id = s.pokemon_cercato_id
            JOIN utenti  u  ON u.id  = s.offerente_id
            WHERE s.stato = 'aperto'
        ";
        if ($soloMiei) $sql .= " AND s.offerente_id = :uid";
        $sql .= " ORDER BY s.creato_at DESC";

        $stmt = $db->prepare($sql);
        if ($soloMiei) $stmt->execute([':uid' => $utenteId]);
        else           $stmt->execute();
        echo json_encode($stmt->fetchAll());
        break;

    case 'POST':
        // Crea una nuova proposta di scambio
        $body = json_decode(file_get_contents('php://input'), true);
        $offerto  = (int)($body['pokemon_offerto_id']  ?? 0);
        $cercato  = (int)($body['pokemon_cercato_id']  ?? 0);

        if (!$offerto || !$cercato) {
            http_response_code(400);
            echo json_encode(['errore' => 'Specificare pokemon_offerto_id e pokemon_cercato_id']);
            break;
        }

        $stmt = $db->prepare("
            INSERT INTO scambi (offerente_id, pokemon_offerto_id, pokemon_cercato_id)
            VALUES (:uid, :off, :cer)
        ");
        $stmt->execute([':uid' => $utenteId, ':off' => $offerto, ':cer' => $cercato]);
        http_response_code(201);
        echo json_encode(['messaggio' => 'Proposta di scambio creata!', 'id' => $db->lastInsertId()]);
        break;

    case 'PATCH':
        // Accetta o annulla uno scambio
        $body    = json_decode(file_get_contents('php://input'), true);
        $scambioId = (int)($body['id']    ?? 0);
        $azione    = $body['azione'] ?? ''; // 'accetta' | 'annulla'

        $nuovoStato = match($azione) {
            'accetta'  => 'accettato',
            'annulla'  => 'annullato',
            default    => null
        };

        if (!$nuovoStato || !$scambioId) {
            http_response_code(400);
            echo json_encode(['errore' => 'Parametri non validi']);
            break;
        }

        $stmt = $db->prepare("UPDATE scambi SET stato = :stato WHERE id = :id");
        $stmt->execute([':stato' => $nuovoStato, ':id' => $scambioId]);
        echo json_encode(['messaggio' => "Scambio $nuovoStato"]);
        break;

    default:
        http_response_code(405);
        echo json_encode(['errore' => 'Metodo non supportato']);
}
```

---

## 💻 PARTE 4 — Frontend: Album con PHP + JavaScript (90 min)

### 4.1 Homepage Album (`index.php`)

```php
<?php
require_once 'includes/db.php';

// Carica i tipi distinti per i filtri
$db    = getDB();
$tipi  = $db->query("SELECT DISTINCT tipo1 FROM pokemon WHERE tipo1 IS NOT NULL ORDER BY tipo1")
             ->fetchAll(PDO::FETCH_COLUMN);

// Dati iniziali: prime 20 carte per il rendering server-side
$stmt = $db->prepare("SELECT * FROM pokemon ORDER BY id LIMIT 20");
$stmt->execute();
$primiPokemon = $stmt->fetchAll();
?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>PokéAlbum Exchange</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>

<header>
    <h1>🎴 PokéAlbum Exchange</h1>
    <nav>
        <a href="index.php">Il mio Album</a>
        <a href="catalogo.php">Catalogo</a>
        <a href="scambi.php">Scambi</a>
    </nav>
</header>

<!-- Filtri -->
<section id="filtri">
    <input type="text" id="cerca" placeholder="Cerca Pokémon...">
    <select id="filtro-tipo">
        <option value="">Tutti i tipi</option>
        <?php foreach ($tipi as $tipo): ?>
            <option value="<?= htmlspecialchars($tipo) ?>">
                <?= htmlspecialchars($tipo) ?>
            </option>
        <?php endforeach; ?>
    </select>
    <button id="btn-cerca">🔍 Cerca</button>
</section>

<!-- Visualizzatore a card singola (flip effect) -->
<section id="viewer">
    <button id="btn-prev">◀ Precedente</button>
    <div id="card-flip-container">
        <div class="card-flip">
            <div class="card-front">
                <img id="card-img" src="" alt="">
                <h2 id="card-nome"></h2>
                <span id="card-tipo"></span>
            </div>
            <div class="card-back">
                <table id="card-stats">
                    <tr><th>HP</th><td id="stat-hp"></td></tr>
                    <tr><th>Attacco</th><td id="stat-atk"></td></tr>
                    <tr><th>Difesa</th><td id="stat-def"></td></tr>
                </table>
                <button class="btn-aggiungi" onclick="aggiungiACollezione()">
                    ⭐ Aggiungi alla collezione
                </button>
            </div>
        </div>
    </div>
    <button id="btn-next">Successiva ▶</button>
</section>

<p id="card-counter"></p>

<!-- Griglia album (rendering server-side iniziale) -->
<section id="album-grid">
    <?php foreach ($primiPokemon as $p): ?>
    <div class="album-card" data-id="<?= $p['id'] ?>">
        <img src="<?= htmlspecialchars($p['immagine_url']) ?>"
             alt="<?= htmlspecialchars($p['nome']) ?>"
             loading="lazy">
        <span><?= htmlspecialchars($p['nome']) ?></span>
    </div>
    <?php endforeach; ?>
</section>

<div id="paginazione"></div>

<!-- Passiamo i dati iniziali a JavaScript -->
<script>
    const datiIniziali = <?php echo json_encode($primiPokemon); ?>;
</script>
<script src="assets/app.js"></script>
</body>
</html>
```

### 4.2 JavaScript (`assets/app.js`)

```javascript
// =============================================
// STATO GLOBALE
// =============================================
let pokemon     = [...datiIniziali];
let indiceCorrente = 0;
let paginaCorrente = 1;
let tipoFiltro     = '';
let testoCerca     = '';

// =============================================
// VISUALIZZATORE A CARD CON FLIP
// =============================================
function mostraCard(indice) {
    const p = pokemon[indice];
    if (!p) return;

    document.getElementById('card-img').src  = p.immagine_url || '';
    document.getElementById('card-img').alt  = p.nome;
    document.getElementById('card-nome').textContent = p.nome;
    document.getElementById('card-tipo').textContent = p.tipo1 + (p.tipo2 ? ' / ' + p.tipo2 : '');
    document.getElementById('stat-hp').textContent   = p.hp;
    document.getElementById('stat-atk').textContent  = p.attacco;
    document.getElementById('stat-def').textContent  = p.difesa;
    document.getElementById('card-counter').textContent =
        `Carta ${indice + 1} di ${pokemon.length}`;

    // Rimuovi il flip se era girata
    document.querySelector('.card-flip').classList.remove('flipped');
}

document.getElementById('btn-next').addEventListener('click', () => {
    if (indiceCorrente < pokemon.length - 1) {
        indiceCorrente++;
        mostraCard(indiceCorrente);
    }
});

document.getElementById('btn-prev').addEventListener('click', () => {
    if (indiceCorrente > 0) {
        indiceCorrente--;
        mostraCard(indiceCorrente);
    }
});

// Click sulla card = flip per vedere le stats
document.getElementById('card-flip-container').addEventListener('click', () => {
    document.querySelector('.card-flip').classList.toggle('flipped');
});

// =============================================
// API FETCH: CERCA E FILTRA
// =============================================
async function caricaPokemon(pagina = 1) {
    const params = new URLSearchParams({
        pagina,
        per_pagina: 20,
        ...(tipoFiltro ? { tipo: tipoFiltro } : {}),
        ...(testoCerca  ? { cerca: testoCerca } : {}),
    });

    const risposta = await fetch(`api/pokemon.php?${params}`);
    const dati     = await risposta.json();

    pokemon        = dati.dati;
    indiceCorrente = 0;
    paginaCorrente = pagina;

    mostraCard(0);
    aggiornaGriglia(dati.dati);
    aggiornaPaginazione(dati.pagine, pagina);
}

document.getElementById('btn-cerca').addEventListener('click', () => {
    testoCerca = document.getElementById('cerca').value.trim();
    tipoFiltro = document.getElementById('filtro-tipo').value;
    caricaPokemon(1);
});

// =============================================
// GRIGLIA ALBUM
// =============================================
function aggiornaGriglia(lista) {
    const griglia = document.getElementById('album-grid');
    griglia.innerHTML = lista.map(p => `
        <div class="album-card" data-id="${p.id}" onclick="selezionaCard(${lista.indexOf(p)})">
            <img src="${p.immagine_url}" alt="${p.nome}" loading="lazy">
            <span>${p.nome}</span>
        </div>
    `).join('');
}

function selezionaCard(indice) {
    indiceCorrente = indice;
    mostraCard(indice);
    document.getElementById('viewer').scrollIntoView({ behavior: 'smooth' });
}

// =============================================
// PAGINAZIONE
// =============================================
function aggiornaPaginazione(totPagine, corrente) {
    const div = document.getElementById('paginazione');
    div.innerHTML = '';
    for (let i = 1; i <= totPagine; i++) {
        const btn = document.createElement('button');
        btn.textContent = i;
        btn.className   = i === corrente ? 'pagina attiva' : 'pagina';
        btn.addEventListener('click', () => caricaPokemon(i));
        div.appendChild(btn);
    }
}

// =============================================
// COLLEZIONE
// =============================================
async function aggiungiACollezione() {
    const p = pokemon[indiceCorrente];
    const risposta = await fetch('api/collezione.php?utente=1', {
        method:  'POST',
        headers: { 'Content-Type': 'application/json' },
        body:    JSON.stringify({ pokemon_id: p.id }),
    });
    const dati = await risposta.json();
    alert(dati.messaggio || dati.errore);
}

// =============================================
// INIT
// =============================================
mostraCard(0);
```

---

## 🔄 PARTE 5 — Bacheca Scambi (`scambi.php`) (45 min)

```php
<?php require_once 'includes/db.php'; ?>
<!DOCTYPE html>
<html lang="it">
<head>
    <meta charset="UTF-8">
    <title>Scambi Pokémon</title>
    <link rel="stylesheet" href="assets/style.css">
</head>
<body>
<h1>🔄 Bacheca Scambi</h1>

<section id="lista-scambi">
    <p>Caricamento scambi in corso...</p>
</section>

<h2>Proponi uno scambio</h2>
<section id="form-scambio">
    <label>Offro il Pokémon #<input type="number" id="offro" min="1"></label>
    <label>Cerco il Pokémon #<input type="number" id="cerco" min="1"></label>
    <button onclick="proponiScambio()">📤 Proponi</button>
</section>

<script>
async function caricaScambi() {
    const risposta = await fetch('api/scambi.php');
    const scambi   = await risposta.json();

    const html = scambi.length === 0
        ? '<p>Nessuno scambio disponibile.</p>'
        : scambi.map(s => `
            <div class="scambio-card">
                <img src="${s.img_offerto}" alt="${s.pokemon_offerto}">
                <span>➡️</span>
                <img src="${s.img_cercato}" alt="${s.pokemon_cercato}">
                <p><strong>${s.offerente}</strong> offre
                   <em>${s.pokemon_offerto}</em> in cambio di
                   <em>${s.pokemon_cercato}</em></p>
                <button onclick="accettaScambio(${s.id})">✅ Accetta</button>
            </div>
        `).join('');

    document.getElementById('lista-scambi').innerHTML = html;
}

async function proponiScambio() {
    const offro  = parseInt(document.getElementById('offro').value);
    const cerco  = parseInt(document.getElementById('cerco').value);

    if (!offro || !cerco) { alert('Inserisci entrambi i Pokémon'); return; }

    const risposta = await fetch('api/scambi.php?utente=1', {
        method:  'POST',
        headers: { 'Content-Type': 'application/json' },
        body:    JSON.stringify({ pokemon_offerto_id: offro, pokemon_cercato_id: cerco }),
    });
    const dati = await risposta.json();
    alert(dati.messaggio);
    caricaScambi();
}

async function accettaScambio(id) {
    const risposta = await fetch('api/scambi.php?utente=1', {
        method:  'PATCH',
        headers: { 'Content-Type': 'application/json' },
        body:    JSON.stringify({ id, azione: 'accetta' }),
    });
    const dati = await risposta.json();
    alert(dati.messaggio);
    caricaScambi();
}

caricaScambi();
</script>
</body>
</html>
```

---

## 🎨 CSS (cenni) — `assets/style.css`

```css
/* Card con effetto flip 3D */
.card-flip {
    width: 220px; height: 320px;
    perspective: 1000px;
    cursor: pointer;
    transform-style: preserve-3d;
    transition: transform 0.6s;
}
.card-flip.flipped { transform: rotateY(180deg); }

.card-front, .card-back {
    position: absolute; width: 100%; height: 100%;
    backface-visibility: hidden;
    border-radius: 12px;
    box-shadow: 0 8px 24px rgba(0,0,0,.25);
    display: flex; flex-direction: column;
    align-items: center; justify-content: center;
    padding: 16px;
}
.card-front { background: linear-gradient(135deg, #f5c518, #ff6b35); }
.card-back  { background: #1a1a2e; color: #eee; transform: rotateY(180deg); }

/* Griglia album */
#album-grid {
    display: grid;
    grid-template-columns: repeat(auto-fill, minmax(120px, 1fr));
    gap: 12px; padding: 24px;
}
.album-card {
    border-radius: 8px; overflow: hidden;
    box-shadow: 0 2px 8px rgba(0,0,0,.15);
    cursor: pointer; transition: transform .2s;
    text-align: center; background: #fff;
}
.album-card:hover { transform: scale(1.05); }
.album-card img   { width: 100%; display: block; }
```

---

## ✅ Criteri di Valutazione

| Criterio | Punti |
|---|---|
| Schema DB corretto e script SQL funzionante | 10 |
| Lettura CSV remoto e importazione Pokémon | 15 |
| Endpoint REST GET con paginazione e filtri | 20 |
| Endpoint REST POST/DELETE collezione | 15 |
| Endpoint REST scambi (GET/POST/PATCH) | 15 |
| Frontend: visualizzatore card con flip | 10 |
| Frontend: fetch asincrono e aggiornamento DOM | 10 |
| Qualità del codice, commenti, gestione errori | 5 |
| **Totale** | **100** |

---

## 💡 Funzionalità Bonus (per chi finisce prima)

- **Sessioni PHP**: implementare login/logout con `session_start()` per gestire utenti reali
- **Cache CSV**: salvare il CSV importato in un file JSON locale (`json_encode` → `file_put_contents`) per evitare di riscaricare ogni volta
- **Notifiche real-time**: usare `setInterval()` in JS per aggiornare la bacheca scambi ogni 30 secondi
- **Esporta collezione**: generare un CSV della propria collezione con PHP e permetterne il download tramite `header('Content-Disposition: attachment; filename=...')`
- **Statistiche**: una pagina con grafici (usando `<canvas>` + Chart.js) che mostrano quante carte per tipo ha raccolto l'utente

---

## ⏱️ Suddivisione Tempi Consigliata

| Parte | Attività | Tempo |
|---|---|---|
| 1 | Database: schema SQL + connessione PDO | 45 min |
| 2 | Lettura CSV + importazione Pokémon | 45 min |
| 3 | API REST (3 endpoint) | 90 min |
| 4 | Frontend album: PHP + JS + flip card | 90 min |
| 5 | Bacheca scambi | 45 min |
| — | Test, debug, rifinitura | 45 min |
| **Totale** | | **6 ore** |
