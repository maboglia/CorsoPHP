### 💪 **Guida Completa all'Uso di PHP da Linea di Comando (CLI)**

PHP non è solo un linguaggio per lo sviluppo web, ma può anche essere utilizzato direttamente da **linea di comando (CLI - Command Line Interface)** senza bisogno di un server web come Apache o Nginx.

In questa guida approfondiremo:

- Cos'è la modalità CLI in PHP
- Come eseguire script PHP da terminale
- Leggere input da console
- Passare argomenti da riga di comando
- Funzioni specifiche per la CLI
- Esempi pratici
- Creare comandi personalizzati
- Automazione di task (cron job)

---

## 🔑 **Cos'è la modalità CLI in PHP?**

La modalità **CLI (Command Line Interface)** di PHP permette di eseguire script PHP direttamente dal terminale senza un server web.

Questa modalità è molto utile per:

- Automatizzare operazioni
- Lavorare con cron job
- Creare comandi personalizzati
- Sviluppare script di sistema
- Testare codice rapidamente

---

## ✅ **Come eseguire uno script PHP dalla riga di comando**

### 📌 1. Verificare se PHP è installato

Apri il terminale e digita:

```bash
php -v
```

Se è installato, vedrai la versione di PHP.

---

### 📌 2. Eseguire un file PHP

Se hai un file chiamato **script.php** con questo contenuto:

```php
<?php
echo "Ciao dal terminale!\n";
?>
```

Per eseguirlo, usa il comando:

```bash
php script.php
```

### 🖥️ Output

```
Ciao dal terminale!
```

---

## 🔥 **Modalità Interattiva**

Puoi eseguire PHP direttamente dalla console senza creare file, usando:

```bash
php -a
```

Scrivi direttamente il codice PHP:

```php
echo "Hello World\n";
```

Premi **Invio** e vedrai il risultato.

---

## 📌 **Leggere Input dalla Console**

### Metodo 1: readline()

La funzione `readline()` serve per leggere una riga di input dall'utente.

### Esempio

```php
$name = readline("Inserisci il tuo nome: ");
echo "Ciao, $name!\n";
```

### 🖥️ Output

```
Inserisci il tuo nome: Luca
Ciao, Luca!
```

---

### Metodo 2: fscanf()

Simile a **scanf()** in C.

### Esempio

```php
fscanf(STDIN, "%d %d", $a, $b);
echo "La somma è: " . ($a + $b) . "\n";
```

Input:

```
10 20
```

Output:

```
La somma è: 30
```

---

## 🔥 **Leggere Argomenti dalla Linea di Comando**

PHP permette di passare **argomenti** alla riga di comando usando la variabile globale `$argv`.

### Esempio

Salva questo file come **argomenti.php**:

```php
<?php
echo "Primo Argomento: " . $argv[1] . "\n";
echo "Secondo Argomento: " . $argv[2] . "\n";
?>
```

Esegui il file così:

```bash
php argomenti.php Hello World
```

### Output

```
Primo Argomento: Hello
Secondo Argomento: World
```

---

### Come sapere quanti argomenti sono stati passati?

La variabile `$argc` contiene il numero di argomenti:

```php
<?php
echo "Numero di argomenti: $argc\n";
?>
```

---

## 🔑 **Input Multiplo con Loop**

Leggere più input con un ciclo:

```php
while (true) {
    $input = readline("Inserisci qualcosa (q per uscire): ");
    if ($input == "q") break;
    echo "Hai inserito: $input\n";
}
```

---

## 🎯 **Creare un comando personalizzato**

Immaginiamo di creare uno script PHP chiamato **greet.php** che saluta l'utente.

Script:

```php
#!/usr/bin/php
<?php
$name = $argv[1] ?? 'Mondo';
echo "Ciao, $name!\n";
?>
```

---

### Rendi il file eseguibile

```bash
chmod +x greet.php
```

Ora puoi eseguire il comando così:

```bash
./greet.php Luca
```

Output:

```
Ciao, Luca!
```

---

## 🔥 Automatizzare Task con Cron Job

PHP da linea di comando è molto utile per i **cron job**.

### Esempio

Script **backup.php**

```php
<?php
echo "Backup eseguito alle " . date('Y-m-d H:i:s') . "\n";
?>
```

Aggiungi il cron job:

```bash
crontab -e
```

Inserisci:

```bash
0 * * * * php /path/to/backup.php >> backup.log
```

Questo script eseguirà il backup ogni ora e scriverà il log nel file **backup.log**.

---

## 📌 Funzioni Utili in CLI

| Funzione        | Descrizione                      |
|----------------|---------------------------------|
| `readline()`   | Legge una riga di input |
| `fscanf()`     | Legge l'input con formattazione |
| `exec()`       | Esegue comandi shell |
| `system()`     | Stampa direttamente l'output di comandi shell |
| `passthru()`   | Esegue un comando shell e restituisce l'output |

---

## 🚀 Bonus Tip: Colorare l'Output

Puoi colorare l'output in console usando i codici ANSI:

```php
echo "\033[32mQuesto testo è verde!\033[0m\n";
echo "\033[31mQuesto testo è rosso!\033[0m\n";
```

---

## 🔑 Conclusione

PHP CLI è uno strumento potente che ti permette di creare:

- Script di automazione
- Comandi personalizzati
- Applicazioni di console
- Backup automatici
