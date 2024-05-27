# differenza tra l'operatore di confronto `==` e l'operatore di confronto stretto `===` in PHP. 

Mentre l'operatore `==` confronta solo i valori delle variabili, l'operatore `===` confronta sia i valori che i tipi di dati delle variabili. Questa distinzione è importante per evitare falsi positivi nei confronti delle variabili con tipi di dati diversi ma con lo stesso valore.


---

## Commenti al codice:



```php
<html lang="en">
	<head>
		<title>False Positives</title>
	</head>
	<body>
		<?php

// Definizione della funzione is_equal che confronta due valori utilizzando l'operatore ==
			function is_equal($value1, $value2) {
				$output = "{$value1} == {$value2}: ";
				if($value1 == $value2) {
					$output .= "true<br />";
				} else {
					$output .= "false<br />";
				}
				return $output;
			}
			// Chiamate alla funzione is_equal per confrontare variabili con l'operatore ==
			echo is_equal(0, false);
echo is_equal(4, true);
echo is_equal(0, null);
echo is_equal(0, "0");
echo is_equal(0, "");
echo is_equal(0, "a");
echo is_equal("1", "01");
echo is_equal("", null);
echo is_equal(3, "3 dogs");
echo is_equal(100, "1e2");
echo is_equal(100, 100.00);
echo is_equal("abc", true);
echo is_equal("123", "   123");
echo is_equal("123", "+0123");

?>
		<br />
		<?php

// Definizione della funzione is_exact che confronta due valori utilizzando l'operatore ===
			function is_exact($value1, $value2) {
				$output = "{$value1} === {$value2}: ";
				if($value1 === $value2) {
					$output .= "true<br />";
				} else {
					$output .= "false<br />";
				}
				return $output;
			}
			// Chiamate alla funzione is_exact per confrontare variabili con l'operatore ===
			echo is_exact(0, false);
echo is_exact(4, true);
echo is_exact(0, null);
echo is_exact(0, "0");
echo is_exact(0, "");
echo is_exact(0, "a");
echo is_exact("1", "01");
echo is_exact("", null);
echo is_exact(3, "3 dogs");
echo is_exact(100, "1e2");
echo is_exact(100, 100.00);
echo is_exact("abc", true);
echo is_exact("123", "   123");
echo is_exact("123", "+0123");

?>
	</body>
</html>
```
Questi commenti spiegano come le funzioni `is_equal` e `is_exact` vengono utilizzate per confrontare variabili con l'operatore `==` e `===`, rispettivamente, e mostrano il risultato di ciascun confronto.