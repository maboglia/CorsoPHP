# Esercizio 8 pressione sanguigna massima e minima

Si vuole realizzare un servizio Web per la raccolta dei dati relativi alla pressione sanguigna massima e minima di un insieme di pazienti di controllo. Il servizio prevede le seguenti pagine:

* Un form in cui l'utente può scegliere il nome del paziente da un menù a tendina e inserire la pressione massima e minima. Il form permette l'inserimento di una misura per volta e le opzioni del menù a tendina devono essere generate dinamicamente a partire da un array con i nomi dei pazienti (si considerino "Mario", "Giuseppe", "Filippo", "Maria", "Rosa", "Emma", "Aldo", "Leonardo", "Marina").
    
* Una pagina di raccolta dei dati che memorizza sul server gli inserimenti fatti col form di cui al punto 1 nella stessa sessione di lavoro. Ad ogni dato inserito deve essere associato anche il timestamp (si usi la funzione time() che fornisce il timestamp come numero di secondi fra il tempo presente e 1/1/1970 00:00:00 GMT).
    
* Una pagina di riepilogo che stampa per ogni paziente la pressione massima più alta e la differenza media fra pressione massima e minima delle ultime 12 ore e dell'ultima giornata (si assuma che si parta dal timestamp attuale meno 12*60*60 e 24*60*60 rispettivamente). 
* Infine supponendo che ciascun paziente sia associato ad una categoria ("Mario"=>"M-60", "Giuseppe" =>"M-60", "Filippo" =>"M-70", "Maria"=>"F-60", "Rosa"=>"F-60", "Emma" =>"F-70", "Aldo" =>"M-70", "Leonardo" =>"M-60", "Marina" =>"M-70") la pagina deve stampare la media, su tutti i dati disponibili, delle pressioni massime e minime misurate per ciascuna categoria.

Si scrivano il form e le due pagine di raccolta dati e riepilogo usando HTML/PHP. Si supponga di utilizzare il metodo POST nel form.
