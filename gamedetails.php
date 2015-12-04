<?php

	$servername="localhost";
	$username="root";
	$password="";
	$databasename="lolgamesimulator";
		
	$connection=new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
	$lvl=$_POST['level'];
	$kills=$_POST['kills'];
	$assists=$_POST['assists'];
	$cs=$_POST['cs'];
	$towers=$_POST['towers'];
	$dragons=$_POST['dragons'];
	$barons=$_POST['barons'];
	
	//everybody starts with a clean slate
	$sql = "delete from Game_Instance";
	$connection->exec($sql);
		
	//$sql = "insert into Game_Instance (lvl, towers_killed, creep_score, kills, deaths,
	//assists, game_time, barons, dragons, clears,
	//ability_seq)
	$sql = "insert into Game_Instance
	values ('$lvl','$towers','$cs','$kills','0','$assists','0','$barons','$dragons','0','0')";
	$connection->exec($sql);
	
	/*$sql = "update Current_Stats
			set gold = (gold + ($kills*300) + ($assists*75) + ($cs*25) + ($dragons*25) + ($barons*300) + ($towers*150))";
	
	$connection->exec($sql);*/
?>