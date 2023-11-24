# Esercitazione

## Esercizio 1.1

* Digitare su blocco note (o altro editor di testo, ad esempio
HTMLKit) il contenuto di miapagina.php riportato di seguito,
salvarlo e visualizzarlo dal browser web digitando la URL
del server con il vostro nome utente e indicando la pagina
miapagina.php
* Verificare che venga visualizzata la data di oggi.
* Modificare il file miapagina.php per aggiungere una migliore
formattazione HTML della pagina ( ad es con il titolo "La mia
Prima pagina PHP") e formattando i caratteri della data in
bold e centrati).
* Modificare la visualizzazione della data per visualizzare solo
mese e anno.Miapagina.php

<html> <head> <title>La mia prima pagina PHP </title> </head>
<body>
La data di oggi con la funzione date():
<?php
$dataoggi=date("j/M/Y");
echo $dataoggi;
?>
</body> </html>

## Esercizio 1.2

Modificare l’esercizio precedente per visualizzare la data
di oggi come di seguito:
Data di oggi:
20/04/09
20-04-2009
Mon-Apr-2009
20-April-2009
20-Apr-09
Mon-April-2009
ore minuti secondi: 10-46-58

## Esercizio 1.3

Riportare questo frammento di script in una pagina HTML
sostituendo a "chiara" il vostro nome.
<?
$nome="chiara";
echo "buongiorno $nome";
?>
Modificare lo script per aggiungere la data e l’ora attuali

## Esercizio 1.4

Creare una nuova pagina PHP come segue
<html> <head> <title>Esercizio 1.4 </title> </head> <body>
La variabile non e’ istanziata
<?php echo $miavar;
$miavar="ciao!";
echo "La variabile ora e‘ istanziata $miavar"; ?>
</body> </html>

## Esercizio 1.5

* Creare una nuova pagina PHP come segue:

<html> <head> <title>Esercizio 1.5 </title> </head>
<body>
La variabile sara’ istanziata o no?
<?php echo $miavar; ?>
</body> </html>
e verificare se la variabile $miavar risulta instanziata o meno

## Esercizio 1.6

* Creare una nuova pagina PHP che verifichi
l’istanziazione di una variabile con la funzione isset().
* Verificare il funzionamento dello script sia con la
variabile non instanziata - dovra’ scrivere il messaggio
"variabile non istanziata" che con la variabile
istanziata – scrivera’ "variabile istanziata".

## Esercizio 1.7

Considerare la stringa:
$str="il gatto sul tetto che scotta";
Applicare le funzioni di manipolazioni di stringhe e visualizzare
il risultato per ogni passo:

* Visualizzare la sottostringa dalla posizione 4 alle 10
* Sostituire "gatto" con "cane"
* Sostituire "tetto" con "letto"
* Trasformarla in maiuscole

## Esercizio 1.8

Prendendo spunto degli esercizi precedenti realizzare una pagina PHP
che scriva:
"Buongiorno Chiara, benvenuta sulla mia prima pagina PHP"
se l’ora attuale è anteriore o uguale alle 12, e scriva
"Buonasera Chiara, benvenuta sulla mia prima pagina PHP"
quando l’orario attuale è posteriore alle 12. Assegnate alla variabile
$nome il vostro nome. Verificare il funzionamento dello script.

## Esercizio 1.9

Modificate la pagina php affinché scriva "buon
giorno" quando l’orario attuale è anteriore o
uguale alle 12, "buon pomeriggio" quando è
posteriore alle 12 ma anteriore alle 18 e
"buonasera" altrimenti.
Aggiungere l’indicazione di data e ora attuali (ad
esempio "Buongiorno Chiara, oggi è il 20 Aprile
2009 e sono le ore .....).

## Esercizio 1.10

Cambiare il colore dello sfondo della pagina in base al
giorno della settimana

## Esercizio 1.11

* Stampare una tabella HTML con intestazione "tabellina
del 5" che contenga appunto la tabellina del 5.
* Stampare tutti i numeri da 1 a 20 in una tabella, in
modo tale che il colore di sfondo della cella cambi a
seconda che il numero sia pari o dispari (ad esempio
rosso quando il numero e’ pari e grigio quando e’
dispari).
