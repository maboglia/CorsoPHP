
<html lang="en">
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
