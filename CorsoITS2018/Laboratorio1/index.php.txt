<h1>Hello, World!</h1>

<?php 

$a = "ciao, ";
$b = "mondo!";
$c = $a + $b;
echo $c;

$studente1 = "Drago, Giovanni, 1997";
$studente2 = "Fanti, Daniele, 1990";
$studente3 = "Senis, Lorenzo, 1997";
$studente4 = "Grosso, Claudio, 1991";
$studente5 = "Pontandolfo, Andrea, 1992";

$studente6 = "Lopresti, Alessandro, 1994";
$studente7 = "Russo, Simone, 1996";
$studente8 = "Bruscolini, Simone, 1996";
$studente9 = "Petti, Riccardo, 1997";
$studente10 = "Leorda, Alexandru, 1998";
$studente11 = "Cuccu, Valentina, 1998";
$studente12 = "Greco, Simona, 1995";
$studente13 = "Scebba, Lorenzo, 1998";

$studente14 = "Paquola, Gabriel, 1995";
$studente15 = "Barison, Mirco, 1997";
$studente16 = "Dolce, Davide, 1997";
$studente17 = "Maiorana, Emmanuel, 1997";
$studente18 = "Dalponte, Alberto, 1985";
$studente19 = "Pop, Alexandru, 1998";
$studente20 = "Stella, Fabio, 1998";

$studente21 = "Casa, Umberto, 1997";
$studente22 = "Madlena, Giulio, 1995";
$studente23 = "Remondino, Elia, 1998";
$studente24 = "Fornerone, Luca, 1997";
$studente25 = "Miccoli, JeanPierre, 1993";
$studente26 = "Xhafaj, Denerit, 1992";

$studenti  = array(

 "Drago, Giovanni, 1997",
 "Fanti, Daniele, 1990",
 "Senis, Lorenzo, 1997",
 "Grosso, Claudio, 1991",
 "Pontandolfo, Andrea, 1992",

 "Lopresti, Alessandro, 1994",
 "Russo, Simone, 1996",
 "Bruscolini, Simone, 1996",
 "Petti, Riccardo, 1997",
 "Leorda, Alexandru, 1998",
 "Cuccu, Valentina, 1998",
 "Greco, Simona, 1995",
 "Scebba, Lorenzo, 1998",

"Paquola, Gabriel, 1995",
"Barison, Mirco, 1997",
"Dolce, Davide, 1997",
"Maiorana, Emmanuel, 1997",
"Dalponte, Alberto, 1985",
"Pop, Alexandru, 1998",
"Stella, Fabio, 1998",

"Casa, Umberto, 1997",
"Madlena, Giulio, 1995",
"Remondino, Elia, 1998",
"Fornerone, Luca, 1997",
"Miccoli, JeanPierre, 1993",
"Xhafaj, Denerit, 1992",

	);

//echo "Hello, World!" 
for ($i=0; $i < count($studenti); $i++) { 
	echo "<h2>".  $studenti[$i] . "</h2>";
}



?>

<p>qui  scrivi come vuoi, ma se metti codice php: <?php echo "capito!?" ?></p>