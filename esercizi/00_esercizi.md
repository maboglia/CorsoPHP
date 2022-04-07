# Esercizi base - PHP

## Esercizio 1.1 

* Digitare su editor il contenuto di `miapagina.php` riportato di seguito, 
salvarlo e visualizzarlo dal browser web digitando la URL 
del server con il vostro nome utente e indicando la pagina 
`miapagina.php` 
* Verificare che venga visualizzata la data di oggi. 
* Modificare il file `miapagina.php` per aggiungere una migliore 
formattazione HTML della pagina ( ad es con il titolo "La mia 
Prima pagina PHP") e formattando i caratteri della data in 
bold e centrati). 
* Modificare la visualizzazione della data per visualizzare solo 
mese e anno.


### Miapagina.php 

```php
<html> <head> <title>La mia prima pagina  PHP  </title> </head> 
<body>  
La data di oggi con la funzione date(): 
<?php 
$dataoggi=date("j/M/Y"); 
echo $dataoggi; 
?> 
</body> </html> 
```

## Esercizio 1.2 
Modificare l’esercizio precedente per visualizzare la data 
di oggi come di seguito: 
Data di oggi: 
20/04/22 
20-04-2022 
Mon-Apr-2022 
20-April-2022 
20-Apr-22 
Mon-April-2022 
ore minuti secondi: 10-46-58  

## Esercizio 1.3 
Riportare questo frammento di script in una pagina HTML 
sostituendo a "Pippo" il vostro nome.  
```php
<?  
$nome="Pippo"; 
echo "buongiorno $nome"; 
?> 
```
Modificare lo script per aggiungere la data e l’ora attuali  

## Esercizio 1.4 
Creare una nuova pagina PHP come segue  
```php
<html> <head> <title>
Esercizio 1.4 </title> </head> <body>  
La variabile non e’ istanziata 
<?php echo $miavar;  
 $miavar="ciao!"; 
echo "La variabile ora è istanziata $miavar"; ?> 
</body> </html> 
```

## Esercizio 1.5 
* Creare una nuova pagina PHP come segue: 
```php
<html> <head> <title>Esercizio 1.4 </title> </head> <body>  
La variabile sara’ istanziata o no? 
<?php echo $miavar;  ?> 
</body> </html>  
```
e verificare se la variabile $miavar risulta instanziata o meno 

## Esercizio 1.6 
* Creare una nuova pagina PHP  che verifichi 
l’istanziazione di una variabile con la funzione isset(). 
* Verificare il funzionamento dello script sia con la 
variabile non instanziata (dovra’ scrivere il messaggio 
"variabile non istanziata") che con la variabile 
istanziata (scrivera’ "variabile istanziata"). 

## Esercizio 1.7 
Considerare la stringa: 

`$str="il gatto sul tetto che scotta";` 

Applicare le funzioni di manipolazioni di stringhe  e visualizzare 
il risultato per ogni passo: 

* Visualizzare la sottostringa dalla posizione 4 alle 10 
* Sostituire "gatto" con "cane" 
* Sostituire "tetto" con "letto" 
* Trasformarla in maiuscole 
