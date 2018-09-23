# Array

Anche Php prevede la struttura dati array come altri linguaggi, ma rispetto alle tipiche
proprietà che ritroviamo ad es negli array in Java esistono sostanziali differenze.

In php un array è una variabile che permette di associare valori a chiavi.

Le chiavi possono essre di tipo integer o string.

## Chiavi di tipo integer
Nel caso di chiavi di tipo integer ritroviamo proprietà simili a quelle note in Java, si veda
l'esempio:

```php
$a[0]='Mario';
$a[1]='Antonio';
. . .
$a[99]='Luisa';
```
in cui l'array $a ha indice numerico da 0 a 99, ogni elemento di $a contiene una stringa.
Sarà possibile accedere direttamente a un singolo elemento specificandone l'indice
numerico, es

```php
echo $a[12];
//o prevedere un ciclo per iterare su tutti gli elementi
for ($i=0;$i<100;$i++){
echo $a[$i].”\n”;// oppure echo ”{$a[$i]}\n”;
}
```

Esiste un'altra importante proprietà sui valori che vedremo nel seguito.

## Chiavi di tipo string
La 'vera' natura degli array in php è di essere associativi, in cui i valori sono associati a
chiavi e non sono incasellati in un elenco posizionale.
Si veda l'esempio:

```php
$nome['Rossi']='Mario';
$nome['Verdi']='Antonio';
. . .
$nome['Bianchi']='Luisa';
```

si perde ogni riferimento posizionale per legare direttamente a ogni cognome il suo nome,
quindi si pone l'accento sul significato dei dati più che al vincolo della struttura.

Quindi alla domanda su qual'è il nome di Bianchi si può rispondere con

```echo $nome['Bianchi'];```

Diventa meno immediato pensare a come realizzare una iterazione su ogni elemento di un
array di questo tipo, non esiste più un indica numerico che assume valori fra due estremi
noti.

Per questo è previsto un costrutto specifico, foreach.

## Foreach

Questo costrutto prevede due forme sintattiche.

### Sintassi array-valore

```foreach (<array_expression> as <variabileValore>) <statement>```

### Permette di iterare su tutti i valori presenti nell'array, es:

```php
foreach ($nome as $n) {
echo $n.”\n”; // oppure echo ”$n\n”;
}
```

In questo modo si otterranno tutti i valori (i nomi) ma non si hanno informazioni sulle chiavi
(nel nostro dcaso i cognomi).

Per questo esiste l'altra forma sintattica.

### Sintassi array-chiave-valore

```php
foreach (<array_expression> as <variabChiave> => <variabValore>)
<statement>
```

In questo caso l'iterazione fornisce oltra al valore corrente anche la relativa chiave
corrente. Es:

```php
foreach ($nome as $c => $n) {
echo ”$n $c\n”;
}
```

Il costrutto foreach può essere usato su qualunque array, anche quelli con chiave
numerica, es:

```php
foreach ($a as $n) {
echo $n.”\n”; // oppure echo ”$n\n”;
}
```
e ancora:

```php
foreach ($a as $c => $n) {
echo ”$n $c\n”;
}
```
La chiave qui è un numero, non più la stringa di cognome.

## Proprietà associativa
In php l'array è associativo. Il caso di array a chiave numerica è un caso particolare che
rientra nella condizione generale, per cui possiamo avere array con indice numerico 'con
buchi' e in cui la posizione non è correlata al valore numerico dell'indice.

Esempio 'con buco':

```php
$a[0]='Mario';
$a[1]='Antonio';
$a[99]='Luisa';
foreach ($a as $key => $value) {
echo "$key $value\n";
}
```

Esempio in ordine 'casuale':
```php
$a[0]='Mario';
$a[99]='Luisa';
$a[1]='Antonio';
foreach ($a as $key => $value) {
echo "$key $value\n";
}
```

Esempio con indici che non partono da 0:
```php
$a[10]='Mario';
$a[11]='Antonio';
$a[99]='Luisa';
foreach ($a as $key => $value) {
echo "$key $value\n";
}
```

