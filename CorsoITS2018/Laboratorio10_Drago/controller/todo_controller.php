<?php

$todoItem = (isset ($_REQUEST["todoText"])) ? $_REQUEST["todoText"] : "" ;


if(trim($todoItem)!=""&& !in_array( $todoItem, $_SESSION["todo"]))
	{
	$_SESSION["todo"][] = $todoItem;
	}else 
	{
		echo "carattere non valido";
	}
?>