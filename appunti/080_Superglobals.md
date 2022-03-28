# Superglobals

Diverse variabili predefinite in PHP sono "superglobali", il che significa che sono disponibili in tutti gli ambiti in uno script. Non è necessario eseguire la variabile $ globale; per accedervi all'interno di funzioni o metodi

Nome|Descrizione
---|---
$GLOBALS| Contains all global variables, including other superglobals.
$_GET|Contiene le variabili inviate via HTTP GET request.
$_POST|Contiene le variabili inviate via HTTP POST request.
$_FILES|Contiene le variabili inviate via HTTP POST file upload.
$_COOKIE|Contiene le variabili inviate via HTTP cookies.
$_SESSION|Contiene le variabili memorizzate nella sessione utente `session`.
$_REQUEST|Contiene le variabili inviate via `$_GET` , `$_POST` , ed eventualmente $_COOKIE.
$_SERVER|Contiene le informazioni sul web server e le request effettuate.
$_ENV|Contiene tutte le variabili settate sul web server.

