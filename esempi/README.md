# PHP Code snippets

## Informazioni su PHP

```php
<?php phpinfo(); ?>
```
---

## Hello World!

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Hello World</title>
	</head>
	<body>
		<?php echo "Hello World!"; ?><br />
		<?php echo 'Hello World!'; ?><br />
		<?php echo "Hello" . " World!"; ?><br />
		<?php echo 2 + 3; ?>
	</body>
</html>
```


---

## variabili

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Variables</title>
	</head>
	<body>
	<?php
	
	$var1 = 10;
	echo $var1;
	
	echo "<br />";
	
	$var1 = 100;
	echo $var1;
	
	echo "<br />";
	
	$var2 = "Hello world";
	echo $var2;
	
	?>
	</body>
</html>
```


---

## stringhe

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Strings</title>
	</head>
	<body>
	<?php
	
	echo "Hello World<br />";
	echo 'Hello World<br />';

	$greeting = "Hello";
	$target = "World";
	$phrase = $greeting . " " . $target;
	echo $phrase;
	?>
	<br />
	<?php
	
	echo "$phrase Again<br />";
	echo '$phrase Again<br />';
	echo "{$phrase}Again<br />";
	
	?>

	</body>
</html>
```


---

## funzioni per le stringhe

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>String Functions</title>
	</head>
	<body>
	<?php

	$first = "The quick brown fox";
	$second = " jumped over the lazy dog.";
	
	$third = $first;
	$third .= $second;
	echo $third;

	?>
	<br />
	Lowercase: <?php echo strtolower($third); ?><br />
	Uppercase: <?php echo strtoupper($third); ?><br />
	Uppercase first: <?php echo ucfirst($third); ?><br />
	Uppercase words: <?php echo ucwords($third); ?><br />
	<br />
	Length: <?php echo strlen($third); ?><br />
	Trim: <?php echo "A" . trim(" B C D ") . "E"; ?><br />
	Find: <?php echo strstr($third, "brown"); ?><br />
	Replace by string: <?php echo str_replace("quick", "super-fast", $third); ?><br />
	<br />
	Repeat: <?php echo str_repeat($third, 2); ?><br />
	Make substring: <?php echo substr($third, 5, 10); ?><br />
	Find position: <?php echo strpos($third, "brown"); ?><br />
	Find character: <?php echo strchr($third, "z"); ?><br />
	
	</body>
</html>
```


---

## interi

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Integers</title>
	</head>
	<body>
		<?php
			$var1 = 3;
			$var2 = 4;
		?>
		Basic Math: <?php echo ((1 + 2 + $var1) * $var2) / 2 - 5; ?><br />
		<br />
		Absolute value: 	<?php echo abs(0 - 300); 	?><br />
		Exponential: 			<?php echo pow(2,8); 			?><br />
		Square root: 			<?php echo sqrt(100); 		?><br />
		Modulo: 					<?php echo fmod(20,7); 		?><br />
		Random: 					<?php echo rand(); 				?><br />
		Random (min,max): <?php echo rand(1,10); 		?><br />
		<br />
		+= : <?php $var2 += 4; echo $var2; ?><br />
		-= : <?php $var2 -= 4; echo $var2; ?><br />
		*= : <?php $var2 *= 3; echo $var2; ?><br />
		/= : <?php $var2 /= 4; echo $var2; ?><br />
		<br />
		Increment: <?php $var2++; echo $var2; ?><br />
		Decrement: <?php $var2--; echo $var2; ?><br />
		<br />
		<?php
			// PHP will convert a string to an integer
			// but it is sloppy programming
			echo 1 + "2 houses";
		?>
	</body>
</html>
```

---

## float

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Floating Point Numbers</title>
	</head>
	<body>

		<?php echo $float = 3.14; ?><br />
		<?php echo $float + 7; ?><br />
		<?php echo 4/3; ?><br />

		<?php echo 4/0; ?><br />
		<br />
		Round: 		<?php echo round($float, 1); 	?><br />
		Ceiling: 	<?php echo ceil($float); 			?><br />
		Floor: 		<?php echo floor($float); 		?><br />
		<br />
		
		<?php $integer = 3; ?>
		
		<?php echo "Is {$integer} integer? " . is_int($integer); ?><br />
		<?php echo "Is {$float} integer? " . is_int($float); ?><br />
		<br />
		<?php echo "Is {$integer} float? " . is_float($integer); ?><br />
		<?php echo "Is {$float} float? " . is_float($float); ?><br />
		<br />
		<?php echo "Is {$integer} numeric? " . is_numeric($integer); ?><br />
		<?php echo "Is {$float} numeric? " . is_numeric($float); ?><br />
		<br />

	</body>
</html>
```


