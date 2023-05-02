# FUNZIONI PER LA GESTIONE DI FILE E DEL FILESYSTEM

* `resource fopen ( string filename, string mode [, bool use_include_path [, resource zcontext]] )`

La funzione fopen() apre un collegamneto tra una risorsa, indicata dal parametro filename, ed un
flusso.

---

* `bool fclose ( resource handle )`

Chiude il file puntato da handle.

---

* `bool feof ( resource handle )`

Restituisce TRUE se il puntatore al file ha raggiunto la fine del file (EOF) o si è verificato un errore
(anche in caso di timeout del socket); altrimenti restituisce FALSE.

---

* `string fgetc ( resource handle )`

Restituisce una stringa contenente un singolo carattere letto dal file puntato da handle. Restituisce
FALSE alla fine del file (EOF).

---

* `string fgets ( resource handle, int length )`

Restituisce una stringa di length - 1 byte letti dal file puntato da handle. 

La lettura termina quando
sono stati letti length - 1 byte, oppure si incontra il carattere di newline, oppure alla fine del file (EOF) qualora giunga prima. 
Se non si specifica length, si assume come default 1k, o 1024 byte.

---

* `bool file_exists ( string filename )`
Restituisce TRUE se il file o la directory specificata da filename esiste; FALSE altrimenti.

---

* `array file ( string filename [, int use_include_path [, resource context]] )`
Identica a readfile(), eccetto per il fatto che file() restituisce il file in un vettore. Ogni elemento del
vettore corrisponde ad una riga del file, con il carattere di newline ancora inserito. Se la funzione
non riesce restituisce FALSE. (nota di Simone: apre e chiude il file automaticamente)

---

* `int fwrite ( resource handle, string string [, int length] )`
fwrite() scrive il contenuto di string nel flusso del file puntato da handle. Se l'argomento length è
specificato la scrittura si arresterà dopo aver scritto length byte o alla fine di string se si verificasse
prima. fwrite() returns the number of bytes written, or FALSE on error.


---

## Elenco funzioni

