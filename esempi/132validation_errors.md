
<html lang="en">
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