---

## array

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Arrays</title>
	</head>
	<body>
		<?php
		
			$numbers = array(4,8,15,16,23,42);
			echo $numbers[0];
		?>
		<br />
		
		<?php $mixed = array(6, "fox", "dog", array("x", "y", "z")); ?>
		<?php echo $mixed[2]; ?><br />
		<?php //echo $mixed[3]; ?><br />
		<?php //echo $mixed ?><br />
		
		<?php echo $mixed[3][1]; ?><br />
		
		<?php $mixed[2] = "cat"; ?>
		<?php $mixed[4] = "mouse"; ?>
		<?php $mixed[] = "horse"; ?>
		
		<pre>
		<?php echo print_r($mixed); ?>
		</pre>
		
		<?php 
			//PHP 5.4 added the short array syntax.
			$array = [1,2,3];
		?>
		
	</body>
</html>
```

---

## array associativi

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Associative Arrays</title>
	</head>
	<body>
		
		<?php $assoc = array("nome" => "Pippo", "cognome" => "Pluto"); ?>
		<?php echo $assoc["nome"]; ?><br />
		<?php echo $assoc["nome"] . " " . $assoc["cognome"]; ?><br />

		<?php $assoc["nome"] = "Larry"; ?>
		<?php echo $assoc["nome"] . " " . $assoc["cognome"]; ?><br />

		<?php // echo $assoc[0]; ?><br />

		<?php $numbers = array(4,8,15,16,23,42); ?>
		<?php $numbers = array(0 => 4, 1 => 8, 2 => 15, 3 => 16, 4 => 23, 5 => 42); ?>
		<?php echo $numbers[0]; ?>
		
	</body>
</html>
```

---

## funzioni per array

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Array Functions</title>
	</head>
	<body>
		
		<?php $numbers = array(8,23,15,42,16,4); ?>
		
		Count: 				<?php echo count($numbers); ?><br />
		Max value: 		<?php echo max($numbers); 	?><br />
		Min value: 		<?php echo min($numbers); 	?><br />
		<br />
		<pre>
		Sort: 	 			<?php sort($numbers);  print_r($numbers); ?><br />
		Reverse sort: <?php rsort($numbers); print_r($numbers); ?><br />
		</pre>
		<br />
		Implode: 			<?php echo $num_string = implode(" * ", $numbers); ?><br />
		Explode: 			<?php print_r(explode(" * ", $num_string)); ?><br />
		<br />
		
		15 in array?: <?php echo in_array(15, $numbers); // returns T/F ?><br />
		19 in array?: <?php echo in_array(19, $numbers); // returns T/F ?><br />
		

	</body>
</html>
```

---

## booleans

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Booleans</title>
	</head>
	<body>

		<?php
			$result1 = true;
			$result2 = false;
		?>
		Result1: <?php echo $result1; ?><br />
		Result2: <?php echo $result2; ?><br />
		
		result2 is boolean? <?php echo is_bool($result2); ?>
		<br />
		
		<?php
			$number = 3.14;
			if( is_float($number) ) {
				echo "It is a float.";
			}
		
		?>
	</body>
</html>
```

---

## null

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>NULL</title>
	</head>
	<body>

		<?php
			$var1 = null;
			$var2 = "";
		?>
		var1 null? <?php echo is_null($var1); ?><br />
		var2 null? <?php echo is_null($var2); ?><br />
		var3 null? <?php echo is_null($var3); ?><br />
		<br />
		var1 is set? <?php echo isset($var1); ?><br />
		var2 is set? <?php echo isset($var2); ?><br />
		var3 is set? <?php echo isset($var3); ?><br />
		<br />
		
		<?php // empty: "", null, 0, 0.0, "0", false, array() ?>
		
		<?php $var3 = "0"; ?>
		var1 empty? <?php echo empty($var1); ?><br />
		var2 empty? <?php echo empty($var2); ?><br />
		var3 empty? <?php echo empty($var3); ?><br />
		
	</body>
