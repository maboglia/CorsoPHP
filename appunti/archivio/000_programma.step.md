# Corso PHP — Scansione progressiva degli argomenti

**1. Introduzione a PHP**
PHP come linguaggio server-side, ciclo browser→server→browser, installazione di XAMPP (Apache + MySQL) e VS Code, configurazione estensioni (PHP IntelliSense, Live Server, PHP Server), primo script con `echo` e commenti (`//` e `/* */`), coesistenza di PHP e HTML nello stesso file.

**2. Variabili e tipi di dato**
Dichiarazione con `$`, quattro tipi base: string (`$name = "Bro"`), int (`$age = 21`), float (`$gpa = 2.5`, `$price = 4.99`), boolean (`$employed = true`). Interpolazione con `{}`, escape sequence `\$`, calcolo dinamico del totale `$quantity * $price`.

**3. Aritmetica**
Operatori `+`, `-`, `*`, `/`, `**` (potenza), `%` (modulo). Increment/decrement (`++`, `--`, `+=`, `-=`). Precedenza degli operatori con esempio di espressione complessa risolta per ordine: parentesi → esponenti → moltiplicazione/divisione → addizione/sottrazione.

**4. `$_GET` e `$_POST`**
Form HTML con `action` e `method`. `$_GET` appende i dati all'URL (insicuro, utile per ricerche), `$_POST` li incapsula nel body HTTP (sicuro, per credenziali). Esercizio pratico: form ordine pizzeria con calcolo totale `$quantity * $price`.

**5. Funzioni matematiche**
`abs()`, `round()`, `floor()`, `ceil()`, `pow()`, `sqrt()`, `max()`, `min()`, `pi()`, `rand(min, max)`. Esercizio: calcolo di circonferenza (`2 * pi() * $r`), area (`pi() * pow($r,2)`) e volume di una sfera (`4/3 * pi() * pow($r,3)`), con arrotondamento a 2 decimali.

**6. If statement**
Sintassi `if / else if / else`. Esempio accesso per età (`>= 18`), con variabile booleana `$adult` e shorthand `if($adult)`. Esercizio: calcolo paga con straordinari — `$ore <= 40` → paga normale, `$ore > 40` → `40 * $rate + ($ore - 40) * $rate * 1.5`.

**7. Operatori logici**
`&&` (and), `||` (or), `!` (not). Esempio range temperatura valida (`$temp >= 0 && $temp <= 30`). Verifica diritto al voto (`$age >= 18 && $citizen`). Prezzo biglietto cinema: sconto se `$child || $senior`.

**8. Switch**
Alternativa a catene di `else if`. Esempio 1: voto letterale (A/B/C/D/F + `default`). Esempio 2: giorno della settimana con `date("l")` — messaggio personalizzato per ogni giorno, con `break` obbligatorio per evitare fall-through.

**9. For loop**
Sintassi con tre istruzioni opzionali (inizializzazione, condizione, incremento). Conteggio da 0 a N, da 1 a 100, decremento, step diversi (`+= 2`, `-= 3`). Esercizio: form con input numerico, conteggio crescente e decrescente fino al numero inserito dall'utente.

**10. While loop**
Differenza con il for: potenzialmente infinito. Esempio stopwatch con `$running = true`, `sleep()`, pulsante Stop che imposta `$running = false`. Regola pratica: for per iterazioni finite, while per iterazioni potenzialmente infinite.

**11. Array**
Dichiarazione con `array()`, accesso per indice (da 0), for-each per iterare. Funzioni: `array_push()`, `array_pop()`, `array_shift()`, `array_reverse()`, `count()`. Esempio: array di frutti (apple, orange, banana, coconut).

**12. Array associativi**
Coppie chiave→valore con `=>`. Esempio: capitali (`"USA" => "Washington DC"`). For-each con `as $key => $value`. Funzioni: `array_keys()`, `array_values()`, `array_flip()`, `array_reverse()`. Esercizio: form con nome del paese, restituzione della capitale corrispondente.

**13. `isset()` e `empty()`**
`isset()` → true se la variabile è dichiarata e non null. `empty()` → true se non dichiarata, false, null o stringa vuota. Applicazione: form di login con controllo su username, password e pulsante submit; messaggi d'errore differenziati.

**14. Radio button**
Input `type="radio"` con stesso `name` per raggruppamento. Lettura con `$_POST["credit_card"]`. Gestione con if/else-if e con switch (Visa / MasterCard / American Express).

**15. Checkbox**
Input `type="checkbox"` con `name` e `value`. Verifica con `isset()` e `empty()`. Raggruppamento in array con `name="foods[]"` e iterazione con for-each. Esempio: selezione di cibi preferiti (pizza, hamburger, hot dog, taco).

**16. Funzioni**
Definizione con `function`, parametri, argomenti, `return`. Esempio 1: `happyBirthday($firstName, $age)`. Esempio 2: `isEven($number)` con modulo. Esempio 3: `hypotenuse($a, $b)` con `sqrt(pow($a,2) + pow($b,2))`. Type hinting sui parametri (`int`, `float`).

**17. Funzioni stringa**
`strtolower()`, `strtoupper()`, `trim()`, `str_pad()`, `str_replace()`, `strrev()`, `str_shuffle()`, `strcmp()`, `strlen()`, `strpos()`, `substr()`, `explode()`, `implode()`. Esempi su nome utente e numero di telefono.

