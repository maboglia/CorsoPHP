# Stringhe

# Le Stringhe in PHP 8: Guida Completa

In PHP, le stringhe rappresentano una delle strutture dati più comuni e potenti. Una stringa è una sequenza di caratteri, e in PHP viene gestita come un array di byte. Questo significa che ogni carattere occupa un byte e PHP tratta le stringhe come dati binari. Con l'introduzione di **PHP 8**, ci sono stati miglioramenti nelle funzioni per la manipolazione delle stringhe e nelle performance del linguaggio. In questa guida, esploreremo le funzionalità delle stringhe in PHP 8, le novità e gli strumenti più utili per manipolarle.

## Creazione e Definizione delle Stringhe

Le stringhe in PHP possono essere definite in vari modi:

### 1. Stringhe con apici singoli (`'...'`)
Le stringhe racchiuse tra apici singoli non interpretano le variabili o sequenze di escape come `\n`.

```php
$saluto = 'Ciao mondo!'; 
echo $saluto;  // Stampa: Ciao mondo!
```

### 2. Stringhe con apici doppi (`"..."`)
Le stringhe racchiuse tra apici doppi **interpretano** le variabili e le sequenze di escape come `\n` (nuova linea) o `\t` (tab).

```php
$nome = 'Alice';
$saluto = "Ciao, $nome!";
echo $saluto;  // Stampa: Ciao, Alice!
```

### 3. Nowdoc (come le stringhe con apici singoli ma multilinea)
Permettono di scrivere stringhe su più linee senza interpretazione di variabili o sequenze di escape.

```php
$testo = <<<'NOWDOC'
Questo è un testo multilinea
che non interpreta le variabili $nome.
NOWDOC;
```

### 4. Heredoc (come le stringhe con apici doppi ma multilinea)
Permettono di scrivere stringhe su più linee e interpretano variabili e sequenze di escape.

```php
$nome = 'Alice';
$testo = <<<HEREDOC
Questo è un testo multilinea
e qui posso inserire il nome: $nome.
HEREDOC;
```

## Funzioni di Manipolazione delle Stringhe

PHP offre un'ampia gamma di funzioni per la manipolazione delle stringhe. Vediamo le più utili e utilizzate.

### 1. `strlen()`
Ritorna la lunghezza di una stringa (il numero di byte). In caso di stringhe multibyte (come UTF-8), usa `mb_strlen()`.

```php
echo strlen('Ciao mondo!');  // Output: 11
```

### 2. `strpos()`
Trova la posizione della prima occorrenza di una sottostringa all'interno di una stringa.

```php
$testo = "PHP è fantastico!";
$posizione = strpos($testo, "fantastico");
echo $posizione;  // Output: 6
```

### 3. `str_replace()`
Sostituisce tutte le occorrenze di una sottostringa con un'altra.

```php
$testo = "PHP è fantastico!";
$nuovoTesto = str_replace("fantastico", "potente", $testo);
echo $nuovoTesto;  // Output: PHP è potente!
```

### 4. `substr()`
Restituisce una porzione di una stringa, data una posizione iniziale e opzionalmente una lunghezza.

```php
$testo = "PHP è fantastico!";
$sottostringa = substr($testo, 4, 9);
echo $sottostringa;  // Output: è fantast
```

### 5. `strtolower()` e `strtoupper()`
Converte una stringa in minuscolo o maiuscolo.

```php
$testo = "PHP è Fantastico!";
echo strtolower($testo);  // Output: php è fantastico!
echo strtoupper($testo);  // Output: PHP È FANTASTICO!
```

### 6. `trim()`, `ltrim()`, `rtrim()`
Rimuove gli spazi o caratteri specifici all'inizio e/o alla fine di una stringa.

```php
$testo = "   Ciao mondo!   ";
echo trim($testo);  // Output: Ciao mondo!
```

### 7. `explode()` e `implode()`
- **`explode()`**: Divide una stringa in un array, dato un delimitatore.
- **`implode()`**: Combina gli elementi di un array in una stringa.

```php
$stringa = "PHP,Python,Ruby";
$array = explode(",", $stringa);
print_r($array);  // Output: Array ( [0] => PHP [1] => Python [2] => Ruby )

$array = ['PHP', 'Python', 'Ruby'];
$stringa = implode(", ", $array);
echo $stringa;  // Output: PHP, Python, Ruby
```

### 8. `str_contains()` (Novità in PHP 8)
Questa funzione determina se una stringa contiene una determinata sottostringa.

```php
$testo = "PHP è fantastico!";
if (str_contains($testo, 'fantastico')) {
    echo "Sì, contiene 'fantastico'";
}
```

### 9. `str_starts_with()` e `str_ends_with()` (Novità in PHP 8)
Controllano se una stringa inizia o termina con una sottostringa specifica.

```php
$testo = "PHP è fantastico!";
echo str_starts_with($testo, 'PHP');  // Output: true
echo str_ends_with($testo, 'fantastico!');  // Output: true
```

## Manipolazione di Stringhe Multibyte (UTF-8)

Le funzioni standard di PHP per le stringhe (`strlen()`, `substr()`, ecc.) lavorano sui byte e non sui caratteri multibyte come quelli delle stringhe UTF-8. Per lavorare con stringhe multibyte, PHP fornisce il modulo **`mbstring`**.

### Esempi di funzioni multibyte:
- `mb_strlen()`: Restituisce la lunghezza di una stringa in caratteri multibyte.
- `mb_substr()`: Estrae una porzione di una stringa multibyte.
- `mb_strtolower()` e `mb_strtoupper()`: Converte le stringhe multibyte in minuscolo o maiuscolo.

```php
$testo = "Café";
echo mb_strlen($testo);  // Output: 4 (corretto per UTF-8)
```

## Stringhe e Sicurezza

Lavorando con stringhe, è fondamentale prestare attenzione alla **sicurezza**, soprattutto quando si ha a che fare con input esterno.

### 1. **Protezione contro le iniezioni SQL**
Quando si utilizzano stringhe in query SQL, è importante utilizzare funzioni come `mysqli_real_escape_string()` o **prepared statements** per evitare iniezioni SQL.

```php
$utente = "admin";
$query = "SELECT * FROM utenti WHERE username = '" . mysqli_real_escape_string($conn, $utente) . "'";
```

### 2. **Protezione contro Cross-Site Scripting (XSS)**
Quando si mostrano stringhe provenienti da input utente in pagine web, usare sempre `htmlspecialchars()` per evitare vulnerabilità XSS.

```php
$input = "<script>alert('Hacked!');</script>";
echo htmlspecialchars($input);  // Output: &lt;script&gt;alert('Hacked!');&lt;/script&gt;
```

## Novità nelle Stringhe di PHP 8

- **`str_contains()`, `str_starts_with()`, `str_ends_with()`**: Funzioni che semplificano il controllo di sottostringhe all'interno di stringhe.
- **JIT Compiler**: PHP 8 ha introdotto un Just-In-Time (JIT) compiler che migliora le performance in molte situazioni, inclusa la gestione intensiva di stringhe.

## Conclusioni

Le stringhe in PHP 8 offrono una vasta gamma di funzioni potenti e flessibili per la manipolazione del testo. Con l'introduzione di nuove funzioni come `str_contains()` e `str_starts_with()`, insieme ai miglioramenti generali delle performance, PHP 8 rende ancora più semplice e efficiente lavorare con stringhe. Conoscere le funzioni giuste può rendere il codice più pulito, sicuro e performante.

---

[Funzioni per gestire le stringhe](02_5_funzioni_stringhe.md)