</html>
```

---

## Type casting

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Type Juggling and Type Casting</title>
	</head>
	<body>
		
		Type Juggling<br />
		<?php $count = "2 cats"; ?>
		Type: <?php echo gettype($count); ?><br />
		
		<?php $count += 3; ?>
		Type: <?php echo gettype($count); ?><br />

		<?php $cats = "I have " . $count . " cats."; ?>
		Cats: <?php echo gettype($cats); ?><br />
		<br />
		
		Type Casting<br />
		<?php settype($count, "integer"); ?>
		count: <?php echo gettype($count); ?><br />
		
		<?php $count2 = (string) $count; ?>
		count: <?php echo gettype($count); ?><br />
		count2: <?php echo gettype($count2); ?><br />
		<br />
		
		<?php $test1 = 3; ?>
		<?php $test2 = 3; ?>
		<?php settype($test1, "string"); ?>
		<?php (string) $test2; ?>
		test1: <?php echo gettype($test1); ?><br />
		test2: <?php echo gettype($test2); ?><br />
		
	</body>
</html>
```

---

## costanti

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Constants</title>
	</head>
	<body>

		<?php
			$max_width = 980;
			
			define("MAX_WIDTH", 980);
			echo MAX_WIDTH;
		?>
		<br />
		<?php // can't change the value
		//MAX_WIDTH = MAX_WIDTH + 1
		//echo MAX_WIDTH;
		?>

		<?php // can't even redefine it
		define("MAX_WIDTH", 981);
		echo MAX_WIDTH;
		?>

	</body>
</html>
```

---

## operatori logici

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Logical</title>
	</head>
	<body>
		
		<?php
			$a = 3;
			$b = 4;
			
			if ($a > $b) {
				echo "a is larger than b";
			}
			if ($a < $b) {
				echo "a is not larger than b";
			}

		
		?>
		<br />
		<?php // Only welcome new users
			$new_user = true;
			if ($new_user) {
				echo "<h1>Welcome!</h1>";
				echo "<p>We are glad you decided to join us.</p>";
			}
		?>
		<br />
		
		<?php // don't divide by zero
			$numerator = 20;
			$denominator = 0;
			$result = 0;
			if ($denominator > 0) {
				$result = $numerator / $denominator;
			}
			echo "Result: {$result}";
		?>
		
		

	</body>
</html>
```

---

## operatori

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Comparison and Logical Operators</title>
	</head>
	<body>

		<?php
			$a = 4;
			$b = 3;
			$c = 1;
			$d = 20;
			if (($a >= $b) || ($c >= $d)) {
				echo "a is larger than b OR ";
				echo "c is larger than d";
			}
		?>
		<br />
		<?php
			$e = 100;
			if (!isset($e)) {
				$e = 200;
			}
			echo $e;
		?>
		<br />
		<?php
			// don't reject 0 or 0.0
			$quantity = "";
			if (empty($quantity) && !is_numeric($quantity)) {
				echo "You must enter a quantity.";
			}
		?>
		
		
	</body>
</html>
```

---

## switch

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Switch</title>
	</head>
	<body>
		<?php
			$a = 2;
			
			switch ($a) {
				case 0:
					echo "a equals 0<br />";
					break;
				case 1:
					echo "a equals 1<br />";
					break;
				case 2:
					echo "a equals 2<br />";
					break;
				case 3:
					echo "a equals 3<br />";
					break;
				default:
					echo "a is not 0, 1, 2, or 3<br />";
					break;
			}
		
		?>
		
		<?php
		// ChineseZodiac
		// whitespace doesn't matter
		// colons, semicolons and breaks do
		$year = 2013;
		switch (($year - 4) % 12) {
			case  0: $zodiac = 'Rat'; 		break;
			case  1: $zodiac = 'Ox'; 			break;
			case  2: $zodiac = 'Tiger'; 	break;
			case  3: $zodiac = 'Rabbit'; 	break;
			case  4: $zodiac = 'Dragon'; 	break;
			case  5: $zodiac = 'Snake'; 	break;
			case  6: $zodiac = 'Horse'; 	break;
			case  7: $zodiac = 'Goat'; 		break;
			case  8: $zodiac = 'Monkey';  break;
			case  9: $zodiac = 'Rooster'; break;
			case 10: $zodiac = 'Dog'; 		break;
			case 11: $zodiac = 'Pig'; 		break;
		}
		echo "{$year} is the year of the {$zodiac}.<br />";
		?>
		
		<?php // case with multiple values

			$user_type = 'customer';
			
			switch ($user_type) {
				case 'student':
					echo "Welcome!";
					break;
				case 'press':
				case 'customer':
				case 'admin':
					echo "Hello!";
					break;
			}
		?>
		
	</body>
</html>
```

