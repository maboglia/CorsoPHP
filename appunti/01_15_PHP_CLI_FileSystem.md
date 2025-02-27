# interazione con il file system in PHP

L'interazione con il file system in PHP da linea di comando permette di leggere, scrivere, creare, modificare ed eliminare file e directory direttamente dal terminale. Questa funzionalità è utile per automatizzare attività come backup, gestione di log, creazione di script di manutenzione o importazione/esportazione di dati.

### 1. **Lettura di File**

#### - `file_get_contents()`

Legge l'intero contenuto di un file in una stringa.

```php
$content = file_get_contents('file.txt');
echo $content;
```

#### - `fopen()` e `fread()`

Per leggere grandi file a pezzi:

```php
$handle = fopen('file.txt', 'r');
while (($line = fgets($handle)) !== false) {
    echo $line;
}
fclose($handle);
```

---

### 2. **Scrittura su File**

#### - `file_put_contents()`

Scrive direttamente su un file (crea il file se non esiste):

```php
file_put_contents('file.txt', "Hello World\n");
```

Se vuoi aggiungere testo invece di sovrascrivere:

```php
file_put_contents('file.txt', "Aggiunta di una riga\n", FILE_APPEND);
```

#### - `fwrite()`

Metodo più manuale:

```php
$handle = fopen('file.txt', 'a');
fwrite($handle, "Nuovo contenuto\n");
fclose($handle);
```

---

### 3. **Eliminazione di File**

Usando la funzione `unlink()`:

```php
unlink('file.txt');
echo "File eliminato!";
```

---

### 4. **Verifica di Esistenza di File**

- `file_exists()`: Verifica se il file esiste.
- `is_file()`: Verifica se è un file (non una cartella).

```php
if (file_exists('file.txt')) {
    echo "Il file esiste";
} else {
    echo "Il file non esiste";
}
```

---

### 5. **Gestione Cartelle**

#### Creazione di Cartelle

```php
mkdir('nuova_cartella');
```

#### Eliminazione di Cartelle

```php
rmdir('nuova_cartella');
```

#### Scansione di Cartelle

```php
$files = scandir('.');
print_r($files);
```

---

### 6. **Permessi su File e Cartelle**

- `chmod()`: Cambia i permessi di un file.

```php
chmod('file.txt', 0755);
```

---

### 7. **Copia e Spostamento di File**

- Copia con `copy()`

```php
copy('file.txt', 'copia_file.txt');
```

- Sposta o rinomina con `rename()`

```php
rename('file.txt', 'nuovo_nome.txt');
```

---

### 8. **Gestione degli Errori**

È buona pratica usare il blocco `try-catch` o funzioni come `file_exists()` prima di accedere a un file.

---

### Esempio Completo

```php
$file = 'dati.txt';

if (!file_exists($file)) {
    file_put_contents($file, "Primo rigo\n");
}

$content = file_get_contents($file);
echo "Contenuto iniziale:\n$content";

file_put_contents($file, "Secondo rigo\n", FILE_APPEND);

$content = file_get_contents($file);
echo "Contenuto aggiornato:\n$content";

unlink($file);
echo "File eliminato!";
```

---

### Conclusione

PHP da linea di comando permette di interagire con il file system in modo semplice e potente. Questa capacità è utile per creare script di automazione e manutenzione.
