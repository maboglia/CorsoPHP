# PHP

PHP, acronimo per "PHP: Hypertext Preprocessor" (PHP: Preprocessore di Ipertesti, è una sigla ricorsiva), è un linguaggio di programmazione general-purpose (per svariati utilizzi) open source molto utilizzato soprattutto nell'ambito della programmazione web. 

La sua sintassi è basata su quella del C, del Java e del Perl.

Il linguaggio PHP è uno tra i più semplici attualmente in uso con funzioni intuitive e con una guida online molto esaustiva (disponibile al sito php.net). Per costruire siti web dinamici, l'uso del linguaggio PHP insieme ad un database (come ad esempio MySql) e ad un webserver (come ad esempio Apache), offre innumerevoli funzioni così che la gestione delle informazioni si è molto semplificata.

--- 

## Alcune caratteristiche:

* La dinamicità: le pagine in HTML sono statiche.
* La semplicità: il linguaggio PHP è semplice da sviluppare, gestire e modificare. 
* La grandissima varietà di funzioni: nel sito www.php.net è visualizzabile la documentazione completa del PHP con tutte le funzioni disponibili all'uso. 
* Il costo: dato da non sottovalutare è il costo. Il php è Open Source, non ha limitazioni di sorta.
* La comunità: una enorme comunità di sviluppatori e moltissima documentazione e tutorial online.

## COME FUNZIONA

Fin dalla sua prima uscita, PHP è stato un linguaggio fortemente orientato al web. Tuttavia, i nuovi e più recenti miglioramenti lo rendono adatto ai più svariati scopi. Le tre principali aree di utilizzo di PHP sono:
* Server side scripting - scripting lato server per il web 
* Shell scripting - scripting a riga di comando 
* Applicazioni desktop 

---

## SERVER-SIDE-SCRIPTING

Questo ambito di utilizzo è il più tradizionale ed il più diffuso. PHP consente di generare in maniera dinamica le pagine web. Per utilizzare PHP in questo ambito occorrono:
* un server web 
* l'interprete PHP 
* un browser web 

Durante il caricamento di una pagina Web, il browser del client invia una richiesta HTTP al web server, il quale si incarica di restituirgli una risposta, normalmente una "pagina" web contenente codice HTML, oppure un'immagine o un altro tipo di documento.

Nel caso sia una pagina scritta in HTML, una volta ricevuta il browser è in grado di disegnarne il contenuto sullo schermo interpretando il linguaggio di markup.

---

Le pagine nelle quali è presente codice PHP, che sono memorizzate sul server, non sono direttamente lette ed interpretate dal browser ma vengono interpretate da un modulo aggiuntivo del web server che è appunto il modulo PHP.

Normalmente le pagine contenente codice PHP devono avere una estensione di tipo ".php" ma, configurando opportunamente il server, è possibile utilizzare anche estensione ".html" o altro.

Tutte le volte che al web server viene fatta la richiesta di una pagina, questa viene analizzata da esso. Se all'interno della pagina viene riconosciuta la presenza di codice PHP, questo viene interpretata dal modulo PHP che si preoccuperà eventualmente di trasformarla nel formato HTML, direttamente interpretabile dal browser richiedente.

Il susseguirsi logico delle varie fasi è il seguente:

1. l'utente richiama la pagina (inserendo l'URL o cliccando un link) 
2. il browser inoltra la richiesta al web server 
3. il web server cerca la pagina (il file) richiesto 
4. se la pagina contiene codice PHP viene passata al modulo PHP, altrimenti si va al punto 6 
5. il modulo PHP interpreta la pagina PHP e restituisce la corrispondente pagina HTML 
6. la pagina "HTML" viene spedita al browser richiedente 
7. il browser, una volta ricevuta la pagina, la legge e la disegna a monitor 

---

Una pagina web è da considerare composta da due componenti fondamentali: la struttura o layout e il contenuto. Per layout intendiamo tutto ciò che descrive come la pagina deve essere disegnata, tabelle, colori, fonts, frames... in generale tutto ciò che può essere definito mediante il linguaggio HTML. Per contenuto consideriamo, per semplicità, tutto ciò che non è struttura ma informazione che la pagina ci offre. In un sito web di solito la struttura resta all'incirca la stessa per tutte le pagine. Quel che cambia è il contenuto.

Per facilitare il lavoro ai webmaster la soluzione sarebbe quella di poter separare "fisicamente" il contenuto delle pagine dalla loro struttura. Il PHP viene in aiuto soprattutto in tali situazioni: generalmente un pagina viene costruita memorizzando in un file la struttura (della generica pagina) e in un database il contenuto. In questo modo quello che è il compito dell'interprete PHP è quello di assemblare la pagina inserendo il contenuto caricato dal database nella struttura.

---

Il funzionamento a questo punto differisce leggermente da quello sopra riportato in quanto il punto 5 si modifica in questo modo:
il modulo PHP interpreta la pagina PHP, richiede al database il contenuto da inserire, genera e restituisce la corrispondente pagina HTML. 
In realtà, esistono anche altre possibilità: si può modificare il mime type con l'istruzione
`<?php header("Content-type: Linguaggio contenuto"); ?>`

oppure tramite particolari estensioni di PHP come le librerie GD è possibile creare delle immagini e restituire quindi non una pagina HTML bensì un'immagine vera e propria.