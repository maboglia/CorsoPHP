# Database in PHP

![API DB](https://github.com/maboglia/CorsoPHP/raw/master/appunti/img/big_picture.png)

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