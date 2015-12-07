<?php
	
	$servername="localhost";
	
	//this looks safe
	$username="root";
	$password="woot";
	$databasename="lolgamesimulator";
	
	$conn = new mysqli($servername, $username, $password, $databasename);
	
	$sql = "select * from Current_Stats";
	$result = $conn->query($sql);
	
	if ($result->num_rows > 0) {
		// output data of each row
		while($row = $result->fetch_assoc()) {
			echo $row["gold"];
			echo "|";
			echo $row["health"];
			echo "|";
			echo $row["mana"];
			echo "|";
			echo $row["attack_damage"];
			echo "|";
			echo $row["health_regen"];
			echo "|";
			echo $row["mana_regen"];
			echo "|";
			echo $row["attack_speed"];
			echo "|";
			echo $row["cooldown_reduction"];
			echo "|";
			echo $row["flat_magic_pen"];
			echo "|";
			echo $row["percent_magic_pen"];
			echo "|";
			echo $row["crit_chance"];
			echo "|";
			echo $row["flat_move_speed"];
			echo "|";
			echo $row["flat_armor_pen"];
			echo "|";
			echo $row["percent_armor_pen"];
			echo "|";
			echo $row["ability_power"];
			echo "|";
			echo $row["magic_resist"];
			echo "|";
			echo $row["armor"];
			echo "|";
		}
	} else {
		echo "0 results";
	}
?>