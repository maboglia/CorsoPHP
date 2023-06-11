

## PROGRAMMAZIONE

Una pagina PHP è una normale pagina HTML nel cui interno è possibile inserire del codice PHP.
Il codice PHP è definito come linguaggio di scripting "inline", perché viene inserito direttamente all'interno delle pagine HTML. Per fare ciò il codice PHP deve essere racchiuso tra due speciali tag, il tag <?php (tag di apertura) e il tag ?> (tag di chiusura). Del tag di apertura esistono anche versioni "brevi", per abilitare le quali bisogna agire sul file di configurazione php.ini alle voci short_open_tag e asp_tags; il loro uso è tuttavia sconsigliato dagli stessi sviluppatori di PHP in quanto non essendo attivi di default riducono la portabilità del codice.
Es.:
```
   <?php
       echo "pippo";
   ?>
short_open_tag
   <?
       echo "pippo";
   ?>
asp_tags
   <%
       echo "pippo";
   %>

```
Tutto ciò che è inserito tra questi due elementi viene interpretato dal sistema come sintassi PHP e viene quindi interpretato dal motore PHP prima di essere inviato al client.
Il codice php può anche essere incluso in tag <script>, ad esempio
```
  <script language="php">
       echo "pippo";
  </script>

```

Ecco un esempio pratico per inviare un output di testo:
<?php echo " Testo da stampare "; ?>
Oltre al comando echo esiste anche però il comando print:
<?php print " Testo da stampare "; ?>
Questi due comandi hanno la stessa funzione, ma sono però differenti per un particolare, spesso trascurabile: a differenza di echo, print non può accettare più di un argomento.
Non si tratta, tuttavia, di funzioni, ma di strutture basilari del linguaggio. Possono, dunque, essere scritte con o senza parentesi:
```
 echo("Hello World");

```
produce lo stesso risultato di
echo "Hello World";
Si noti che alla fine dell'istruzione, questa viene dichiarata conclusa attraverso un punto e virgola. In mancanza di questo, il parser PHP restituirà un errore alla riga successiva.

echo presenta inoltre una sintassi abbreviata che deve seguire immediatamente un tag di apertura PHP e funziona solo se la direttiva short_open_tag del php.ini è impostata su On. Ad esempio:
La variabile n vale <?=$n?>
Ecco un semplice applicativo PHP che stamperà sullo schermo la frase: Hello world:
<?php
  echo "<p>Hello world</p>";
?>
In questo esempio l'istruzione echo produrrà come output la stringa in linguaggio HTML
 <p>Hello world</p>
che verrà inviata al browser e quindi interpretata visivamente come un paragrafo contenente le parole Hello world

All'interno dei tag <?php e ?> è possibile inserire dei commenti al codice, ovvero porzioni di testo opportunamente marcate che verranno ignorate dal motore PHP durante il parsing degli script.
Un commento ha una doppia valenza:
1. può servire per non eseguire una parte di codice che però potrebbe essere necessario riprendere successivamente (ad esempio per dei test); 
2. rende più leggibile il sorgente da parte di altri utenti che eventualmente debbano variare lo script PHP (utile soprattutto nei casi di collaborazione). 
PHP supporta i commenti sia stile C che stile shell (Perl).
Il commento a linea singola quindi viene pertanto interpretato sia con // che con # anteposti alla parte di scripting da commentare.
```
echo "questa riga viene eseguta";
// echo "pippo";
# echo "pluto";
echo "anche questa"; //questo codice è ignorato echo ("anche questo")
```
In questo caso non verranno eseguite la seconda e la terza riga e la seconda parte della quarta (dal commento in poi).


È importante sottolineare che se i caratteri di commento non sono posti a inizio riga commentano solo tutto quello che si trova sulla stessa riga a destra del commento; pertanto occorre stare attenti alla sintassi per non incappare in errori. Ad esempio è corretto:
<?php 
    echo "pippo"; // Scrivo pippo 
?>
Ma attenti a scrivere:
    <?php echo "pippo"; // Scrivo pippo ?>
In apparenza questi due esempi potrebbero sembrare uguali ma nel secondo caso la chiusura del tag PHP è posta sulla stessa riga a destra del commento, pertanto il linguaggio non interpreterà la chiusura del tag <?php e segnalerà un errore di sintassi.
È possibile commentare anche più di una riga di codice per volta utilizzando /* testo */. Tutto quello che si trova tra /* e */ risulta essere un commento.
echo "questo viene eseguito"; /*  
Linea 1 di commento
Linea 2   di commento
*/
echo /* "questo no" */ "anche questo" ;
Occorre fare attenzione nel non annidare i commenti di stile C, situazione che si presenta quando si commentano larghi blocchi di codice.
     /*
     echo 'Questo è il primo commento'; /* Questo commento dà errore */
     */
Tutta la parte in grassetto rappresenta un unico commento per cui */ nella riga successiva genererà un errore 



Possiamo pensare ad una variabile come una scatola nella quale immagazzinare le informazioni e da cui possiamo ottenerle quando è necessario.

Indice
1 Lavorare con le variabili 
1.1 Variabili per valore e per riferimento 
1.2 Costanti 
2 Tipi di dati 
2.1 Calcolo multibase 
2.2 Stringhe 

Lavorare con le variabili
In PHP le variabili sono identificate dal simbolo $ che precede il nome della variabile stessa. È necessario tuttavia che il primo carattere dopo il $ non sia un numero o un carattere speciale, ma sia una lettera o un carattere underscore (_).
Molti linguaggi di programmazione richiedono che le variabili usate nel corso del programma siano dichiarate. Il linguaggio PHP è un linguaggio chiamato a tipizzazione debole , che significa invece che non richiede alcuna dichiarazione di variabile: per il motore PHP, infatti, una variabile è tale dalla prima riga nella quale se ne fa uso.
L'istruzione fondamentale che è possibile eseguire con una variabile è l'assegnazione, che imposta (assegna) il valore contenuto dalla variabile. La sintassi è
$nome_var = valore
dove valore è un'espressione valida per PHP (per espressione si intende una sequenza di dati, operatori e/o variabili che restituisca un valore). Sono ad esempio espressioni
3 //restituisce 3
3 + $var //restituisce il valore di $var sommato di 3.
Per fare riferimento ad una variabile e al suo valore sarà necessario semplicemente riferirsi al nome; si noti che PHP è case-sensitive, quindi $var e $Var sono due variabili differenti. Questo script, ad esempio, stampa il valore di una variabile:
<?php
 $variabile = "valore della variabile";
 echo "$variabile";