---

## cicli while

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Loops: while</title>
	</head>
	<body>

		<?php
			$count = 0;
			while ($count <= 10) {
				if ($count == 5) {
					echo "FIVE, ";
				} else {
					echo $count . ", ";
				}
				$count++;  // increment by 1
			}
			echo "<br />";
			echo "Count: {$count}";
		?>

		<br />
		<br />
		<?php // On your own exercise
		
			$count = 1;
			while ($count < 20) {
				if($count % 2 == 0) {
					echo "{$count} is even<br />";
				} else {
					echo "{$count} is odd<br />";
				}
				$count++;
			}
		
		?>
	</body>
</html>
```

---

## cicli for

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Loops: for</title>
	</head>
	<body>

		<?php // while loop example
		  $count = 0;
		  while ($count <= 10) {
		    echo $count . ", ";
		    $count++;
		  }
		?>
		<br />
		<?php
		
			for($count = 0; $count <= 10; $count++) {
		    echo $count . ", ";
			}
		
		?>
		
		<br />
		<?php

			for ($count = 20; $count > 0; $count--) {
				if ($count % 2 == 0) {
					echo "{$count} is even.<br />";
				} else {
					echo "{$count} is odd.<br />";
				}
		  }

		?>
		

	</body>
</html>
```

---

## foreach

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Loops: foreach</title>
	</head>
	<body>

		<?php
		  $ages = array(4,8,15,16,23,42);

		  foreach($ages as $age) {
		    echo "Age: {$age}<br />";
		  }
		?>

		<br />
		<?php // foreach using assoc. array

			$person = array(
									"nome" => "Pippo", 
									"cognome"  => "Pluto",
									"indrizzo"    => "Via Roma, 1",
									"citta"       => "Milano",
									"provincia"      => "MI",
									"CAP"   => "20100"
								);

		  foreach($person as $attribute => $data) {
				$attr_nice = ucwords(str_replace("_", " ", $attribute));
		    echo "{$attr_nice}: {$data}<br />";
		  }
		?>
		
		<br />
		<?php
		  $prices = array("Brand New Computer" => 2000,
		                  "1 month of example.com" => 25,
		                  "Learning PHP" => null);

		  foreach($prices as $item => $price) {
		    echo "{$item}: ";
		    if (is_int($price)) {
		      echo "$" . $price;
		    } else {
		      echo "priceless";
		    }
		    echo "<br />";
		  }

		?>
		

	</body>
</html>
```

---

## continue

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Continue</title>
	</head>
	<body>

		<?php
			for ($count=0; $count <= 10; $count++) {
				if ($count % 2 == 0) { continue; }
				echo $count . ", ";
			}
		?>
		
		<?php // what's wrong with this?

			$count = 0;
			while ($count <= 10) {
				if ($count == 5) {
					$count++;
					continue;
				}
				echo $count . ", ";
				$count++;
			}

		?>
		
		<br />
		<?php // loop inside a loop with continue

			for ($i=0; $i<=5; $i++) {
				if ($i % 2 == 0) { continue(1); }
				for ($k=0; $k<=5; $k++) {
					if ($k == 3) { continue(2); }
			  	echo $i . "-" . $k . "<br />";
				}
			}

		?>
		

	</body>
</html>
```

---

## break

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Break</title>
	</head>
	<body>

		<?php
			for ($count=0; $count <= 10; $count++) {
				if ($count == 5) {
					break;
				}
				echo $count . ", ";
			}
		?>
		
		<br />
		<?php // loop inside a loop with break

			for ($i=0; $i<=5; $i++) {
				if ($i % 2 == 0) { continue(1); }
				for ($k=0; $k<=5; $k++) {
					if ($k == 3) { break(2); }
			  	echo $i . "-" . $k . "<br />";
				}
			}

		?>
		

	</body>
</html>
```

---

## pointers - puntatori

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Pointers</title>
	</head>
	<body>

		<?php
		
			$ages = array(4,8,15,16,23,42);
		
			// current: current pointer value
			echo "1: " . current($ages) . "<br />";
		
			// next: move the pointer forward
			// similar to using 'continue' inside a loop
			next($ages);
			echo "2: " . current($ages) . "<br />";

			next($ages);
			next($ages);
			echo "3: " . current($ages) . "<br />";
		
			// prev: move the pointer backward
			prev($ages);
			echo "4: " . current($ages) . "<br />";
		
			// reset: move the pointer to the first element
			reset($ages);
			echo "5: " . current($ages) . "<br />";

			// end: move the pointer to the last element
			end($ages);
			echo "6: " . current($ages) . "<br />";
		
			// move the pointer past the last element
			next($ages);
			echo "7: " . current($ages) . "<br />";
		
		?>
		<br />

		<?php
			reset($ages);
			
			// while loop that moves the array pointer
			// similar to foreach
			while($age = current($ages)) {
				echo $age . ", ";
				next($ages);
			}
		?>
		
	</body>
</html>
```

