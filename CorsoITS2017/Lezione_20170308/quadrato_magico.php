<html>
<head>
	<title></title>

<style type="text/css">

body
{ 
	max-width: 1024px;
	background-color: orange;
	padding: auto;
	font-size: 12px;
}
div{clear: left;}
h1 {
		text-align: center;
		font-size: 1.3em;
		width: auto;
		height: 10%;
		border: 1px dotted red;
		margin: auto;
}
table {padding: 5px; border: 2px dashed red; float:left;font-size: 2em;}
td { background-color: black; color: white; text-align: center; padding: 5px;   }
</style>

</head>
<body>
<?php 

$numeri  = [[1,2,3],
			[4,5,6],
			[7,8,9]
			];

//         echo "<h2>";
//  		var_dump($numeri);
//         echo "</h2>";



//  while( list($chiave, $valore) = each($numeri) ){
//         echo "<h1>";
//         echo "\$numeri[$chiave] $chiave <br />";
//         echo "</h1>";
//         echo "<h2>";
//  		print_r($valore);
//         echo "</h2>";
//  }

		for ($e=0; $e < 3; $e++) { 
			for ($i=0; $i < 3; $i++) { 
				shuffle($numeri);
		# code...

				echo "<table>";
				foreach ($numeri as $value) {
					echo "<tr>";
					shuffle($value);
					foreach ($value as $numero) {
						echo "<td>$numero</td>";		
					}
					echo "</tr>";

				}
				echo "</table>";
			}
			echo "<div></div>";
		}




 ?>





</body>
</html>