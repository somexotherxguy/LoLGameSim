<?php

	$servername="localhost";
	
	//this looks safe
	$username="root";
	$password="woot";
	$databasename="lolgamesimulator";
	
	$connection=new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
	
	//updating item stats
	$item_armor=$_POST['flatarmormod'];
	$item_attackspeed=$_POST['flatattackspeedmod'];
	$item_critchance=$_POST['flatcritchancemod'];
	$item_health=$_POST['flathppoolmod'];
	$item_healthregen=$_POST['flathpregenmod'];
	$item_mana=$_POST['flatmppoolmod'];
	$item_manaregen=$_POST['flatmpregenmod'];
	$item_abilitypower=$_POST['flatmagicdamagemod'];
	$item_movementspeed=$_POST['flatmovementspeedmod'];
	$item_attackdamage=$_POST['flatphysicaldamagemod'];
	$item_magicresist=$_POST['flatspellblockmod'];
	$item_percentarmor=$_POST['percentarmormod'];
	$item_percentattackspeed=$_POST['percentattackspeedmod'];
	$item_percentcritchance=$_POST['percentcritchancemod'];
	$item_percenthealth=$_POST['percenthppoolmod'];
	$item_percenthealthregen=$_POST['percenthpregenmod'];
	$item_percentmana=$_POST['percentmppoolmod'];
	$item_percentmanaregen=$_POST['percentmpregenmod'];
	$item_percentabilitypower=$_POST['percenmagicdamagemod'];
	$item_percentmovementspeed=$_POST['percentmovementspeedmod'];
	$item_percentattackdamage=$_POST['percentphysicaldamagemod'];
	$item_percentmagicresist=$_POST['percentspellblockmod'];
	$gold=$_POST['gold3'];
	
	if($item_armor!=0)
	{
		$sql="update Current_Stats
			  set armor = (armor + $item_armor)";
		$connection->exec($sql);
	}
	if($item_attackspeed!=0)
	{
		$sql="update Current_Stats
		set attack_speed = (attack_speed + $item_attackspeed)";
		$connection->exec($sql);
	}
	if($item_critchance!=0)
	{
		$sql="update Current_Stats
		set crit_chance = (crit_chance + $item_critchance)";
		$connection->exec($sql);
	}
	if($item_health!=0)
	{
		$sql="update Current_Stats
		set health = (health + $item_health)";
		$connection->exec($sql);
	}
	if($item_healthregen!=0)
	{
		$sql="update Current_Stats
		set health_regen = (health_regen + $item_healthregen)";
		$connection->exec($sql);
	}
	if($item_mana!=0)
	{
		$sql="update Current_Stats
		set mana = (mana + $item_mana)";
		$connection->exec($sql);
	}
	if($item_manaregen!=0)
	{
		$sql="update Current_Stats
		set mana_regen = (mana_regen + $item_manaregen)";
		$connection->exec($sql);
	}
	if($item_abilitypower!=0)
	{
		$sql="update Current_Stats
		set ability_power = (ability_power + $item_abilitypower)";
		$connection->exec($sql);
	}
	if($item_movementspeed!=0)
	{
		$sql="update Current_Stats
		set flat_move_speed = (flat_move_speed + $item_movementspeed)";
		$connection->exec($sql);
	}
	if($item_attackdamage!=0)
	{
		$sql="update Current_Stats
			  set attack_damage = (attack_damage + $item_attackdamage)";
		$connection->exec($sql);
	}
	if($item_magicresist!=0)
	{
		$sql="update Current_Stats
			  set magic_resist = (magic_resist + $item_magicresist)";
		$connection->exec($sql);
	}
	if($item_percentarmor!=0)
	{
		$sql="update Current_Stats
		set armor = (armor * $item_percentarmor)";
		$connection->exec($sql);
	}
	if($item_percentattackspeed!=0)
	{
		$sql="update Current_Stats
		set attack_speed = (attack_speed * $item_percentattackspeed)";
		$connection->exec($sql);
	}
	if($item_percentcritchance!=0)
	{
		$sql="update Current_Stats
		set crit_chance = (crit_chance * $item_percentcritchance)";
		$connection->exec($sql);
	}
	if($item_percenthealth!=0)
	{
		$sql="update Current_Stats
		set health = (health * $item_percenthealth)";
		$connection->exec($sql);
	}
	if($item_percenthealthregen!=0)
	{
		$sql="update Current_Stats
		set health_regen = (health_regen * $item_percenthealthregen)";
		$connection->exec($sql);
	}
	if($item_percentmana!=0)
	{
		$sql="update Current_Stats
		set mana = (mana * $item_percentmana)";
		$connection->exec($sql);
	}
	if($item_percentmanaregen!=0)
	{
		$sql="update Current_Stats
		set mana_regen = (mana_regen * $item_percentmanaregen)";
		$connection->exec($sql);
	}
	if($item_percentabilitypower!=0)
	{
		$sql="update Current_Stats
		set ability_power = (ability_power * $item_percentabilitypower)";
		$connection->exec($sql);
	}
	if($item_percentmovementspeed!=0)
	{
		$sql="update Current_Stats
		set flat_move_speed = (flat_move_speed * $item_percentmovementspeed)";
		$connection->exec($sql);
	}
	if($item_percentattackdamage!=0)
	{
		$sql="update Current_Stats
		set attack_damage = (attack_damage * $item_percentattackdamage)";
		$connection->exec($sql);
	}
	if($item_percentmagicresist!=0)
	{
		$sql="update Current_Stats
		set magic_resist = (magic_resist * $item_percentmagicresist)";
		$connection->exec($sql);
	}
	
	$sql="update Current_Stats
		  set gold = (gold - $gold)";
	$connection->exec($sql);
?>