---

## funzioni

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Functions: Defining</title>
	</head>
	<body>

		<?php
		
			function say_hello() {
				echo "Hello World!<br />";
			}
		
			say_hello();
			
			function say_hello_to($word) {
				echo "Hello {$word}!<br />";
			}

			say_hello_to("World");
			say_hello_to("Everyone");
			
			say_hello_loudly();
			
			function say_hello_loudly() {
				echo "HELLO WORLD!<br />";
			}

			// function say_hello_loudly() {
			// 	echo "We can't redefine a function.";
			// }
			
		?>
	</body>
</html>
```

---

## funzioni con argomenti

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Functions: Arguments</title>
	</head>
	<body>

		<?php

		  function say_hello_to($word) {
		    echo "Hello {$word}!<br />";
		  }

			$name = "John Doe";
			say_hello_to($name);

		?>
		
		<?php
		
			function better_hello($greeting, $target, $punct) {
				echo $greeting . " " . $target . $punct . "<br />";
			}
		
			better_hello("Hello", $name, "!");
			better_hello("Greetings", $name, "!!!");

			better_hello("Greetings", $name, null);
		
		?>

	</body>
</html>
```

---

## funzioni con ritorno di valori

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Functions: Return Values</title>
	</head>
	<body>

		<?php

		  function add($val1, $val2) {
		    $sum = $val1 + $val2;
				return $sum;
		  }
		
			$result1 = add(3,4);
			$result2 = add(5,$result1);
			echo $result2;

		?>
		<br />
		<?php // Chinese Zodiac as a function

			function chinese_zodiac($year) {
			  switch (($year - 4) % 12) {
			    case  0: return 'Rat';
			    case  1: return 'Ox';
			    case  2: return 'Tiger';
			    case  3: return 'Rabbit';
			    case  4: return 'Dragon';
			    case  5: return 'Snake';
			    case  6: return 'Horse';
			    case  7: return 'Goat';
			    case  8: return 'Monkey';
			    case  9: return 'Rooster';
			    case 10: return 'Dog';
			    case 11: return 'Pig';
			  }
			}
			
			$zodiac = chinese_zodiac(2013);
			echo "2022 is the year of the {$zodiac}.<br />";

			echo "2023 is the year of the " . chinese_zodiac(2023) . ".<br />";

		?>
		<br />
		
		<?php
		
			function better_hello($greeting, $target, $punct) {
				return $greeting . " " . $target . $punct . "<br />";
			}
		
			echo better_hello("Hello", "John Doe", "!");
		
		?>
		

	</body>
</html>
```

---

## funzioni con ritorno multiplo

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Functions: Multiple Returns</title>
	</head>
	<body>
		
		<?php

			function add_subt($val1, $val2) {
			  $add = $val1 + $val2;
			  $subt = $val1 - $val2;
			  return array($add, $subt);
			}

			$result_array = add_subt(10,5);
			echo "Add: " . $result_array[0] . "<br />";
			echo "Subt: " . $result_array[1] . "<br />";

			list($add_result, $subt_result) = add_subt(20,7);
			echo "Add: " . $add_result . "<br />";
			echo "Subt: " . $subt_result . "<br />";

		?>
		
	</body>
</html>
```

---

## scope funzioni 

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Functions: Scope</title>
	</head>
	<body>
		
		<?php
		
			$bar = "outside";   // global scope
			
			function foo() {
				global $bar;
				if (isset($bar)) {
					echo "foo: " . $bar . "<br />";
				}
				$bar = "inside";  // local scope
			}
		
			echo "1: " . $bar . "<br />";
			foo();
			echo "2: " . $bar . "<br />";
			
		
		?>
		
	</body>
</html>
```

--- 

## funzioni con valori  default

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Functions: Default Argument Values</title>
	</head>
	<body>

		<?php
		
			function paint($room="office",$color="red") {
				return "The color of the {$room} is {$color}.<br />";
			}
		
			echo paint();
			echo paint("bedroom", "blue");
			echo paint("bedroom", null);
			echo paint("bedroom");
			echo paint("blue");
		
		?>
	</body>
</html>
```

