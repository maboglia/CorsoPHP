```php
<html lang="en">
 <head>
  <title>Pointers</title>
 </head>
 <body>
  <?php

$ages = array(4,8,15,16,23,42);

// current: current pointer value
   echo "1: " . current($ages) . "<br />";

// next: move the pointer forward
   // similar to using 'continue' inside a loop
   next($ages);
echo "2: " . current($ages) . "<br />";

next($ages);
next($ages);
echo "3: " . current($ages) . "<br />";

// prev: move the pointer backward
   prev($ages);
echo "4: " . current($ages) . "<br />";

// reset: move the pointer to the first element
   reset($ages);
echo "5: " . current($ages) . "<br />";

// end: move the pointer to the last element
   end($ages);
echo "6: " . current($ages) . "<br />";

// move the pointer past the last element
   next($ages);
echo "7: " . current($ages) . "<br />";

?>
  <br />
  <?php
   reset($ages);

// while loop that moves the array pointer
   // similar to foreach
   while($age = current($ages)) {
 echo $age . ", ";
 next($ages);
}
?>
 </body>
</html>
```

---

Ecco una spiegazione del funzionamento di ciascuna funzione utilizzata:

- `current($array)`: Restituisce il valore corrente dell'array, cioè il valore dell'elemento puntato dal puntatore interno dell'array.
- `next($array)`: Sposta il puntatore interno dell'array all'elemento successivo e restituisce il valore di tale elemento.
- `prev($array)`: Sposta il puntatore interno dell'array all'elemento precedente e restituisce il valore di tale elemento.
- `reset($array)`: Sposta il puntatore interno dell'array all'inizio (primo elemento) dell'array e restituisce il valore di tale elemento.
- `end($array)`: Sposta il puntatore interno dell'array alla fine (ultimo elemento) dell'array e restituisce il valore di tale elemento.

### Esempio di Utilizzo nel Codice

- `current($ages)`: Restituisce il valore corrente dell'array `$ages`.
- `next($ages)`: Sposta il puntatore interno di `$ages` all'elemento successivo e restituisce il valore di tale elemento.
- `prev($ages)`: Sposta il puntatore interno di `$ages` all'elemento precedente e restituisce il valore di tale elemento.
- `reset($ages)`: Sposta il puntatore interno di `$ages` all'inizio (primo elemento) dell'array e restituisce il valore di tale elemento.
- `end($ages)`: Sposta il puntatore interno di `$ages` alla fine (ultimo elemento) dell'array e restituisce il valore di tale elemento.
Nel secondo blocco di codice, viene utilizzato un loop `while` per iterare attraverso gli elementi dell'array `$ages`, stampando ogni elemento seguito da una virgola. Il puntatore interno dell'array viene spostato avanti ad ogni iterazione fino a quando non raggiunge la fine dell'array.
