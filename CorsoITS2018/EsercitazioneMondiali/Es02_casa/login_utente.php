
<?php include 'connessione.php' ?>
<html>
<head>
	<link href="stile.css" rel="stylesheet" type="text/css">
	
</head>
<body>
<div class="login">
	<h1><img src="https://cc-media-foxit.fichub.com/image/fox-it-foxsports/30412b56-c2a5-4871-a231-806f618d99e2/mondiali-2018-128x128.png"></h1>
    <form method="post">
    	<input type="text" name="u" placeholder="Username" required="required" />
        <input type="password" name="p" placeholder="Password" required="required" />
        <button type="submit" class="btn btn-primary btn-block btn-large">Login </button>
    </form>
</div>

 <script>
 $("#login-button").click(function(event){
		 event.preventDefault();
	 
	 $('form').fadeOut(500);
	 $('.wrapper').addClass('form-success');
});
 </script>
</body>
</htmtl>