---
theme: gaia
_class: lead
paginate: true
backgroundColor: #fff
backgroundImage: url('https://marp.app/assets/hero-background.svg')
marp: true
---
![logo](./its.png)

# Corso PHP

---

#### **Costanti e Variabili**

Le variabili in PHP sono identificate da un `$` seguito dal nome, mentre le costanti sono valori immutabili definiti con `define()` o usando la parola chiave `const`. Le costanti non cambiano durante l'esecuzione dello script.

---

#### **Tipologie di Dato**

PHP supporta vari tipi di dato: scalari (booleani, interi, numeri in virgola mobile, stringhe), composti (array, oggetti), e speciali come `null`.

---

#### **Valori Booleani**

I valori booleani (`true` e `false`) sono usati per rappresentare uno stato binario e vengono spesso utilizzati nelle espressioni condizionali.

---

#### **Numeri Interi**

PHP supporta i numeri interi, che sono numeri senza parte decimale. Gli interi possono essere rappresentati in base decimale, ottale o esadecimale.

---

#### **Numeri in Virgola Mobile**

I numeri in virgola mobile (o numeri decimali) rappresentano numeri con una parte frazionaria e sono utili per calcoli matematici più complessi.

---

#### **Caratteri e Stringhe**

Le stringhe sono sequenze di caratteri. PHP fornisce molte funzioni per manipolare stringhe, come `strlen()` e `str_replace()`.

---

#### **Valore Nullo**

Il tipo `null` rappresenta una variabile senza valore. Una variabile è `null` se è stata dichiarata ma non ha ancora ricevuto un valore.

---

#### **Liste e Arrays**

Gli array in PHP sono strutture dati che possono contenere valori multipli. Possono essere indicizzati numericamente o associativamente.

---

#### **Espressioni**

Un'espressione in PHP è tutto ciò che restituisce un valore, come operazioni matematiche o assegnazioni.

---

#### **Operatori**

PHP offre vari tipi di operatori, inclusi aritmetici (`+`, `-`), di confronto (`==`, `!=`), logici (`&&`, `||`), e di assegnazione (`=`).

---

#### **Espressioni Condizionali (if, elseif, else)**

Le espressioni condizionali controllano il flusso del programma in base a condizioni logiche. `if`, `elseif`, e `else` eseguono blocchi di codice diversi a seconda dei risultati delle condizioni.

---

#### **Cicli (foreach, for, do, while)**

I cicli permettono di ripetere l'esecuzione di un blocco di codice. `foreach` itera su array, mentre `for`, `do`, e `while` sono cicli generici.

---

#### **Deviatore (switch)**

Il costrutto `switch` permette di eseguire diversi blocchi di codice in base al valore di un'espressione, facilitando il controllo condizionale multiplo.

---

#### **Corrispondenza (match)**

Il costrutto `match` introdotto in PHP 8 è simile a `switch`, ma più potente e pulito, poiché può restituire direttamente un valore e gestisce il confronto con identità stretta.

---

#### **Return, Declare, Goto**

`return` restituisce un valore da una funzione, `declare` modifica alcune direttive di esecuzione del codice, e `goto` permette di saltare a un'istruzione specificata (usato raramente).

---

#### **Includere altri Scripts**

PHP consente di includere file esterni usando `include` o `require`, utili per organizzare il codice in più file.

---

#### **Funzioni**

Le funzioni sono blocchi di codice riutilizzabili che accettano parametri e possono restituire valori. Sono dichiarate con la parola chiave `function`.

---

#### **Parametri e Argomenti**

I parametri sono variabili dichiarate in una funzione, mentre gli argomenti sono i valori passati alla funzione durante la chiamata.

---

#### **Visibilità delle Variabili**

La visibilità delle variabili dipende dal contesto in cui sono dichiarate: globale, locale o di una classe (proprietà).

---

#### **Tipologie di Funzioni**

Le funzioni possono essere definite dall'utente o predefinite. PHP offre numerose funzioni integrate per manipolare stringhe, array, file e altro.

---

#### **Funzioni degli Array**

PHP offre diverse funzioni per la manipolazione degli array, come `array_merge()`, `array_push()`, e `array_filter()`.

---

