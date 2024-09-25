# Classi built-in

In PHP 8, ci sono diverse classi built-in che offrono funzionalità pronte all'uso. Ecco alcune delle più importanti:

1. **String**: PHP ha molte funzioni per manipolare stringhe, come `strlen()`, `strpos()`, `substr()`, e le funzioni della classe `Stringable` che possono essere utilizzate con oggetti.

2. **Array**: Gli array sono una delle strutture dati fondamentali in PHP. Ci sono funzioni come `array_merge()`, `array_map()`, e `array_filter()` che facilitano la manipolazione degli array.

3. **Exception**: La classe base per tutte le eccezioni in PHP. Puoi creare le tue eccezioni estendendo questa classe.

4. **DateTime**: Questa classe gestisce date e ore, con metodi per la formattazione, la comparazione e la manipolazione di date.

5. **JsonSerializable**: Un'interfaccia che consente di controllare come un oggetto viene serializzato in JSON.

6. **Iterator e IteratorAggregate**: Interfacce che permettono di creare oggetti che possono essere iterati, rendendo possibile l'uso con i costrutti `foreach`.

7. **ArrayObject**: Una classe che estende gli array per fornire funzionalità OOP, come la possibilità di utilizzare metodi e proprietà.

8. **Reflection**: Fornisce strumenti per ispezionare classi, metodi, proprietà e parametri a runtime.

9. **Generator**: Consente di creare iteratori in modo semplice e conciso usando la keyword `yield`.

10. **WeakReference**: Consente di mantenere un riferimento debole a un oggetto, permettendo di evitare cicli di riferimento e gestire meglio la memoria.

PHP 8 ha introdotto anche altre nuove funzionalità e miglioramenti, come i Named Arguments, gli Union Types e gli Attributes, che possono influenzare il modo in cui utilizzi queste classi e funzioni. 

### altre classi built-in

Certo! Ecco un elenco di altre classi built-in importanti in PHP, inclusa PDO:

1. **PDO (PHP Data Objects)**: Una classe per l'accesso a database. Fornisce un'interfaccia coerente per vari database e supporta prepared statements per la protezione contro SQL injection.

2. **mysqli**: Un'altra estensione per l'interazione con database MySQL, che offre un'interfaccia orientata agli oggetti e procedural.

3. **Session**: Le funzioni per gestire le sessioni in PHP, come `session_start()`, `session_destroy()`, e l'uso della classe `SessionHandler`.

4. **Spl**: Questa è una raccolta di classi e interfacce standard (Standard PHP Library) che includono:
   - **SplObjectStorage**: Per gestire oggetti in modo simile a un array, ma utilizzando riferimenti a oggetti.
   - **SplFixedArray**: Un array di dimensione fissa per una gestione più efficiente della memoria.

5. **DOMDocument**: Una classe per lavorare con documenti XML e HTML, che consente di manipolare il contenuto e la struttura.

6. **SimpleXMLElement**: Per lavorare con XML in modo semplice, permettendo di accedere a dati XML come se fossero oggetti.

7. **ZipArchive**: Una classe per gestire file ZIP, consentendo di creare, aprire e modificare archivi ZIP.

8. **Intl**: La libreria di internazionalizzazione che offre classi come `IntlDateFormatter`, `NumberFormatter`, e `MessageFormatter` per lavorare con formati locali.

9. **Curl**: Anche se non è una classe in senso stretto, l'estensione cURL permette di fare richieste HTTP e gestire comunicazioni di rete.

10. **Reflection**: Permette di ottenere informazioni su classi, metodi e proprietà a runtime, utile per la metaprogrammazione.

11. **DatePeriod**: Utilizzata in combinazione con la classe `DateTime`, permette di generare periodi di tempo e iterare su date.

12. **ArrayIterator**: Fornisce un modo per iterare su array e oggetti ArrayAccess in modo oggetto-oriented.

Queste classi e librerie forniscono strumenti potenti per costruire applicazioni robuste e scalabili in PHP.