---

## debugging

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Debugging</title>
	</head>
	<body>
		<?php
			$number = 99;
			$string = "Bug?";
			$array = array(1 => "Homepage", 2 => "About Us", 3 => "Services");
			
			var_dump($number);
			var_dump($string);
			var_dump($array);
		
		?>
		<br />
		<pre>
		<?php
			// print_r(get_defined_vars());
		?>
		</pre>
		<br />
		<?php

			function say_hello_to($word) {
		    echo "Hello {$word}!<br />";
				var_dump(debug_backtrace());
			}

			say_hello_to('Everyone');
		?>
	</body>
</html>
```

---

## first-page

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>First Page</title>
	</head>
	<body>
		
		<?php $link_name = "Second Page"; ?>
		<?php $id = 2; ?>
		
		<a href="second_page.php?id=<?php echo $id; ?>"><?php echo $link_name; ?></a>

	</body>
</html>
```

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Second Page</title>
	</head>
	<body>

	</body>
</html>
```

---

## second - GET

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>First Page</title>
	</head>
	<body>
		
		<?php $link_name = "Second Page"; ?>
		<?php $id = 5; ?>
		
		<a href="second_page.php?id=<?php echo $id; ?>"><?php echo $link_name; ?></a>

	</body>
</html>
```

```php
<!DOCTYPE html>

<html lang="it">
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
	</body>
</html>
```

---

## passare parametri via GET

```php
<!DOCTYPE html>

<html lang="it">
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

```php
<!DOCTYPE html>

<html lang="it">
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

---

## urlencode

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>urlencode</title>
	</head>
	<body>
		
		<?php
			$page = "William Shakespeare";
			$quote = "To be or not to be";
			$link1 =  "/bio/" . rawurlencode($page) . "?quote=" . urlencode($quote);
			$link2 =  "/bio/" . urlencode($page) . "?quote=" . rawurlencode($quote);

			echo $link1 . "<br />";
			echo $link2 . "<br />";
		?>

	</body>
</html>
```

---

## htmlencoding

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>HTML encoding</title>
	</head>
	<body>
		
		<?php
			$linktext = "<Click> & learn more";
		?>

		<a href="">
			<?php echo htmlspecialchars($linktext); ?>
		</a>
		<br />

		<?php
		
			$text = "™£•“—é";
			echo htmlentities($text);
		
		?>
		
		<br />
		<?php // What to use when

		$url_page = "php/created/page/url.php";
		$param1 = "This is a string with < >";
		$param2 = "&#?*$[]+ are bad characters";
		$linktext = "<Click> & learn more";

		$url = "http://localhost/";
		$url .= rawurlencode($url_page);
		$url .= "?" . "param1=" . urlencode($param1);
		$url .= "&" . "param2=" . urlencode($param2);
		?>

		<a href="<?php echo htmlspecialchars($url); ?>">
		  <?php echo htmlspecialchars($linktext); ?>
		</a>
		
	</body>
</html>
```

---

## include

### included_functions

```php
<?php
	function hello($name) {
		return "Hello {$name}!";
	}
?>



### included_header.php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Includes</title>
	</head>
	<body>


<?php
	include("included_functions.php");
	include("included_header.php");
?>
	The header has been included.
	<br />
	<?php echo hello("Everyone"); ?><br />
	
	</body>
</html>
```

---

## headers

```php
<?php
	header("HTTP 1.1/ 404 Not Found");
	header("X-Powered-By: none of your business");
?>

<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Headers</title>
	</head>
	<body>

		<?php
			// This won't work... unless you have output
			// buffering turned on.
			// header("HTTP 1.1/ 404 Not Found");
		?>

		<pre>
			<?php
				print_r(headers_list());
			?>
		</pre>
	</body>
</html>
```

---

## redirect

```php
<?php
  // This is how you redirect to a new page
  function redirect_to($new_location) {
    header("Location: " . $new_location);
    exit;
  }
  
  $logged_in = $_GET['logged_in'];
  if ($logged_in == "1") {
    redirect_to("basic.html");
  } else {
    redirect_to("http://www.example.com");
  }
  
?>

<!DOCTYPE html>

<html lang="it">
  <head>
    <title>Redirect</title>
  </head>
  <body>

  </body>
</html>
```

---

