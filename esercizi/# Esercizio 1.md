# Esercizio 1 prenotazione eventi

Si vuole realizzare un servizio Web per la gestione della prenotazione di un insieme di eventi da parte di un utente. Il servizio prevede le seguenti pagine:

* un form in cui l'utente può inserire il nome dell'evento (una stringa) e il numero di persone per cui effettua la prenotazione. Il form permette l'inserimento di una prenotazione per volta e l'inserimento di più prenotazioni avviene inviando più volte il form in una stessa sessione.
    
* una pagina di raccolta delle prenotazioni che memorizza sul server le prenotazioni fatte col form del punto 1. Si assume che se l'utente invia più di una volta il numero di prenotazioni per lo stesso evento nella stessa sessione, il numero di persone viene cumulato.
    
* una pagina di riepilogo che stampa la lista delle prenotazioni, il totale del numero di persone e l'evento per cui è previsto il massimo numero di prenotazioni. Nel caso ci siano più eventi a cui corrisponde il valore massimo di prenotazioni si stampa il primo nella lista.

Si scrivano il form e le due pagine di prenotazione e riepilogo usando HTML/PHP. Si supponga di utilizzare il metodo GET nel form.