?>
Da notare che l'istruzione echo non stampa $variabile ma il valore della variabile $variabile; sarebbe equivalente scrivere
echo $variabile;
Un'istruzione, invece, come
echo '$variabile';
stamperebbe $variabile (si notino gli apici e non le virgolette doppie).
- Variabili per valore e per riferimento
Le variabili PHP sono solitamente passate per valore: quando una variabile viene assegnata ad un'altra in realtà viene assegnato ad una variabile una copia del valore dell'altra, ma le due variabili identificano comunque due celle di memoria differenti. Ad esempio:
$var1 = 3;
$var2 = $var1 //ora $var2 contiene il valore 3
$var2 = 4 //in questo caso non cambia il valore di $var1 ma solo quello di $var2
Talvolta, soprattutto per quanto riguarda l'uso di funzioni, è comodo aver due variabili che puntino alla stessa cella di memoria. Per fare ciò si assegnano le variabili per riferimento usando la sintassi:
$var1 = &$var2
Ad esempio
$var1 = 3;
$var2 = '''&'''$var1 //ora $var2 e $var1 puntano alla stessa cella di memoria
$var2 = 4 //ora $var1 e $var2 contengono entrambe il valore 4
- Costanti
Può essere comodo durante la programmazione definire valori costanti riutilizzabili nel codice. La differenza sostanziale tra costanti e varibili sta nel fatto che le prime, a differenza delle seconde, non possono essere modificate. Per definire una costante si usa la sintassi:
define("nome_costante", valore);
e per richiamarle si usa semplicemente il loro nome:
echo nome_costante;
Esistono alcune costanti predefinite, che sono valide cioè in tutti gli script:
__FILE__: restituisce il percorso completo e il nome del file (ad esempio /var/www/html/index.php su sistemi Linux) 
__LINE__: restituisce il numero di riga in cui si trova la costante 
__FUNCTION__ e __CLASS__: restituiscono rispettivamente il nome della funzione e della classe in cui la costante è richiamata. 
- Tipi di dati
PHP è a tipizzazione debole anche perché converte automaticamente il tipo di dati contenuto nella variabile a seconda del contesto (questo è importante quando si usano gli operatori).
Nonostante ciò, il concetto di tipo di dato esiste in PHP: ogni variabile è di un determinato tipo a seconda del valore che contiene in quel momento. Principalmente i tipi di dato sono:
Nome
Descrizione
Esempio
Numero intero (int) o a virgola mobile (float)
un numero razionale o intero
$a = 3; $b = -12.5;
Stringa (string)
sequenza alfanumerica (testo); durante l'assegnazione deve essere delimitata da due virgolette (") o apici (').
$a = "testo"; $b = '"I promessi sposi" è un romanzo di A. Manzoni';
Booleano (boolean)
può assumere solo i valori true (vero) o false (falso)
$a = true; $b = (3 == 5);
Array
tipo di dato complesso, verrà trattato più avanti
Null
indica l'assenza di un valore; serve soprattutto ad annullare una variabile
$a = null;
Di fronte a diversi tipi di dato, il motore PHP può trovarsi in diverse situazioni e si comporta in maniere differenti:
se si aspetta un valore numerico intero e viene fornito un numero a virgola mobile PHP tronca la parte decimale, restituendo solo la parte intera 
se si aspetta un valore numerico e viene fornita una stringa, PHP elimina spazi e lettere di troppo utilizzando soltanto i numeri contenuti in tale stringa 
se si aspetta un valore numerico e viene fornito un valore booleano viene restituito 1 se il valore è TRUE, 0 se il valore è FALSE 
se si aspetta un numero e viene fornito un array restituisce un numero pari al numero di elementi contenuti dall'array 
se si aspetta una stringa e viene fornito un numero questo viene convertito in una stringa contentente esattamente il numero stesso 
se si aspetta un valore stringa e viene fornito un valore booleano viene restituito 1 se il valore è TRUE, una stringa vuota se è FALSE 
se si aspetta una stringa e viene fornito un array restituisce una stringa contenente il valore array 
se si aspetta un valore booleano e viene fornito un numero PHP restituisce FALSE se il numero è uguale a 0, TRUE se è il numero è diverso da 0 (di solito 1) 
se si aspetta un valore booleano e viene fornita una stringa PHP restituisce FALSE se la stringa è vuota o contiene il valore 0; restituisce TRUE negli altri casi 
se si aspetta un valore booleano e viene fornita un array PHP restituisce FALSE se l'array è vuoto , TRUE negli altri casi 
il valore null viene trattato come un valore booleano FALSE 
Esistono tuttavia numerose funzioni di conversione per trasformare un tipo di dato in un altro, che consistono nell'anteporre all'espressione in questione il nome del tipo di dato che si vuole ottenere tra parentesi. Ad esempio:
(int)(3.45 + 7.3)
restituisce 10, in quanto viene convertito un numero float in un intero secondo le regole di conversione. Allo stesso modo
(boolean)("questa è un'espressione stringa")
restituisce TRUE
- Calcolo multibase
Oltre al sistema decimale, PHP può lavorare con i sistemi di numerazione in base otto e sedici. Per inizializzare una variabile in base otto, il numero deve iniziare con uno 0 (es 01247); i numeri in base sedici devono invece iniziare con 0x (es 0xf56b).
- Stringhe
Meritano particolare attenzione le stringhe, soprattutto nell'analisi dei caratteri di commutazioni.
Una stringa in PHP deve essere delimitata da apici o da apici doppi; bisogna tuttavia chiudere una stringa con la stessa modalità con cui si è aperta:
"Questa non è una stringa valida'
'Questa lo è'
Può essere necessario in alcuni casi usare carattere particolari; ad esempio può essere necessario inserire un apice in una stringa delimitata da apici singoli. In questo caso si usano i caratteri di commutazione (o sequenze di escape). I principali sono:
\'
Singolo apice (necessario solo se la stringa è racchiusa da apici singoli)
\"
Doppio apice (necessario solo se la stringa è racchiusa da apici doppi)
\\
Backslash
\n
New line (ritorno a capo)
\r
Ritorno del carrello
\t
Tabulazione orizzontale
\v
Tabulazione verticale (disponibile nelle versioni di PHP superiori alla 5.2.5)
\f
form feed (disponibile nelle versioni di PHP superiori alla 5.2.5)
\$
Segno del dollaro
\x00 - \xFF
Carattere esadecimale
Nota: nel caso di stringhe racchiuse da apici singoli l'unica sequenza di escape ammessa è la prima (\') 

Nel linguaggio PHP affianco ai classici operatori matematici, booleani e logici sono disponibili anche gli operatori unari di incremento e decremento e un operatore ternario. Gli operatori principali sono:
matematici (restituiscono e richiedono valori numerici) 
+ somma algebrica 
- sottrazione o negazione del numero 
* Moltiplicazione 
/ divisione 
% modulo (resto della divisione intera) 
stringa (restituiscono una stringa) 
. (punto) concatena due stringhe 
Gli operatori visti finora hanno inoltre una sintassi particolare nel caso di espressioni come ad esempio
$a = $a + 3;
$b = $b.' stringa';
Queste espressioni, infatti, nelle quali compare la stessa variabile ambo sia a destra che a sinistra dell'uguale, possono essere riassunte in
$a += 3;
$b .= ' stringa';
booleani o di confronto (restituiscono un valore boolean) 
=== identicamente uguale (anche del medesimo tipo) 
== uguale a 
!= diverso da 
> maggiore di 
< minore di 
=> maggiore o uguale a 
<= minore o uguale a 
logici (restituiscono e operano su boolean) 
! corrisponde alla negazione logica ed è un operatore unario (necessita di un solo operando). Restituisce false se l'operando è true, true se viceversa. 
and o && corrisponde alla congiunzione logica (et). Restituisce true solo se entrambi gli operandi sono veri. 
or o || corrisponde disgiunzione inclusiva logica (vel). Restituisce true anche se uno sole degli operandi è vero. 
xor corrisponde alla disgiunzione esclusiva logica (out). Restituisce true solo se uno dei due valori è true e l'altro è false; 
due operatori molto importanti e comodi in PHP sono gli operatori chiamati di incremento e di decremento ++ e --, che restituiscono un valore numerico e aumentano o diminuiscono il valore della variabile di una unità. È più facile capire il loro funzionamento con un esempio: 
$v1 = $v2++; //assegna a $v1 il valore di $v2 e poi incrementa $v2 di 1
$v1 = $v2-- //assegna a $v1 il valore di $v2 e poi decrementa $v2 di 1
$v1 = ++$v2; //incrementa $v2 di 1 e poi assegna a $v1 il valore di $v2 
$v1 = --$v2 //decrementa $v2 di 1 e poi assegna a $v1 il valore di $v2 
un altro operatore molto comodo in PHP è l'operatore ternario ? : la cui sintassi è 
condizione ? espr1 : espr2
Quando il motore PHP legge questo operatore valuta il valore di condizione: se è vera, restituisce il valore espr1, altrimenti il valore espr2. Un esempio potrebbe rendere più chiaro il tutto:
$var = ($a > $b ? 'a maggiore di b' : 'a minore di b');
Il valore di $var sarà quindi dipendente dal valore booleano dell'espressione a > $b
L'operatore ternario può essere usato anche per determinare il valore di un parametro da passare ad una funzione.
Ad esempio:
function prova( $valore ) {
   echo $valore;
} 

prova( true  ? "prova 1 " : "prova 2" );
prova( false ? "prova 1 " : "prova 2" );
Il codice sopra riportato darà come output:
prova 1 prova 2
Gli array (o vettori) sono delle strutture dati complesse che risultano molto comode per la codifica di particolari algoritmi.
Possiamo pensare agli array come a delle liste di elementi nelle quali ciascun elemento ha un valore e un indice (o chiave) numerico o alfanumerico che lo identifica nella lista.
Gli array possono essere semplici o associativi: nel primo caso ciascun elemento della lista è identificato unicamente da un indice numerico; nel secondo caso ogni valore ha un indice numerico e uno alfanumerico, che può quindi memorizzare altri dati particolari.
In PHP non esistono matrici multidimensionali ma queste possono essere emulate creando strutture (anche molto complesse) con array di array, dal momento che ciascun elemento di un array può a sua volta essere un array:
$valore = array();
$riga = 2;
$colonna = 3;
$nome = 'Pippo';
 
$valore[$riga][$colonna][$nome] = 10;
Per inizializzare una variabile come array occorre dichiarare la variabile come tale e si utilizza la seguente notazione:
$array = array();
Per fare riferimento ad un elemento dell'array si usa la sintassi
$array[indice]
dove indice è un numero oppure, come spiegato sopra, una chiave alfanumerica.
Per aggiungere all'array un elemento con un indice n è sufficiente fare riferimento all'elemento stesso, come nell'esempio seguente:
$array = array();
$array[n] = "prova";
Per inserire automaticamente un elemento alla fine della lista si usa invece la sintassi
$array[] = valore;
L'indice assegnato così all'elemento appena inserito è pari all'elemento maggiore incrementato di uno. Se l'array è vuoto, viene assegnato indice 0.
$array = array();
$array[] = "prova1";
$array[] = "prova2";
$array[] = "prova3";
 
echo $array[0];
echo $array[1];
echo $array[2];
Questo semplice spezzone di codice restituirà
prova1prova2prova3
Se vogliamo indicare la posizione in cui inserirlo, oppure la chiave a cui dovrà essere associato, dovremo inserire il valore usando la sintassi seguente:
$array = array();
$array[1] = "prova 1";
$array["prova"] = "prova 2";
Ovviamente se un elemento è già presente a tale indice o chiave questo verrà sovrascritto.
È possibile assegnare dei valori all'array già in fase di dichiarazione, passandoli come parametri alla funzione array() che si occupa appunto di creare un nuovo array.
$array = array( "prova1", "prova2", "prova3" );
echo $array[0];
echo $array[1];
echo $array[2];
Questo spezzone di codice restituirà
prova1prova2prova3
proprio come nell'esempio fatto sopra.