## form processing

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Form</title>
	</head>
	<body>

		<form action="form_processing.php" method="post">
		  Username: <input type="text" name="username" value="" /><br />
		  Password: <input type="password" name="password" value="" /><br />
			<br />
		  <input type="submit" name="submit" value="Submit" />
		</form>

	</body>
</html>
```

---

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Form Processing</title>
	</head>
	<body>

		<pre>
		<?php
			print_r($_POST);
		?>
		</pre>
		<br />
		<?php
			$username = $_POST["username"];
			$password = $_POST["password"];
		
			echo "{$username}: {$password}";
		?>
		
	</body>
</html>
```

---

## form single page

### included_functions

```php
<?php
	function hello($name) {
		return "Hello {$name}!";
	}
	
	function redirect_to($new_location) {
		header("Location: " . $new_location);
		exit;
	}
	
?>
```

---

```php
<?php
	require_once("included_functions.php");
	
	if (isset($_POST['submit'])) {
		// form was submitted
		$username = $_POST["username"];
		$password = $_POST["password"];

		if ($username == "Pippo" && $password == "secret") {
			// successful login
			redirect_to("basic.html");
		} else {
			$message = "There were some errors.";
		}
	} else {
		$username = "";
		$message = "Please log in.";
	}
?>
```

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Form</title>
	</head>
	<body>

		<?php echo $message; ?><br />
		
		<form action="form_single.php" method="post">
		  Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" /><br />
		  Password: <input type="password" name="password" value="" /><br />
			<br />
		  <input type="submit" name="submit" value="Submit" />
		</form>

	</body>
</html>
```

--- 

## validazioni

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Validations</title>
	</head>
	<body>
		
		<?php
		
		// * presence
		$value = "x";
		if (!isset($value) || empty($value)) {
			echo "Validation failed.<br />";
		}
		
		// * string length
		// minimum length
		$value = "abcd";
		$min = 3;
		if (strlen($value) < $min) {
			echo "Validation failed.<br />";
		}
		// max length
		$max = 6;
		if (strlen($value) > $max) {
			echo "Validation failed.<br />";
		}
		
		// * type
		$value = "1";
		if (!is_string($value)) {
			echo "Validation failed.<br />";
		}
		
		// * inclusion in a set
		$value = "1";
		$set = array("1", "2", "3", "4");
		if (!in_array($value, $set)) {
			echo "Validation failed.<br />";
		}

		// * uniqueness
		// uses a database to check uniqueness
		
		// * format
		// use a regex on a string
		// preg_match($regex, $subject)
		if (preg_match("/PHP/", "PHP is fun.")) {
			echo "A match was found.";
		} else {
		  echo "A match was not found.";
		}
		
		$value = "nobody@nowhere.com";
		// preg_match is most flexible
		if (!preg_match("/@/", $value)) {
			echo "Validation failed.<br />";
		}
		// strpos is faster than preg_match
		// use === to make exact match with false
		if (strpos($value, "@") === false) {
		  echo "Validation failed.<br />";
		}
		
		?>

	</body>
</html>
```

---

## falsi positivi

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>False Positives</title>
	</head>
	<body>

		<?php

			function is_equal($value1, $value2) {
				$output = "{$value1} == {$value2}: ";
				if($value1 == $value2) {
					$output .= "true<br />";
				} else {
					$output .= "false<br />";
				}
				return $output;
			}
			
			echo is_equal(0, false);
			echo is_equal(4, true);
			echo is_equal(0, null);
			echo is_equal(0, "0");
			echo is_equal(0, "");
			echo is_equal(0, "a");
			echo is_equal("1", "01");
			echo is_equal("", null);
			echo is_equal(3, "3 dogs");
			echo is_equal(100, "1e2");
			echo is_equal(100, 100.00);
			echo is_equal("abc", true);
			echo is_equal("123", "   123");
			echo is_equal("123", "+0123");
			
		?>
		<br />
		<?php

			function is_exact($value1, $value2) {
				$output = "{$value1} === {$value2}: ";
				if($value1 === $value2) {
					$output .= "true<br />";
				} else {
					$output .= "false<br />";
				}
				return $output;
			}
			
			echo is_exact(0, false);
			echo is_exact(4, true);
			echo is_exact(0, null);
			echo is_exact(0, "0");
			echo is_exact(0, "");
			echo is_exact(0, "a");
			echo is_exact("1", "01");
			echo is_exact("", null);
			echo is_exact(3, "3 dogs");
			echo is_exact(100, "1e2");
			echo is_exact(100, 100.00);
			echo is_exact("abc", true);
			echo is_exact("123", "   123");
			echo is_exact("123", "+0123");
			
		?>


	</body>