* [basename() Restituisce il componente del nome file di un percorso](http://php.net/manual/en/function.basename.php)
* [chgrp() Cambia il gruppo di file](http://php.net/manual/en/function.chgrp.php)
* [chmod() Cambia la modalità del file](http://php.net/manual/en/function.chmod.php)
* [chown() Cambia il proprietario del file](http://php.net/manual/en/function.chown.php)
* [clearstatcache() Cancella la cache dello stato del file](http://php.net/manual/en/function.clearstatcache.php)
* [copy() Copia un file](http://php.net/manual/en/function.copy.php)
* [delete() Elimina un file](http://php.net/manual/en/function.delete.php)
* [dirname() Restituisce il componente del nome della directory di un percorso](http://php.net/manual/en/function.dirname.php)
* [disk_free_space() Restituisce lo spazio libero di una directory](http://php.net/manual/en/function.disk-free-space.php)
* [disk_total_space() Restituisce la dimensione totale di una directory](http://php.net/manual/en/function.disk-total-space.php)
* [diskfreespace() Alias di disk_free_space()](http://php.net/manual/en/function.disk-free-space.php)
* [fclose() Chiude un file aperto](http://php.net/manual/en/function.fclose.php)
* [feof() Verifica la fine del file su un file aperto](http://php.net/manual/en/function.feof.php)
* [fflush() Scarica l'output bufferizzato in un file aperto](http://php.net/manual/en/function.fflush.php)
* [fgetc() Restituisce un carattere da un file aperto](http://php.net/manual/en/function.fgetc.php)
* [fgetcsv() Analizza una riga da un file aperto, controllando](http://php.net/manual/en/function.fgetcsv.php)
* [fgets() Restituisce una riga da un file aperto](http://php.net/manual/en/function.fgets.php)
* [fgetss() Restituisce una riga, con i tag HTML e PHP rimossi, da un file aperto](http://php.net/manual/en/function.fgetss.php)

---

## Elenco funzioni 2

* [file() Legge un file in un array](http://php.net/manual/en/function.file.php)
* [file_exists() Controlla se esiste o meno un file o una directory](http://php.net/manual/en/function.file-exists.php)
* [file_get_contents() Legge un file in una stringa](http://php.net/manual/en/function.file-get-contents.php)
* [file_put_contents Scrive una stringa in un file](http://php.net/manual/en/function.file-put-contents.php)
* [fileatime() Restituisce l'ora dell'ultimo accesso a un file](http://php.net/manual/en/function.fileatime.php)
* [filectime() Restituisce l'ora dell'ultima modifica di un file](http://php.net/manual/en/function.filectime.php)
* [filegroup() Restituisce l'ID gruppo di un file](http://php.net/manual/en/function.filegroup.php)
* [fileinode() Restituisce il numero di inode di un file](http://php.net/manual/en/function.fileinode.php)
* [filemtime() Restituisce l'ora dell'ultima modifica di un file](http://php.net/manual/en/function.filemtime.php)
* [fileowner() Restituisce l'ID utente (proprietario) di un file](http://php.net/manual/en/function.fileowner.php)
* [fileperms() Restituisce i permessi di un file](http://php.net/manual/en/function.fileperms.php)
* [filesize() Restituisce la dimensione del file](http://php.net/manual/en/function.filesize.php)
* [filetype() Restituisce il tipo di file](http://php.net/manual/en/function.filetype.php)
* [flock() Blocca o rilascia un file](http://php.net/manual/en/function.flock.php)
* [fnmatch() Corrisponde a un nome file o una stringa rispetto a uno schema specificato](http://php.net/manual/en/function.fnmatch.php)
* [fopen() Apre un file o un URL](http://php.net/manual/en/function.fopen.php)
* [fpassthru() Legge da un file aperto, fino a EOF, e scrive il risultato nel buffer di output](http://php.net/manual/en/function.fpassthru.php)
* [fputcsv() Formatta una riga come CSV e la scrive in un file aperto](http://php.net/manual/en/function.fputcsv.php)
* [fputs() Alias di fwrite()](http://php.net/manual/en/function.fwrite.php)

---

## Elenco funzioni 3

* [fread() Legge da un file aperto](http://php.net/manual/en/function.fread.php)
* [fscanf() Analizza l'input da un file aperto secondo un formato specificato](http://php.net/manual/en/function.fscanf.php)
* [fseek() Cerca in un file aperto](http://php.net/manual/en/function.fseek.php)
* [fstat() Restituisce informazioni su un file aperto](http://php.net/manual/en/function.fstat.php)
* [ftell() Restituisce la posizione corrente in un file aperto](http://php.net/manual/en/function.ftell.php)
* [ftruncate() Tronca un file aperto a una lunghezza specificata](http://php.net/manual/en/function.ftruncate.php)
* [fwrite() Scrive su un file aperto](http://php.net/manual/en/function.fwrite.php)
* [glob() Restituisce un array di nomi di file/directory che corrispondono a uno schema specificato](http://php.net/manual/en/function.glob.php)
* [is_dir() Controlla se un file è una directory](http://php.net/manual/en/function.is-dir.php)
* [is_executable() Controlla se un file è eseguibile](http://php.net/manual/en/function.is-executable.php)
* [is_file() Controlla se un file è un file normale](http://php.net/manual/en/function.is-file.php)
* [is_link() Controlla se un file è un collegamento](http://php.net/manual/en/function.is-link.php)
* [is_readable() Controlla se un file è leggibile](http://php.net/manual/en/function.is-readable.php)
* [is_uploaded_file() Controlla se un file è stato caricato tramite HTTP POST](http://php.net/manual/en/function.is-uploaded-file.php)
* [is_writable() Controlla se un file è scrivibile](http://php.net/manual/en/function.is-writable.php)
* [is_writeable() Alias di is_writable()](http://php.net/manual/en/function.is-writable.php)

---

## Elenco funzioni 4

* [link() Crea un collegamento reale](http://php.net/manual/en/function.link.php)
* [linkinfo() Restituisce informazioni su un collegamento reale](http://php.net/manual/en/function.linkinfo.php)
* [lstat() Restituisce informazioni su un file o un collegamento simbolico](http://php.net/manual/en/function.lstat.php)
* [mkdir() Crea una directory](http://php.net/manual/en/function.mkdir.php)
* [move_uploaded_file() Sposta un file caricato in una nuova posizione](http://php.net/manual/en/function.move-uploaded-file.php)
* [parse_ini_file() Analizza un file di configurazione](http://php.net/manual/en/function.parse-ini-file.php)
* [pathinfo() Restituisce informazioni sul percorso di un file](http://php.net/manual/en/function.pathinfo.php)
* [pclose() Chiude una pipe aperta da popen()](http://php.net/manual/en/function.popen.php)
* [popen() Apre una pipe](http://php.net/manual/en/function.popen.php)
* [readfile() Legge un file e lo scrive nel buffer di output](http://php.net/manual/en/function.readfile.php)
* [readlink() Restituisce la destinazione di un collegamento simbolico](http://php.net/manual/en/function.readlink.php)
* [realpath() Restituisce il percorso assoluto](http://php.net/manual/en/function.realpath.php)
* [rename() Rinomina un file o una directory](http://php.net/manual/en/function.rename.php)
* [rewind() Riavvolge un puntatore di file](http://php.net/manual/en/function.rewind.php)
* [rmdir() Rimuove una directory vuota](http://php.net/manual/en/function.rmdir.php)
* [set_file_buffer() Imposta la dimensione del buffer di un file aperto](http://php.net/manual/en/function.set-file-buffer.php)
* [stat() Restituisce informazioni su un file](http://php.net/manual/en/function.stat.php)
* [symlink() Crea un collegamento simbolico](http://php.net/manual/en/function.symlink.php)
* [tempnam() Crea un unico file temporaneo](http://php.net/manual/en/function.tempnam.php)
* [tmpfile() Crea un unico file temporaneo](http://php.net/manual/en/function.tmpfile.php)
* [touch() Imposta l'ora di accesso e modifica di un file](http://php.net/manual/en/function.touch.php)
* [umask() Modifica i permessi dei file per i file](http://php.net/manual/en/function.umask.php)
* [unlink() Elimina un file](http://php.net/manual/en/function.unlink.php)
