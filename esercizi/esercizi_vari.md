## esercizi semplici sulle stringhe in PHP, ciascuno con una breve descrizione del compito da svolgere:

### Esercizio 1: Lunghezza della Stringa
Scrivi una funzione `string_length` che accetti una stringa come argomento e restituisca la sua lunghezza.

```php
function string_length($str) {
    return strlen($str);
}

// Test
echo string_length("Hello, World!"); // Output: 13
```

### Esercizio 2: Confronto di Stringhe
Scrivi una funzione `compare_strings` che accetti due stringhe e restituisca `true` se sono uguali, altrimenti `false`.

```php
function compare_strings($str1, $str2) {
    return $str1 === $str2;
}

// Test
echo compare_strings("Hello", "Hello") ? 'true' : 'false'; // Output: true
echo compare_strings("Hello", "World") ? 'true' : 'false'; // Output: false
```

### Esercizio 3: Convertire in Maiuscolo
Scrivi una funzione `to_uppercase` che accetti una stringa e la converta in maiuscolo.

```php
function to_uppercase($str) {
    return strtoupper($str);
}

// Test
echo to_uppercase("hello"); // Output: HELLO
```

### Esercizio 4: Convertire in Minuscolo
Scrivi una funzione `to_lowercase` che accetti una stringa e la converta in minuscolo.

```php
function to_lowercase($str) {
    return strtolower($str);
}

// Test
echo to_lowercase("HELLO"); // Output: hello
```

### Esercizio 5: Prima Lettera Maiuscola
Scrivi una funzione `capitalize_first_letter` che accetti una stringa e capitalizzi la sua prima lettera.

```php
function capitalize_first_letter($str) {
    return ucfirst($str);
}

// Test
echo capitalize_first_letter("hello"); // Output: Hello
```

### Esercizio 6: Invertire la Stringa
Scrivi una funzione `reverse_string` che accetti una stringa e la restituisca invertita.

```php
function reverse_string($str) {
    return strrev($str);
}

// Test
echo reverse_string("Hello"); // Output: olleH
```

### Esercizio 7: Contare Parole
Scrivi una funzione `word_count` che accetti una stringa e restituisca il numero di parole in essa contenute.

```php
function word_count($str) {
    return str_word_count($str);
}

// Test
echo word_count("Hello world, this is PHP!"); // Output: 5
```

### Esercizio 8: Sostituire Parola
Scrivi una funzione `replace_word` che accetti una stringa, una parola da cercare e una parola di sostituzione, e restituisca la stringa con tutte le occorrenze della parola cercata sostituite.

```php
function replace_word($str, $search, $replace) {
    return str_replace($search, $replace, $str);
}

// Test
echo replace_word("Hello world", "world", "PHP"); // Output: Hello PHP
```

### Esercizio 9: Estrarre Substringa
Scrivi una funzione `substring` che accetti una stringa, una posizione iniziale e una lunghezza, e restituisca la substringa corrispondente.

```php
function substring($str, $start, $length) {
    return substr($str, $start, $length);
}

// Test
echo substring("Hello, World!", 7, 5); // Output: World
```

### Esercizio 10: Rimuovere Spazi Inutili
Scrivi una funzione `trim_string` che accetti una stringa e rimuova gli spazi all'inizio e alla fine.

```php
function trim_string($str) {
    return trim($str);
}

// Test
echo trim_string("   Hello, World!   "); // Output: "Hello, World!"
```

---

## esercizi semplici sulle variabili in PHP, ciascuno con una breve descrizione del compito da svolgere:

### Esercizio 1: Dichiarare e Stampare una Variabile
Dichiara una variabile `$name` e assegnale il tuo nome. Poi, stampa il valore della variabile.

```php
$name = "Mario";
// Stampa il valore della variabile
echo $name;
```

### Esercizio 2: Sommare Due Variabili
Dichiara due variabili `$a` e `$b` con valori numerici. Somma le due variabili e stampa il risultato.

```php
$a = 5;
$b = 10;
// Somma le due variabili e stampa il risultato
$sum = $a + $b;
echo $sum; // Output: 15
```

