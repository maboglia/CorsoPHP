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

* [basename() Returns the filename component of a path](http://php.net/manual/en/function.basename.php)
* [chgrp() Changes the file group](http://php.net/manual/en/function.chgrp.php)
* [chmod() Changes the file mode](http://php.net/manual/en/function.chmod.php)
* [chown() Changes the file owner](http://php.net/manual/en/function.chown.php)
* [clearstatcache() Clears the file status cache](http://php.net/manual/en/function.clearstatcache.php)
* [copy() Copies a file](http://php.net/manual/en/function.copy.php)
* [delete() Delete a file](http://php.net/manual/en/function.delete.php)
* [dirname() Returns the directory name component of a path](http://php.net/manual/en/function.dirname.php)
* [disk_free_space() Returns the free space of a directory](http://php.net/manual/en/function.disk-free-space.php)
* [disk_total_space() Returns the total size of a directory](http://php.net/manual/en/function.disk-total-space.php)
* [diskfreespace() Alias of disk_free_space()](http://php.net/manual/en/function.disk-free-space.php)
* [fclose() Closes an open file](http://php.net/manual/en/function.fclose.php)
* [feof() Tests for end-of-file on an open file](http://php.net/manual/en/function.feof.php)
* [fflush() Flushes buffered output to an open file](http://php.net/manual/en/function.fflush.php)
* [fgetc() Returns a character from an open file](http://php.net/manual/en/function.fgetc.php)
* [fgetcsv() Parses a line from an open file, checking for](http://php.net/manual/en/function.fgetcsv.php)
* [fgets() Returns a line from an open file](http://php.net/manual/en/function.fgets.php)
* [fgetss() Returns a line, with HTML and PHP tags removed, from an open file](http://php.net/manual/en/function.fgetss.php)
* [file() Reads a file into an array](http://php.net/manual/en/function.file.php)
* [file_exists() Checks whether or not a file or directory exists](http://php.net/manual/en/function.file-exists.php)
* [file_get_contents() Reads a file into a string](http://php.net/manual/en/function.file-get-contents.php)
* [file_put_contents Writes a string to a file](http://php.net/manual/en/function.file-put-contents.php)
* [fileatime() Returns the last access time of a file](http://php.net/manual/en/function.fileatime.php)
* [filectime() Returns the last change time of a file](http://php.net/manual/en/function.filectime.php)
* [filegroup() Returns the group ID of a file](http://php.net/manual/en/function.filegroup.php)
* [fileinode() Returns the inode number of a file](http://php.net/manual/en/function.fileinode.php)
* [filemtime() Returns the last modification time of a file](http://php.net/manual/en/function.filemtime.php)
* [fileowner() Returns the user ID (owner) of a file](http://php.net/manual/en/function.fileowner.php)
* [fileperms() Returns the permissions of a file](http://php.net/manual/en/function.fileperms.php)
* [filesize() Returns the file size](http://php.net/manual/en/function.filesize.php)
* [filetype() Returns the file type](http://php.net/manual/en/function.filetype.php)
* [flock() Locks or releases a file](http://php.net/manual/en/function.flock.php)
* [fnmatch() Matches a filename or string against a specified pattern](http://php.net/manual/en/function.fnmatch.php)
* [fopen() Opens a file or URL](http://php.net/manual/en/function.fopen.php)
* [fpassthru() Reads from an open file, until EOF, and writes the result to the output buffer](http://php.net/manual/en/function.fpassthru.php)
* [fputcsv() Formats a line as CSV and writes it to an open file](http://php.net/manual/en/function.fputcsv.php)
* [fputs() Alias of fwrite()](http://php.net/manual/en/function.fwrite.php)
* [fread() Reads from an open file](http://php.net/manual/en/function.fread.php)
* [fscanf() Parses input from an open file according to a specified format](http://php.net/manual/en/function.fscanf.php)
* [fseek() Seeks in an open file](http://php.net/manual/en/function.fseek.php)
* [fstat() Returns information about an open file](http://php.net/manual/en/function.fstat.php)
* [ftell() Returns the current position in an open file](http://php.net/manual/en/function.ftell.php)
* [ftruncate() Truncates an open file to a specified length](http://php.net/manual/en/function.ftruncate.php)
* [fwrite() Writes to an open file](http://php.net/manual/en/function.fwrite.php)
* [glob() Returns an array of filenames / directories matching a specified pattern](http://php.net/manual/en/function.glob.php)
* [is_dir() Checks whether a file is a directory](http://php.net/manual/en/function.is-dir.php)
* [is_executable() Checks whether a file is executable](http://php.net/manual/en/function.is-executable.php)
* [is_file() Checks whether a file is a regular file](http://php.net/manual/en/function.is-file.php)
* [is_link() Checks whether a file is a link](http://php.net/manual/en/function.is-link.php)
* [is_readable() Checks whether a file is readable](http://php.net/manual/en/function.is-readable.php)
* [is_uploaded_file() Checks whether a file was uploaded via HTTP POST](http://php.net/manual/en/function.is-uploaded-file.php)
* [is_writable() Checks whether a file is writeable](http://php.net/manual/en/function.is-writable.php)
* [is_writeable() Alias of is_writable()](http://php.net/manual/en/function.is-writable.php)
* [link() Creates a hard link](http://php.net/manual/en/function.link.php)
* [linkinfo() Returns information about a hard link](http://php.net/manual/en/function.linkinfo.php)
* [lstat() Returns information about a file or symbolic link](http://php.net/manual/en/function.lstat.php)
* [mkdir() Creates a directory](http://php.net/manual/en/function.mkdir.php)
* [move_uploaded_file() Moves an uploaded file to a new location](http://php.net/manual/en/function.move-uploaded-file.php)
* [parse_ini_file() Parses a configuration file](http://php.net/manual/en/function.parse-ini-file.php)
* [pathinfo() Returns information about a file path](http://php.net/manual/en/function.pathinfo.php)
* [pclose() Closes a pipe opened by popen()](http://php.net/manual/en/function.popen.php)
* [popen() Opens a pipe](http://php.net/manual/en/function.popen.php)
* [readfile() Reads a file and writes it to the output buffer](http://php.net/manual/en/function.readfile.php)
* [readlink() Returns the target of a symbolic link](http://php.net/manual/en/function.readlink.php)
* [realpath() Returns the absolute pathname](http://php.net/manual/en/function.realpath.php)
* [rename() Renames a file or directory](http://php.net/manual/en/function.rename.php)
* [rewind() Rewinds a file pointer](http://php.net/manual/en/function.rewind.php)
* [rmdir() Removes an empty directory](http://php.net/manual/en/function.rmdir.php)
* [set_file_buffer() Sets the buffer size of an open file](http://php.net/manual/en/function.set-file-buffer.php)
* [stat() Returns information about a file](http://php.net/manual/en/function.stat.php)
* [symlink() Creates a symbolic link](http://php.net/manual/en/function.symlink.php)
* [tempnam() Creates a unique temporary file](http://php.net/manual/en/function.tempnam.php)
* [tmpfile() Creates a unique temporary file](http://php.net/manual/en/function.tmpfile.php)
* [touch() Sets access and modification time of a file](http://php.net/manual/en/function.touch.php)
* [umask() Changes file permissions for files](http://php.net/manual/en/function.umask.php)
* [unlink() Deletes a file](http://php.net/manual/en/function.unlink.php)






