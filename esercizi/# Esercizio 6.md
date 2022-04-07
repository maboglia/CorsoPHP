# Esercizio 6 indicizzazione documenti di testo

Si vuole realizzare un servizio Web per la gestione dell'indicizzazione e la ricerca su un insieme di documenti di testo. Il servizio prevede le seguenti pagine:

* un form in cui l'utente può inserire un documento specificandone il titolo e il testo in un textbox. Il form permette l'inserimento di un documento per volta e l'inserimento di più documenti avviene inviando più volte il form in una stessa sessione.
    
* una pagina di indicizzazione dei documenti che memorizza sul server i documenti inseriti col form del punto 1. Lo script deve creare l'indice che associa a ciascuna parola contenuta nei documenti, la lista dei documenti in cui compare (indice inverso) specificando per ogni documento il numero di volte che la parola vi compare (Term Frequency -TF). Inoltre per ogni parola deve essere memorizzato il numero di documenti in cui compare (Document Frequency - DF). Per ogni documento deve essere memorizzato il titolo e il testo contenuto. Per identificare le parole all'interno del testo si possono considerare come separatori la punteggiatura, gli spazi e altri caratteri non alfanumerici (parentesi, apici, ecc.). Le parole vengono indicizzate senza considerare differenze fra maiuscole e minuscole.
* un form di ricerca che permette di inserire una sequenza di parole chiave separate dal carattere spazio.
    
* una pagina che trova i risultati per l'interrogazione specificata nel form al punto 3. La lista dei risultati viene calcolata considerando tutti i documenti in cui compare almeno un termine di ricerca. Per tali documenti viene calcolato un punteggio che si ottiene sommando il peso TF-IDF di ogni parola dell'interrogazione trovata nel documento. Il peso TF-IDF è calcolato come TF/NT*log(NDOC/DF) dove TF è il numero di volte che il termine compare nel documento, NT è il numero totale di termini nel documento, NDOC è il numero totale di documenti e DF è il numero di documenti che contiene il termine. La lista dei documenti che hanno un punteggio non nullo viene mostrata in ordine decrescente mostrando per ciascunoil titolo a cui è associato un link alla pagina di cui al punto 5.
    
* una pagina che mostra il titolo e il testo del documento memorizzato nella sessione e il cui id è passato come parametro GET.

Si scrivano i form gli script richiesti ai punti 1-5 usando HTML/PHP.
