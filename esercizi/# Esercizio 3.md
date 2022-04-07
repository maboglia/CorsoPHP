# Esercizio 3 preferenze film

Si vuole realizzare un servizio Web per la gestione della raccolta di preferenze da parte di un utente su film. Il servizio prevede le seguenti pagine:

* un form in cui l'utente può inserire il titolo del film (una stringa) e la sua valutazione numerica (si può assumere un valore nell'intervallo 1-5 ma non è necessario prevedere il codice per il controllo). Il form permette l'inserimento di una valutazione per volta e l'inserimento di più valutazioni avviene inviando più volte il form in una stessa sessione.
    
* una pagina di raccolta delle valutazioni dei film che memorizza sul server le valutazioni fatte col form del punto 1. Si assume che se l'utente invia più di una volta una valutazione per lo stesso film nella stessa sessione, la valutazione è uguale al massimo dei valori inseriti.
    
* una pagina di riepilogo che stampa la lista delle valutazioni, la media delle valutazioni e il film che ha ricevuto la valutazione massima. Nel caso ci siano più film a cui corrisponde il valore massimo di valutazione si stampa il primo nella lista.

Si scrivano il form e le due pagine di prenotazione e riepilogo usando HTML/PHP. Si supponga di utilizzare il metodo POST nel form.