**18. Sanitizzazione e validazione**
`filter_input()` con filtri di sanitizzazione (`FILTER_SANITIZE_SPECIAL_CHARS`, `FILTER_SANITIZE_NUMBER_INT`, `FILTER_SANITIZE_EMAIL`) e di validazione (`FILTER_VALIDATE_INT`, `FILTER_VALIDATE_EMAIL`). Differenza: sanitize rimuove caratteri, validate restituisce stringa vuota se non supera il test.

**19. `include()`**
Inclusione di file esterni per riutilizzo del codice. Creazione di `header.html` (nav con link a home/about/locations) e `footer.html` (autore + email). Inclusione nelle pagine index, about, locations: modifiche centralizzate riflesse ovunque.

**20. Cookie (`$_COOKIE`)**
`setcookie($key, $value, time() + secondi, "/")`. Lettura con `$_COOKIE["key"]`. Eliminazione impostando tempo a `time() - 1`. Esempio: memorizzazione di cibo/bevanda/dessert preferiti, visualizzazione con for-each, pubblicità personalizzata.

**21. Sessioni (`$_SESSION`)**
`session_start()` obbligatorio in ogni file. Coppie chiave→valore persistenti tra pagine. Esempio: login con redirect via `header("Location: home.php")`, logout con `session_destroy()`. Differenza cookie (browser) vs sessione (server).

**22. `$_SERVER`**
Array associativo generato dal server. Chiavi rilevanti: `PHP_SELF` (percorso del file corrente, da proteggere con `htmlspecialchars()`) e `REQUEST_METHOD` (GET o POST). Uso pratico: impostare dinamicamente l'attributo `action` del form.

**23. Password hashing**
`password_hash($password, PASSWORD_DEFAULT)` → algoritmo bcrypt. `password_verify($plaintext, $hash)` → confronto sicuro. Esempio: hash di "pizza123", verifica con password corretta e scorretta.

**24. Connessione a MySQL**
`mysqli_connect($server, $user, $password, $db)`. Gestione errori con `try/catch` (eccezione `mysqli_sql_exception`). File separato `database.php` incluso con `include()`. Chiusura con `mysqli_close($con)`.

**25. Creazione tabella con phpMyAdmin**
GUI per creare tabella `users` con campi: `id` (INT, AUTO_INCREMENT, PRIMARY KEY), `user` (VARCHAR 25, UNIQUE), `password` (CHAR 255), `register_date` (DATETIME, DEFAULT CURRENT_TIMESTAMP).

**26. INSERT con PHP**
Query `INSERT INTO users (user, password) VALUES (...)`. `mysqli_query($con, $sql)`. Hash della password prima dell'inserimento. Gestione dell'eccezione per username duplicato con `try/catch`.

**27. SELECT con PHP**
Query `SELECT * FROM users WHERE user = 'SpongeBob'`. `mysqli_num_rows($result)` per verificare righe restituite. `mysqli_fetch_assoc($result)` per ottenere la riga come array associativo. While loop per risultati multipli.

**28. Progetto finale — Form di registrazione**
Integrazione di tutti gli argomenti: form con `$_SERVER["PHP_SELF"]`, rilevamento POST con `$_SERVER["REQUEST_METHOD"]`, sanitizzazione con `filter_input()`, controllo campi vuoti, hash della password, INSERT nel database, gestione eccezione per username duplicato.

**29. Progetto finale — Form di login**
Form con `$_SERVER["PHP_SELF"]`, rilevamento POST, sanitizzazione, SELECT per ottenere hash della password, verifica con `password_verify()`, gestione login riuscito (sessione + redirect) e login fallito (messaggio d'errore).

---

**30. Domande frequenti**

1. Differenza tra `==` e `===`.
2. Cos’è una variabile superglobale? Fai esempi.
3. Che differenza c’è tra `isset()` ed `empty()`?
4. Differenza tra `include` e `require`.
5. Differenza tra `include_once` e `include`.
6. Come funzionano gli scope delle variabili in PHP?
7. A cosa serve `global` dentro una funzione?
8. Come si definisce una costante in PHP?
9. Differenza tra costanti e variabili.
10. Differenza tra array indicizzati e associativi.
11. Differenza tra `array_push()` e `$arr[] = ...`.
12. Differenza tra `explode()` e `implode()`.
13. A cosa serve `count()`?
14. Come ordinare un array associativo per chiavi e per valori?
15. Differenza tra `sort()`, `asort()`, `ksort()`.
16. Differenza tra funzione e metodo.
17. Cos’è il type hinting in PHP?
18. Differenza tra `public`, `private`, `protected`.
19. A cosa serve `static` in un metodo?
20. Differenza tra `self` e `$this`.
21. A cosa serve un costruttore (`__construct`)?
22. Cos’è l’ereditarietà e come si usa `extends`?
23. Cos’è un’interfaccia e come si usa `implements`?
24. Differenza tra GET e POST.
25. A cosa serve `header()`?
26. Cos’è `php://input` e quando si usa?
27. Come si leggono parametri query string (`?id=3`) in PHP?
28. Cos’è una sessione e come si usa `session_start()`?
29. Differenza tra cookie e sessione.
30. Cos’è PDO e perché si usa? 

