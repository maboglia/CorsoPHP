# Esercizio 9 disponibilità riunione

Si vuole realizzare un servizio Web per la raccolta delle disponibilità per l'organizzazione di una riunione. Il servizio prevede le seguenti pagine:

* Un form in cui l'utente può scegliere i giorni della settimana e le fasce d'orario da due menù a scelta multipla e inserire il nome della persona in un campo testuale. Il form permette di specificare un insieme di disponibilità per un dato partecipante ad ogni invio. Le opzioni dei menù a scelta multipla devono essere generate dinamicamente a partire da due array con i nomi dei giorni della settimana e delle fasce di orario (si considerino le fasce "9-11", "11-13", "14-16", "16-18").
    
* Una pagina di raccolta dei dati che memorizza sul server gli inserimenti fatti col form di cui al punto 1 nella stessa sessione di lavoro. Nel caso in cui si inseriscano disponibilità per la stessa persona in più richieste distinte, le disponibilità vengono aggiunte. 
    
* Una pagina di riepilogo che stampa una tabella con il numero di persone disponibili  per ogni opzione giorno-fascia oraria. Si riportano poi tutte le opzioni giorno-fascia oraria per cui c'è il massimo numero di persone disponibili. Nel caso in cui il massimo numero di persone disponibili non coincida con il totale dei partecipanti (la lista dei partecipanti coincide con l'insieme dei nomi inseriti col form), per ogni opzione si stampano le persone che non hanno dato disponibilità.

Si scrivano il form e le due pagine di raccolta dati e riepilogo usando HTML/PHP. Si supponga di utilizzare il metodo POST nel form.