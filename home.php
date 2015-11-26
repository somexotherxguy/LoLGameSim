<!DOCTYPE html>
<html>

<link href="default.css" rel="stylesheet" type="text/css" media="all" />

<head>
<title>LoL Game Simulator</title>
</head>
<body>

<div id="wrapper">
	<div id="header" class="title">
		
		<h1>LoL Game Simulator</h1>
		
		<img id="icon" 	align="left" src="images/Pix Icon.png">
			
	</div>
	
	<div>
		<form>
		<div id="searchbar">
			
			<div class="search">
				<!--Search for a champion<br /> -->
			</div>	
			<div class="bar">
				<form name="champ_form" method="get" action="">
					<input id="search" type="text" placeholder="Search for a Champion..." name="champ_name"><br>
					
					<!-- I think this needs to be a submit button but I don't know how to call change_icon() from PHP  -Zack -->					
					<button onclick="change_icon()" type="button">Search</button>
				</form>	
			</div>
		</div>
		</form>
	</div>
	
	<p id="test">Enter in game data and simulate league games to test builds quickly.</p>


	<div id="sectionone">
		<div class="icon">
			<img id="champ_icon" src="images/Lulu_icon.jpg" alt="Champ Icon">
			
			<!-- api testing 
			<script type="text/javascript">
				
				var xmlhttp = new XMLHttpRequest();
					
				xmlhttp.onreadystatechange = function() {
					if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
						var icon = document.getElementById('champ_icon');
						obj = JSON.parse(xmlhttp.responseText);
						icon.src = "http://ddragon.leagueoflegends.com/cdn/5.22.1/img/champion/Thresh.png";
					}
				};			
				xmlhttp.open( "GET", "https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=image&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184", false ); // false for synchronous request
				xmlhttp.send( null ); 
					
			</script>
			-->
			
			<script type="text/javascript">
				function change_icon(){
					var champname = document.getElementById('search');
					var name = champname.value;
					var icon = document.getElementById('champ_icon');
					var url = "http://ddragon.leagueoflegends.com/cdn/5.22.3/img/champion/";
					var almost = name.concat(".png")
					icon.src = url.concat(almost);
					console.log(icon.src);
				}
			</script>
			
		</div>
		<div>
		<table id="statstable">
			<!-- stats -->
			
			<tr >
				<td></td>
				<td>Health</td>
				<td>Health Regen</td>
				<td>Mana</td>	
				<td>Mana Regen</td>
			
			</tr>
			<tr>
				<td></td>
				<td>Attack Range</td>
				<td>Attack Damage</td>
				<td>Attack Speed</td>
				<td>Armor</td>
				<td>Magic Res</td>
			
			</tr>
			<tr>
				<td>Move Speed</td>
				<td>Ability Power</td>
				<td>Cooldown Reduction</td>
				<td>Critical Chance</td>
			</tr>
			<tr>
				<td>Armor Pen</td>
				<td>% Armor pen</td>
				<td>Magic Pen</td>
				<td>% Magic Pen</td>
			</tr>
		</table>
		</div>
	</div>
	
	<div>
		<h2>Abilities</h2>
		<table id="abilitytable">
			<tr> 
				<td><img onclick="changePassive()" src="images/Pix_Faerie_Companion.png" id="passive" width="64" height="64"></td>
				<td><img onclick="changeAbilityOne()" src="images/Glitterlance.png" id="abilityone"></td>
				<td><img onclick="changeAbilityTwo()" src="images/Whimsy.png" id="abilitytwo"></td>
				<td><img onclick="changeAbilityThree()" src="images/Help_Pix!.png" id="abilitythree"></td>
				<td><img onclick="changeAbilityFour()" src="images/Wild_Growth.png" id="abilityfour"></td>
			</tr>
		</table>
		
		<p id="abilitytext">This is the passive it does passive things</p>
		
		<!-- changes the ability description -->
		<script>
			function changePassive(){
				document.getElementById("abilitytext").innerHTML = "This is the passive it does passive things!";
			}
			function changeAbilityOne(){
				document.getElementById("abilitytext").innerHTML = "This is ability one it does ability one things!";
			}	
			function changeAbilityTwo(){
				document.getElementById("abilitytext").innerHTML = "This is ability two it does ability two things!";
			}	
			function changeAbilityThree(){
				document.getElementById("abilitytext").innerHTML = "This is ability three it does ability three things!";
			}	
			function changeAbilityFour(){
				document.getElementById("abilitytext").innerHTML = "This is ability four it does ability four things!";
			}
		</script>
		
	</div>
	<div>
		<!-- get ready for an abomination of a table for the runes -->
		<h2>Runes</h2>
		
		<p> Now it is time for you to choose the rune page you will be using. Please pick 9 Marks, 9 Seals, 9 Glyphs, and 3 Quints.</p>
		
		<form name="runetable" method="get" action="">
		<table id="runetable">
			<tr>
				<th>Marks</th> 
				<th>Seals</th> 
				<th>Glyphs</th> 
				<th>Quintesences</th> 
			</tr>
			<tr>
				<td id="runecells">Armor Pen	
					<select id="armorpenmark" name="armorpenmark">
						<option value="0">0</option> 
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select></td> 
				<td id="runecells">Armor
					<select id="armorseal" name="armorseal">
						<option value="0">0</option> 
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>
				</td>
				<td id="runecells">Ability Power
					<select id="apglyph" name="apglyph">
						<option value="0">0</option> 
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>
				</td> 

				<td id="runecells">Ability Power
					<select id="apquint" name="apquint">
						<option value="0">0</option> 
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</td> 

				<td id="runecells">Mana Regen
					<select id="mregenquint" name="mregenquint">
						<option value="0">0</option> 
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
					</select>
				</td> 

			</tr>
			<tr>
				<td id="runecells">Attack Damage
					<select id="attackdamagemark" name="attackdamgemark"> 
						<option value="0">0</option> 
						<option value="1">1</option>
						<option value="2">2</option>
						<option value="3">3</option>
						<option value="4">4</option>
						<option value="5">5</option>
						<option value="6">6</option>
						<option value="7">7</option>
						<option value="8">8</option>
						<option value="9">9</option>
					</select>
				</td> 

				<td id="runecells">Energy Regen
					<select id="energyregenseal" name="energyregenseal">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 

				<td id="runecells">Cooldown Reduction
					<select id="cdrglyph" name="cdrglyph">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 

				<td id="runecells">Armor
					<select id="armorquint" name="armorquint">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 

				<td id="runecells">% Health
					<select id="%healthquint" name="%healthquint">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 

			</tr>
			<tr>
				<td id="runecells">Attack Speed
					<select id="attackspeedmark" name="attackspeedmark">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td id="runecells">Health
					<select id="healthseal" name="healthseal">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td id="runecells">Energy
					<select id="energyglyph" name="energyglyph">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td id="runecells">Cooldown Reduction
					<select id="cdrquint" name="cdrquint"> 
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 
				<td id="runecells">Experience
					<select id="experiencequint" name="experiencequint">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 
			</tr>
			<tr>
				<td id="runecells">Critical Chance
					<select id="critchancemark" name="critchancemark"> 
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td id="runecells">Health Regen
					<select id="hregenseal" name="hregenseal">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td id="runecells">Mana
					<select id="managlyph" name="managlyph"> 
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td id="runecells">Gold
					<select id="goldquint" name="goldquint">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 
				<td id="runecells">Life Steal
					<select id="lifestealquint" name="lifestealquint"> 
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 
			</tr>
			<tr>
				<td id="runecells">Critical Damage
					<select id="critdamagemark" name="critdamagemark">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td id="runecells">Mana Regen
					<select id="mregenseal" name="mregenseal">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td id="runecells">Magic Resist
					<select id="mrglyph" name="mrglyph"> 
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td id="runecells">Health
					<select id="healthquint" name="healthquint">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 
				<td id="runecells">Movespeed
					<select id="movespeedquint" name="movespeedquint">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 
			</tr>
			<tr>
				<td id="runecells">Hybrid Pen
					<select id="hpenmark" name="hpenmark"> 
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td id="runecells">% Health
					<select id="%healthseal" name="%healthseal"> 
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td></td> 
				<td id="runecells">Health Regen
					<select id="hregenquint" name="hregenquint"> 
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 
				<td id="runecells">Revival
					<select id="haha" name="haha"> 
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 
			</tr>
			<tr>
				<td id="runecells">Magic Pen
					<select id="mpenmark" name="mpenmark">
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					</select>
				</td> 
				<td></td> 
				<td></td> 
				<td id="runecells">Mana
					<select id="manaquint" name="manaquint"> 
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 
				<td id="runecells">Spell Vamp
					<select id="spellvampquint" name="spellvampquint"> 
					<option value="0">0</option> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					</select>
				</td> 
			</tr>
		</table>
		
		<!-- Using PHP to read in rune amounts and store them in the database -->
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
			//every single type of rune (except revival, heh) gets its own if statement
			//oh jesus
			//i think i can put this in a separate .php file
			if(isset($_GET['armorpenmark']) && $_GET['armorpenmark']>=1){
				$armorpenmark=$_GET['armorpenmark'];
				
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
						values ('Mark of Armor Penetration', '$armorpenmark', '0', '0', '1.28', '0',
								'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
				
				$connection->exec($sql);
			}
			
			if(isset($_GET['armorseal']) && $_GET['armorseal']>=1){
				$armorseal=$_GET['armorseal'];
			
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Seal of Armor', '$armorseal', '0', '1', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
			
				$connection->exec($sql);
			}
			
			if(isset($_GET['apglyph']) && $_GET['apglyph']>=1){
				$apglyph=$_GET['apglyph'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Glyph of Ability Power', '$apglyph', '1.19', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['apquint']) && $_GET['apquint']>=1){
				$apquint=$_GET['apquint'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Quintessence of Ability Power', '$apquint', '0', '4.95', '0', '0',
				'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['mregenquint']) && $_GET['mregenquint']>=1){
				$mregenquint=$_GET['mregenquint'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Quintessence of Mana Regeneration', '$mregenquint', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1.25', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['attackdamagemark']) && $_GET['attackdamagemark']>=1){
				$attackdamagemark=$_GET['attackdamagemark'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Mark of Attack Damage', '$attackdamagemark', '0', '0', '0', '0',
						'0', '0.95', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['energyregenseal']) && $_GET['energyregenseal']>=1){
				$energyregenseal=$_GET['energyregenseal'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Seal of Energy Regeneration', '$energyregenseal', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0.63', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['cdrglyph']) && $_GET['cdrglyph']>=1){
				$cdrglyph=$_GET['cdrglyph'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Glyph of Cooldown Reduction', '$cdrglyph', '0', '0', '0', '0',
						'0', '0', '0', '0.83', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['armorquint']) && $_GET['armorquint']>=1){
				$armorquint=$_GET['armorquint'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Quintessence of Armor', '$armorquint', '0', '4.26', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['%healthquint']) && $_GET['%healthquint']>=1){
				$percenthealthquint=$_GET['%healthquint'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Quintessence of Percent Health', '$percenthealthquint', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1.5', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['attackspeedmark']) && $_GET['attackspeedmark']>=1){
				$attackspeedmark=$_GET['attackspeedmark'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Mark of Attack Speed', '$attackspeedmark', '0', '0', '0', '0',
						'0', '0', '1.7', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['healthseal']) && $_GET['healthseal']>=1){
				$healthseal=$_GET['healthseal'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Seal of Health', '$healthseal', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '8', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['energyglyph']) && $_GET['energyglyph']>=1){
				$energyglyph=$_GET['energyglyph'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Glyph of Energy', '$energyglyph', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '2.2', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['cdrquint']) && $_GET['cdrquint']>=1){
				$cdrquint=$_GET['cdrquint'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Quintessence of Cooldown Reduction', '$cdrquint', '0', '0', '0', '0',
						'0', '0', '0', '2.5', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['critchancemark']) && $_GET['critchancemark']>=1){
				$critchancemark=$_GET['critchancemark'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Mark of Critical Chance', '$critchancemark', '0', '0', '0', '0',
						'0', '0', '0', '0', '0.93', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['hregenseal']) && $_GET['hregenseal']>=1){
				$hregenseal=$_GET['hregenseal'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Seal of Health Regeneration', '$hregenseal', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0.56', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['managlyph']) && $_GET['managlyph']>=1){
				$managlyph=$_GET['managlyph'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Glyph of Mana', '$managlyph', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '11.25', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			//this is for the gold income quint, which we need to keep track of;
			//however, rune_page_stats doesn't have a column for gold so I'll fix it later
			//my bad
			
			/*if(isset($_GET['goldquint']) && $_GET['goldquint']>=1){
				$goldquint=$_GET['goldquint'];
					
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
			
			if(isset($_GET['lifestealquint']) && $_GET['lifestealquint']>=1){
				$lifestealquint=$_GET['lifestealquint'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Quintessence of Lifesteal', '$lifestealquint', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1.5', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['critdamagemark']) && $_GET['critdamagemark']>=1){
				$critdamagemark=$_GET['critdamagemark'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Mark of Critical Damage', '$critdamagemark', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '2.23', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['mregenseal']) && $_GET['mregenseal']>=1){
				$mregenseal=$_GET['mregenseal'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Seal of Mana Regeneration', '$mregenseal', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.41', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['mrglyph']) && $_GET['mrglyph']>=1){
				$mrglyph=$_GET['mrglyph'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Glyph of Magic Resist', '$mrglyph', '0', '0', '0', '1.34',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['healthquint']) && $_GET['healthquint']>=1){
				$healthquint=$_GET['healthquint'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Quintessence of Health', '$healthquint', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '26', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['movespeedquint']) && $_GET['movespeedquint']>=1){
				$movespeedquint=$_GET['movespeedquint'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Quintessence of Movement Speed', '$movespeedquint', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '1.5')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['hpenmark']) && $_GET['hpenmark']>=1){
				$hpenmark=$_GET['hpenmark'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Mark of Hybrid Penetration', '$hpenmark', '0', '0', '0.9', '0',
				'0.62', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['%healthseal']) && $_GET['%healthseal']>=1){
				$percenthealthseal=$_GET['%healthseal'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Seal of Percent Health', '$percenthealthseal', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0.5', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['hregenquint']) && $_GET['hregenquint']>=1){
				$hregenquint=$_GET['hregenquint'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Quintessence of Health Regeneration', '$hregenquint', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '2.7', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['mpenmark']) && $_GET['mpenmark']>=1){
				$mpenmark=$_GET['mpenmark'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Mark of Magic Penetration', '$mpenmark', '0', '0', '0', '0',
						'0.87', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			if(isset($_GET['manaquint']) && $_GET['manaquint']>=1){
				$manaquint=$_GET['manaquint'];
					
				$sql = "insert into Rune_Page_Stats (rune_id, quantity, ability_power, armor,
													 armor_pen, magic_resist, magic_pen, attack_damage,
													 attack_speed, cooldown_reduction, crit_chance,
													 crit_damage, energy, energy_regen, health,
													 health_regen, percent_health, mana, mana_regen,
													 lifesteal, move_speed)
				values ('Quintessence of Mana', '$manaquint', '0', '0', '0', '0',
						'0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '0', '37.5', '0', '0', '0')";
					
				$connection->exec($sql);
			}
			
			//same situation as gold income quint
			
			/*if(isset($_GET['spellvampquint']) && $_GET['spellvampquint']>=1){
				$spellvampquint=$_GET['spellvampquint'];
					
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
		
		<input type="submit" name="submit">
		</form>
	</div>
	
	<div>
		
		<h2>Game Details</h2>
		<div class="gamedetails">
			<ul class="gamedetails">
				<li style="padding: 11px">Level </li>
				<li style="padding: 11px">Ability Sequence</li>
				<li style="padding: 11px">Kills</li>
				<li style="padding: 11px">Assists</li>
				<li style="padding: 11px">Creep Score</li>
			</ul>	
		</div>
		<div class="gameinputs">
			<ul class="gameinputs">
				<li>
					<select> 
					<option value="1">1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
					<option value="11">11</option>
					<option value="12">12</option>
					<option value="13">13</option>
					<option value="14">14</option>
					<option value="15">15</option>
					<option value="16">16</option>
					<option value="17">17</option>
					<option value="18">18</option>
					</select>
				</li>
				<li><input style="width: 50px;" type="number"></li>
				<li><input style="width: 50px;" type="number"></li>
				<li><input style="width: 50px;" type="number"></li>
				<li><input style="width: 50px;" type="number"></li>
			</ul>
		</div>
		<div class="gamedetails">
			<ul class="gamedetails">
				<li style="padding: 11px">Towers Taken</li>
				<li style="padding: 11px">Dragon Kills</li>
				<li style="padding: 11px">Baron Kills</li>
				<li style="padding: 11px">Time</li>
			</ul>
		</div>
		<div class="gameinputsnot">
			<ul class="gameinputsnot">
				<li><input style="width: 50px;" type="number"></li>
				<li><input style="width: 50px;" type="number"></li>
				<li><input style="width: 50px;" type="number"></li>
				<li><input style="width: 75px;" type="time"></li>
			</ul>
		</div>
	</div>
	<br>
	<br>
	<br>
	<div style="padding: 10px;">
		<h2>Shop</h2>
		
		<div id="shopicons">
			<!-- shows 80 item icons -->
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			
		</div>
	
		<div id="gold">
			<h4>Gold: Insert Number Here</h4>
		</div>
		<div id="inventory">
			<h4>Inventory</h4>
			<img src="images/Sorcerer's_Shoes_Item.png">
			<img src="images/Athene's_Unholy_Grail_Item.png">
			<img src="images/Zhonya's_Hourglass_Item.png">
			<img src="images/Rabadon's_Deathcap_Item.png">
			<img src="images/Luden's_Echo_Item.png">
			<img src="images/Void_Staff_Item.png">
		</div>
		
		<div class="filterlist">
			<h3>Filter</h3>
			Defense
			<ul class="filter">
				<li><input type="checkbox">Health</li>
				<li><input type="checkbox">Magic Resist</li>
				<li><input type="checkbox">Armor</li>
			</ul>	
			Attack
			<ul class="filter">
				<li><input type="checkbox">Damage</li>
				<li><input type="checkbox">Attack Speed</li>
				<li><input type="checkbox">Critical Chance</li>
				<li><input type="checkbox">Lifesteal</li>
			</ul>
			Magic
			<ul class="filter">
				<li><input type="checkbox">Ability Power</li>
				<li><input type="checkbox">Cooldown Reduction</li>
				<li><input type="checkbox">Mana</li>
				<li><input type="checkbox">Mana Regen</li>
			</ul>
			Movement
			<ul class="filter">
				<li><input type="checkbox">Movespeed</li>
			</ul>
			
		</div>
	</div>

	

	<script>
		
	</script>
	
	<div>
		<h2>End of Page</h2>
	</div>

</div>
</body>
</html>