<?php

	$servername="localhost";
	$username="root";
	$password="woot";
	$databasename="lolgamesimulator";
	
	$connection=new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
	
	$sql = "delete from Current_Stats";
	$connection->exec($sql);
	
	$sql = "insert into Current_Stats
			values ('0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
	$connection->exec($sql);
	
	$sql = "delete from Rune_Page_Stats";
	$connection->exec($sql);
	
	$sql = "delete from Game_Instance";
	$connection->exec($sql);
	
?>