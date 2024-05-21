Introduzione:
Questo codice dimostra l'utilizzo delle funzioni di inclusione in PHP per integrare altri file all'interno di un file PHP principale. Le inclusioni consentono di suddividere il codice in più file per renderlo più organizzato, manutenibile e riutilizzabile.
Commenti al codice:
```php
<?php
	// Inclusione dei file delle funzioni e dell'intestazione
	include("included_functions.php");
	include("included_header.php");
?>
<!-- Stampa del messaggio indicante che l'intestazione è stata inclusa -->
The header has been included.
<br />
<!-- Utilizzo della funzione hello() inclusa per salutare tutti -->
<?php echo hello("Everyone");
?><br />
</body>
</html>
```
Questi commenti chiariscono l'uso delle direttive `include` per incorporare il contenuto dei file `included_functions.php` e `included_header.php` nel file principale. Ciò consente di accedere alle funzioni definite nel file delle funzioni e di visualizzare l'intestazione definita nel file dell'intestazione.