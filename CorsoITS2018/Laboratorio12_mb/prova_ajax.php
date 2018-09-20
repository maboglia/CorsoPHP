<!DOCTYPE html>
<html>
<head>
	<title></title>


</head>
<body>
	<input type="text" name="nome" id="nome">
	<button onclick="caricaAjax()">premi qui</button>
	<div id="testAjax"></div>

	<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
	<script>
		$("#testAjax")
			.text("scrivo un testo...")
			.css("color", "red");

function caricaAjax(){
	
	let nome = $("#nome").val();

		$.ajax({
			  url: "script.php",
			  method: "POST",
			  data: { id : nome },
			  dataType: "html"
			}).done(function (argument) {
				$("#testAjax")
			.append(argument);
			});
}
	</script>

</body>
</html>

<?php  ?>