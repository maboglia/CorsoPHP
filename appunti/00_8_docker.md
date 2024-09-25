# Docker con PHP

### **Docker: Cos'è e come si usa con PHP**

**Docker** è una piattaforma open-source che permette di automatizzare il deployment delle applicazioni all'interno di container, ambienti isolati che includono tutto il necessario per eseguire un'applicazione, come il sistema operativo, i pacchetti software, le librerie e il codice.

Con Docker, puoi creare un ambiente di sviluppo replicabile e portabile, eliminando problemi di compatibilità tra ambienti diversi. Per lo sviluppo di applicazioni PHP, Docker è particolarmente utile per configurare in modo rapido e riproducibile ambienti complessi, come server web, database e altre dipendenze.

---

### **Vantaggi di Docker con PHP**

- **Isolamento**: Ogni container funziona in modo indipendente e non interferisce con altre applicazioni sul sistema.
- **Portabilità**: Docker permette di creare ambienti che possono essere facilmente distribuiti su qualsiasi macchina.
- **Coerenza tra ambienti**: Il codice che funziona in un container funzionerà ovunque.
- **Facilità di configurazione**: Utilizzando il file `Dockerfile` e `docker-compose.yml`, puoi configurare facilmente un ambiente di sviluppo PHP con tutte le sue dipendenze.

---

### **Come Installare Docker**

1. **Installare Docker**: Scarica e installa Docker dal sito ufficiale [Docker](https://www.docker.com/get-started).
2. **Installare Docker Compose**: Docker Compose è uno strumento per definire e gestire applicazioni multi-container. È già incluso in Docker Desktop, ma può essere installato separatamente sui server Linux.

---

### **Struttura di un Progetto Docker per PHP**

Per iniziare con Docker e PHP, devi creare due file essenziali:

1. **Dockerfile**: Contiene le istruzioni per costruire un'immagine Docker personalizzata.
2. **docker-compose.yml**: Definisce i servizi (container) necessari per il progetto, come PHP, MySQL e il server web.

---

### **1. Creare un Dockerfile per PHP**

Il **Dockerfile** è un file che descrive come configurare l'ambiente del container. Ecco un esempio per creare un ambiente PHP con Apache:

```Dockerfile
# Usa l'immagine ufficiale PHP con Apache
FROM php:8.0-apache

# Installa estensioni PHP necessarie (es: PDO, MySQL)
RUN docker-php-ext-install pdo pdo_mysql

# Copia il contenuto della directory del progetto nella cartella di Apache
COPY ./src/ /var/www/html/

# Esponi la porta 80 per Apache
EXPOSE 80

# Avvia Apache all'avvio del container
CMD ["apache2-foreground"]
```

### **2. Creare un File `docker-compose.yml`**

Docker Compose ti consente di gestire più container (ad esempio, PHP, MySQL, Redis, ecc.) in modo facile e coordinato. Un esempio di file `docker-compose.yml` che crea un ambiente PHP con MySQL e PhpMyAdmin potrebbe essere:

```yaml
version: '3.8'

services:
  web:
    build: .
    ports:
      - "8080:80"
    volumes:
      - ./src:/var/www/html
    networks:
      - app-network
    depends_on:
      - db

  db:
    image: mysql:5.7
    environment:
      MYSQL_ROOT_PASSWORD: rootpassword
      MYSQL_DATABASE: collezione_db
      MYSQL_USER: user
      MYSQL_PASSWORD: password
    ports:
      - "3306:3306"
    networks:
      - app-network
    volumes:
      - dbdata:/var/lib/mysql

  phpmyadmin:
    image: phpmyadmin/phpmyadmin
    ports:
      - "8081:80"
    environment:
      PMA_HOST: db
    depends_on:
      - db
    networks:
      - app-network

networks:
  app-network:
    driver: bridge

volumes:
  dbdata:
    driver: local
```

### **Spiegazione del file `docker-compose.yml`**

- **services**: Definisce i container (o servizi) che compongono l'applicazione.
  - **web**: È il servizio per PHP con Apache. Costruisce l'immagine dal Dockerfile e monta la cartella del progetto locale all'interno del container.
  - **db**: È il servizio per il database MySQL. Definisce la password, il database e le credenziali per l'utente.
  - **phpmyadmin**: È un servizio opzionale che ti permette di gestire il database MySQL tramite un'interfaccia web.
  
- **networks**: Definisce la rete interna tra i container. In questo modo, i servizi possono comunicare tra di loro.
  
- **volumes**: Definisce un volume per mantenere persistenti i dati del database anche dopo l'arresto o la rimozione del container.

---

### **Come Usare Docker con PHP: Esempio Pratico**

1. **Crea la struttura del progetto**:

```
/progetto-php-docker
│
├── docker-compose.yml
├── Dockerfile
└── src/
    └── index.php
```

2. **Il file `index.php` in `src/`**:

```php
<?php
echo "Benvenuto nella tua app PHP su Docker!";
```

3. **Avvia l'ambiente Docker**:

Vai nella cartella principale del progetto e esegui:

```bash
docker-compose up --build
```

Questo comando:

- Costruisce l'immagine Docker a partire dal Dockerfile.
- Avvia i container per PHP, MySQL e PhpMyAdmin.

Apri il browser e vai su `http://localhost:8080` per vedere l'app PHP in esecuzione. Puoi accedere a PhpMyAdmin su `http://localhost:8081`.

---

### **Comandi Utili di Docker**

- **Avviare i container**:

  ```bash
  docker-compose up
  ```

- **Costruire (build) l'immagine e avviare i container**:

  ```bash
  docker-compose up --build
  ```

- **Arrestare i container**:

  ```bash
  docker-compose down
  ```

- **Verificare i container in esecuzione**:

  ```bash
  docker ps
  ```

- **Eseguire un comando all'interno di un container**:

  ```bash
  docker exec -it nome-container bash
  ```

---

### **Autoloading con Composer e Docker**

Docker si integra perfettamente con **Composer** per gestire le dipendenze. All'interno del container PHP, puoi usare Composer per installare e gestire le librerie:

1. Aggiungi **Composer** al Dockerfile:

```Dockerfile
# Aggiungi Composer al container PHP
COPY --from=composer:latest /usr/bin/composer /usr/bin/composer
```

2. **Esegui Composer all'interno del container**:

Dopo aver avviato Docker, puoi entrare nel container PHP ed eseguire Composer per installare le dipendenze:

```bash
docker exec -it nome-container bash
composer install
```

---

### **Conclusione**

Docker è un potente strumento per creare ambienti di sviluppo PHP flessibili, replicabili e portabili. Con Docker, puoi configurare server PHP, database, e altri componenti in pochi passaggi, migliorando la consistenza tra l'ambiente di sviluppo locale e quello di produzione. Utilizzando Docker Compose, è possibile gestire e orchestrare facilmente più container, permettendo uno sviluppo più modulare e semplificato.
