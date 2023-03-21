
<html lang="en">
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
