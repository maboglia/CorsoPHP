<form method="post">
	<input type="text" name="op1">
	<input type="text" name="op2">
	<input type="submit" name="somma" value="somma">
	<select name="operazione">
		<option value="addizione"> addizione </option>
		<option value="sottrazione"> sottrazione </option>
		<option value="moltiplicazione"> moltiplicazione </option>
		<option value="divisione"> divisione </option>
	</select>

</form>


<?php 
 function computer($value='')
{
	if ($value=="asus") {
		echo "bella scelta \n";
	}
	//return $value;

}

function somma($a, $b,$operazione){
$c=0;
switch ($operazione) {
		case "addizione": $c=$a+$b;break;
		case "sottrazione": $c=$a-$b;break;
		case "moltiplicazione": $c=$a*$b;break;
		case "divisione": $c=$a/$b;break;
}

 return $c;
}


//echo "computer: ".computer("asus");

if ($_POST["somma"]) {
	# code...
$a = $_POST["op1"]; $b = $_POST["op2"]; $operazione = $_POST["operazione"];
echo "la somma è : ".somma($a,$b,$operazione); 
}
//echo $_SERVER["SERVER_ADDR"];




 ?>