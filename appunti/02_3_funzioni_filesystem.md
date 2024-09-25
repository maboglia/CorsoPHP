# FUNZIONI PER LA GESTIONE DI FILE E DEL FILESYSTEM

## Elenco funzioni

| Funzione | Descrizione |
|----------|-------------|
| [basename()](http://php.net/manual/en/function.basename.php) | Restituisce il componente del nome file di un percorso. |
| [chgrp()](http://php.net/manual/en/function.chgrp.php) | Cambia il gruppo di file. |
| [chmod()](http://php.net/manual/en/function.chmod.php) | Cambia la modalità del file. |
| [chown()](http://php.net/manual/en/function.chown.php) | Cambia il proprietario del file. |
| [clearstatcache()](http://php.net/manual/en/function.clearstatcache.php) | Cancella la cache dello stato del file. |
| [copy()](http://php.net/manual/en/function.copy.php) | Copia un file. |
| [delete()](http://php.net/manual/en/function.delete.php) | Elimina un file. |
| [dirname()](http://php.net/manual/en/function.dirname.php) | Restituisce il componente del nome della directory di un percorso. |
| [disk_free_space()](http://php.net/manual/en/function.disk-free-space.php) | Restituisce lo spazio libero di una directory. |
| [disk_total_space()](http://php.net/manual/en/function.disk-total-space.php) | Restituisce la dimensione totale di una directory. |
| [diskfreespace()](http://php.net/manual/en/function.disk-free-space.php) | Alias di `disk_free_space()`. |
| [fclose()](http://php.net/manual/en/function.fclose.php) | Chiude un file aperto. |
| [feof()](http://php.net/manual/en/function.feof.php) | Verifica la fine del file su un file aperto. |
| [fflush()](http://php.net/manual/en/function.fflush.php) | Scarica l'output bufferizzato in un file aperto. |
| [fgetc()](http://php.net/manual/en/function.fgetc.php) | Restituisce un carattere da un file aperto. |
| [fgetcsv()](http://php.net/manual/en/function.fgetcsv.php) | Analizza una riga da un file aperto, controllando. |
| [fgets()](http://php.net/manual/en/function.fgets.php) | Restituisce una riga da un file aperto. |
| [fgetss()](http://php.net/manual/en/function.fgetss.php) | Restituisce una riga, con i tag HTML e PHP rimossi, da un file aperto. |
| [file()](http://php.net/manual/en/function.file.php) | Legge un file in un array. |
| [file_exists()](http://php.net/manual/en/function.file-exists.php) | Controlla se esiste o meno un file o una directory. |
| [file_get_contents()](http://php.net/manual/en/function.file-get-contents.php) | Legge un file in una stringa. |
| [file_put_contents()](http://php.net/manual/en/function.file-put-contents.php) | Scrive una stringa in un file. |
| [fileatime()](http://php.net/manual/en/function.fileatime.php) | Restituisce l'ora dell'ultimo accesso a un file. |
| [filectime()](http://php.net/manual/en/function.filectime.php) | Restituisce l'ora dell'ultima modifica di un file. |
| [filegroup()](http://php.net/manual/en/function.filegroup.php) | Restituisce l'ID gruppo di un file. |
| [fileinode()](http://php.net/manual/en/function.fileinode.php) | Restituisce il numero di inode di un file. |
| [filemtime()](http://php.net/manual/en/function.filemtime.php) | Restituisce l'ora dell'ultima modifica di un file. |
| [fileowner()](http://php.net/manual/en/function.fileowner.php) | Restituisce l'ID utente (proprietario) di un file. |
| [fileperms()](http://php.net/manual/en/function.fileperms.php) | Restituisce i permessi di un file. |
| [filesize()](http://php.net/manual/en/function.filesize.php) | Restituisce la dimensione del file. |
| [filetype()](http://php.net/manual/en/function.filetype.php) | Restituisce il tipo di file. |
| [flock()](http://php.net/manual/en/function.flock.php) | Blocca o rilascia un file. |
| [fnmatch()](http://php.net/manual/en/function.fnmatch.php) | Corrisponde a un nome file o una stringa rispetto a uno schema specificato. |
| [fopen()](http://php.net/manual/en/function.fopen.php) | Apre un file o un URL. |
| [fpassthru()](http://php.net/manual/en/function.fpassthru.php) | Legge da un file aperto, fino a EOF, e scrive il risultato nel buffer di output. |
| [fputcsv()](http://php.net/manual/en/function.fputcsv.php) | Formula una riga come CSV e la scrive in un file aperto. |
| [fputs()](http://php.net/manual/en/function.fwrite.php) | Alias di `fwrite()`. |
| [fread()](http://php.net/manual/en/function.fread.php) | Legge da un file aperto. |
| [fscanf()](http://php.net/manual/en/function.fscanf.php) | Analizza l'input da un file aperto secondo un formato specificato. |
| [fseek()](http://php.net/manual/en/function.fseek.php) | Cerca in un file aperto. |
| [fstat()](http://php.net/manual/en/function.fstat.php) | Restituisce informazioni su un file aperto. |
| [ftell()](http://php.net/manual/en/function.ftell.php) | Restituisce la posizione corrente in un file aperto. |
| [ftruncate()](http://php.net/manual/en/function.ftruncate.php) | Tronca un file aperto a una lunghezza specificata. |
| [fwrite()](http://php.net/manual/en/function.fwrite.php) | Scrive su un file aperto. |
| [glob()](http://php.net/manual/en/function.glob.php) | Restituisce un array di nomi di file/directory che corrispondono a uno schema specificato. |
| [is_dir()](http://php.net/manual/en/function.is-dir.php) | Controlla se un file è una directory. |
| [is_executable()](http://php.net/manual/en/function.is-executable.php) | Controlla se un file è eseguibile. |
| [is_file()](http://php.net/manual/en/function.is-file.php) | Controlla se un file è un file normale. |
| [is_link()](http://php.net/manual/en/function.is-link.php) | Controlla se un file è un collegamento. |
| [is_readable()](http://php.net/manual/en/function.is-readable.php) | Controlla se un file è leggibile. |
| [is_uploaded_file()](http://php.net/manual/en/function.is-uploaded-file.php) | Controlla se un file è stato caricato tramite HTTP POST. |
| [is_writable()](http://php.net/manual/en/function.is-writable.php) | Controlla se un file è scrivibile. |
| [is_writeable()](http://php.net/manual/en/function.is-writable.php) | Alias di `is_writable()`. |
| [link()](http://php.net/manual/en/function.link.php) | Crea un collegamento reale. |
| [linkinfo()](http://php.net/manual/en/function.linkinfo.php) | Restituisce informazioni su un collegamento reale. |
| [lstat()](http://php.net/manual/en/function.lstat.php) | Restituisce informazioni su un file o un collegamento simbolico. |
| [mkdir()](http://php.net/manual/en/function.mkdir.php) | Crea una directory. |
| [move_uploaded_file()](http://php.net/manual/en/function.move-uploaded-file.php) | Sposta un file caricato in una nuova posizione. |
| [parse_ini_file()](http://php.net/manual/en/function.parse-ini-file.php) | Analizza un file di configurazione. |
| [pathinfo()](http://php.net/manual/en/function.pathinfo.php) | Restituisce informazioni sul percorso di un file. |
| [pclose()](http://php.net/manual/en/function.pclose.php) | Chiude una pipe aperta da `popen()`. |
| [popen()](http://php.net/manual/en/function.popen.php) | Apre una pipe. |
| [readfile()](http://php.net/manual/en/function.readfile.php) | Legge un file e lo scrive nel buffer di output. |
| [readlink()](http://php.net/manual/en/function.readlink.php) | Restituisce la destinazione di un collegamento simbolico. |
| [realpath()](http://php.net/manual/en/function.realpath.php) | Restituisce il percorso assoluto. |
| [rename()](http://php.net/manual/en/function.rename.php) | Rinomina un file o una directory. |
| [rewind()](http://php.net/manual/en/function.rewind.php) | Riavvolge un puntatore di file. |
| [rmdir()](http://php.net/manual/en/function.rmdir.php) | Rimuove una directory vuota. |
| [set_file_buffer()](http://php.net/manual/en/function.set-file-buffer.php) | Imposta la dimensione del buffer di un file aperto. |
| [stat()](http://php.net/manual/en/function.stat.php) | Restituisce informazioni su un file. |
| [symlink()](http://php.net/manual/en/function.symlink.php) | Crea un collegamento simbolico. |
| [tempnam()](http://php.net/manual/en/function.tempnam.php) | Crea un unico file temporaneo. |
| [tmpfile()](http://php.net/manual/en/function.tmpfile.php) | Crea un unico file temporaneo. |
| [touch()](http://php.net/manual/en/function.touch.php) | Imposta l'ora di accesso e modifica di un file. |
| [umask()](http://php.net/manual/en/function.umask.php) | Modifica i permessi dei file per i file. |
| [unlink()](http://php.net/manual/en/function.unlink.php) | Elimina un file. |

---

## Esempi

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
