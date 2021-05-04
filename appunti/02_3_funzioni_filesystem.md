# FUNZIONI PER LA GESTIONE DI FILE E DEL FILESYSTEM

* resource fopen ( string filename, string mode [, bool use_include_path [, resource zcontext]] )

La funzione fopen() apre un collegamneto tra una risorsa, indicata dal parametro filename, ed un
flusso.

---

* bool fclose ( resource handle )

Chiude il file puntato da handle.

---

* bool feof ( resource handle )

Restituisce TRUE se il puntatore al file ha raggiunto la fine del file (EOF) o si è verificato un errore
(anche in caso di timeout del socket); altrimenti restituisce FALSE.

---

* string fgetc ( resource handle )

Restituisce una stringa contenente un singolo carattere letto dal file puntato da handle. Restituisce
FALSE alla fine del file (EOF).

---

* string fgets ( resource handle, int length )

Restituisce una stringa di length - 1 byte letti dal file puntato da handle. 

La lettura termina quando
sono stati letti length - 1 byte, oppure si incontra il carattere di newline, oppure alla fine del file (EOF) qualora giunga prima. 
Se non si specifica length, si assume come default 1k, o 1024 byte.

---

* bool file_exists ( string filename )
Restituisce TRUE se il file o la directory specificata da filename esiste; FALSE altrimenti.

---

* array file ( string filename [, int use_include_path [, resource context]] )
Identica a readfile(), eccetto per il fatto che file() restituisce il file in un vettore. Ogni elemento del
vettore corrisponde ad una riga del file, con il carattere di newline ancora inserito. Se la funzione
non riesce restituisce FALSE. (nota di Simone: apre e chiude il file automaticamente)

---

* int fwrite ( resource handle, string string [, int length] )
fwrite() scrive il contenuto di string nel flusso del file puntato da handle. Se l'argomento length è
specificato la scrittura si arresterà dopo aver scritto length byte o alla fine di string se si verificasse
prima. fwrite() returns the number of bytes written, or FALSE on error.