### Esercizio 3: Concatenare Due Stringhe
Dichiara due variabili `$firstName` e `$lastName` e assegnale il tuo nome e cognome. Concatenale e stampa il risultato.

```php
$firstName = "Mario";
$lastName = "Rossi";
// Concatenazione
$fullName = $firstName . " " . $lastName;
echo $fullName; // Output: Mario Rossi
```

### Esercizio 4: Modificare il Tipo di Variabile
Dichiara una variabile `$num` con un valore numerico. Converti la variabile in una stringa e stampa il nuovo tipo e valore.

```php
$num = 123;
$str = strval($num);
echo gettype($str) . ": " . $str; // Output: string: 123
```

### Esercizio 5: Utilizzare Variabili Globali
Dichiara una variabile globale `$globalVar` e una funzione che la utilizzi.

```php
$globalVar = "I'm global!";

function print_global() {
    global $globalVar;
    echo $globalVar;
}

// Test
print_global(); // Output: I'm global!
```

### Esercizio 6: Verificare se una Variabile è Definita
Dichiara una variabile e verifica se è definita usando `isset`. Stampa un messaggio di conseguenza.

```php
$definedVar = "Hello";
if (isset($definedVar)) {
    echo "La variabile è definita.";
} else {
    echo "La variabile non è definita.";
}
// Output: La variabile è definita.
```

### Esercizio 7: Rimuovere una Variabile
Dichiara una variabile, rimuovila con `unset`, e verifica se è ancora definita.

```php
$tempVar = "Temporary";
unset($tempVar);
if (isset($tempVar)) {
    echo "La variabile è ancora definita.";
} else {
    echo "La variabile è stata rimossa.";
}
// Output: La variabile è stata rimossa.
```

### Esercizio 8: Incrementare e Decrementare una Variabile
Dichiara una variabile numerica e incrementala e decrementala, poi stampa il risultato.

```php
$number = 10;
$number++;
$number--;
echo $number; // Output: 10
```

### Esercizio 9: Utilizzare una Costante
Definisci una costante e stampane il valore.

```php
define("PI", 3.14);
echo PI; // Output: 3.14
```

### Esercizio 10: Variabili Variabili
Crea una variabile che contiene il nome di un'altra variabile, quindi utilizza questa variabile variabile.

```php
$varName = "color";
$$varName = "blue";
echo $color; // Output: blue
```

---

## esercizi semplici sulle costanti in PHP, ciascuno con una breve descrizione del compito da svolgere:

### Esercizio 1: Definire una Costante
Definisci una costante chiamata `SITE_NAME` e assegnale il valore "Il Mio Sito". Poi, stampa il valore della costante.

```php
define("SITE_NAME", "Il Mio Sito");
echo SITE_NAME; // Output: Il Mio Sito
```

### Esercizio 2: Costante Numerica
Definisci una costante chiamata `MAX_USERS` e assegnale il valore 100. Poi, stampa il valore della costante.

```php
define("MAX_USERS", 100);
echo MAX_USERS; // Output: 100
```

### Esercizio 3: Costante Booleana
Definisci una costante chiamata `IS_LOGGED_IN` e assegnale il valore `true`. Poi, stampa il valore della costante.

```php
define("IS_LOGGED_IN", true);
echo IS_LOGGED_IN ? 'true' : 'false'; // Output: true
```

### Esercizio 4: Verificare l'Esistenza di una Costante
Definisci una costante chiamata `APP_VERSION` e poi verifica se la costante è definita.

```php
define("APP_VERSION", "1.0.0");
if (defined("APP_VERSION")) {
    echo "La costante APP_VERSION è definita."; // Output: La costante APP_VERSION è definita.
} else {
    echo "La costante APP_VERSION non è definita.";
}
```

### Esercizio 5: Costante di Tipo Array (PHP 7+)
Definisci una costante di tipo array chiamata `COLORS` e assegnale i valori "red", "green", e "blue". Poi, stampa il valore della costante.

```php
define("COLORS", ["red", "green", "blue"]);
print_r(COLORS); // Output: Array ( [0] => red [1] => green [2] => blue )
```

### Esercizio 6: Usare le Costanti Predefinite di PHP
Stampa il valore delle costanti predefinite `PHP_VERSION` e `PHP_OS`.

