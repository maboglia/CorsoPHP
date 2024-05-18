### Scheda Informativa: Ciclo foreach in PHP
#### Introduzione
Il ciclo `foreach` in PHP è utilizzato per iterare sugli elementi di un array o sugli elementi di un oggetto. È particolarmente utile quando si desidera esaminare ogni elemento di un array senza dover gestire manualmente gli indici dell'array.
#### Codice di Esempio
```html
<html lang="en">
	<head>
		<title>Loops: foreach</title>
	</head>
	<body>
		<?php
		  $ages = array(4,8,15,16,23,42);

foreach($ages as $age) {
	echo "Age: {$age}<br />";
}
?>
		<br />
		<?php // foreach using assoc. array

$person = array(
									"first_name" => "mario", 
									"last_name"  => "rossi",
									"address"    => "123 Main Street",
									"city"       => "Beverly Hills",
									"state"      => "CA",
									"zip_code"   => "90210"
								);

foreach($person as $attribute => $data) {
	$attr_nice = ucwords(str_replace("_", " ", $attribute));
	echo "{$attr_nice}: {$data}<br />";
}
?>
		<br />
		<?php
		  $prices = array("Brand New Computer" => 2000,
		                  "1 month of example.com" => 25,
		                  "Learning PHP" => null);

foreach($prices as $item => $price) {
	echo "{$item}: ";
	if (is_int($price)) {
		echo "$" . $price;
	}
	else {
		echo "priceless";
	}
	echo "<br />";
}

?>
	</body>
</html>
```
#### Spiegazione del Codice
1. **Iterazione su un Array Numerico**
```php
<?php
    $ages = array(4,8,15,16,23,42);

foreach($ages as $age) {
	echo "Age: {$age}<br />";
}
?>
```
- `$ages`: Definisce un array numerico con età.
- `foreach($ages as $age) { ... }`: Itera su ogni elemento dell'array `$ages` e assegna il valore dell'elemento alla variabile `$age`, stampando quindi l'età.
2. **Iterazione su un Array Associativo**
```php
<?php
    $person = array(
        "first_name" => "Mario", 
        "last_name"  => "Rossi",
        "address"    => "123 Main Street",
        "city"       => "Beverly Hills",
        "state"      => "CA",
        "zip_code"   => "90210"
    );

foreach($person as $attribute => $data) {
	$attr_nice = ucwords(str_replace("_", " ", $attribute));
	echo "{$attr_nice}: {$data}<br />";
}
?>
```
- `$person`: Definisce un array associativo con informazioni personali.
- `foreach($person as $attribute => $data) { ... }`: Itera su ogni coppia chiave-valore dell'array `$person`, assegnando la chiave alla variabile `$attribute` e il valore alla variabile `$data`, stampando quindi l'attributo e il suo valore.
3. **Gestione dei Prezzi**
```php
<?php
    $prices = array(
        "Brand New Computer" => 2000,
        "1 month of example.com" => 25,
        "Learning PHP" => null
    );

foreach($prices as $item => $price) {
	echo "{$item}: ";
	if (is_int($price)) {
		echo "$" . $price;
	}
	else {
		echo "priceless";
	}
	echo "<br />";
}
?>
```
- `$prices`: Definisce un array associativo con prezzi di vari prodotti.
- `foreach($prices as $item => $price) { ... }`: Itera su ogni elemento dell'array `$prices`, assegnando il nome del prodotto alla variabile `$item` e il prezzo alla variabile `$price`, stampando quindi il nome del prodotto seguito dal prezzo o da "priceless" se il prezzo è nullo.
#### Concetti Chiave
- **Iterazione sugli Elementi**: Il ciclo foreach è utilizzato per iterare sugli elementi di un array, assegnando automaticamente ogni elemento alla variabile specificata.
- **Array Numerico vs Array Associativo**: Il ciclo foreach può essere utilizzato sia con array numerici che con array associativi, consentendo una facile iterazione su entrambi i tipi di array.
- **Chiavi e Valori**: Nel caso di un array associativo, è possibile accedere sia alle chiavi che ai valori durante l'iterazione utilizzando due variabili separate nel ciclo foreach.
#### Esempio di Output
Quando il codice viene eseguito, l'output sarà:
```
Age: 4
Age: 8
Age: 15
Age: 16
Age: 23
Age: 42
First Name: Mario
Last Name: Rossi
Address: 123 Main Street
City: Beverly Hills
State: CA
Zip Code: 90210
Brand New Computer: $2000
1 month of example.com: $25
Learning PHP: priceless
```
#### Conclusione
Il ciclo foreach è uno strumento potente e flessibile per iterare su array in PHP. È particolarmente utile quando si desidera esaminare ogni elemento di un array senza dover gestire manualmente gli indici dell'array. Comprendere la sintassi e l'utilizzo del ciclo foreach è essenziale per la programmazione efficace in PHP.