</html>
```

---

## validation errors

```php
<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Validation Errors</title>
	</head>
	<body>
		
		<?php
		
		$errors = array();
		
		// * presence
		// use trim() so empty spaces don't count
		// use === to avoid false positives
		// empty() would consider "0" to be empty
		$value = trim("");
		if (!isset($value) || $value === "") {
			$errors['value'] = "Value can't be blank";
		}
		
		// * string length
		// minimum length
		$value = "abcd";
		$min = 3;
		if (strlen($value) < $min) {
			echo "Validation failed.<br />";
		}
		// max length
		$max = 6;
		if (strlen($value) > $max) {
			echo "Validation failed.<br />";
		}
		
		// * type
		$value = "1";
		if (!is_string($value)) {
			echo "Validation failed.<br />";
		}
		
		// * inclusion in a set
		$value = "1";
		$set = array("1", "2", "3", "4");
		if (!in_array($value, $set)) {
			echo "Validation failed.<br />";
		}

		// * uniqueness
		// uses a database to check uniqueness
		
		// * format
		$value = "nobody@nowhere.com";
		// preg_match is most flexible
		if (!preg_match("/@/", $value)) {
			echo "Validation failed.<br />";
		}
		// strpos is faster than preg_match
		// use === to make exact match with false
		if (strpos($value, "@") === false) {
		  echo "Validation failed.<br />";
		}
		?>

		<?php
			//if (!empty($errors)) {
				// redirect_to("first_page.php");
			// 	include("form.php");
			// } else {
			// 	include("success.php");
			// }
			
			function form_errors($errors=array()) {
				$output = "";
				if (!empty($errors)) {
				  $output .= "<div class=\"error\">";
				  $output .= "Please fix the following errors:";
				  $output .= "<ul>";
				  foreach ($errors as $key => $error) {
				    $output .= "<li>{$error}</li>";
				  }
				  $output .= "</ul>";
				  $output .= "</div>";
				}
				return $output;
			}
		?>
		<?php echo form_errors($errors); ?>
	</body>
</html>
```

---

## validation functions

```php
<?php

// * presence
// use trim() so empty spaces don't count
// use === to avoid false positives
// empty() would consider "0" to be empty
function has_presence($value) {
	return isset($value) && $value !== "";
}

// * string length
// max length
function has_max_length($value, $max) {
	return strlen($value) <= $max;
}

// * inclusion in a set
function has_inclusion_in($value, $set) {
	return in_array($value, $set);
}

function form_errors($errors=array()) {
	$output = "";
	if (!empty($errors)) {
	  $output .= "<div class=\"error\">";
	  $output .= "Please fix the following errors:";
	  $output .= "<ul>";
	  foreach ($errors as $key => $error) {
	    $output .= "<li>{$error}</li>";
	  }
	  $output .= "</ul>";
	  $output .= "</div>";
	}
	return $output;
}

?>
```
---

## form con validazione

```php
<?php
	require_once("included_functions.php");
	require_once("validation_functions.php");
	
	$errors = array();
	$message = "";
	
	if (isset($_POST['submit'])) {
		// form was submitted
		$username = trim($_POST["username"]);
		$password = trim($_POST["password"]);

		// Validations
		$fields_required = array("username", "password");
		foreach($fields_required as $field) {
			$value = trim($_POST[$field]);
			if (!has_presence($value)) {
				$errors[$field] = ucfirst($field) . " can't be blank";
			}
		}
		
		$fields_with_max_lengths = array("username" => 30, "password" => 8);
		validate_max_lengths($fields_with_max_lengths);
		
		if (empty($errors)) {
			// try to login
			if ($username == "Pippo" && $password == "secret") {
				// successful login
				redirect_to("basic.html");
			} else {
				$message = "Username/password do not match.";
			}
		}

	} else {
		$username = "";
		$message = "Please log in.";
	}
?>

<!DOCTYPE html>

<html lang="it">
	<head>
		<title>Form</title>
	</head>
	<body>

		<?php echo $message; ?><br />
		<?php echo form_errors($errors); ?>
		
		<form action="form_with_validation.php" method="post">
		  Username: <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" /><br />
		  Password: <input type="password" name="password" value="" /><br />
			<br />
		  <input type="submit" name="submit" value="Submit" />
		</form>

	</body>
</html>
```
