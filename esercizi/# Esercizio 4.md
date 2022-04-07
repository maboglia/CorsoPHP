# Esercizio 4 punteggi videogiochi

Si vuole realizzare un servizio Web per la gestione della raccolta dei punteggi realizzati in videogiochi da parte di un utente. Il servizio prevede le seguenti pagine:

* un form in cui l'utente può inserire il nome del videogioco (una stringa) e il suo punteggio numerica. Il form permette l'inserimento di un punteggio per volta e l'inserimento di più punteggi avviene inviando più volte il form in una stessa sessione.
    
* una pagina di raccolta dei punteggi dei videogiochi che memorizza sul server i punteggi inseriti col form del punto 1. Si assume che se l'utente invia più di una volta un punteggio per lo stesso viodeogioco nella stessa sessione, il punteggio memorizzato è uguale al massimo dei valori inseriti.
    
* una pagina di riepilogo che stampa la lista dei videogiochi con i punteggi, il massimo punteggio e il videogioco che ha il punteggio massimo. Nel caso ci siano più videogiochi a cui corrisponde il punteggio massimo si stampa il primo nella lista.

Si scrivano il form e le due pagine di prenotazione e riepilogo usando HTML/PHP. Si supponga di utilizzare il metodo POST nel form.
