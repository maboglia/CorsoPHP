## Connessione PDO

```php 
/*connessione*/

$database="quiz";

try {
	$connessione = new PDO("mysql:host=localhost;dbname=".$database.";charset=utf8", $user, $password);
	if($connessione){
		global $connessione;
	}

	
} catch (PDOException $e) {
		echo $e->getMessage();
}
```

## Connessione MySQLi - object oriented

```php 

    $connessione = new MySQLi($DBhost,$DBuser,$DBpass,$DBname);
    
     if ($connessione->connect_errno) {
         die("ERROR : -> ".$connessione->connect_error);
     }
```

## Connessione MySQLi - procedural

```php 

$connessione = mysqli_connect(HOST, USER, PASS, DB);

if (mysqli_connect_errno()){
    die("La connessione al db non è riuscita..." . mysqli_connect_error());
}

```