Indice
[nascondi]
1 Funzioni utili 
1.1 print_r 
1.2 count 
1.3 implode ed explode 
1.4 foreach 
1.5 Altre funzioni 
//<![CDATA[
if (window.showTocToggle) { var tocShowText = "mostra"; var tocHideText = "nascondi"; showTocToggle(); } 
//]]>- Funzioni utili
- print_r
print_r è una funzione molto utile in php, non solo per gli array, ma anche per molti altri tipi di oggetto. Nel caso degli array, comunque, è funzionale perché consente di stampare il contenuto degli stessi in modo molto utile per eseguire, ad esempio, un veloce debug.
Ad esempio
$array = array( 100, 200, 300 );
print_r( $array );
restituirà il seguente output:
array(
   [0] => 100,
   [1] => 200,
   [2] => 300
 )
- count
La funzione count, come suggerisce il nome, restituisce il numero di elementi contenuti nell'array.
$array = array( 1, 2, 3, 4 );
echo count( $array );
avrà come output
4
- implode ed explode
Queste due funzioni lavorano con le stringhe e gli array. La sintassi è:
implode (collante, array)
explode (delimitatore, stringa)
La prima restituisce una stringa ottenuta concatenando in ordine tutti gli elementi di array inframezzandoli dalla stringa collante.
La seconda restituisce un array ottenuto separando stringa utilizzando delimitatore come separatore.
Ad esempio:
$arr = array('a','b','c');
$stringa = implode(":", $arr); //restituisce a:b:c
- foreach
Questa non è proprio una funzione, ma una struttura di controllo. Funziona così:
$arr = array('a','b','c');
foreach($arr as $variabile_chiave=>$variabile_contenuto)
{
 // istruzioni
}
Esempio:
$arr = array('a','b','c');
foreach($arr as $valore)
{
 echo $valore;
}
oppure, se si vuole visualizzare anche la chiave dell'array si fà così:
$arr = array('a'=>'lettera 1','b'=>'lettera 2','c'=>'lettera 3');
foreach($arr as $key=>$valore)
{
 echo "La chiave dell'array ".$key." è uguale a ".$valore.".<br>";
}
Il primo esempio restituirà abc, il secondo La chiave dell'array a è uguale a lettera 1.
La chiave dell'array b è uguale a lettera 2.
La chiave dell'array c è uguale a lettera 3.

CONDIZIONI

La condizione, o selezione, è una struttura che permette di eseguire istruzioni differenti in base ad una condizione indicata all'inizio.
- Selezione binaria
La selezione binaria consente in una scelta tra due possibilità: vero o falso.
Questo tipo di selezione si basa sul valore booleano di un'espressione indicata all'inizio della struttura ed esegue il primo blocco indicato se la condizione è vera, altrimenti esegue l'eventuale secondo blocco.
In PHP questa condizione si accede tramite il costrutto if... then... else che funzionano esattamente come nel linguaggio C, con l'unica differenza che else if si scrive tutto attaccato: elseif. Ad esempio:
<?php
$x = 10;
$y = 10;
if ($x == $y) {
 print "\$x e' uguale a \$y: $x\n";
}
elseif ($x > $y) {
 print "\$x e' maggiore di \$y: $x > $y\n";
}
else {
 print "\$x e' minore di \$y: $x < $y\n";
}
?>
Il risultato sarà:
$x e' uguale a $y: 10
- Selezione multipla
La selezione multipla consiste in una scelta tra due o più possibilità in base al valore di una espressione valutata inzialmente; si esprime con il costrutto switch... case, che funziona esattamente come nel linguaggio C.
Il costrutto esegue il confronto dell'espressione passata a switch con tutti i valori case ed il confronto si interrompe quando viene incontrata l'istruzione break.
<?php
$x = 5;
switch ($x) {
 case 0:
  print "\$x e' uguale a 0\n";
  break;
 case 1:
  print "\$x e' uguale a 1\n";
  break;
 case 2:
  print "\$x e' uguale a 2\n";
  break;
 case 3:
 case 4:
  print "\$x e' uguale a 3 oppure a 4\n";
  break;
 default:
  print "\$x e' minore di 0 o maggiore di 4\n";
  break;
}
?>
Il risultato sarà:
$x e' minore di 0 o maggiore di 4
CICLO


Il ciclo (o iterazione) è una struttura di controllo (come la selezione) che permette l'esecuzione di una sequenza di una o più istruzioni fino al verificarsi di una data condizione.
In PHP, questi vengono gestiti esattamente come nel linguaggio C. Vedi C/Blocchi e funzioni/Cicli.
Un tipo particolare di ciclo, non presente in C e nei linguaggi derivati, è il ciclo foreach, che si presta ad essere usato in molte situazioni.
La sintassi tipica dell'istruzione è questa:
foreach( $variabile_su_cui_iterare as $valore ) {
    istruzioni
}
Tipicamente $variabile_su_cui_iterare è un array. In questo caso il ciclo scorrerà tutti gli elementi dell'array, assegnando di volta in volta il loro valore alla variabile $valore, che potrà essere usata all'interno del corpo del ciclo.
Se dovesse essere necessario, per qualche ragione, conoscere anche la chiave dell'array a cui tale oggetto è associato, è possibile usare la sintassi
foreach( $variabile_su_cui_iterare as $chiave=>$valore ) { 
    ''istruzioni''
}
Anche se foreach è tipicamente usato per scorrere tutti gli elementi di un array può essere usato anche per scorrere tutti membri pubblici, o comunque accessibili, di una classe. 



FUNZIONI

Una funzione è un blocco di codice che può richiedere uno o più parametri in ingresso e può fornire un valore di uscita.
PHP mette a disposizione numerose funzioni predefinite, di cui non si ha sottomano il codice ma risultano molto utili o talvolta indispensabili nella programmazione delle nostre applicazioni server.
In PHP la maggior parte delle funzioni restituisce un valore anche quando ciò potrebbe non essere ovvio: spesso, ad esempio, le funzioni restituiscono un valore boolean che indica l'esito della sua esecuzione.
Questo elenco mostra solo le principali funzioni che vi capiterà di utilizzare programmando in PHP. Per l'elenco completo, consulta le referenze ufficiali di PHP

1 Usare le funzioni 
2 Funzioni di stringa 
3 Funzioni numeriche 
4 Funzioni per data e ora 
5 Altre funzioni utili 
//<![CDATA[
if (window.showTocToggle) { var tocShowText = "mostra"; var tocHideText = "nascondi"; showTocToggle(); } 
//]]>- Usare le funzioni
Per utilizzare una funzione non bisogna fare altro che richiamarla (o invocarla). Se esiste ad esempio una funzione abs sarà sufficiente usarla in questa maniera:
$a = abs($b);
$c = 4 * abs(-65);
Nel momento in cui ci riferiamo alla funzione si dice che la stiamo appunto richiamando.
- Funzioni di stringa
strlen 
 strlen(stringa)
Restituisce il numero di caratteri di una stringa 
strstr 
strstr(stringa1, stringa2)
Restituisce la parte di stringa1 che si trova dopo la prima occorrenza di stringa2 in stringa1. Se non viene trovata alcuna occorrenza, la funzione restituisce false. Ad esempio: 
 strstr("it.wikibooks.org", ".")
restituisce ".wikibooks.org" 
strpos 
strpos(stringa1, stringa2)
Restituisce la posizione della prima istanza di stringa2 in stringa1. Si noti che il conteggio dei caratteri avviene a partire da 0. Ad esempio: 
strpos("it.wikibooks.org", ".")
restituisce 2. Se si vuole cercare il carattere successivo si può usare questo metodo: 
strpos(strstr("it.wikibooks.org", "."), ".")
chr e ord 
chr(numero)
ord(carattere)
Queste due funzioni restituiscono rispettivamente il carattere corrispondente al carattere numero nella tabella ASCII e la posizioni di carattere sempre nella tabella ASCII. Le due funzioni sono complementari. 
- Funzioni numeriche
abs 
abs(numero)
Restituisce il valore assoluto di numero 
pi 
pi()
Restituisce un valore approssimato di Pi greco 
pow 
 pow (base, esponente)
Restituisce base elevato alla esponente. L'esponte fornito deve essere positivo 
rand 
 rand(min, max)