```php
echo PHP_VERSION; // Output: La versione di PHP installata
echo PHP_OS; // Output: Il sistema operativo su cui gira PHP
```

### Esercizio 7: Case-Insensitive Constants (PHP 7.3 e inferiori)
Definisci una costante case-insensitive chiamata `GREETING` con valore "Hello". Poi, stampa il valore della costante in un modo case-insensitive.

```php
define("GREETING", "Hello", true);
echo GREETING; // Output: Hello
echo greeting; // Output: Hello
```

### Esercizio 8: Utilizzare Costanti in Funzioni
Definisci una costante chiamata `PI` e crea una funzione che calcola l'area di un cerchio usando questa costante.

```php
define("PI", 3.14);

function calculate_area($radius) {
    return PI * $radius * $radius;
}

echo calculate_area(5); // Output: 78.5
```

### Esercizio 9: Costanti Globali
Definisci una costante chiamata `GREETING` e utilizzala in una funzione senza passare come parametro.

```php
define("GREETING", "Hello, World!");

function display_greeting() {
    echo GREETING;
}

display_greeting(); // Output: Hello, World!
```

### Esercizio 10: Costanti Magic
Stampa i valori delle costanti magic `__LINE__`, `__FILE__`, e `__DIR__`.

```php
echo "Linea: " . __LINE__ . "<br>"; // Output: Linea: (numero della linea corrente)
echo "File: " . __FILE__ . "<br>"; // Output: File: (path del file corrente)
echo "Directory: " . __DIR__ . "<br>"; // Output: Directory: (directory del file corrente)
```

---

## 10 esercizi semplici sugli array scalari (array indicizzati numericamente) in PHP, ciascuno con una breve descrizione del compito da svolgere:

### Esercizio 1: Creare un Array
Crea un array chiamato `$fruits` contenente tre frutti: "apple", "banana", e "cherry". Poi, stampa il contenuto dell'array.

```php
$fruits = ["apple", "banana", "cherry"];
print_r($fruits); // Output: Array ( [0] => apple [1] => banana [2] => cherry )
```

### Esercizio 2: Accesso agli Elementi dell'Array
Crea un array chiamato `$numbers` contenente i numeri 1, 2 e 3. Poi, stampa il primo e il secondo elemento dell'array.

```php
$numbers = [1, 2, 3];
echo $numbers[0]; // Output: 1
echo $numbers[1]; // Output: 2
```

### Esercizio 3: Modifica degli Elementi dell'Array
Crea un array chiamato `$colors` contenente "red", "green", e "blue". Modifica il secondo elemento per essere "yellow" e poi stampa l'array.

```php
$colors = ["red", "green", "blue"];
$colors[1] = "yellow";
print_r($colors); // Output: Array ( [0] => red [1] => yellow [2] => blue )
```

### Esercizio 4: Aggiungere Elementi all'Array
Crea un array vuoto chiamato `$cities`. Aggiungi "New York", "Los Angeles", e "Chicago" all'array e poi stampa l'array.

```php
$cities = [];
$cities[] = "New York";
$cities[] = "Los Angeles";
$cities[] = "Chicago";
print_r($cities); // Output: Array ( [0] => New York [1] => Los Angeles [2] => Chicago )
```

### Esercizio 5: Iterare su un Array con un Ciclo For
Crea un array chiamato `$animals` contenente "dog", "cat", e "bird". Usa un ciclo `for` per stampare ciascun elemento dell'array.

```php
$animals = ["dog", "cat", "bird"];
for ($i = 0; $i < count($animals); $i++) {
    echo $animals[$i] . "<br>";
}
// Output:
// dog
// cat
// bird
```

### Esercizio 6: Iterare su un Array con un Ciclo Foreach
Crea un array chiamato `$countries` contenente "USA", "Canada", e "Mexico". Usa un ciclo `foreach` per stampare ciascun elemento dell'array.

```php
$countries = ["USA", "Canada", "Mexico"];
foreach ($countries as $country) {
    echo $country . "<br>";
}
// Output:
// USA
// Canada
// Mexico
```

