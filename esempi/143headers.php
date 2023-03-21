<?php
	header("HTTP 1.1/ 404 Not Found");
	header("X-Powered-By: none of your business");
?>


<html lang="en">
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