Restituisce un numero casuale compreso tra min e max (inclusi) 
round, ceil, floor 
round(numero, n)
ceil(numero)
floor(numero)
Restituiscono il valore di numero arrotondato rispettivamente di n posizioni decimali, all'unità per eccesso e all'unità per difetto 
number_format 
number_format(numero, n, sep_decimali, sep_migliaia)
Restituisce una stringa contenente un valore formattato di numero in base ai parametri passati. Accetta uno, due o quattro parametri.
Se ne viene passato solo uno, viene restituito il numero senza decimali usando la virgola come separatore di migliaia
Se vengono passati due parametri, viene restituito il numero formattato con n cifre decimali, usando il punto come separatore decimale e una virgola come separatore di migliaia.
Se sono passati tutti i parametri, viene restituito il numero con n cifre decimali, usando sep_decimali come separatore decimale e sep_migliaia come separatore di migliaia. 
base_convert 
base_convert(numero, da_base, a_base)
Converte una stringa contente numero espresso nella base da_base in una stringa contente il corrispondente nella base a_base. Ad esempio:
base_convert('f',16,10);
restituisce 15. 
- Funzioni per data e ora
time 
time()
La principale funzione di data-ora è time che restituisce l'ora corrente del server in formato Unix Timestamp. Il formato Unix Timestamp indica il numero di secondi passati dalla cosidetta Unix Epoch (1 gennaio 1970 alle ore 00:00:00 GMT) ed è usato da PHP per gestire le date. 
date 
date(formato, ora)
Una volta ottenuto un valore di data valido (ad esempio tramite la funzione time o da un database MySql) è possibile formattarlo usando la funzione date che accetta un parametro obbligatorio, la stringa formato, e un parametro facoltativo ora che specifica la marcatura temporale da formattare e restituisce una stringa. 
Per formattare una data può essere comodo usare le costanti predefinite di PHP per la formattazione delle date come DATE_COOKIE, che formatta le date secondo il metodo usato nei cookie HTML (es. Monday, 15-Aug-05 15:52:01 UTC) (si veda qui· l'elenco completo) 
Per ottenere un formato personalizzato, nella stringa è possibile inserire i seguenti parametri (si ricorda che l'output può variare in base alle impostazioni di lingua del server): 
Carattere
Descrizione
Esempio
Giorni
d
Giorno del mese, senza zeri aggiuntivi
1 - 31
j
Giorno del mese, con zeri aggiuntivi
01 - 31
D
Giorno della settimana in formato breve (tre lettere)
Mon - Sat
l (L minuscola)
Giorno della settimana in formato completo
Monday - Saturday
S
Suffisso del giorno del mese per i numeri ordinali inglesi (funziona bene insieme a d)
st, nd, rd, th
Mesi
n
Numero del mese, senza zeri aggiuntivi
1 - 12
m
Numero del mese, con zeri aggiuntivi
01 - 12
F
Nome del mese completo
January - December
Anni
y
Numero dell'anno in due cifre
92, 01
Y
Numero dell'anno in quattro cifre
1992, 2001
L
Restituisce "1" se l'anno è bisestile, "0" altrimenti

Ore
g / G
Ora in formato 12/24 ore, senza zeri aggiuntivi
1 - 12, 0 - 23
h / H
Ora in formato 12/24 ore, con zeri aggiuntivi
01 - 12, 00 - 23
i / s
Minuti/secondi, con zeri aggiuntivi
00 - 59
Altro
U
Secondi dalla Unix Epoch (come time)

È possibile ottenere inoltre qui l'elenco completo. I valori non predefiniti saranno usati tali quali; è possibile inoltre evitare i caratteri speciali siano valutati è possibile usare il carattere di commutazione "\" davanti alla lettera. In questo caso si faccia però attenzion a commutare il carattere "\" nel caso le sequenze non corrispondano ad altri caratteri di commutazione. Ad esempio: 
date("l \\t\h\e jS") //è necessario commutare "\" perché \t è la tabulazione
restituisce, ad esempio, Sunday the 29th. 
mktime 
mktime(ore, minuti, secondi, mese, giorno, anno) </source>
Restituisce una data in un formato valido per PHP partendo dai valori passati come parametri. L'anno può essere espresso con 2 o 4 cifre.
L'uso di questa funzione permette di creare facilmente date da formattare. Ad esempio: 
echo(date("d F Y", mktime(0,0,0,30,07,1992));
restituisce 
30 luglio 1992
- Altre funzioni utili
include e include_once 
include(file)
include_once(file)
Queste due funzioni risultano molto utili nella programmazione di applicazione complesse, in quanto permettono di includere nella pagina PHP un altro file esterno.
Quando incontra queste funzioni, il motore PHP:
1. chiude i tag <?php ?> entrando quindi in modalità normale 
2. inserisce ed analizza il testo del file file; per inserire codice PHP sarà quindi necessario inserire nuovamente i tag <?php e ?> 
3. riapre il tag <?php 
In questo modo è possibile creare applicazione modulari inserendo nel file che verrà incluso le nostre funzioni personalizzate (che vedremo nel prossimo modulo.
Si faccià attenzione se si inserisce codice PHP nei file da includere a salvarli con estensione .php (soprattutto se contengono informazioni sensibili come password o dati personali) altrimenti un eventuale utente malintenzionati potrebbe leggerne il contenuto, in quanto il codice PHP non verrebbe prima letto dal server.
La funzione include_once si differenzia da include in quanto include il file solo se esso non è già stato incluso nella pagina.

FUNZIONI PERSONALIZZATE 
Definire una funzione
La definizione di una nuova funzione in PHP è la seguente:
 function nome_funzione ($arg1, $arg2, ...)  {
  //istruzioni
 }
Dove $arg1, $arg2 sono eventuali variabili che assumeranno i valori presi come parametri.
- Impostare un valore di ritorno
In una funzione personalizzata per impostare il valore restituito dalla funzione si usa l'istruzione return. La sua sintassi è
 return espr;
Quando il motore PHP incontra questa funzione restituisce il valore di espr e interrompe l'esecuzione del blocco della funzione tra parentesi.
Vediamo adesso un esempio che fa uso del comando return. Vogliamo realizzare un convertitore euro -> lire.
<?php
// 15 euro
$valuta = 15;
 
// definizione della funzione "converti"
function converti($euro)
{
    // effettuo la conversione
    $lire = $euro * 1936.27;
 
    // restituisco il valore calcolato
    return $lire;
}
 
// chiamo la funzione converti. Questa volta dobbiamo usare una
// variabile per raccogliere il valore restituito dalla funzione!
$vecchio_conio = converti($valuta);
echo "$valuta euro equivalgono a $vecchio_conio lire";
?>
Analizziamo la funzione "converti". Quando viene invocata riceve un parametro (la quantità di euro da convertire in lire) che viene memorizzata nella variabile $euro. La prima istruzione effettua la conversione vera e propria. Per far si che la funzione restituisca il risultato calcolato viene usato il comando return affiancato dalla variabile da restituire $lire.
Per utilizzare la funzione converti dovremo quindi specificare anche la variabile che raccoglierà il risultato restituito da tale funzione. Nel nostro esempio sarà la variabile $vecchio_conio a conservare tale valore.
Anche se il comando return è in grado di restituire una sola variabile è possibile far si che una funzione restituisca anche più di un valore attraverso un semplice espediente. E' sufficiente infatti impacchettare tutti i valori da restituire all'interno di un array e poi usare il comando return proprio con questo array.
- Usare i parametri
Una volta definita una funzione è possibile lavorare sui parametri indicati tra parentesi, che possono essere passati per valore o per riferimento, allo stesso modo con le variabili. Ad esempio:
 function prova (&$param1, $param2) {
  &$param1 = $param2 + 5;
 } 
 
 prova($var1, 3);
Dopo l'esecuzione della funzione la variabile $var1 conterrà così il valore 8. Si faccia ovviamente attenzione a passare come parametro una variabile e non un'espressione, perché altrimenti non è possibilie effettuare il passaggio per riferimento.
Si noti che una funzione personalizzata deve essere invocata necessariamente dopo la sua dichiarazione. Ad esempio:
 $var1 = funzione_esempio();
 function funzione_esempio() {
  return "ciao!";
 }
In questo caso il motore PHP restituirà un errore, in quanto la lettura dello script avviene in sequenza e la funzione funzione_esempio non è ancora stata dichiarata nel momento in cui viene chiamata.
- Parametri predefiniti
È possibile inoltre prevedere che l'utente non passi alcun valore nel chiamare la funzione ed impostare dei valori predefiniti che deve assumere il parametro nel caso non venga specificato. Ad esempio:
 function predef ($arg1, $arg2 = 10) {
  return $arg1 + $arg2  ;
 }
 echo predef(23); //restituisce 33

VARIABILI GLOBALI

Le variabili globali nascono e muoiono con una sessione di lavoro. Possono essere memorizzate sul server o sul client: in questo secondo caso utilizzano i cookies.
Per far sì che una variabile diventi globale occorre utilizzare la funzione register che ne permette la registrazione. Così operando, mentre le normali variabili globali delle form	 vengono registrate automaticamente, sarà possibile utilizzare altre variabili che avranno validità per l'interala durata della sessione.
PHP utilizza degli array associativi per diverse variabili globali. I più importanti sono $_POST e $_GET. Seppure a partire dalla versione 4.3 PHP permette di utilizzare automaticamente le variabili passate dalle form, questi due array consentono di recepire le variabili passate attraverso le form sia con il metodo GET sia con il metodo POST.
Per quando riguarda le altre variabili globali, da utilizzare all'interno di uno script PHP, vale una regola che potremmo considerare inversa alle regole di scope di C e dei principali linguaggi: se all'interno di una pagina o di una funzione voglio utilizzare la variabile $userid è opportuno che utilizzi prima la notazione global $userid. Operando in questo modo la variabile globale acquista visibilità all'interno della funzione.
-- $GLOBALS
L'array associativo $GLOBALS contiene i riferimenti a tutte le variabili locali visibili dalla root. È una variabile superglobale: ovvero non hai bisogno di scrivere global $GLOBALS all'interno di una funzione per poterla usare.
$GLOBALS contiene i riferimenti a:
_GET 
_POST 
_SERVER 
_COOKIE 
_SESSION 
_FILES 
_ENV 
_REQUEST 
GLOBALS 
Si noti che $GLOBALS è ricorsivo, ovvero contiene se stesso all'infinito. Tecnicamente infatti è corretto chiamare una variabile anche in questo modo: $GLOBALS["GLOBALS"]["GLOBALS"]['nomevar']. Chiaramente però non sarebbe né logico, né utile ad alcun fine
--- $GET

$_GET (o $HTTP_GET_VARS se la versione di PHP è inferiore alla 4.1.0) rappresenta un array associativo di variabili passate tramite barra degli indirizzi; alle coppie di chiavi e valori nell'array corrispondono le coppie di nomi e valori nella querystring.
In molte forme $_GET può essere simile a $_POST, ma la querystring non può superare i 255 caratteri; inoltre è poco sicuro in quanto è molto facile per un utente malintenzionato appendere valori alla querystring senza che vengano effettuati controlli precedenti. Una tecnica eventuale è quella di passare i valori crittandoli tramite la funzione md5, un algoritmo di criptazione univoco e non retroversibile.
Utilizzo
Si può chiamare una pagina passandole variabili tramite $_GET da un form HTML, a patto che la proprietà html del form in questione sia impostata a GET (es. <form action="pagina.html" method="get">). In questo caso le coppie di nomi-valori saranno dati dai nomi dei campi form e dai rispettivi valori.
È possibile anche chiamare una pagina passandogli variabili per indirizzo semplicemente chiamando la pagina e accodando al nome ?, seguito dalle variabili in ordine chiave=valore e suddivise da una &.
www.sito.com/chk.php?var1=valore1&var2=valore2
In questo caso avremmo un array che avrà per chiavi var1 e var2 e per valori rispettivamente valore1 e valore2.
Esempi
In un Forum
Un classico utilizzo dell'array superglobale $_GET è quello della visualizzazione di un particolare thread di un forum.
In questo caso sarà necessario predisporre una pagina ad esempio showThread.php che, letto un valore passato come ID, restituisca il thread corrispondente.
Per fare riferimento, ad esempio, al thread con id 23, si potrà usare la notazione
www.forumTestWiki.it/showThread.php?id=23
In queste situazioni l'utilizzo di GET risulta comodo, in quanto:
1. non c'è alcun problema di sicurezza (l'ID del thread non è un dato sensibile) 
2. un utente può creare un segnalibro alla pagina in modo che, poiché contiente nella URL l'ID del thread, questo sarà caricato automaticamente. 
Per un login
È possibile anche utilizzare la querystring per un sistema di login, ma questo metodo è decisamente carente in fatto di sicurezza, poiché i dati come nome utente e password sarebbero palesemente visualizzabili a schermo. 


--- POST

$_POST (o $HTTP_POST_VARS se la versione PHP è inferiore alla 4.1.0) è una delle variabili predefinite di sistema.
In sostanza è un array associativo di chiavi e valori i cui elementi sono rappresentati da tutti i campi passati allo script da un form con method impostato a POST e dai rispettivi valori; il suo funzionamento è quindi simile a $_GET ma i valori non sono passati nella querystring ma tramite il response HTTP.
Utilizzo
È possibile accedere agli elementi di questo array iterando su di essi con un ciclo foreach oppure reperire il singolo valore di un elemento se ne conosciamo la chiave, ad esempio:
$_POST[chiave]
L'accesso alle variabili potrà essere fatto anche come array semplice: $_POST[0] - purché ci si ricordi a cosa corrisponde nel form chiamante.
Ad esempio, supponiamo che in una determinata pagina vi sia un form con il metodo POST e due campi di input, uno chiamato userid (name="userid") ed uno chiamato pwd.
La pagina che verrà chiamata dalla form potrà accedere al valore delle variabili attraverso l'array associativo $_POST: cioè, $_POST["userid"] ci permetterà di accedere al valore della stringa scritta nel campo corrispondente, e lo stesso per quanto riguarda il campo pwd. L'accesso alle variabili potrà essere fatto anche come array semplice: $_POST[0], anche se questo metodo rende il codice più oscuro.
Nelle versioni a partire dalla 4.3 l'uso delle variabili globali nelle form è stato gestito in maniera automatica; ad esempio, se la form chiamante ha un campo chiamato userid, la pagina chiamata potrà utilizzare direttamente la variabile $userid ed in essa si troverà il valore corrispondente. Questo utilizzo è tuttavia sconsigliato soprattutto per motivi di sicurezza.
Esempi
Un esempio è quello di un form per un login contente un campo id e un campo pwd e con METHOD="POST"
Nella pagina di arrivo del modulo sarà quindi possibile eseguire una query al database contenente gli userID e le password, così da verificare se esiste o meno un utente con tali caratteristiche. 




--- $SESSION
Cos'è
$_SESSION rappresenta un array associativo contenente le variabili attive e valorizzate per la sessione in corso.
Per sessione si intende l'arco di tempo dal momento in cui un client esegue la prima request al vostro server fino al momento in cui il server invia la sua ultima risposta al client.
Il protocollo HTTP è infatti stateless, non permette cioè il controllo dello stato (le variabili della pagina, i suoi contenuti) tra una richiesta e l'altra al server.
Per gestire le sessioni il motore PHP registra sul server un array associativo che può essere letto dalle pagine della sessione e che è associato ad un ID univoco sul server stesso; per quanto riguarda il client, crea sul computer dell'utente un cookie contenente lo stesso ID alfanumerico. Quando avviene così la chiamata HTTP, il server può verificare sul computer dell'utente la presenza di un cookie contenente un ID valido sul server e associare quindi ad esso i dati della sessione. In questo modo esisterà sempre un collegamento univoco tra server e client.
Nel caso l'utente abbia disabilitato i cookie, PHP consente al client di inviare l'ID della sessione appendendolo alla stringa di query oppure ai parametri di un form.
Gestione delle sessioni
La prima operazione che deve essere eseguita è quella di attivare il collegamento tra server e client e inizializzare quindi la sessione. Per fare ciò PHP mette a disposizione la funzione
session_start();
Si noti che è necessario inserire questa funzione in tutte le pagine che devono avere accesso alle variabili di sessione.
Esse sono contenute nell'array associativo $_SESSION e risulta molto facile impostare o ottenere il valore di una variabile di sessione:
$_SESSION[chiave] = valore;
imposta una variabile di sessione chiave dal valore valore.
Per richiamare una variabile basta usare la notazione:
$_SESSION[chiave]
che restituisce il valore della variabile di sessione chiave.
PHP mette inoltre a disposizione alcune funzioni relative alla sessione, come il nome, l'ID, eccetera. Sono:
session_name() //restituisce il nome della sessione
session_id() //restituisce l'ID
session_encode() //restituisce le variabili di sessione nella forma chiave|valore





----- $_COOKIE
$_COOKIE (o $HTTP_COOKIE_VARS se si usa una versione di PHP precedente alla 4.1.0) è un array associativo contente tutti i cookie relativi al sito in questione.
I cookie sono dei piccoli file di testo che i siti web utilizzano per immagazzinare anche temporaneamente delle informazioni collegate all'utente in questione.
Un classico esempio di utilizzo dei cookie è quello di memorizzare sul computer dell'utente ad es.
[modifica] Utilizzo
Per impostare un cookie è possibile usare la funzione
setcookie(nome, valore, scadenza, percorso, dominio, sicuro);
dove nome e valore sono il nome e il valore del cookie.
Per specificare la scadenza in Unix Timestamp, è possibile usare la funzione time() sommando ad essa ad esempio 60*60*24; in questo modo il cookie scadrà dopo un giorno da quando è stato creato.
Per una descrizione più approfondita dei cookie e dei parametri, si veda questa pagina su Wikipedia
Per accedere ad un cookie memorizzato in precendenza dal nostro sito è possibile usare la notazione:
$_COOKIE[nome]

--- $_SERVER
$_SERVER (o $HTTP_SERVER_VARS se la versione PHP è inferiore alla 4.1.0) è una delle variabili globali predefinite di sistema.
In sostanza è un array associativo di chiavi e valori i cui elementi sono rappresentati da informazioni riguardanti il lato server, il lato client e la connessione tra di essi.
[modifica] Utilizzo
È possibile accedere agli elementi di questo array iterando su di essi con un ciclo foreach oppure reperire il singolo valore di un elemento se ne conosciamo la chiave. Nell'esempio seguente viene stampato l'indirizzo IP dell'utente:
 $ip = $_SERVER["REMOTE_ADDR"];
 print "Il tuo ip è $ip";
Si noti che alcune chiavi restituiscono o meno un valore a seconda dello stato del server e del client.
Ecco l'elenco delle chiavi in ordine alfabetico:
argc il numero degli argomenti passati da linea di comando. 
argv l'array degli argomenti passati da linea di comando. 
AUTH_TYPE tipo di autenticazione. 
DOCUMENT_ROOT la cartella radice dello script definita nel file di configrazione del server. 
GATEWAY_INTERFACE la versione delle specifiche CGI usate dal server. 
HTTP_ACCEPT 
HTTP_ACCEPT_CHARSET tipo di carattere accettato. 
HTTP_ACCEPT_ENCODING il tipo di encoding accettato. 
HTTP_ACCEPT_LANGUAGE la lingua accettata, ad es. 'it'. 
HTTP_CONNECTION 
HTTP_HOST 
HTTP_REFERER se ne esiste uno contiene l'indirizzo della pagina precedente a quella attuale, utile per sapere da dove arriva chi accede al nostro sito. 
HTTP_USER_AGENT informazioni sul sistema operativo e browser del client, ad es. 
Mozilla/5.0 (compatible; Googlebot/2.1; +http://www.google.com/bot.html)
sono le informazioni lasciate dal bot di Google e 
Mozilla/5.0 (X11; U; Linux i686; en-US; rv:1.7.10) Gecko/20050716 Firefox/1.0.6 
per un utente che usa un sistema Linux e Mozilla Firefox 
PATH_TRANSLATED 
QUERY_STRING la querystring appesa, ottenibile anche con $_GET 
REMOTE_ADDR l'indirizzo IP del client. 
REMOTE_HOST 
REMOTE_PORT la porta usata dall'utente per effettuare la connessione. 
REQUEST_METHOD il tipo di richiesta fatto per accedere alla pagina, ad esempio 'GET' o 'POST'. 
REQUEST_TIME il timestamp all'inizio della richiesta (solo dalla versione 5.1.0 di PHP) 
REQUEST_URI la URI usata per accedere questa pagina. 
SERVER_ADMIN l'amministratore del server dal file di configurazione del server. 
SERVER_NAME il nome dell' host dove lo script viene eseguito. 
SERVER_PORT la porta usata dal server. 
SERVER_PROTOCOL il nome e la versione del protocollo tramite il quale è stata richiesta la pagina ad esempio 'HTTP/1.1'. 
SERVER_SIGNATURE la firma del server contenente versione e host name. 
SERVER_SOFTWARE la stringa di identificazione del server. 
SCRIPT_FILENAME il percorso assoluto dello script in esecuzione. 
SCRIPT_NAME il nome del file 














FILE
PHP mette a disposizione numerose funzioni per leggere e/o modificare i file presenti sul server.
Esiste inoltre la possibilità di effettuare l'upload dei file dell'utente sul server stesso.

Indice
[nascondi]
1 Aprire e chiudere i file 
2 Leggere e scrivere un file 
2.1 Creare un contatore visite 
3 Altre funzioni 
4 Caricare file sul server 
//<![CDATA[
if (window.showTocToggle) { var tocShowText = "mostra"; var tocHideText = "nascondi"; showTocToggle(); } 
//]]>[modifica] Aprire e chiudere i file
Per prima cosa, quando lavoriamo con un file, dobbiamo aprirlo usando la funzione fopen la cui sintassi è:
fopen(nomefile, modalità);
dove nomefile è l'indirizzo del file sul server oppure in Internet e modalità è una stringa che specifica il modo con cui si apre il file. La funzione restituisce un puntatore univoco al file aperto che servirà successivamente per eseguire le funzione legate alla lettura e alla scrittura del file.
La modalità può essere:
Modalità
Descrizione
r
Apre il file in modalità di sola lettura
r+
Apre il file in modalità di lettura e scrittura
w
Apre il file in modalità di sola scrittura cancellando il contenuto esistente. Se il file non esiste, PHP tenta di crearlo.
w+
Apre il file in modalità di scrittura e lettura cancellando il contenuto esistente. Se il file non esiste, PHP tenta di crearlo.
a
Apre il file in modalità di sola scrittura posizionando il puntatore alla fine del file per l'inserimento. Se il file non esiste, PHP tenta di crearlo.
a+
Apre il file in modalità di scrittura e lettura posizionando il puntatore alla fine del file per l'inserimento. Se il file non esiste, PHP tenta di crearlo.
Ad esempio:
$fp = fopen('/var/www/contatore.txt','w+');
$fp2 = fopen('./contatore.txt','w+');
$fp3 = fopen('http://esempio.it/file.txt','r');
Per indicare la directory corrente, si usa un punto (.). Per salire di un livello nella gerarchia, se ne usano due (..). Ad esempio:
$fp = fopen('./contatore.txt','w+');
Se il server è su sistem Windows, che usano le barre retroverse, sarà necessario commutarle:
$fp = fopen('C:\\data\\file.txt');
Per chiudere un file già aperto usiamo semplicemente la funzione
fclose(puntatore);
[modifica] Leggere e scrivere un file
Per leggere un file si usa la funzione fread la cui sintassi è:
fread(handle, lunghezza)
e legge lunghezza byte dal file aperto identificato dal puntatore handle; dopodiché, sposta il puntatore del file di lunghezza byte in avanti.

Ad esempio:
$fp = fopen("file.txt", "r");
$contenuto = fread($fp, 10);
$cont2= fread($fp, 40);
Con questo breve spezzone, $contenuto conterrà i primi dieci byte del file e $cont2 i byte dall'undicesimo al cinquantesimo.,
Un'altra funzione utile è fgets, che funziona come fread, con la differenza che interrompe la lettura dei dati anche quando incontra un carattere EOF (fine del file) o EOL (fine della riga); questo è utile nell'ambito della lettura di stream input/output.
Per scrivere su un file aperto in modalità di scrittura è possibile usare la funzione fwrite la cui sintassi è:
fwrite(handle, stringa, n);
e scrive sul file aperto e identificato da handle i primi n byte di stringa. Se stringa è minore di n byte, viene scritto il suo contenuto per intero. La funzione restituisce -1 in caso di errore.
[modifica] Creare un contatore visite
Viste queste due semplici funzioni, possiamo ora creare un semplice contatore di visite nel nostro sito. Per evitare che il conteggio aumenti ad ogni reload della pagina, useremo delle variabili di sessione per verificare così se l'utente stava già visitando il sito prima di caricare la pagina.
session_start();
if ($_SESSION['entrato'] == false) {
 //incrementa le visite se è la prima volta che l'utente accede al sito in questa sessione
 $_SESSION['entrato'] = true;
 $fp = fopen("contatore.txt", "r+");
 
 if (!$fp) {
  //se il file non è stato aperto correttamente
   echo "Errore nell'apertura del file";
   exit; //esce dallo script PHP
 }
 
 $visite = (int) fread($fp, 10);
 $visite++;
 echo "Questo sito ha avuto $visite visite!";
 fwrite($fp, $visite);
 fclose($fp);
}
[modifica] Altre funzioni
Per la lettura dei file esiste anche la funzione file la cui sintassi è:
file(nomefile)
e restituisce l'intero contenuto del file nomefile in un array in cui ciascun elemento è una riga contenente anche il carattere di ritorno a capo. Ad esempio:
$cont = implode("", file("file.txt"));
unisce tutte le riga restituendo quindi l'intero contenuto del file.
Per eliminare i caratteri di ritorno a capo è possibile usare la funzione trim che restituisce la stringa passata come argomento eliminando gli spazi bianchi agli estremi.
Per leggere un file e metterlo in una stringa basta fare
$contenuto=file_get_contents("nomedelfile");
Per contare le righe di un file si usa:
$righe=count(file("miofile"));
Può risultare inoltre utile la funzione stat la cui sintassi è:
stat(nome)
e restituisce un array associativo contenente alcune informazione sul file nome. Tra le chiavi dell'array vi sono:
Chiave
Descrizione
Dev
Numero del dispositivo
uid e gid
ID dell'utente e del gruppo proprietario
size
Dimensioni in byte
atime e mtime
Data dell'ultimo accesso e dell'ultima modifica
basename(file) restituisce invece il nome del file passato come argomento:
echo basename('/home/gianni/documento.odt'); //restituisce documento.odt
[modifica] Caricare file sul server
PHP mette anche a disposizione, se configurato correttamente, la possibilità di caricare sul server dei file forniti dall'utente. Questo è possibile usando un form HTML che abbiamo metodo POST, enctype="multipart/form-data" e che abbia tra i suoi campi un input con type="file". Prendiamo ad esempio questo spezzone di codice:
<form method="post" enctype="multipart/form-data" action="caricafile.php">
Selezionare il file da caricare: <input type="file" name="file1" />
<input type="submit" value="carica" />
Nel file di destinazione avremo a destinazione un array $_FILES che conterrà le informazioni sui file caricati per ora in una directory temporanea sul server:
echo "Nome temporaneo del file sul server, assegnato da PHP: ".$_FILES['file1']['tmp_name']; //per esempio /tmp/php-234
echo "<br/>Nome del file sul disco rigido dell'utente: ".$_FILES['file1']['name']; //ad esempio C:\image.png
echo "<br/>Dimensione del file: ".$_FILES['file1']['size']; //ad esempio 2000
echo "<br/>Tipo di file (se fornito dal browser): ".$_FILES['file1']['type']; //per esempio, image/png
Si noti che il percorso del file sul server viene assegnato temporaneamente da PHP in una directory impostata nel file di configurazione di PHP.
Per poi copiare definitivamente il file sul server (quello temporaneo viene poi eliminato da PHP alla fine della sessione), usiamo la funzione move_uploaded_file:
$source = $_FILES['file1']['name'];
$dest = basename($_FILES['file1']['tmp_name']);
move_uploaded_file($source, "archivio/".$dest); //salva il file in una cartella apposita
ESPRESSIONI REGOLARI
Le espressioni regolari sono uno strumento molto potente, che consente complesse elaborazioni testuali.
In questa sede ci limiteremo ad illustrare il funzionamento delle regex su PHP senza però spiegare effettivamente come si scrivono le regular expressions (cosa infatti non semplice e di certo impossibile da fare in una pagina).
Per le espressioni regolari sono stati scritti varie funzioni, quelle più famose sono la coppia _ereg e il package PCRE (acronimo di "Perl Compatible Regular Expressions" ovvero Regex compatibili con Perl). Le prime tuttavia non hanno le stesse funzionalità avanzate del package PCRE, pertanto analizzeremo queste ultime in particolare (se però si vuole avere una visione anche sulle prima, basta visitare questo link).

Indice
[nascondi]
1 PCRE 
1.1 Ottenere dei dati 
1.2 Sostituire dei dati con degli altri (replace) 
1.3 Modificatori 
1.4 Particolarità 
2 Bibliografia 
3 Collegamenti esterni 
//<![CDATA[
if (window.showTocToggle) { var tocShowText = "mostra"; var tocHideText = "nascondi"; showTocToggle(); } 
//]]>[modifica] PCRE
Questa libreria è un porting in PHP di un'altra molto utilizzata e diffusa, scritta per Perl. Essa viene anche chiamata colloquialmente preg_match.
[modifica] Ottenere dei dati
Vediamo un esempio di come si utilizza una regex in PHP:
<?php
$regex = "/\[\[[Ii]m(?:age|magine):(.*?)\]\]/";
$testo = "[[Immagine:Ciao.jpg]], [[image:hello.jpg]], image:hello.jpg";
preg_match($regex, $testo, $risultato);
print_r($risultato)
?>
Se proviamo ad eseguire questo script, otterremo come risultato:
Array
(
    [0] => [[Immagine:Ciao.jpg]]
    [1] => Ciao.jpg
)
La regex utilizzata serve per trovare tutte le immagini in markup wiki; in particolare restituisce il suo nome reale (ovvero, senza il namespace immagine).
In PHP una regex deve essere definita in una stringa di testo che inizia e finisce con "/" per far capire al motore che quella è una regex e non testo qualunque. La funzione preg_match prende il primo parametro (la regex), lo confronta col secondo (il testo) e assegna il risultato alla variabile indicata come terzo parameetro (nel nostro caso $risultato , che noi mostriamo con la funzione print_r).
La variabile di risultato conterrà il testo associato dall'intera regex e l'evenutale testo dei cosidetti backreference indicati tra le parentesi (nel nostro caso rispettivamente $risultato[0] e $risultato[1]). La prima parentesi non viene restituita come backreference solo perché è stato utilizzato il modificatore ?: che indica al motore delle regex di non contare quelle determinate parentesi per le backreference (ciò serve per rendere la regex più veloce).
Perché, però, non prende anche image:hello? Perché preg_match restituisce solo la prima occorrenza, per ottenerle tutte bisogna usare preg_match_all:
<?php
$regex = "/\[\[[Ii]m(?:age|magine):(.*?)\]\]/";
$testo = "[[Immagine:Ciao.jpg]], [[image:hello.jpg]], image:hello.jpg";
preg_match_all($regex, $testo, $risultato);
print_r($risultato);
?>
Risultato:
Array
(
    [0] => Array
        (
            [0] => [[Immagine:Ciao.jpg]]
            [1] => [[image:hello.jpg]]
        )

    [1] => Array
        (
            [0] => Ciao.jpg
            [1] => hello.jpg
        )

)
In questo modo abbiamo quindi sia "il pezzo di codice" che volevamo passare al parser che il risultato nello specifico.
Abbiamo quindi due array annidati dentro un altro, pertanto per accedere al primo basterà usare $risultato[0], mentre $risultato[1] per il secondo. Per accedere invece, per esempio, a Ciao.jpg, basterebbe utilizzare $risultato[1][0].
[modifica] Sostituire dei dati con degli altri (replace)
Poniamo per esempio di dover cambiare tutti le stringhe di wikicodice [[Image:x]] con [[Immagine:x]] per ovviare a degli ipotetici problemi tecnici del motore wiki.
<?php
$testo = "[[image:ciao.png]], [[Image:CIAO.jpeg]]";
$regex = "/\[\[[Ii]mage:(.*?)\]\]/";
$regex2 = "[[Immagine:\\1]]";
$risultato = preg_replace($regex, $regex2, $testo);
print $risultato;
?>
Il risultato di questo script è:
[[Immagine:ciao.png]], [[Immagine:CIAO.jpeg]]
In questo modo abbiamo definito una prima regex per ottenere le sottostringhe e poi una seconda per indicare con cosa sostituire il testo associato dalla prima. Dato che la seconda è una stringa e la backslash (\) è un carattere speciale in PHP, bisogna farne l'escape(aggiungendo quindi un'altra backslash) per ottenere un backreference (riferimento all'indietro, ovvero andare a prendere la parentesi identificata dal numero).
Attenzione:
1. preg_replace restituisce un valore tramite assegnamento (ovvero, dovete usare la sintassi $variabile = preg_replace();) al contrario di quanto faceva preg_match[_all]) 
2. Questa regex non è la migliore in quanto il tutto potrebbe essere fatto semplicemente sostituendo "/\[\[[Ii]mage:/" con "[[Immagine". La parte superflua è stata tuttavia inserita ad esclusiva finalità didattica (per spiegare come usare le backreference correttamente). 
[modifica] Modificatori
Modificatore
Descrizione
i
Rende le regex case-insensitive.
m
Permette la modalità multi-riga, così ^ si ancora all'inizio di ogni frase e $ alla fine sempre di ogni frase.
s
Permette la modalità mono-riga, così ^ si ancora all'inizio del testo e $ alla fine (di tutto il testo). Il metacarattere "." può essere utilizzato per "prendere" anche gli a-capo.
x
Modalità estesa, gli spazi dentro la regex fuori da espressioni vengono ignorati, permette inoltre di commentare le regex con #.
e
La stringa (la $regex2 usata sopra) usata in preg_replace viene elaborata come codice PHP.
A
Àncora la regex per forza all'inizio del testo.
D
Il carattere $ ancora solo a fine testo.
u
Modalità unicode.
I modificatori servono a modificare il comportamento del motore di regex utilizzato. Per esempio, la regex usata sopra per "italianizzare" tutte le immagini, diventerebbe:
<?php
$testo = "[[image:ciao.png]], [[Image:CIAO.jpeg]]";
$regex = "/\[\[image:(.*?)\]\]/i";
$regex2 = "[[Immagine:\\1]]";
$risultato = preg_replace($regex, $regex2, $testo);
print $risultato;
?>
Con risultato: [[Immagine:ciao.png]], [[Immagine:CIAO.jpeg]]
Come si può vedere, il risultato è identico sebbene l'espressione regolare non sia la stessa (notare in particolare la i dopo l'ultimo slash - / - della regex).
[modifica] Particolarità
Le backreference (quelle di solito identificate come \1 o \\1 in php) possono anche essere richiamate con $1 (sostituendo l'1 al numero desiderato) come si fa in Perl.
[modifica] 


CONNESSIONE AI DB (MYSQL)

PHP, come già specificato, può accedere a database. Il tipo di database più utilizzato sul web è MySQL.
[modifica] Connessione ad un server mysql e selezione del database
Per la connessione al server, PHP ha una funzione specifica: mysql_connect(), la cui sintassi è: mysql_connect(host_db, username, password);
Esempio:
<?php
     mysql_connect("localhost","tuousername","tuapassword") 
     or die("Errore nella connessione MySQL");
?>
Con questo codice, PHP tenta la connessione a localhost con l'username e la password forniti, in caso di fallimento, stampa il messaggio di errore.
Con questa funzione il PHP si connetterà a MySQL e sarà pronto per lavorare. Per selezionare il database su cui dobbiamo eseguire le nostre query abbiamo la funzione mysql_select_db: mysql_select_db(nomedb, [puntatore]);
Esempio:
<?php
     $db = mysql_connect("localhost", "tuousername", "tuapassword") 
         or die("Errore nella connessione MySQL");
     mysql_select_db("test", $db) or die("Database inesistente");
?>
Adesso PHP tenta la connessione al database test dal server localhost al quale ci siamo connessi prima. Nel caso il database non esistesse o in caso di errore, verrebbe inviato il messaggio "Database inesistente". Come potete vedere, in questo caso la funzione mysql_connect() è stata assegnata alla variabile $db, che in questo caso diventa un puntatore di risorse. In questo modo, possiamo aprire più connessioni contemporanee assegnate a diversi puntatori.
[modifica] Esecuzione di query
Dopo aver aperto il database, possiamo eseguire delle operazioni con i dati presenti al suo interno (vedi MySQL), come la creazione o eliminazione di tabelle o inserimento e richiesta di dati. Per inviare comandi MySQL al server si utilizza la funzione mysql_query():
<?php
     $db = mysql_connect("localhost", "tuousername", "tuapassword") 
         or die("Errore nella connessione MySQL");
     mysql_select_db("test", $db) or die("Database inesistente");
     if (mysql_query("SELECT * FROM registrati",$db)) {
         echo "Query eseguita con successo";
     } else {
         echo "Errore nell'esecuzione della query: ".mysql_error();
     }
?>
Questo codice, recupera tutti i record della tabella registrati del database test sul server localhost. In caso di errore verrà visualizzato un messaggio contenente la descrizione dell'errore. È utile inserire la funzione mysql_query sempre in un puntatore (diverso da quello del database), per l'utilizzo dei dati
[modifica] Funzioni PHP - MySQL
Nel caso in cui avessimo bisogno di prendere dei dati da un database dovremo utilizzare la funzione mysql_fetch_array() che crea un array con indice, i nomi delle colonne del database e come dati il primo dell'elenco dei risultati della query. Supponiamo di avere una tabella così strutturata:
Nome
Cognome
Data_nascita
Città
Tizio
Rossi
20/11/1957
Milano
Caio
Bianchi
12/03/1985
Roma
Sempronio
Verdi
08/06/1967
Napoli
Con questo codice:
<?php
     $db = mysql_connect("localhost", "tuousername", "tuapassword") 
         or die("Errore nella connessione MySQL");
     mysql_select_db("test", $db) or die("Database inesistente");
     $query = mysql_query("SELECT * FROM registrati",$db);
     $risultato = mysql_fetch_array($query);
?>
verrà creato un array $risultato contenente solo una riga della tabella strutturato così:
$risultato['Nome'] = "Tizio" 
$risultato['Cognome'] = "Rossi". 
$risultato['Data_nascita'] = "20/11/1957". 
$risultato['Città'] = "Milano". 
Per vedere tutte le righe della tabella, bisogna fare così:
<?php
     $db = mysql_connect("localhost", "tuousername", "tuapassword") 
         or die("Errore nella connessione MySQL");
     mysql_select_db("test", $db) or die("Database inesistente");
     $query = mysql_query("SELECT * FROM registrati",$db);
     while($riga = mysql_fetch_array($query))
     {
      $risultato[]=$riga;
     }
?>
e allora la variabile $risultato sarà:
$risultato[0] 
$risultato[0]['Nome'] = "Tizio" 
$risultato[0]['Cognome'] = "Rossi". 
$risultato[0]['Data_nascita'] = "20/11/1957". 
$risultato[0]['Città'] = "Milano". 
$risultato[1] 
$risultato[1]['Nome'] = "Caio" 
$risultato[1]['Cognome'] = "Bianchi". 
$risultato[1]['Data_nascita'] = "12/03/1985". 
$risultato[1]['Città'] = "Roma". 
$risultato[2] 
$risultato[2]['Nome'] = "Sempronio" 
$risultato[2]['Cognome'] = "Verdi". 
$risultato[2]['Data_nascita'] = "08/06/1967". 
$risultato[2]['Città'] = "Napoli". 
ACCESSO DB
L'accesso al database può essere effettuato con due funzioni simili: mysql_connect e mysql_pconnect. La differenza saliente fra le due è che la seconda, rispetto alla prima, crea una connessione di tipo permanente. Una connessione permanente viene aperta e tenuta sempre in vita, mentre una non permanente viene svegliata soltanto nel momento in cui devono essere inviate query string e ricevuti dataset.
Le funzioni di connect accettano quattro parametri:
hostname[:port] (string): il nome dell'host (o il relativo IP) eventualmente seguito dal numero di porta su cui risponde il server MySQL 
username (string): l'utente MySQL 
password (string): la password definita per l'utente specificato 
new_connect_flag (boolean): se questo parametro è impostato 'true' si intende che, nella situazione in si esegua una connect con parametri già utilizzati precedentemente nello script, verrà creato un nuovo identificatore di risorsa, invece di ritornare quello creato precedentemente. 
Importante:
1. utilizzate con diligenza la mysql_pconnect in quanto, se dimenticare di chiudere la connessione, questa rimarrà aperta anche dopo che lo script ha terminato la sua esecuzione 
2. non utilizzare il parametro new_connection_flag se non è estremamente necessario in quanto i server MySQL sono di solito configurati per gestire circa 30-100 connessioni 
Entrambe le funzioni ritornano un intero che definisce la risorsa (resource identifier). Questo valore dovrebbe essere salvato in una variabile e passato a tutte le funzioni che lo richiedano come parametro. Di fatto il parametro è opzionale in quanto il modulo per MySQL di PHP tiene traccia dei parametri di connessione utilizzati (se si aprono più connessioni memorizza i più recenti) ed esegue le operazioni necessarie per tenere aperta una connessione ad ogni invio di query.
Una volta aperta la connessione è possibile, ma non necessario, scegliere il database da utilizzare chiamando la funzione mysql_select_db, pseudonimo della query "USE DATABASE my_little_db".
Per i programmatori più esperti e negli ambiti di applicazioni a carattere enterprise, un consiglio è quello di utilizzare uno stereotipo poco in voga ma veramente utile. È necessario creare un file di init seguendo l'esempio
[DB_MASTER_CONFIG]
host = mysqlsrv.dominio.it:3306
usr  = root
pwd  = pwd_for_root
db   = application_db
Inserite nel vostro script (preferibilmente nel file delle configurazioni, come è consono per applicazioni di grosse dimensioni) il seguente segmento di codice
$DBCONF = parse_ini_file('/my_path/my_init_file.ini') ;
$host = $DBCONF['host'] ;
$usr  = $DBCONF['usr'] ;
$pwd  = $DBCONF['pwd'] ;
$db   = $DBCONF['db'] ;
$link_id = mysql_connect( $host, $usr, $pwd )
  or die("Errore nella connessione al mysql server");
mysql_select_db( $db, $link_id )
  or die("Errore nella selezione del db: ".mysql_error($link_id)) ;
L'invio di una query MySQL 
in PHP avviene tramite la funzione mysql_query la cui sintassi è:
mysql_query(query, connessione)
dove query è una stringa contenente il testo della query MySQL da eseguire e connessione è un puntatore di risorsa aperta con la funzione mysql_connect e connessa ad un database. A seconda del tipo di query inviata al database, la funzione mysql_query restituisce valori differenti:
se la query è di inserimento restituisce un puntatore al fieldset ottenuto dall'esecuzione della query (ad esempio una query come "SELECT * FROM registrati" dell'esempio precedente) 
negli altri casi la query restituisce un valore boolean che indica l'esito positivo o meno della query 
Nell'invio di una query è necessario, se non viene già fatto dal server MySql, convertire i caratteri come gli apostrofi con la loro commutazione \', in quanto potrebbero dare problemi per quanto riguarda l'invio di stringhe alfanumeriche, tramite la funzione addslashes, la cui sintassi è
addslashes(stringa_da_commutare)
e restituisce la stringa stessa con i caratteri speciali commutati. La sua funzione inversa è
stripslashes(stringa_già_commutata)
È consigliabile inoltre prevedere controlli per evitare intrusioni indesiderate da parte di hacker, evitando ad esempio che eventuali campi di input (per esempio nome utente o password) contengano spazi, i quali permetterebbero l'esecuzione di JOIN o query multiple. 
RISULTATO QUERY 

Una volta ottenuto il puntatore al risultato della query tramite la funzione mysql_query è possibile procedere all'uso del result-set. Per fare ciò PHP mette a disposizione numerose funzioni:
la più usata è mysql_fetch_array(risultato, tipo_array) che restituisce l'i-esimo record del fielset e incrementa di uno l'indice, dove risultato è un puntatore di fieldset MySQL. In base al parametro tipo_array la funzione restituisce valori differenti: 
MYSQL_ASSOC: il risultato della funzione è un array associativo che ha per chiavi i nomi dei campi e per valori i dati contenuti nel record 
MYSQL_NUM: il risultato della funzione è un array associativo che ha per chiavi dei numeri interi e per valori i dati contenuti nel record 
MYSQL_BOTH: il risultato della funzione è un array associativo che ha per chiavi sia i nomi sia gli indici numerici dei campi e per valori i dati contenuti nel record. 
Per iterare su tutti gli elementi è sufficiente usare un ciclo while: 
 //da notare l'uguale di assegnazione e non di confronto
 //che assegna a $r ad ogni iterazione il valore restituito dalla funzione...
 while ($r = mysql_fetch_array($risultato, MYSQL_BOTH) { 
 //stampa ad esempio i valori di una ipotetica tabella utenti sulla pagina
 echo $r['nome_utente']."<br/>;";
 echo $r['data_iscrizione']."<hr/>";
 }
Infatti quando finiscono i record del fieldset la funzione mysql_fetch_array restituisce un array vuoto, che viene assegnato alla variabile $r. Per le regole di conversione, un array vuoto viene convertito in boolean in FALSE. Negli altri casi, l'array sarà non vuoto e la variabile $r verrà convertita in TRUE. 
mysql_num_rows(risultato) restituisce il numero di righe restituite dalla query identificata da risultato. È utilizzato frequentemente per verificare durante un login l'esistenza di un determinato utente con una precisa password. Ad esempio: 
 <?php
 //presuppone il collegamento ad un database contentente nomi utente e password
 if (isset[$_POST['uid']) { //verifica che il form abbia inviato dei valori
  //è meglio memorizzare le password crittandole,
  //in modo che siano più sicure, tramite la funzione md5
  $q = "SELECT * FROM utenti WHERE uid = '";
  $q .=  $_POST['uid']."' AND pwd = '".md5($_POST['pwd'])."'";
  $ris = mysql_query($q, $conn);
  if (mysql_num_rows($ris) == 1) { //verifica che esista l'utente
   //imposta alcune variabili di sessione
   $_SESSION['logged'] = true;
   $_SESSION['uid'] = $_POST['uid']
   ''...ecc...''
  } else {
  ?>
   Nome utente o password scorretti. &lt;a href="login.php"&gt;Ritorna&lt;/a&gt;
  <?php
  }
 }else{
  ?>
   <form method="post" action="login.php">
   ''...qui i campi uid e pwd...''
  </form>
  <?php
 }
 ?>
mysql_insert_id(database) restituisce l'ultimo valore auto-incrementato dal database (es. campi ID) 
mysql_data_seek(risultato, posizione) sposta il puntatore del fieldset risultato al record di posizione posizione (partendo da 0) 
