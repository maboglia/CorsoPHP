# Valori Booleani in PHP

---

#### Introduzione

I valori booleani sono uno dei tipi di dati più semplici e fondamentali in PHP. Un booleano rappresenta un valore di verità, che può essere `true` (vero) o `false` (falso).

---

#### Codice di Esempio

```php
<html lang="en">
 <head>
  <title>Booleans</title>
 </head>
 <body>
  <?php
   $result1 = true;
$result2 = false;
?>
  Result1: <?php echo $result1;
?><br />
  Result2: <?php echo $result2;
?><br />
  result2 is boolean? <?php echo is_bool($result2);
?>
  <br />
  <?php
   $number = 3.14;
if( is_float($number) ) {
 echo "It is a float.";
}
?>
 </body>
</html>
```

---

#### Spiegazione del Codice

1. **Dichiarazione di Variabili Booleani**

```php
<?php
 $result1 = true;
$result2 = false;
?>
```

- `$result1 = true;`: Assegna il valore booleano `true` alla variabile `$result1`.
- `$result2 = false;`: Assegna il valore booleano `false` alla variabile `$result2`.

2. **Stampa dei Valori Booleani**

```php
Result1: <?php echo $result1;
?><br />
Result2: <?php echo $result2;
?><br />
```

- `echo $result1;`: Stampa il valore di `$result1`. In PHP, `true` viene convertito in `1` quando viene stampato.
- `echo $result2;`: Stampa il valore di `$result2`. In PHP, `false` viene convertito in una stringa vuota quando viene stampato.

3. **Verifica del Tipo Booleano**

```php
result2 is boolean? <?php echo is_bool($result2);
?>
```

- `is_bool($result2)`: Verifica se `$result2` è un booleano. Restituisce `1` (vero) se è un booleano, altrimenti restituisce `` (falso).

4. **Controllo del Tipo di Numero**

```php
$number = 3.14;
if( is_float($number) ) {
 echo "It is a float.";
}
```

- `$number = 3.14;`: Assegna il valore `3.14` alla variabile `$number`.
- `is_float($number)`: Verifica se `$number` è un numero a virgola mobile. Se la condizione è vera, viene stampata la stringa "It is a float.".

---

#### Concetti Chiave

- **Valori Booleani**: In PHP, i valori booleani possono essere `true` o `false`.
- **Conversione Automatica**: Quando stampati, `true` diventa `1` e `false` diventa una stringa vuota.
- **Funzioni di Verifica del Tipo**:
  - `is_bool()`: Verifica se una variabile è un booleano.
  - `is_float()`: Verifica se una variabile è un numero a virgola mobile.

---

#### Esempio di Output

Quando il codice viene eseguito, l'output sarà:

```
Result1: 1
Result2: 
result2 is boolean? 1
It is a float.
```

---

#### Conclusione

I valori booleani sono fondamentali per il controllo del flusso logico in PHP. Capire come dichiararli, usarli e verificarli è essenziale per scrivere codice PHP efficace. Le funzioni di verifica del tipo aiutano a garantire che le variabili siano del tipo previsto, migliorando la robustezza del codice.
