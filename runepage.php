<?php

	$servername="localhost";
	$username="root";
	$password="";
	$databasename="lolgamesimulator";
		
	$connection=new PDO("mysql:host=$servername;dbname=$databasename", $username, $password);
		
	//make sure the user starts with an empty page;
	//every time the submit button is pressed, the table is cleared and then
	//we take in the new values
	$sql = "delete from Rune_Page_Stats";
	$connection->exec($sql);
		
	//aaaaahhhhhhhhHHHHHHHHHHHHHHHHHH
	//every single type of rune gets its own if statement
	if(isset($_POST['armorpenmark']) && $_POST['armorpenmark']>=1){
		$armorpenmark=$_POST['armorpenmark'];
	
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Mark of Armor Penetration', '$armorpenmark', '0', '0', '1.28', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
	
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set flat_armor_pen = (flat_armor_pen + (1.28*$armorpenmark))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['armorseal']) && $_POST['armorseal']>=1){
		$armorseal=$_POST['armorseal'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Seal of Armor', '$armorseal', '0', '1', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set armor = (armor + (1*$armorseal))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['apglyph']) && $_POST['apglyph']>=1){
		$apglyph=$_POST['apglyph'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Glyph of Ability Power', '$apglyph', '1.19', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set ability_power = (ability_power + (1.19*$apglyph))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['apquint']) && $_POST['apquint']>=1){
		$apquint=$_POST['apquint'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Quintessence of Ability Power', '$apquint', '0', '4.95', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set ability_power = (ability_power + (4.95*$apquint))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['mregenquint']) && $_POST['mregenquint']>=1){
		$mregenquint=$_POST['mregenquint'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Quintessence of Mana Regeneration', '$mregenquint', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1.25', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set mana_regen = (mana_regen + (1.25*$mregenquint))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['attackdamagemark']) && $_POST['attackdamagemark']>=1){
		$attackdamagemark=$_POST['attackdamagemark'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Mark of Attack Damage', '$attackdamagemark', '0', '0', '0', '0',
		'0', '0.95', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set attack_damage = (attack_damage + (0.95*$attackdamagemark))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['energyregenseal']) && $_POST['energyregenseal']>=1){
		$energyregenseal=$_POST['energyregenseal'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Seal of Energy Regeneration', '$energyregenseal', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0.63', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set energy_regen = (energy_regen + (0.63*$energyregenseal))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['cdrglyph']) && $_POST['cdrglyph']>=1){
		$cdrglyph=$_POST['cdrglyph'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Glyph of Cooldown Reduction', '$cdrglyph', '0', '0', '0', '0',
		'0', '0', '0', '0.83', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set cooldown_reduction = (cooldown_reduction + (0.83*$cdrglyph))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['armorquint']) && $_POST['armorquint']>=1){
		$armorquint=$_POST['armorquint'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Quintessence of Armor', '$armorquint', '0', '4.26', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set armor = (armor + (4.26*$armorquint))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['attackspeedmark']) && $_POST['attackspeedmark']>=1){
		$attackspeedmark=$_POST['attackspeedmark'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Mark of Attack Speed', '$attackspeedmark', '0', '0', '0', '0',
		'0', '0', '1.7', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set attack_speed = (attack_speed + (.017*$attackspeedmark))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['healthseal']) && $_POST['healthseal']>=1){
		$healthseal=$_POST['healthseal'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Seal of Health', '$healthseal', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '8', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set health = (health + (8*$healthseal))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['energyglyph']) && $_POST['energyglyph']>=1){
		$energyglyph=$_POST['energyglyph'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Glyph of Energy', '$energyglyph', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '2.2', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set energy = (energy + (2.2*$energyglyph))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['cdrquint']) && $_POST['cdrquint']>=1){
		$cdrquint=$_POST['cdrquint'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Quintessence of Cooldown Reduction', '$cdrquint', '0', '0', '0', '0',
		'0', '0', '0', '2.5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set cooldown_reduction = (cooldown_reduction + (2.5*$cdrquint))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['critchancemark']) && $_POST['critchancemark']>=1){
		$critchancemark=$_POST['critchancemark'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Mark of Critical Chance', '$critchancemark', '0', '0', '0', '0',
		'0', '0', '0', '0', '0.93', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set crit_chance = (crit_chance + (0.93*$critchancemark))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['hregenseal']) && $_POST['hregenseal']>=1){
		$hregenseal=$_POST['hregenseal'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Seal of Health Regeneration', '$hregenseal', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0.56', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set health_regen = (health_regen + (0.56*$hregenseal))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['managlyph']) && $_POST['managlyph']>=1){
		$managlyph=$_POST['managlyph'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Glyph of Mana', '$managlyph', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '11.25', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set mana = (mana + (11.25*$managlyph))";
		$connection->exec($sql);
	}
		
	//this is for the gold income quint, which we need to keep track of;
	//however, rune_page_stats doesn't have a column for gold so I'll fix it later
	//my bad
		
	/*if(isset($_POST['goldquint']) && $_POST['goldquint']>=1){
	 $goldquint=$_POST['goldquint'];
	 	
	 $sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
	 armor_pen, magic_resist, magic_pen, attack_damage,
	 attack_speed, cooldown_reduction, crit_chance,
	 crit_damage, energy, energy_regen, health,
	 health_regen, percent_health, mana, mana_regen,
	 lifesteal, move_speed)
	 values ('Quintessence of Gold', '$goldquint', '0', '0', '0', '0',
	 '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
	 	
	 $connection->exec($sql);
	 }*/
		
	if(isset($_POST['lifestealquint']) && $_POST['lifestealquint']>=1){
		$lifestealquint=$_POST['lifestealquint'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Quintessence of Lifesteal', '$lifestealquint', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1.5', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set lifesteal = (lifesteal + (1.5*$lifestealquint))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['critdamagemark']) && $_POST['critdamagemark']>=1){
		$critdamagemark=$_POST['critdamagemark'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Mark of Critical Damage', '$critdamagemark', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '2.23', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set crit_damage = (crit_damage + (2.23*$critdamagemark))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['mregenseal']) && $_POST['mregenseal']>=1){
		$mregenseal=$_POST['mregenseal'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Seal of Mana Regeneration', '$mregenseal', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.41', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set mana_regen = (mana_regen + (0.41*$mregenseal))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['mrglyph']) && $_POST['mrglyph']>=1){
		$mrglyph=$_POST['mrglyph'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Glyph of Magic Resist', '$mrglyph', '0', '0', '0', '1.34',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set magic_resist = (magic_resist + (1.34*$mrglyph))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['healthquint']) && $_POST['healthquint']>=1){
		$healthquint=$_POST['healthquint'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Quintessence of Health', '$healthquint', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '26', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set health = (health + (26*$healthquint))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['movespeedquint']) && $_POST['movespeedquint']>=1){
		$movespeedquint=$_POST['movespeedquint'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Quintessence of Movement Speed', '$movespeedquint', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1.5')";
			
		$connection->exec($sql);
		
//		$sql = "update Current_Stats
//				set flat_move_speed = (flat_move_speed + (.015*$movespeedquint))";
//		$connection->exec($sql);
	}
		
	if(isset($_POST['hpenmark']) && $_POST['hpenmark']>=1){
		$hpenmark=$_POST['hpenmark'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Mark of Hybrid Penetration', '$hpenmark', '0', '0', '0.9', '0',
		'0.62', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set flat_armor_pen = (flat_armor_pen + (0.9*$hpenmark),
					flat_magic_pen = (flat_magic_pen + (0.62*$hpenmark)";
		$connection->exec($sql);
	}
		
	if(isset($_POST['%healthseal']) && $_POST['%healthseal']>=1){
		$percenthealthseal=$_POST['%healthseal'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Seal of Percent Health', '$percenthealthseal', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.5', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		$result=0;
		
		for($x=0;$x<$percenthealthseal;$x++)
		{
			$result+=0.005;
		}
		
		$sql = "update Current_Stats
				set health = (health + ($result*health))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['hregenquint']) && $_POST['hregenquint']>=1){
		$hregenquint=$_POST['hregenquint'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Quintessence of Health Regeneration', '$hregenquint', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '2.7', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set health_regen = (health_regen + (2.7*$hregenquint))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['mpenmark']) && $_POST['mpenmark']>=1){
		$mpenmark=$_POST['mpenmark'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Mark of Magic Penetration', '$mpenmark', '0', '0', '0', '0',
		'0.87', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set flat_magic_pen = (flat_magic_pen + (0.87*$mpenmark))";
		$connection->exec($sql);
	}
		
	if(isset($_POST['manaquint']) && $_POST['manaquint']>=1){
		$manaquint=$_POST['manaquint'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Quintessence of Mana', '$manaquint', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '37.5', '0', '0', '0')";
			
		$connection->exec($sql);
		
		$sql = "update Current_Stats
				set mana = (mana + (37.5*$manaquint))";
		$connection->exec($sql);
	}
	
	if(isset($_POST['%healthquint']) && $_POST['%healthquint']>=1){
		$percenthealthquint=$_POST['%healthquint'];
			
		$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
		armor_pen, magic_resist, magic_pen, attack_damage,
		attack_speed, cooldown_reduction, crit_chance,
		crit_damage, energy, energy_regen, health,
		health_regen, percent_health, mana, mana_regen,
		lifesteal, move_speed)
		values ('Quintessence of Percent Health', '$percenthealthquint', '0', '0', '0', '0',
		'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1.5', '0', '0', '0', '0')";
			
		$connection->exec($sql);
		$result=0;
	
		for($x=0;$x<$percenthealthquint;$x++)
		{
			$result+=0.015;
		}
	
		$sql = "update Current_Stats
				set health = (health + ($result*health))";
		$connection->exec($sql);
	}
		
	//same situation as gold income quint
		
	/*if(isset($_POST['spellvampquint']) && $_POST['spellvampquint']>=1){
	 $spellvampquint=$_POST['spellvampquint'];
	 	
	 $sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
	 armor_pen, magic_resist, magic_pen, attack_damage,
	 attack_speed, cooldown_reduction, crit_chance,
	 crit_damage, energy, energy_regen, health,
	 health_regen, percent_health, mana, mana_regen,
	 lifesteal, move_speed)
	 values ('Quintessence of Spell Vamp', '$spellvampquint', '0', '0', '0', '0',
	 '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
	 	
	 $connection->exec($sql);
	 }*/
?>