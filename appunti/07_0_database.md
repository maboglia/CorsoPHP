# Database in PHP

![API DB](https://github.com/maboglia/CorsoPHP/raw/master/appunti/img/big_picture.png)

---

**La gestione del database con PHP**

PHP offre strumenti potenti per la gestione dei database, permettendo di interagire facilmente con database come MySQL, PostgreSQL e altri. Due delle principali estensioni per gestire database in PHP sono **MySQLi** e **PDO** (PHP Data Objects).

- **MySQLi** è specifico per MySQL e offre sia un'interfaccia procedurale che orientata agli oggetti. Supporta operazioni avanzate come le transazioni e il binding dei parametri.
  
- **PDO** è un'interfaccia generica che supporta numerosi database, offrendo un approccio flessibile e sicuro. Con PDO è possibile preparare query, gestire transazioni e fare il **binding dei parametri**, aiutando a prevenire attacchi di SQL injection.

**Esempio PDO**:

```php
$dsn = 'mysql:host=localhost;dbname=testdb';
$pdo = new PDO($dsn, 'username', 'password');
$stmt = $pdo->prepare('SELECT * FROM utenti WHERE id = :id');
$stmt->execute([':id' => 1]);
$risultato = $stmt->fetch();
```

**Sicurezza**: Preparare le query e fare il binding dei valori è cruciale per prevenire attacchi di SQL injection, garantendo che i dati dell'utente non possano compromettere il database.

Con PHP, gestire un database diventa più efficiente, sicuro e flessibile grazie a MySQLi e PDO, offrendo agli sviluppatori strumenti potenti per creare applicazioni web dinamiche e robuste.

---

## Database, connessione

1. Crea una connessione al database
2. Invia una richiesta al DB
3. Usa i dati ricevuti, se disponibili
4. Rilascia i dati in memoria
5. Chiudi la connessione

---

## API

![API DB](https://github.com/maboglia/CorsoPHP/raw/master/appunti/img/api_DB.png)

* mysql
  * Api originali, deprecate, disabilitate dalla versione 7
* mysqli
  * I=Improved: API migliorate, permettono il procedurale e supportano OOP
* PDO
  * PHP Data Objects

---

![API DB](https://github.com/maboglia/CorsoPHP/raw/master/appunti/img/api_DB2.png)

---

## mysqli procedurale o object orinted

![API DB](https://github.com/maboglia/CorsoPHP/raw/master/appunti/img/api_DB_OOP.png)

---

## prevenire SQL Injections

![API DB](https://github.com/maboglia/CorsoPHP/raw/master/appunti/img/sql_injection.png)

---

### riferimenti

[manuale php](http://php.net/manual/en/mysqlinfo.api.choosing.php)