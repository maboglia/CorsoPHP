# reindirizzamento a una nuova pagina in base al valore del parametro "logged_in" passato nell'URL. 

Se il valore di "logged_in" è "1", viene reindirizzato alla pagina "basic.html", altrimenti viene reindirizzato a "http://www.example.com".

---

## Commenti al codice:


```php
<?php
	// Questa è la funzione per reindirizzare a una nuova pagina
	function redirect_to($new_location) {
	header("Location: " . $new_location);
	// 	Reindirizza alla nuova posizione
			exit;
	// 	Termina lo script
}

// Controlla se è stato passato il parametro 'logged_in' nell'URL
	if (isset($_GET['logged_in'])) {
		$logged_in = $_GET['logged_in']; // Ottiene il valore di 'logged_in'
	} else {
		$logged_in = 0; // Imposta il valore predefinito di 'logged_in' a 0
	}
	// Se 'logged_in' è uguale a "1", reindirizza a 'basic.html', altrimenti reindirizza a 'http://www.example.com'
	if ($logged_in == "1") {
		redirect_to("basic.html");
	} else {
		redirect_to("http://www.example.com");
	}
?>
<html lang="en">
	<head>
		<title>Redirect</title>
	</head>
	<body>
	</body>
</html>
```

Questo codice PHP gestisce il reindirizzamento a una nuova pagina in base al valore del parametro "logged_in" passato nell'URL. Se il valore di "logged_in" è "1", viene reindirizzato alla pagina "basic.html", altrimenti viene reindirizzato a "http://www.example.com". La funzione `redirect_to()` è utilizzata per eseguire il reindirizzamento, utilizzando l'header "Location".

## First_page

```html

<html lang="en">
 <head>
  <title>First Page</title>
 </head>
 <body>
  
  <?php $link_name = "Second Page"; ?>
  <?php $id = 5; ?>
  <?php $company = "Johnson & Johnson"; ?>
  
  <a href="second_page.php?id=<?php echo $id; ?>&company=<?php echo rawurlencode($company); ?>"><?php echo $link_name; ?></a>

 </body>
</html>

```


## Second_page

```html

<html lang="en">
 <head>
  <title>Second Page</title>
 </head>
 <body>

  <pre>
   <?php
    // print_r($_GET);
   ?>
  </pre>

  <?php
   $id = $_GET['id'];
   echo $id;  
  ?>
  <br />
  <?php
   $company = $_GET['company'];
   echo $company;  
  ?>
  
 </body>
</html>
```