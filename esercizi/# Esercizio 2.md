# Esercizio 2 acquisto prodotti

Si vuole realizzare un servizio Web per la gestione dell'acquisto di un insieme di prodotti da parte di un utente. Il servizio prevede le seguenti pagine:

* un form in cui l'utente può inserire il nome del prodotto (una stringa) e il numero di pezzi che vuole acquistare. Il form permette l'inserimento di un acquisto per volta e l'inserimento di più acquisti avviene inviando più volte il form in una stessa sessione.
    
* una pagina di raccolta delle richieste di acquisto che memorizza sul server gli acquisti fatti col form del punto 1. Si assume che se l'utente invia più di una volta il numero di pezzi per lo stesso prodotto nella stessa sessione, il numero di pezzi è uguale all'ultimo valore inserito.
    
* una pagina di riepilogo che stampa la lista dei prodotti, il totale dei pezzi e il prodotto per cui è richiesto il massimo numero di pezzi. Nel caso ci siano più prodotti a cui corrisponde il valore massimo di pezzi si stampa il primo nella lista.

Si scrivano il form e le due pagine di prenotazione e riepilogo usando HTML/PHP. Si supponga di utilizzare il metodo GET nel form.
