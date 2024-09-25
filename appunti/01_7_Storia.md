# STORIA DI PHP

L'8 giugno 1995, il danese **Rasmus Lerdorf** invia un messaggio in un newsgroup annunciando il rilascio di un "set di piccoli binari scritti in C", che chiamò **PHP 1.0**. Inizialmente, PHP stava per "**Personal Home Page**". Le funzioni di **PHP 1.0** erano piuttosto limitate: permetteva di registrare gli accessi a un sito, tracciando anche i referrer, eseguire inclusioni server-side, mostrare gli utenti connessi e proteggere una pagina con una password.

Nelle versioni successive, Lerdorf aggiunse il supporto per le query SQL in mSQL (un precursore di MySQL) e la disponibilità di un wrapper CGI chiamato FI ("Form Interpreter", o "Interprete di Form"). Entro la fine del 1995, PHP iniziò a guadagnare popolarità e venne rinominato in **PHP/FI**, grazie soprattutto alla capacità di integrare il codice PHP direttamente nelle pagine HTML.

Il 12 novembre 1997 fu rilasciato **PHP/FI 2.0**, che, secondo il sito php.net, era utilizzato da circa 50.000 domini. Questo segnò l'inizio dell'adozione su larga scala di PHP, gettando le basi per le versioni future che avrebbero trasformato il linguaggio in uno strumento fondamentale per lo sviluppo web.

---

## PHP 3.0

Rilasciato il 6 giugno 1998, **PHP 3.0** segna un punto di svolta fondamentale per il linguaggio. È in questa versione che appare per la prima volta lo "Zend Engine", sviluppato dagli israeliani Zeev Suraski e Andi Gutmans. Questa innovazione rende PHP più potente e flessibile, facilitando l'adozione su larga scala. PHP 3.0 introduce anche il supporto per una gamma più ampia di database e la compatibilità con Windows e altri sistemi operativi, ampliando notevolmente la base di utenti. Con questo rilascio, il nome cambia da "Personal Home Page" a "PHP: Hypertext Preprocessor", riflettendo la natura più versatile e professionale del linguaggio.

---

## PHP 4.0

Il 22 maggio 2000, viene rilasciato **PHP 4.0**, che porta con sé numerose ottimizzazioni e migliorie, rendendo PHP ancora più efficiente per lo sviluppo web. La versione 4.0 si basa sullo Zend Engine 1.0, migliorando ulteriormente le prestazioni e la gestione delle risorse. Durante questo periodo, la licenza del linguaggio viene cambiata dalla GPL (adottata fin dalla versione **PHP 1.0**) alla PHP License, che è più restrittiva, ma rimane comunque open source. Questo passaggio segna un ulteriore passo avanti nella maturità del linguaggio, mantenendo un equilibrio tra apertura e protezione delle sue specificità.

---

## PHP 5

Il 13 luglio 2004 viene rilasciato **PHP 5.0**, una versione che ha segnato un'importante evoluzione del linguaggio. Tra i miglioramenti più rilevanti introdotti, spicca l'adozione dello Zend Engine 2, che ha portato un supporto più robusto e nativo alla programmazione orientata agli oggetti (OOP).

Nel 2005, la configurazione LAMP (Linux, Apache, MySQL, PHP) diventa la scelta dominante per oltre il 50% dei server web in tutto il mondo, grazie alla combinazione di software open source altamente efficaci e stabili.

Nel 2008, PHP 5 diventa l'unica versione stabile ancora in fase di sviluppo attivo. Con l'introduzione di PHP 5.3.0, il linguaggio implementa una funzionalità chiamata "late static binding" (LSB), che permette di riferirsi alla classe effettiva chiamata in un contesto di ereditarietà statica, migliorando notevolmente il comportamento delle classi ereditarie in PHP.

