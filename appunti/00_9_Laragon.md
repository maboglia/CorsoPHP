# Laragon

**Laragon** è un ambiente di sviluppo locale per Windows che semplifica la configurazione di ambienti per lo sviluppo di applicazioni web. È una soluzione leggera, portabile e facile da usare, che fornisce un'alternativa rapida ad ambienti più complessi come XAMPP, WAMP o MAMP. È particolarmente popolare tra sviluppatori PHP, ma supporta anche altri linguaggi e framework come Node.js, Python, Ruby e Java.

### Caratteristiche principali di Laragon

1. **Portabilità**: Laragon è completamente portabile. Può essere installato su una chiavetta USB e trasportato ovunque. Non lascia tracce nel registro di Windows e può essere rimosso facilmente.
   
2. **Performance ottimizzata**: È estremamente leggero e progettato per essere veloce. Utilizza tecnologie come Nginx o Apache e MariaDB (o MySQL), ottimizzate per l'ambiente di sviluppo.

3. **Supporto multi-linguaggio**: Anche se è principalmente noto per PHP, Laragon supporta una vasta gamma di tecnologie:
   - PHP
   - Node.js
   - Python
   - Ruby
   - Java
   - Go

4. **Auto-creazione di URL personalizzati**: Con Laragon puoi creare automaticamente domini locali (ad esempio, `myapp.test`) senza bisogno di modificare il file `hosts`. Laragon gestisce i domini virtuali e li associa automaticamente alla tua applicazione.

5. **Gestione dei pacchetti e delle dipendenze**: Laragon integra strumenti come Composer (per PHP), npm (per Node.js), yarn, git e altri, rendendo facile l'installazione e la gestione di pacchetti e dipendenze.

6. **Semplice da configurare e gestire**: Con un'interfaccia grafica intuitiva, Laragon rende facile l'avvio e la gestione dei servizi. È possibile avviare e arrestare server web e database con un solo clic.

7. **Certificati SSL facili da configurare**: Laragon permette di generare facilmente certificati SSL per i tuoi progetti locali, migliorando la sicurezza durante lo sviluppo.

8. **MySQL/MariaDB, PostgreSQL, SQLite supportati**: Laragon fornisce il supporto nativo per MariaDB e MySQL e consente di aggiungere altri database come PostgreSQL e SQLite in pochi passaggi.

9. **Aggiornamenti semplici**: Cambiare versione di PHP, Apache, Nginx, o qualsiasi altro software è semplice. Basta scaricare e posizionare la nuova versione nella cartella appropriata.

### Installazione e configurazione

L'installazione di Laragon è molto semplice:

1. **Scarica**: Vai al sito ufficiale di Laragon [https://laragon.org/](https://laragon.org/) e scarica la versione adatta alle tue esigenze.
   
2. **Installa**: Segui le semplici istruzioni di installazione (tipicamente è un file `.exe` che devi eseguire). Durante l'installazione, puoi selezionare le versioni di software che desideri (PHP, Apache, MySQL, ecc.).

3. **Avvia**: Una volta installato, avvia Laragon. Da qui puoi gestire facilmente tutti i tuoi server e progetti con pochi clic.

4. **Crea un nuovo progetto**: Laragon ti permette di creare nuovi progetti in modo molto veloce con il comando "Quick App". Puoi scegliere tra vari framework (come Laravel, Symfony, WordPress, ecc.) e Laragon si occuperà di configurare tutto per te.

   ```bash
   # Apri una console con Laragon e digita il comando per creare un nuovo progetto Laravel
   laragon new mylaravelapp
   ```

5. **Accedi al tuo progetto**: Laragon creerà automaticamente un dominio virtuale per il tuo progetto (ad esempio `mylaravelapp.test`), a cui potrai accedere direttamente dal browser.

### Differenze rispetto a XAMPP e WAMP

- **Velocità**: Laragon è ottimizzato per essere più veloce di XAMPP o WAMP, grazie alla sua leggerezza e all'uso di Nginx (anche se supporta Apache).
- **Facilità d'uso**: Laragon ha un'interfaccia semplice e intuitiva, con meno configurazioni manuali rispetto a XAMPP e WAMP.
- **Gestione dei progetti**: Laragon facilita la creazione di progetti PHP (ad esempio Laravel o Symfony) con un solo comando. Questo è qualcosa che XAMPP e WAMP non offrono direttamente.
- **Portabilità**: A differenza di XAMPP e WAMP, Laragon è portabile, il che significa che puoi eseguire un'intera configurazione di sviluppo locale da una chiavetta USB.
- **Supporto per SSL**: Laragon rende molto facile generare certificati SSL locali, mentre su XAMPP e WAMP può essere più complicato.

### Esempio di utilizzo con PHP

Laragon viene spesso utilizzato per lo sviluppo PHP, specialmente con framework come **Laravel**, **Symfony** o **WordPress**. Per creare un nuovo progetto Laravel, ad esempio, basta seguire questi passaggi:

1. Clicca su "Menu" -> "Quick app" -> "Laravel".
2. Assegna un nome al progetto, ad esempio "blog".
3. Laragon creerà automaticamente il progetto Laravel nella cartella `C:\laragon\www\blog` e lo renderà disponibile all'indirizzo `http://blog.test`.

### Laragon e PHP 8

Laragon supporta facilmente **PHP 8**, e grazie alla sua modularità, è possibile avere più versioni di PHP installate e passare da una versione all'altra con pochi clic. Questo è utile quando si sviluppano progetti che richiedono versioni diverse di PHP.

Per cambiare versione di PHP:

1. Scarica la versione desiderata di PHP dal sito ufficiale di PHP o dai repository di Laragon.
2. Copia i file nella cartella `C:\laragon\bin\php`.
3. Dal menu di Laragon, seleziona la nuova versione di PHP.

---

Laragon è quindi una soluzione eccellente per chi cerca un ambiente di sviluppo locale per PHP e altre tecnologie web. Con la sua semplicità e leggerezza, è ideale sia per sviluppatori esperti che per chi sta appena iniziando.