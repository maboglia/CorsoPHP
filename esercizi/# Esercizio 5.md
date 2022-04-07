# Esercizio 5 risultati partite calcio

Si vuole realizzare un servizio Web per la gestione della raccolta dei risultati delle partite di calcio. Il servizio prevede le seguenti pagine:

* un form in cui l'utente può inserire il risultato della partita selezionando la squadra di casa e quella ospite da un combobox generato dinamicamente a partire dalla lista delle squadre e specificando i gol delle due squadre in due campi di testo. Il form permette l'inserimento di un risultato per volta e l'inserimento di più risultati avviene inviando più volte il form in una stessa sessione.
    
* una pagina di raccolta dei risultati che memorizza sul server le partite inserite col form del punto 1. Si assume che se l'utente invia più di una volta un risultato per la stessa partita nella stessa sessione, il punteggio memorizzato è l'ultimo inserito.
    
* una pagina di riepilogo che stampa la classifica ordinata e calcolata assegnando 3 punti per la vittoria, 1 per il pareggio e 0 per la sconfitta.

Si scrivano il form e le due pagine di prenotazione e riepilogo usando HTML/PHP. Si supponga di utilizzare il metodo POST nel form.