PHP 5 ha continuato a evolversi fino alla release 5.6, che è stata l'ultima versione della serie. Il supporto ufficiale per PHP 5 è terminato nel gennaio 2019, segnando la fine del ciclo di vita di questa versione storica del linguaggio, che ha posto le basi per le successive evoluzioni.

---

## PHP 7

PHP 7 è stato un aggiornamento significativo rilasciato il 3 dicembre 2015, che ha introdotto miglioramenti drastici nelle prestazioni e nuove funzionalità, mantenendo la compatibilità con la maggior parte del codice scritto per le versioni precedenti.

### PHP 7: Caratteristiche Principali

1. **Miglioramento delle Prestazioni**: Grazie al nuovo motore Zend Engine 3.0, PHP 7 ha quasi raddoppiato la velocità di esecuzione rispetto a PHP 5.x. Questo ha ridotto significativamente il consumo di risorse server, aumentando l'efficienza delle applicazioni web.

2. **Tipo di Dato Scalare**: PHP 7 ha introdotto la possibilità di dichiarare i tipi di dato per parametri delle funzioni e per i valori di ritorno, consentendo maggiore controllo e riducendo errori nel codice.

3. **Operatore Null Coalescing (`??`)**: Questo operatore permette di verificare se una variabile è settata e non nulla, semplificando molto il codice condizionale.

4. **Spaceship Operator (`<=>`)**: Un nuovo operatore di confronto, utilizzato per ordinamenti e comparazioni, restituendo -1, 0, o 1 a seconda della relazione tra i valori confrontati.

5. **Exceptions Engineered**: Il nuovo modello di gestione delle eccezioni, tramite l'introduzione di `Throwable`, ha migliorato la robustezza delle applicazioni, permettendo una gestione più precisa delle eccezioni fatali.

6. **Errori a Tempo di Compilazione**: Introduzione di errori a tempo di compilazione per codice che non avrebbe mai potuto essere eseguito correttamente, riducendo i bug e migliorando la qualità del codice.

---

### PHP 8: Innovazioni e Aggiornamenti

PHP 8, rilasciato il 27 novembre 2020, rappresenta un altro passo avanti significativo per il linguaggio, introducendo nuove funzionalità e miglioramenti delle prestazioni:

1. **JIT Compiler (Just-In-Time)**: Uno dei cambiamenti più importanti di PHP 8 è l'introduzione del compilatore JIT. Questo permette la compilazione del codice direttamente in linguaggio macchina, migliorando ulteriormente le prestazioni in alcuni scenari specifici.

2. **Union Types**: PHP 8 ha introdotto i tipi unione, permettendo di dichiarare che un parametro o un valore di ritorno può essere di più di un tipo specifico, aumentando la flessibilità nella gestione dei tipi di dato.

3. **Named Arguments**: Con questa funzionalità, è possibile passare argomenti alle funzioni indicando esplicitamente il nome dei parametri, migliorando la leggibilità del codice, soprattutto in funzioni con molti parametri.

4. **Match Expression**: Un nuovo costrutto `match` simile a `switch`, ma con un comportamento più prevedibile e senza necessità di usare `break` per evitare la caduta nei case successivi.

5. **Attributes (Annotations)**: Introduzione degli attributi (o annotazioni), che permettono di aggiungere metadati al codice in modo nativo, utile per framework e librerie che necessitano di configurazioni complesse.

6. **Nullsafe Operator**: Un operatore sicuro per le chiamate di metodo che permette di evitare errori nel caso in cui un oggetto possa essere nullo, semplificando il codice e riducendo il rischio di `null pointer exceptions`.

7. **Error Handling Migliorato**: Ulteriori miglioramenti nella gestione degli errori, con messaggi di errore più chiari e una gestione più precisa delle eccezioni.

Con PHP 8, il linguaggio ha continuato ad evolversi per rimanere competitivo e rilevante nel panorama dello sviluppo web, integrando nuove funzionalità che migliorano le prestazioni, la sicurezza e la qualità del codice.