Posso comunque iterare per indice solo se i valori sono contigui:
```php
$a[10]='Mario';
$a[11]='Antonio';
$a[12]='Luisa';
for ($i=10;$i<13;$i++) {
echo "$i {$a[$i]}\n";
}
```
In caso di 'buchi':
```php
$a[10]='Mario';
$a[11]='Antonio';
$a[22]='Luisa';
for ($i=10;$i<23;$i++) {
echo "$i {$a[$i]}\n";
}
```
Mentre il foreach fa emergere solo i dati 'reali':
```php
$a[10]='Mario';
$a[11]='Antonio';
$a[22]='Luisa';
```

```php
foreach ($a as $key => $value) {
echo "$key $value\n";
```

## I valori eterogenei
Altra proprietà che distingue gli array Php da quelli Java è che il valore presente negli
elementi non deve necessariamente essere dello stesso tipo per tutti, cade dunque il
vincolo di omogeneità.

Es:
```php
$a[0]='Mario';
$a[1]='Rossi';
$a[2]=1.85;
$a[3]=true;
$a[4]=10;
foreach ($a as $key => $value) {
echo "$key $value\n";
}
```
e ancora:

```php
$a['nome']='Mario';
$a['cognome']='Rossi';
$a['altezza']=1.85;
$a['coniugato']=true;
$a['dita nelle mani']=10;
foreach ($a as $key => $value) {
echo "$key $value\n";
}
```

## Funzione print_r

Comoda per visualizzare in modo compatto i dati di un array. Tipica applicazione è
finalizzata al debug.

Es.
```php
$a['nome']='Mario';
$a['cognome']='Rossi';
$a['altezza']=1.85;
$a['coniugato']=true;
$a['dita nelle mani']=10;
print_r($a);
```
## Funzione array()
Consente di istanziare un array.

Se priva di parametri restituisce un array vuoto, cioè privo di elementi, es:

```$a=array();```

In questo modo la variabile $a è riconosciuta come array, ache se priva di dati.

Se la funzione array riceve un elenco di parametri nella forma
```array(vl1,val2,val3,.., valN9```

li considera elementi da inserire nell'array, p.es:

```$a=array('Mario','Rossi',1.85,true,10);```
equivale a
```php
$a[0]='Mario';
$a[1]='Rossi';
$a[2]=1.85;
$a[3]=true;
$a[4]=10;
```

Infine i parametri passati possono avere la forma chiave=>valore:
```array(k1=>v1, k2=>v2, k3=>v3,..., kN=>vN)```
in questo caso verrà costruito un array associativo.
Ad es:
```php
$a=array('nome'=>'Mario','cognome'=>'Rossi','altezza'=>1.85,'coniugato'=>true,'dita delle mani'=>10);
```

equivale a

```php
$a['nome']='Mario';
$a['cognome']='Rossi';
$a['altezza']=1.85;
$a['coniugato']=true;
$a['dita nelle mani']=10;
```

## Costruzione di array in stile JSON
Con la versione 5.4 di PHP è stato introdotto la possibilità di definire un array anche con la
scrittura semplificata prevista dal formato JSON, per cui il seguente array
```php
$a = array(
array(1,2),
array(3,4),
);
```
può essere costruito anche in questo modo:

```php
$a = [
[1, 2],
[3, 4],
];
```

Si noti che in entrambi gli esempi la virgola finale prima dell'ultima parentesi non ha
funzione di separatore e può essere omessa, ma offre una pratica semplificazione di
editing quando si vogliano aggiungere/rimuovere valori nell'array: tutti gli elementi sono
seguiti da virgola, dal primo all'ultimo.



cc
Quest'opera è stata rilasciata con licenza Creative Commons Attribuzione - Non commerciale - Condividi allo stesso modo 3.0 Italia. Per leggere una
copia della licenza visita il sito web http://creativecommons.org/licenses/by-nc-sa/3.0/it/ o spedisci una lettera a Creative Commons, 171 Second
Street, Suite 300, San Francisco, California, 94105, USA.
Giovanni Ragno – ITIS Belluzzi Bologna 2011