# Esercizio 7 temperature massime e minime

Si vuole realizzare un servizio Web per la raccolta dei dati relativi alle temperature massime e minime di un insieme di stazioni metereologiche. Il servizio prevede le seguenti pagine:

* Un form in cui l'utente può scegliere il nome della stazione da un menù a tendina e inserire la temperatura massima e minima. Il form permette l'inserimento di una misura per volta e le opzioni del menù a tendina devono essere generate dinamicamente a partire da un array con i nomi delle stazioni (si considerino "Trento", "Milano", "Torino", "Firenze", "Bologna", "Roma", "Napoli", "Bari", "Messina").
    
* Una pagina di raccolta dei dati che memorizza sul server gli inserimenti fatti col form di cui al punto 1 nella stessa sessione di lavoro. Ad ogni dato inserito deve essere associato anche il timestamp (si usi la funzione time() che fornisce il timestamp come numero di secondi fra il tempo presente e 1/1/1970 00:00:00 GMT).
    
* Una pagina di riepilogo che stampa per ogni stazione la temperatura massima più alta e la media della temperatura minima del giorno corrente e dell'ultima settimana (si assuma che il giorno e la settimana corrente partano dal timestamp attuale meno 24*60*60 e 7*24*60*60 rispettivamente). 
    
* Infine supponendo che ciascuna stazione sia associata ad una zona ("Trento"=>"Nord", "Milano" => "Nord", "Torino" => "Nord", "Firenze" => "Centro", "Bologna" => "Centro", "Roma" => "Centro", "Napoli"=> "Sud", "Bari" => "Sud", "Messina" => "Sud"), la pagina deve stampare la media, su tutti i dati disponibili, delle temperature massime e minime misurate per ciascuna zona.

Si scrivano il form e le due pagine di raccolta dati e riepilogo usando HTML/PHP. Si supponga di utilizzare il metodo GET nel form.