#### **Gestione dei Files**

PHP permette di leggere, scrivere, modificare e eliminare file usando funzioni come `fopen()`, `fwrite()`, e `fclose()`.

---

#### **Date, ore e fusi orari**

PHP gestisce date e ore tramite la classe `DateTime` e le funzioni `date()` e `strtotime()`. È possibile configurare il fuso orario usando `date_default_timezone_set()`.

---

#### **Gestione degli Errori**

PHP gestisce errori con varie modalità: errori fatali, avvisi e notifiche. Si possono utilizzare blocchi `try-catch` per gestire le eccezioni.

---

#### **Configurazione del file php.ini**

`php.ini` è il file di configurazione principale di PHP, che definisce comportamenti come la dimensione massima dei file caricati e il limite di memoria.

---

#### **Configurazione di Apache**

Per eseguire PHP con Apache, bisogna configurare il modulo `mod_php`. Le impostazioni di PHP possono essere modificate attraverso il file `.htaccess`.

---

#### **Sviluppare con Docker**

Docker permette di creare ambienti di sviluppo consistenti e isolati. Si può utilizzare un’immagine Docker con PHP e altri servizi necessari per l’applicazione.

---

#### **Integrazione di Composer**

Composer è un gestore di dipendenze per PHP che permette di includere librerie di terze parti nel progetto tramite il file `composer.json`.

---

#### **Programmazione Orientata agli Oggetti**

La OOP in PHP permette di organizzare il codice in classi e oggetti, promuovendo la riusabilità e la manutenibilità del codice.

---

#### **Classi ed Oggetti**

Una classe è un modello per creare oggetti. Gli oggetti sono istanze delle classi e possono contenere proprietà e metodi.

---

#### **Promozione dei Parametri del Costruttore**

Introdotta in PHP 8, la promozione dei parametri permette di dichiarare e inizializzare le proprietà della classe direttamente nel costruttore, riducendo il codice boilerplate.

---

#### **Operatore a Protezione dei Valori Nulli**

L'operatore nullsafe (`?->`) in PHP 8 consente di evitare errori quando si accede a proprietà o metodi di un oggetto che può essere nullo.

---

#### **Spazi dei Nomi**

Gli spazi dei nomi (`namespace`) permettono di organizzare il codice evitando conflitti tra classi, funzioni o costanti con lo stesso nome.

---

#### **Caricamento Automatico**

Il caricamento automatico (autoloading) permette di caricare automaticamente le classi quando sono necessarie, senza richiedere manualmente i file.

---

#### **Costanti delle Classi**

Le costanti di classe sono valori immutabili definiti all'interno di una classe con la parola chiave `const`, accessibili tramite `self::` o il nome della classe.

---

#### **Proprietà e Metodi Statici delle Classi**

Le proprietà e i metodi statici appartengono alla classe e non alle istanze. Possono essere accessibili senza creare un oggetto.

---

#### **Quattro Principi Fondamentali dell'OOP**

I quattro principi dell’OOP sono: astrazione, incapsulamento, ereditarietà e polimorfismo, che permettono una struttura modulare e flessibile.

---

#### **Classi Astratte e Metodi Astratti**

Le classi astratte non possono essere istanziate e possono contenere metodi astratti, che devono essere implementati nelle sottoclassi.

---

#### **Interfacce e Polimorfismo**

Le interfacce definiscono un contratto per le classi che le implementano. Il polimorfismo permette di trattare oggetti di diverse classi in modo uniforme.

---

#### **Gerarchie ed Ereditarietà**

L'ereditarietà permette a una classe di ereditare proprietà e metodi da un'altra classe, creando una gerarchia di classi.

---

#### **Ereditarietà Multipla tramite Traits**

I `traits` permettono di riutilizzare il codice in più classi, simulando l'ereditarietà multipla, che non è supportata direttamente in PHP.

---

#### **Classi Anonime**

Le classi anonime sono classi senza nome che possono essere create dinamicamente e utilizzate per scopi specifici o temporanei.

---

#### **Metodi Magici**

PHP include metodi speciali detti "magici", come `__construct()`, `__get()`, e `__set()`, che svolgono operazioni speciali o automatizzano comportamenti degli oggetti.
