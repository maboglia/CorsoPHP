# **Lavorare con le variabili**

In PHP le variabili sono identificate dal simbolo **$** che precede il nome della variabile stessa. 

Il primo carattere dopo il $ **non può essere un numero** o un **carattere speciale**, solo una lettera o un carattere underline (_).

---

## Variabili non tipizzate

Il linguaggio PHP è un linguaggio chiamato a **tipizzazione debole**, non richiede alcuna dichiarazione di variabile: una variabile è tale dalla prima riga nella quale se ne fa uso.

L'istruzione fondamentale che è possibile eseguire con una variabile è l'**assegnazione**, che imposta (assegna) il valore contenuto dalla variabile. 

La sintassi è

`$nome = valore`

dove _valore_ è un'**espressione** valida per PHP (per espressione si intende una sequenza di dati, operatori e/o variabili che restituisca un valore). 

---

## Tipi di dato

Data Type|Category|Description
---|---|---
int|Scalar|Integer
float|Scalar|Floating-point number
bool|Scalar|Boolean value
string|Scalar|Series of characters
array|Composite|Collection of values
object|Composite|User-defined data type
resource|Special|External resource
callable|Special|Function or method
null|Special|No value

---

## fare riferimento ad una variabile

Per fare riferimento ad una variabile e al suo valore sarà necessario semplicemente riferirsi al nome; si noti che PHP è case-sensitive, quindi $var e $Var sono due variabili differenti. 

#### **Variabili per valore e per riferimento**

Le variabili PHP sono solitamente passate per **valore**:
quando una variabile viene assegnata ad un'altra in realtà viene assegnato ad una variabile **una copia del valore dell'altra**, ma le due variabili identificano comunque due celle di memoria differenti. 

Ad esempio:

```php
$var1 = 3;
$var2 = $var1 //ora $var2 contiene il valore 3
$var2 = 4 //in questo caso non cambia il valore di $var1 ma solo quello di $var2
```

---

Talvolta, soprattutto per quanto riguarda l'uso di funzioni, è comodo aver due variabili che puntino alla stessa cella di memoria. 

Per fare ciò si assegnano le **variabili per riferimento** usando la sintassi:

`$var1 = &$var2`

Ad esempio

```php
$var1 = 3;
$var2 = &$var1 //ora $var2 e $var1 puntano alla stessa cella di memoria
$var2 = 4 //ora $var1 e $var2 contengono entrambe il valore 4
```

---

#### **Costanti**

Può essere comodo durante la programmazione definire valori **costanti**, cioè riutilizzabili nel codice. 

La differenza sostanziale tra costanti e varibili sta nel fatto che le prime, a differenza delle seconde, non
possono essere modificate. 
Per definire una costante si usa la sintassi:

`define("NOME_COSTANTE", valore);`

e per richiamarle si usa semplicemente il loro nome:

`echo NOME_COSTANTE;`

---

## costanti predefinite

Esistono alcune **costanti predefinite**, che sono valide cioè in tutti gli script:


* __FILE__:
	restituisce il percorso completo e il nome del file 

* __LINE__:
	restituisce il numero di riga in cui si trova la costante  

* __FUNCTION__
	restituisce il nome della funzione in cui la costante è richiamata 

* __CLASS__:
	restituisce il nome della classe in cui la costante è richiamata.


---


## Dichiarazioni di variabili


```php
    <?php
    $about = 'Una stringa molto lunga';    // usa 2MB di memoria
    echo $about;
    
    // contro
    
    echo 'Una stringa molto lunga';        // usa 1MB di memoria
```

*   [Consigli sulle prestazioni](https://developers.google.com/speed/articles/optimizing-php)
