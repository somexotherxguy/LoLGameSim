<!DOCTYPE html>
<html>
<link href="default.css" rel="stylesheet" type="text/css" media="all" />

<head>
<title>LoL Game Simulator</title>
</head>
<body>

<script src="http://code.jquery.com/jquery-1.9.1.js"></script>
    <script>
      $(function () {

    	//clear everything on refresh
    	$(window).bind('beforeunload',function()
    	{
            $.ajax({
            	type: 'post',
            	url: 'clear.php',
            	data: $('form').serialize()
        	});
    	});

        $('#runetable').on('submit', function (e) {

          e.preventDefault();

          $.ajax({
            type: 'post',
            url: 'runepage.php',
            data: $('form').serialize(),
            success: function () {
              alert('Rune Page updated!');
            }
          });

        });

        $('#gamedetails').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: 'gamedetails.php',
              data: $('form').serialize(),
              success: function () {
                alert('Game Details updated!');
              }
            });

          });

      });
    </script>

<div id="wrapper">
	<div id="header" class="title">
		
		<h1>Pix's LoL Sim</h1>
		
		<img id="icon" 	align="left" src="images/Pix Icon.png">
			
	</div>
	
	
	<div>
		
		<div id="searchbar">
			
			<div class="search">
				<!--Search for a champion<br /> -->
			</div>	
			<div class="bar">
				
					<input id="search" type="text" placeholder="Search for a Champion..." name="champ_name" onkeypress="on_search_two(event)"/>
					<button onclick="on_search(), change_passive(), change_abilities()" type="button">Search</button>
				
			</div>
		</div>
		
	</div>
	
	<p id="test">Enter in game data and simulate league games to test builds quickly.</p>


	<div id="sectionone">
		
		<div class="icon">
			<h2 class="section_headers" style="position: relative; right: 50px;">Stats</h2>
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
				
					var almost2 = name.concat(".json");
					var champ_url = "http://ddragon.leagueoflegends.com/cdn/5.23.1/data/en_US/champion/";
					var champ_between = champ_url.concat(almost2);
					var champ_json = champ_url.concat(almost2);
					var parsed_json = JSON.parse(JSON.stringify(champ_json));
					var ability_array = ["pass", "q", "w", "e", "r"];
					for (i=0; i<ability_array.length; i++){
						console.log(parsed_json.data.Aatrox.spells[i].name);
						ability_array[i]= parsed_json.data.spells[i].name;
						console.log(ability_array[i]);
					};
					var passive = docuemnt.getElementByID('passive');
					
					document.getElementById("searchform").submit(function
			</script>
			-->
			<script type="text/javascript">
				function on_search(){
					var champname = document.getElementById('search');
					var name = champname.value;
					var icon = document.getElementById('champ_icon');
					var icon_url = "http://ddragon.leagueoflegends.com/cdn/5.22.3/img/champion/";
					var almost = name.concat(".png");
					
					icon.src = icon_url.concat(almost);
					console.log("searching has been done");
					var placeholder = document.getElementById('championname');
					placeholder.innerHTML = name;
				}
				
				function on_search_two(e){
					var code = (e.keyCode ? e.keyCode : e.which);
					if(code == 13){
						on_search();
						change_passive();
						change_abilities();
					}

					return false;
				}	
				
				
			</script>
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
			<script>
				function change_passive(){
					var champ_name = "";
					champ_name = $("#search").val();
					if(champ_name !== ""){
					
						$.ajax({
							url:  'https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=passive&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184',
							type: 'GET',
							dataType: 'json',
							data: {

							},
							success: function (json) {
								var champ_name_nospaces = champ_name.replace(" ", "");
								champ_name_nospaces = champ_name_nospaces.toLowerCase().trim();
								
								<!-- changing passive icon -->
								pass = json.data[champ_name].passive.image.full;
								console.log(pass);
								
								var passive = document.getElementById('passive');
								
								var passive_url = "http://ddragon.leagueoflegends.com/cdn/5.23.1/img/passive/";
								var almost_two = pass.concat(".png");
								passive.src = passive_url.concat(pass);
								
								<!-- passive description -->
								var pass_text = document.getElementById('abilitytext');
								pass_text.innerHTML = json.data[champ_name].passive.description;
								
								var pass_title = document.getElementById('abilityname');
								pass_title.innerHTML = json.data[champ_name].passive.name;
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								alert("error getting Summoner data!");
							}
						});
					}
					
						
				}
				
				function change_abilities(){
					var champ_name = "";
					champ_name = $("#search").val();
					if(champ_name !== ""){
					
						$.ajax({
							url:  'https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=spells&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184',
							type: 'GET',
							dataType: 'json',
							data: {

							},
							success: function (json) {
								var champ_name_nospaces = champ_name.replace(" ", "");
								champ_name_nospaces = champ_name_nospaces.toLowerCase().trim();
								
								
								var abilities= ["", "", "", ""];
								for(i=0; i<4; i++){
						
									abilities[i] = json.data[champ_name].spells[i].image.full;
									console.log(abilities[i]);
								}
								
								
								
								var ability_url = "http://ddragon.leagueoflegends.com/cdn/5.23.1/img/spell/"
								var ab_one = document.getElementById('abilityone');
								var ab_two = document.getElementById('abilitytwo');
								var ab_three = document.getElementById('abilitythree');
								var ab_four = document.getElementById('abilityfour');
								for(j=0; j<4; j++){
									if(j==0){
										ab_one.src = ability_url.concat(abilities[j]);
									}
									if(j==1){
										ab_two.src = ability_url.concat(abilities[j]);
									}
									if(j==2){
										ab_three.src = ability_url.concat(abilities[j]);
									}
									if(j==3){
										ab_four.src = ability_url.concat(abilities[j]);
									}
								}
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								alert("error getting Summoner data!");
							}
						});
					}
				}
				
			</script>
		</div>
		<div>
			<h3 style="text-align: center;" id="championname">Champ Name</h3>
		<table id="statstable">
			<!-- stats -->
			
			<tr >
				<td></td>
				<td>Health</td>
				<td>Mana</td>	
				<td>Ability Power</td>
				<td>Magic Res</td>
			
			</tr>
			<tr>
				<td></td>
				<td>Health Regen</td>
				<td>Mana Regen</td>
				<td>Cooldown Reduction</td>
				
				<td>Armor</td>
				
			
			</tr>
			<tr>
				<td>Attack Damage</td>
				
				
				<td>Attack Speed</td>
				<td>Critical Chance</td>
				<td>Magic Pen</td>
				<td>Attack Range</td>
				
		
			</tr>
			<tr>
				<td>Move Speed</td>
				
				
				<td>Armor Pen</td>
				
				<td>% Armor pen</td>
				<td>% Magic Pen</td>
			</tr>
		</table>
		</div>
	</div>
	
	<div>
		<h2 class="section_headers">Abilities</h2>
		<table id="abilitytable">
			<tr> 
				<td><img onclick="changePassive()" src="images/Pix_Faerie_Companion.png" id="passive" width="64" height="64"></td>
				<td><img onclick="changeAbilityOne()" src="images/Glitterlance.png" id="abilityone"></td>
				<td><img onclick="changeAbilityTwo()" src="images/Whimsy.png" id="abilitytwo"></td>
				<td><img onclick="changeAbilityThree()" src="images/Help_Pix!.png" id="abilitythree"></td>
				<td><img onclick="changeAbilityFour()" src="images/Wild_Growth.png" id="abilityfour"></td>
			</tr>
		</table>
		
		<h3 style="text-align: center;" id="abilityname">This is Something</h3>
		
		<p id="abilitytext">This is the passive it does passive things</p>
		
		<!-- changes the ability description -->
		<script>
			function changePassive(){
					var champ_name = "";
					champ_name = $("#search").val();
					if(champ_name !== ""){
					
						$.ajax({
							url:  'https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=passive&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184',
							type: 'GET',
							dataType: 'json',
							data: {

							},
							success: function (json) {
								var champ_name_nospaces = champ_name.replace(" ", "");
								champ_name_nospaces = champ_name_nospaces.toLowerCase().trim();
								
								<!-- passive description -->
								var pass_text = document.getElementById('abilitytext');
								pass_text.innerHTML = json.data[champ_name].passive.description;
								
								var pass_title = document.getElementById('abilityname');
								pass_title.innerHTML = json.data[champ_name].passive.name;
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								alert("error getting Summoner data!");
							}
						});
					}
					
			}
			
			function changeAbilityOne(){
					var champ_name = "";
					champ_name = $("#search").val();
					if(champ_name !== ""){
					
						$.ajax({
							url:  'https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=spells&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184',
							type: 'GET',
							dataType: 'json',
							data: {

							},
							success: function (json) {
								var champ_name_nospaces = champ_name.replace(" ", "");
								champ_name_nospaces = champ_name_nospaces.toLowerCase().trim();
								
								
								<!-- ability description -->
								
								var ab_one_text = document.getElementById('abilitytext');
								
								
								var ab_one_title = document.getElementById('abilityname');
								ab_one_title.innerHTML = json.data[champ_name].spells[0].name;
								
								<!-- testing code    split option [e][0-9]{1}ig -->
								
								<!-- replacing placeholder values with real data -->
								var str = json.data[champ_name].spells[0].tooltip;
								
								str = str.replace(/{/g, '').replace(/}/g, '');
								
								var e_array = str.match(/[e][0-9]/g);
								var f_array = str.match(/[f][0-9]/g);
								var a_array = str.match(/[a][0-9]/g);
								
								var varslength;
								
								if(f_array != null && a_array != null){
									varslength = f_array.length + a_array.length;
								}
								if(f_array == null && a_array != null){
									varslength = a_array.length;
								}
								if(a_array == null && f_array != null){
									varslength = f_array.length;
								}
								if(f_array == null && a_array == null){
									varslength = 0;
								}	
								
								if(e_array != null){
									for(i=0; i < e_array.length; i++){
										var e_array_two = [""];
										e_array_two[i] = e_array[i].replace(/\D/g, '');
										e_array_two[i] = Number(e_array_two[i]);
										str = str.replace(e_array[i] , json.data[champ_name].spells[0].effectBurn[e_array_two[i]]);
									}
								}
								
								
								if(f_array != null){
									for(j=0; j < f_array.length; j++){
										for(h=0; h < varslength; h++){
											if(json.data[champ_name].spells[0].vars[h] != undefined){
												if(json.data[champ_name].spells[0].vars[h].key == f_array[j]){
													str = str.replace(f_array[j] , json.data[champ_name].spells[0].vars[h].coeff);
												}
											}
										}
									}
								}
								

								
								if(a_array != null){
									
									for(k=0; k < a_array.length; k++){
										for(g=0; g < varslength; g++){
											console.log(varslength);
											if(json.data[champ_name].spells[0].vars[g] != undefined){
												if(json.data[champ_name].spells[0].vars[g].key == a_array[k]){
													str = str.replace(a_array[k] , json.data[champ_name].spells[0].vars[g].coeff);
												}
											}
										}
										
									}
								}
								ab_one_text.innerHTML = str;
								
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								alert("error getting Summoner data!");
							}
						});
					}
			}	
			function changeAbilityTwo(){
				var champ_name = "";
					champ_name = $("#search").val();
					if(champ_name !== ""){
					
						$.ajax({
							url:  'https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=spells&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184',
							type: 'GET',
							dataType: 'json',
							data: {

							},
							success: function (json) {
								var champ_name_nospaces = champ_name.replace(" ", "");
								champ_name_nospaces = champ_name_nospaces.toLowerCase().trim();
								
								<!-- passive description -->
								var ab_two_text = document.getElementById('abilitytext');
								
								var ab_two_title = document.getElementById('abilityname');
								ab_two_title.innerHTML = json.data[champ_name].spells[1].name;
								
								
								<!-- replacing placeholder values with real data -->
								var str = json.data[champ_name].spells[1].tooltip;
								
								str = str.replace(/{/g, '').replace(/}/g, '');
								
								var e_array = str.match(/[e][0-9]/g);
								var f_array = str.match(/[f][0-9]/g);
								var a_array = str.match(/[a][0-9]/g);
								
								var varslength;
								
								if(f_array != null && a_array != null){
									varslength = f_array.length + a_array.length;
								}
								if(f_array == null && a_array != null){
									varslength = a_array.length;
								}
								if(a_array == null && f_array != null){
									varslength = f_array.length;
								}
								if(f_array == null && a_array == null){
									varslength = 0;
								}	
								
								if(e_array != null){
									for(i=0; i < e_array.length; i++){
										console.log(e_array[i]);
										var e_array_two = [""];
										e_array_two[i] = e_array[i].replace(/\D/g, '');
										e_array_two[i] = Number(e_array_two[i]);
										str = str.replace(e_array[i] , json.data[champ_name].spells[1].effectBurn[e_array_two[i]]);
									}
								}
								
								
								if(f_array != null){
									for(j=0; j < f_array.length; j++){
										for(h=0; h < varslength; h++){
											if(json.data[champ_name].spells[1].vars[h] != undefined){
												if(json.data[champ_name].spells[1].vars[h].key == f_array[j]){
													str = str.replace(f_array[j] , json.data[champ_name].spells[1].vars[h].coeff);
												}
											}
										}
									}
								}
								
								if(a_array != null){
									
									for(k=0; k < a_array.length; k++){
										for(g=0; g < varslength; g++){
											if(json.data[champ_name].spells[1].vars[g] != undefined){
												if(json.data[champ_name].spells[1].vars[g].key == a_array[k]){
													str = str.replace(a_array[k] , json.data[champ_name].spells[1].vars[g].coeff);
												}
											}
										}
										
									}
								}
								ab_two_text.innerHTML = str;
								
								
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								alert("error getting Summoner data!");
							}
						});
					}
			}	
			function changeAbilityThree(){
				var champ_name = "";
					champ_name = $("#search").val();
					if(champ_name !== ""){
					
						$.ajax({
							url:  'https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=spells&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184',
							type: 'GET',
							dataType: 'json',
							data: {

							},
							success: function (json) {
								var champ_name_nospaces = champ_name.replace(" ", "");
								champ_name_nospaces = champ_name_nospaces.toLowerCase().trim();
								
								<!-- passive description -->
								var ab_three_text = document.getElementById('abilitytext');
								
								var ab_three_title = document.getElementById('abilityname');
								ab_three_title.innerHTML = json.data[champ_name].spells[2].name;
								
								<!-- replacing placeholder values with real data -->
								var str = json.data[champ_name].spells[2].tooltip;
								
								str = str.replace(/{/g, '').replace(/}/g, '');
								
								var e_array = str.match(/[e][0-9]/g);
								var f_array = str.match(/[f][0-9]/g);
								var a_array = str.match(/[a][0-9]/g);
								
								var varslength;
								
								if(f_array != null && a_array != null){
									varslength = f_array.length + a_array.length;
								}
								if(f_array == null && a_array != null){
									varslength = a_array.length;
								}
								if(a_array == null && f_array != null){
									varslength = f_array.length;
								}
								if(f_array == null && a_array == null){
									varslength = 0;
								}	
								
								if(e_array != null){
									for(i=0; i < e_array.length; i++){

										var e_array_two = [""];
										e_array_two[i] = e_array[i].replace(/\D/g, '');
										e_array_two[i] = Number(e_array_two[i]);
										str = str.replace(e_array[i] , json.data[champ_name].spells[2].effectBurn[e_array_two[i]]);
									}
								}
								
								
								if(f_array != null){
									for(j=0; j < f_array.length; j++){
										for(h=0; h < varslength; h++){
											if(json.data[champ_name].spells[2].vars[h] != undefined){
												if(json.data[champ_name].spells[2].vars[h].key == f_array[j]){
													str = str.replace(f_array[j] , json.data[champ_name].spells[2].vars[h].coeff);
												}
											}
										}
									}
								}
								
								if(a_array != null){
									
									for(k=0; k < a_array.length; k++){
										for(g=0; g < varslength; g++){
											console.log(json.data[champ_name].spells[2].vars[g].key);
											if(json.data[champ_name].spells[2].vars[g] != undefined){
												if(json.data[champ_name].spells[2].vars[g].key == a_array[k]){
													str = str.replace(a_array[k] , json.data[champ_name].spells[2].vars[g].coeff);
												}
											}
										}
										
									}
								}
								ab_three_text.innerHTML = str;
								
								
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								alert("error getting Summoner data!");
							}
						});
					}
			}	
			function changeAbilityFour(){
				var champ_name = "";
					champ_name = $("#search").val();
					if(champ_name !== ""){
					
						$.ajax({
							url:  'https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=spells&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184',
							type: 'GET',
							dataType: 'json',
							data: {

							},
							success: function (json) {
								var champ_name_nospaces = champ_name.replace(" ", "");
								champ_name_nospaces = champ_name_nospaces.toLowerCase().trim();
								
								<!-- passive description -->
								var ab_four_text = document.getElementById('abilitytext');
								
								var ab_four_title = document.getElementById('abilityname');
								ab_four_title.innerHTML = json.data[champ_name].spells[3].name;
								
								<!-- replacing placeholder values with real data -->
								var str = json.data[champ_name].spells[3].tooltip;
								
								str = str.replace(/{/g, '').replace(/}/g, '');
								
								var e_array = str.match(/[e][0-9]/g);
								var f_array = str.match(/[f][0-9]/g);
								var a_array = str.match(/[a][0-9]/g);
								
								var varslength;
								
								if(f_array != null && a_array != null){
									varslength = f_array.length + a_array.length;
								}
								if(f_array == null && a_array != null){
									varslength = a_array.length;
								}
								if(a_array == null && f_array != null){
									varslength = f_array.length;
								}
								if(f_array == null && a_array == null){
									varslength = 0;
								}	
								
								if(e_array != null){
									for(i=0; i < e_array.length; i++){
										console.log(e_array[i]);
										var e_array_two = [""];
										e_array_two[i] = e_array[i].replace(/\D/g, '');
										e_array_two[i] = Number(e_array_two[i]);
										str = str.replace(e_array[i] , json.data[champ_name].spells[3].effectBurn[e_array_two[i]]);
									}
								}
								
								
								if(f_array != null){
									for(j=0; j < f_array.length; j++){
										for(h=0; h < varslength; h++){
											if(json.data[champ_name].spells[3].vars[h] != undefined){
												if(json.data[champ_name].spells[3].vars[h].key == f_array[j]){
													str = str.replace(f_array[j] , json.data[champ_name].spells[3].vars[h].coeff);
												}
											}
										}
									}
								}
								
								if(a_array != null){
									
									for(k=0; k < a_array.length; k++){
										for(g=0; g < varslength; g++){
											if(json.data[champ_name].spells[3].vars[g] != undefined){
												if(json.data[champ_name].spells[3].vars[g].key == a_array[k]){
													str = str.replace(a_array[k] , json.data[champ_name].spells[3].vars[g].coeff);
												}
											}
										}
										
									}
								}
								ab_four_text.innerHTML = str;
								
								
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								alert("error getting Summoner data!");
							}
						});
					}
			}
		</script>
		
	</div>
	<div>
		<!-- get ready for an abomination of a table for the runes -->
		<h2 class="section_headers">Runes</h2>
		
		<p style="text-align: center;"> Now it is time for you to choose the rune page you will be using. Please pick 9 Marks, 9 Seals, 9 Glyphs, and 3 Quints.</p>
		
		<form name="runetable" id="runetable" method="post">
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
					<select id="attackdamagemark" name="attackdamagemark"> 
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
		<!--<button style="margin-left: 30px;" type="button">Update Runes</button>-->
		<input style="margin-left: 30px;" type="submit" name="submit">
	</div>
	</form>
	
	<div>
		
		<form name="gamedetails" id="gamedetails" method="post">
		<h2 class="section_headers">Game Details</h2>
		<div class="gamedetails">
			<ul class="gamedetails">
				<li style="padding: 11px">Level </li>
				<li style="padding: 11px">Kills</li>
				<li style="padding: 11px">Assists</li>
				<li style="padding: 11px">Creep Score</li>
			</ul>	
		</div>
		<div class="gameinputs">
			<ul class="gameinputs">
				<li>
					<select name="level"> 
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
				<li><input style="width: 50px;" type="number" name ="kills"></li>				<li><input style="width: 50px;" type="number" name="assists"></li>
				<li><input style="width: 50px;" type="number" name="cs"></li>
			</ul>
		</div>
		<div class="gamedetails">
			<ul class="gamedetails">
				<li style="padding: 11px" name="towers">Towers Taken</li>
				<li style="padding: 11px" name="dragons">Dragon Kills</li>
				<li style="padding: 11px" name="barons">Baron Kills</li>
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
		<!--<button style="margin-left: 30px;" type="button">Update Game Details</button> -->
		<input style="margin-left: 30px;" type="submit" name="submit">
	</div>
	</form>
	
	<br>
	<br>
	<br>
	<div style="padding: 10px;">
		<h2 class="section_headers" style="position: relative; right: 10px;">Shop</h2>
		
		<div id="shopicons">
			<!-- shows 80 item icons -->
			img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			<img class="shopicon" id="shop_icon" src="images/EmptyIcon_Item.png">
			
		</div>
	
		<div id="gold">
			<h4>Gold: Insert Number Here</h4>
		</div>
		<div id="inventory">
			<h4>Inventory</h4>
			<img id="inventory_items" src="images/EmptyIcon_Item.png">
			<img id="inventory_items" src="images/EmptyIcon_Item.png">
			<img id="inventory_items" src="images/EmptyIcon_Item.png">
			<img id="inventory_items" src="images/EmptyIcon_Item.png">
			<img id="inventory_items" src="images/EmptyIcon_Item.png">
			<img id="inventory_items" src="images/EmptyIcon_Item.png">
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