### Esercizio 7: Contare gli Elementi di un Array
Crea un array chiamato `$languages` contenente "PHP", "JavaScript", "Python", e "Ruby". Stampa il numero di elementi nell'array.

```php
$languages = ["PHP", "JavaScript", "Python", "Ruby"];
echo count($languages); // Output: 4
```

### Esercizio 8: Rimuovere un Elemento dall'Array
Crea un array chiamato `$cars` contenente "Toyota", "Honda", e "Ford". Usa `unset` per rimuovere il secondo elemento e poi stampa l'array.

```php
$cars = ["Toyota", "Honda", "Ford"];
unset($cars[1]);
print_r($cars); // Output: Array ( [0] => Toyota [2] => Ford )
```

### Esercizio 9: Cercare un Elemento nell'Array
Crea un array chiamato `$numbers` contenente i numeri 10, 20, 30, e 40. Usa `in_array` per verificare se il numero 20 è presente nell'array e stampa il risultato.

```php
$numbers = [10, 20, 30, 40];
if (in_array(20, $numbers)) {
    echo "20 is in the array"; // Output: 20 is in the array
} else {
    echo "20 is not in the array";
}
```

### Esercizio 10: Unire Due Array
Crea due array chiamati `$array1` e `$array2`. `$array1` contiene "a", "b", "c", mentre `$array2` contiene "d", "e", "f". Unisci i due array in un nuovo array chiamato `$mergedArray` e poi stampa il risultato.

```php
$array1 = ["a", "b", "c"];
$array2 = ["d", "e", "f"];
$mergedArray = array_merge($array1, $array2);
print_r($mergedArray); // Output: Array ( [0] => a [1] => b [2] => c [3] => d [4] => e [5] => f )
```

---

## esercizi sugli array associativi in PHP, ciascuno con una breve descrizione del compito da svolgere:

### Esercizio 1: Creare un Array Associativo
Crea un array associativo chiamato `$person` con le chiavi "name", "age", e "city", e i corrispondenti valori "John", 30, e "New York". Poi, stampa il contenuto dell'array.

```php
$person = [
    "name" => "John",
    "age" => 30,
    "city" => "New York"
];
print_r($person);
```

### Esercizio 2: Accesso agli Elementi dell'Array Associativo
Usa la chiave "age" per accedere all'età di `$person` e stampala.

```php
echo $person["age"];
```

### Esercizio 3: Modifica degli Elementi dell'Array Associativo
Modifica la città di `$person` per essere "Los Angeles" e poi stampa l'array.

```php
$person["city"] = "Los Angeles";
print_r($person);
```

### Esercizio 4: Aggiungere Elementi all'Array Associativo
Aggiungi una nuova chiave-valore a `$person` per rappresentare il lavoro, con il valore "Engineer", e poi stampa l'array.

```php
$person["job"] = "Engineer";
print_r($person);
```

### Esercizio 5: Iterare su un Array Associativo con un Ciclo Foreach
Itera su `$person` usando un ciclo `foreach` per stampare ogni chiave e valore.

```php
foreach ($person as $key => $value) {
    echo $key . ": " . $value . "<br>";
}
```

### Esercizio 6: Contare gli Elementi di un Array Associativo
Stampa il numero di elementi nell'array associativo `$person`.

```php
echo count($person);
```

### Esercizio 7: Rimuovere un Elemento dall'Array Associativo
Rimuovi la chiave "job" da `$person` e poi stampa l'array.

```php
unset($person["job"]);
print_r($person);
```

### Esercizio 8: Cercare un Elemento nell'Array Associativo
Verifica se la chiave "name" esiste in `$person` usando `array_key_exists` e stampa il risultato.

```php
if (array_key_exists("name", $person)) {
    echo "Key 'name' exists";
} else {
    echo "Key 'name' does not exist";
}
```

### Esercizio 9: Ottenere tutte le Chiavi dell'Array Associativo
Stampa tutte le chiavi presenti in `$person` usando `array_keys`.

```php
$keys = array_keys($person);
print_r($keys);
```

### Esercizio 10: Ottenere tutti i Valori dell'Array Associativo
Stampa tutti i valori presenti in `$person` usando `array_values`.

```php
$values = array_values($person);
print_r($values);
```

---

