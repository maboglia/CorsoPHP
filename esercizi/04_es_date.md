
### Esercizio 41: Data e Ora Corrente

<details>
<summary>
Scrivi uno script che stampa la data e l'ora corrente nel formato `Y-m-d H:i:s`.
</summary>

```php
<?php
echo "Data e ora corrente: " . date('Y-m-d H:i:s');
?>
```

</details>

---

### Esercizio 42: Differenza tra Due Date

<details>
<summary>
Crea una funzione che calcola la differenza in giorni tra due date.
</summary>

```php
<?php
function differenzaDate($data1, $data2) {
    $datetime1 = new DateTime($data1);
    $datetime2 = new DateTime($data2);
    $interval = $datetime1->diff($datetime2);
    return $interval->days;
}

echo "Differenza in giorni: " . differenzaDate('2024-05-27', '2024-06-10');
?>
```

</details>

---

### Esercizio 43: Aggiungere Giorni a una Data

<details>
<summary>
Scrivi una funzione che accetta una data e un numero di giorni e restituisce la data risultante dopo aver aggiunto i giorni.
</summary>

```php
<?php
function aggiungiGiorni($data, $giorni) {
    $datetime = new DateTime($data);
    $datetime->modify("+$giorni days");
    return $datetime->format('Y-m-d');
}

echo "Data dopo 10 giorni: " . aggiungiGiorni('2024-05-27', 10);
?>
```

</details>

---

### Esercizio 44: Verificare se un Anno è Bisestile

<details>
<summary>
Crea una funzione che verifica se un anno è bisestile.
</summary>

```php
<?php
function èBisestile($anno) {
    return ((($anno % 4) == 0) && (($anno % 100) != 0) || (($anno % 400) == 0));
}

echo "Il 2024 è un anno bisestile? " . (èBisestile(2024) ? "Sì" : "No");
?>
```

</details>

---

### Esercizio 45: Calcolare l'Età

<details>
<summary>
Scrivi una funzione che calcola l'età di una persona in base alla sua data di nascita.
</summary>

```php
<?php
function calcolaEtà($dataNascita) {
    $dataNascita = new DateTime($dataNascita);
    $oggi = new DateTime();
    $età = $oggi->diff($dataNascita);
    return $età->y;
}

echo "L'età della persona nata il 1990-06-15 è: " . calcolaEtà('1990-06-15') . " anni";
?>
```

</details>

---

### Esercizio 46: Formattare una Data

<details>
<summary>
Crea una funzione che accetta una data e la formatta nel formato `d/m/Y`.
</summary>

```php
<?php
function formattaData($data) {
    $datetime = new DateTime($data);
    return $datetime->format('d/m/Y');
}

echo "Data formattata: " . formattaData('2024-05-27');
?>
```

</details>

---

### Esercizio 47: Giorno della Settimana

<details>
<summary>
Scrivi una funzione che accetta una data e restituisce il giorno della settimana corrispondente.
</summary>

```php
<?php
function giornoDellaSettimana($data) {
    $datetime = new DateTime($data);
    return $datetime->format('l');
}

echo "Il giorno della settimana per il 2024-05-27 è: " . giornoDellaSettimana('2024-05-27');
?>
```

</details>

---

### Esercizio 48: Differenza in Ore tra Due Date

<details>
<summary>
Crea una funzione che calcola la differenza in ore tra due date e orari.
</summary>

```php
<?php
function differenzaOre($dataOra1, $dataOra2) {
    $datetime1 = new DateTime($dataOra1);
    $datetime2 = new DateTime($dataOra2);
    $interval = $datetime1->diff($datetime2);
    return ($interval->days * 24) + $interval->h;
}

echo "Differenza in ore: " . differenzaOre('2024-05-27 10:00:00', '2024-05-28 15:00:00');
?>
```

</details>

---

### Esercizio 49: Sommare Ore a una Data

<details>
<summary>
Scrivi una funzione che accetta una data e un numero di ore e restituisce la data e l'ora risultante.
</summary>

```php
<?php
function aggiungiOre($dataOra, $ore) {
    $datetime = new DateTime($dataOra);
    $datetime->modify("+$ore hours");
    return $datetime->format('Y-m-d H:i:s');
}

echo "Data e ora dopo 5 ore: " . aggiungiOre('2024-05-27 10:00:00', 5);
?>
```

</details>

---

### Esercizio 50: Ottenere il Mese e l'Anno Correnti

<details>
<summary>
Crea una funzione che restituisce il mese e l'anno correnti.
</summary>

```php
<?php
function meseAnnoCorrente() {
    return date('F Y');
}

echo "Il mese e l'anno correnti sono: " . meseAnnoCorrente();
?>
```

</details>
