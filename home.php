<!DOCTYPE html>
<html>
<link href="default.css" rel="stylesheet" type="text/css" media="all" />

<head>
<title>LoL Game Simulator</title>
</head>
<body>

<script>
function getstats() {
	
        if (window.XMLHttpRequest) {
            // code for IE7+, Firefox, Chrome, Opera, Safari
            xmlhttp = new XMLHttpRequest();
        } else {
            // code for IE6, IE5
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }

        xmlhttp.onreadystatechange = function() {
            if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
                
                var responsearray=xmlhttp.responseText.split("|");
                console.log(xmlhttp.responseText);

                document.getElementById("gold2").innerHTML = responsearray[0];
                document.getElementById("health").innerHTML = responsearray[1];
                document.getElementById("mana").innerHTML = responsearray[2];
                document.getElementById("attack damage").innerHTML = responsearray[3];
                document.getElementById("health regen").innerHTML = responsearray[4];
                document.getElementById("mana regen").innerHTML = responsearray[5];
                document.getElementById("attack speed").innerHTML = responsearray[6];
                document.getElementById("cooldown reduction").innerHTML = responsearray[7];
                document.getElementById("magic pen").innerHTML = responsearray[8];
                document.getElementById("percent magic pen").innerHTML = responsearray[9];
                document.getElementById("critical chance").innerHTML = responsearray[10];
                document.getElementById("move speed").innerHTML = responsearray[11];
                document.getElementById("armor pen").innerHTML = responsearray[12];
                document.getElementById("percent armor pen").innerHTML = responsearray[13];
                document.getElementById("ability power").innerHTML = responsearray[14];
                document.getElementById("magic res").innerHTML = responsearray[15];
                document.getElementById("armor2").innerHTML = responsearray[16];
                document.getElementById("attackrange2").innerHTML = responsearray[17];
            }
        };
        xmlhttp.open("GET","getstats.php?q=",true);
        xmlhttp.send();
}
</script>

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

        $('#gamedetails').on('submit', function (e) {

            e.preventDefault();

            $.ajax({
              type: 'post',
              url: 'runesandgamedetails.php',
              data: $('form').serialize(),
              success: function () {
                alert('Runes and Game Details updated!');
              }
            });

            setTimeout(getstats, 1000);

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
					<button onclick="on_search(), change_passive(), change_abilities(), get_base_stats()" type="button">Search</button>
				
			</div>
		</div>
		
	</div>
	
	<p style="text-align: center;" id="test">Welcome to Pix's League of Legends Simulator. Here you can test builds without having to even step foot on the Rift. 
				Just Enter the champion you want calculate stats for and some details about the game then we will show exactly how much damage your champion 
				will do with that build.</p>
	
	<ul class="navigationbar">
		<li class="navigationbaritems" style="border-top: solid black; border-right: solid black; border-left: solid black; font-weight: bold;">Navigation Bar</li>
		<li class="navigationbaritems" style="border-right: solid black; solid black; border-left: solid black;"><a href="#stats">Stats</a></li>
		<li class="navigationbaritems" style="border-right: solid black; solid black; border-left: solid black;"><a href="#abilities">Abilities</a></li>
		<li class="navigationbaritems" style="border-right: solid black; solid black; border-left: solid black;"><a href="#runeandgame">Runes and Game Details</a></li>
		<li class="navigationbaritems" style="border-right: solid black; border-bottom: solid black; solid black; border-left: solid black;"><a href="#shop">Shop</a></li>
	</ul>


	<div id="sectionone">
		
		<div class="icon">
			<h2 class="section_headers" style="position: relative; right: 50px;" id="stats">Stats</h2>
			<img id="champ_icon" src="images/ChampionSquare.png" alt="Champ Icon">
			
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
						get_base_stats();
						setTimeout(getstats, 1000);
					}

					return false;
				}	
				
				
			</script>
			
			<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
			<script>
				<!-- this function intializes the shop when the page loads-->
				$(document).ready(function(){
						$.ajax({
							url:  'https://global.api.pvp.net/api/lol/static-data/na/v1.2/item?itemListData=all&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184',
							type: 'GET',
							dataType: 'json',
							data: {

							},
							success: function (json) {
								var shop_array = [];
								var item_info = [];
								
								for(var key in json.data){
									if(json.data.hasOwnProperty(key)){	
										shop_array.push(key);
										item_info.push(json.data[key]);
									}
									for(k=0; k < shop_array.length; k++){
										if(item_info[k].maps["11"] == false){
											shop_array.splice(k,1);
											item_info.splice(k,1);
										}
									}
									for(k=0; k < shop_array.length; k++){
										if(item_info[k].consumed == true){
											shop_array.splice(k,1);
											item_info.splice(k,1);
										}
									}
									for(k=0; k < shop_array.length; k++){
										if(item_info[k].group == "BootsDistortion"){
											shop_array.splice(k,1);
											item_info.splice(k,1);
										}
									}
									for(k=0; k < shop_array.length; k++){
										if(item_info[k].group == "BootsCaptain"){
											shop_array.splice(k,1);
											item_info.splice(k,1);
										}
									}
									for(k=0; k < shop_array.length; k++){
										if(item_info[k].group == "BootsAlacrity"){
											shop_array.splice(k,1);
											item_info.splice(k,1);
										}
									}
									for(k=0; k < shop_array.length; k++){
										if(item_info[k].group == "BootsFuror"){
											shop_array.splice(k,1);
											item_info.splice(k,1);
										}
									}
								}
								j=0;
								for(i=0; i<80; i++){

											var num = i.toString();
											var shop_icon_string = "shop_icon"
											var shop_id = shop_icon_string.concat(num);
											var item_url = "http://ddragon.leagueoflegends.com/cdn/5.23.1/img/item/";
											var temp = shop_array[j];
											
											var mid_shop_array = temp.concat(".png");
											
											var shop_source = document.getElementById(shop_id);
											shop_source.src = item_url.concat(mid_shop_array);
											j++;

								}
								
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								
							}
						});
					
				});

				function get_base_stats(){
					var champ_name = "";
					champ_name = $("#search").val();
					if(champ_name !== ""){

						$.ajax({
							url: 'https://global.api.pvp.net/api/lol/static-data/na/v1.2/champion?champData=stats&api_key=59080bd8-1d31-44be-8a1e-3ecd9a372501',
							type: 'GET',
							dataType: 'json',
							data:{

							},
							success: function (json) {
								var champ_name_nospaces = champ_name.replace(" ", "");
								champ_name_nospaces = champ_name_nospaces.toLowerCase().trim();

								pass = json.data[champ_name].stats;
								console.log(pass);

								var stats = {attackrange:"0",mpperlevel:"0",mp:"0",attackdamage:"0",hp:"0",hpperlevel:"0",attackdamageperlevel:"0",armor:"0",mpregenperlevel:"0",
											 hpregen:"0",critperlevel:"0",spellblockperlevel:"0",mpregen:"0",
											 attackspeedperlevel:"0",spellblock:"0",movespeed:"0",attackspeedoffset:"0",crit:"0",hpregenperlevel:"0",armorperlevel:"0"};

								for(var property in stats)
								{
									if(stats.hasOwnProperty(property))
									{
										stats[property]=json.data[champ_name].stats[property];
									}
								}

								//i know this looks janky, and it is, so i have no excuse
								document.getElementById("attackrange").value=stats.attackrange;
								document.getElementById("mpperlevel").value=stats.mpperlevel;
								document.getElementById("mp").value=stats.mp;
								document.getElementById("attackdamage").value=stats.attackdamage;
								document.getElementById("hp").value=stats.hp;
								document.getElementById("hpperlevel").value=stats.hpperlevel;
								document.getElementById("attackdamageperlevel").value=stats.attackdamageperlevel;
								document.getElementById("armor").value=stats.armor;
								document.getElementById("mpregenperlevel").value=stats.mpregenperlevel;
								document.getElementById("hpregen").value=stats.hpregen;
								document.getElementById("critperlevel").value=stats.critperlevel;
								document.getElementById("mrperlevel").value=stats.spellblockperlevel;
								document.getElementById("mpregen").value=stats.mpregen;
								document.getElementById("attackspeedperlevel").value=stats.attackspeedperlevel;
								document.getElementById("mr").value=stats.spellblock;
								document.getElementById("movespeed").value=stats.movespeed;
								document.getElementById("crit").value=stats.crit;
								document.getElementById("hpregenperlevel").value=stats.hpregenperlevel;
								document.getElementById("armorperlevel").value=stats.armorperlevel;
								document.getElementById("attackspeedoffset").value=stats.attackspeedoffset;
								
					            $.ajax({
					                type: 'post',
					                url: 'runesandgamedetails.php',
					                data: $('form').serialize(),
					                success: function () {
					                  alert('Runes and Game Details updated!');
					                }
					              });
							}
						})
					}
				}
				
				<!-- this function controls the shop filters -->
				function shop_filter(){
					$.ajax({
						url:  'https://global.api.pvp.net/api/lol/static-data/na/v1.2/item?itemListData=all&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184',
						type: 'GET',
						dataType: 'json',
						data: {

						},
						success: function (json) {
							var shop_array = [];
							var item_info = [];
							var tag_info = [];
							var shop_array_modified = [];
							
							for(var key in json.data){
								if(json.data.hasOwnProperty(key)){	
									shop_array.push(key);
									item_info.push(json.data[key]);
									tag_info.push(json.data[key].tags);
								}
							}	
							for(k=0; k < shop_array.length; k++){
								if(item_info[k].maps["11"] == false){
									shop_array.splice(k,1);
									item_info.splice(k,1);
									tag_info.splice(k,1);
								}
							}
							for(k=0; k < shop_array.length; k++){
								if(item_info[k].consumed == true){
									shop_array.splice(k,1);
									item_info.splice(k,1);
									tag_info.splice(k,1);
								}
							}
							for(k=0; k < shop_array.length; k++){
								if(item_info[k].group == "BootsDistortion"){
									shop_array.splice(k,1);
									item_info.splice(k,1);
									tag_info.splice(k,1);
								}
							}
							for(k=0; k < shop_array.length; k++){
								if(item_info[k].group == "BootsCaptain"){
									shop_array.splice(k,1);
									item_info.splice(k,1);
									tag_info.splice(k,1);
								}
							}
							for(k=0; k < shop_array.length; k++){
								if(item_info[k].group == "BootsAlacrity"){
									shop_array.splice(k,1);
									item_info.splice(k,1);
									tag_info.splice(k,1);
								}
							}
							for(k=0; k < shop_array.length; k++){
								if(item_info[k].group == "BootsFuror"){
									shop_array.splice(k,1);
									item_info.splice(k,1);
									tag_info.splice(k,1);
								}
							}
							
							var check_health = document.getElementById('health_filter').checked;
							var check_MR = document.getElementById('MR_filter').checked;
							var check_armor = document.getElementById('armor_filter').checked;
							var check_AD = document.getElementById('AD_filter').checked;
							var check_AS = document.getElementById('AS_filter').checked;
							var check_crit = document.getElementById('crit_filter').checked;
							var check_lifesteal = document.getElementById('lifesteal_filter').checked;
							var check_AP = document.getElementById('AP_filter').checked;
							var check_CDR = document.getElementById('CDR_filter').checked;
							var check_mana = document.getElementById('mana_filter').checked;
							var check_mana_regen = document.getElementById('mana_regen_filter').checked;
							var check_MS = document.getElementById('MS_filter').checked;
							
							
							for(k=0; k < shop_array.length; k++){
								if(check_health == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'Health'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}
							
							for(k=0; k < shop_array.length; k++){
								if(check_MR == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'SpellBlock'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}
							
							for(k=0; k < shop_array.length; k++){
								if(check_armor == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'Armor'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}
							
							for(k=0; k < shop_array.length; k++){
								if(check_AD == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'Damage'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}

							for(k=0; k < shop_array.length; k++){
								if(check_AS == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'AttackSpeed'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}
							
							for(k=0; k < shop_array.length; k++){
								if(check_crit == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'CriticalStrike'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}

							for(k=0; k < shop_array.length; k++){
								if(check_lifesteal == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'LifeSteal'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}

							for(k=0; k < shop_array.length; k++){
								if(check_AP == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'SpellDamage'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}
							
							for(k=0; k < shop_array.length; k++){
								if(check_CDR == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'CooldownReduction'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}

							for(k=0; k < shop_array.length; k++){
								if(check_mana == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'Mana'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}
							
							for(k=0; k < shop_array.length; k++){
								if(check_mana_regen == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'ManaRegen'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}
							
							for(k=0; k < shop_array.length; k++){
								if(check_MS == true){
									
									for(var tem in tag_info[k]){
										
										if(tag_info[k][tem] == 'NonbootsMovement' || tag_info[k][tem] == 'Boots'){
											shop_array_modified.push(shop_array[k]);
										}
										
									}
								}
							}



								
							
							j=0;
							for(i=0; i<80; i++){
								if(shop_array_modified[j] != undefined){
									var num = i.toString();
									var shop_icon_string = "shop_icon"
									var shop_id = shop_icon_string.concat(num);
									var item_url = "http://ddragon.leagueoflegends.com/cdn/5.23.1/img/item/";
									var temp = shop_array_modified[j];
									var mid_shop_array = temp.concat(".png");
									
									var shop_source = document.getElementById(shop_id);
									shop_source.src = item_url.concat(mid_shop_array);
									j++;
								}else{
									var num = i.toString();
									var shop_icon_string = "shop_icon"
									var shop_id = shop_icon_string.concat(num);
									
									var shop_source = document.getElementById(shop_id);
									shop_source.src = "images/EmptyIcon_Item.png";
									j++;
								}	

							}
							
						},
						error: function (XMLHttpRequest, textStatus, errorThrown) {
							alert("error filtering the shop");
						}
					});
				}
				
				
				
				<!-- This function changes the passive -->
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
				<td>Health - <span id="health">0000</span></td>
				<td>Mana - <span id="mana">0000</span></td>	
				<td>Attack Damage - <span id="attack damage">0000</span></td>
				
				
			
			</tr>
			<tr>
				<td></td>
				<td>Health Regen - <span id="health regen">0000</span></td>
				<td>Mana Regen - <span id="mana regen">0000</span></td>
				<td>Attack Speed - <span id="attack speed">0000</span></td>
			</tr>
			<tr>
				<td>Cooldown Reduction - <span id="cooldown reduction">0000</span></td>
				<td>Magic Pen - <span id="magic pen">0000</span></td>
				<td>% Magic Pen - <span id="percent magic pen">0000</span></td>
				<td>Critical Chance - <span id="critical chance">0000</span></td>
		
			</tr>
			<tr>
				<td>Move Speed - <span id="move speed">0000</span></td>
				<td>Armor Pen - <span id="armor pen">0000</span></td>
				<td>% Armor pen - <span id="percent armor pen">0000</span></td>
				<td>Attack Range - <span id="attackrange2">0000</span></td>
				
			</tr>
			<tr>
				<td>Ability Power - <span id="ability power">0000</span></td>
				<td>Magic Res - <span id="magic res">0000</span></td>
				<td>Armor - <span id="armor2">0000</span></td>
				
			</tr>
		</table>
		</div>
	</div>
	
	<div>
		<h2 class="section_headers" id="abilities">Abilities</h2>
		<table id="abilitytable">
			<tr> 
				<td><img onclick="changePassive()" src="images/square-64.png" id="passive" width="64" height="64"></td>
				<td><img onclick="changeAbilityOne()" src="images/square-64.png" id="abilityone"></td>
				<td><img onclick="changeAbilityTwo()" src="images/square-64.png" id="abilitytwo"></td>
				<td><img onclick="changeAbilityThree()" src="images/square-64.png" id="abilitythree"></td>
				<td><img onclick="changeAbilityFour()" src="images/square-64.png" id="abilityfour"></td>
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
								

								//ability power
								if(a_array != null){
									
									for(k=0; k < a_array.length; k++){
										for(g=0; g < varslength; g++){
											console.log(varslength);
											if(json.data[champ_name].spells[0].vars[g] != undefined){
												if(json.data[champ_name].spells[0].vars[g].key == a_array[k]){
													//str = str.replace(a_array[k] , json.data[champ_name].spells[0].vars[g].coeff);

													setTimeout(getstats, 1000);
													var scaling=document.getElementById("ability power").innerHTML;
													scaling=scaling*json.data[champ_name].spells[0].vars[g].coeff;
													console.log(scaling);

													str = str.replace(a_array[k], scaling);
												}
											}
										}
										
									}
								}
								ab_one_text.innerHTML = str;
								
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
							
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
													//str = str.replace(a_array[k] , json.data[champ_name].spells[1].vars[g].coeff);

													setTimeout(getstats, 1000);
													var scaling=document.getElementById("ability power").innerHTML;
													scaling=scaling*json.data[champ_name].spells[1].vars[g].coeff;
													console.log(scaling);

													str = str.replace(a_array[k], scaling);
												}
											}
										}
										
									}
								}
								ab_two_text.innerHTML = str;
								
								
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
						
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
													//str = str.replace(a_array[k] , json.data[champ_name].spells[2].vars[g].coeff);

													setTimeout(getstats, 1000);
													var scaling=document.getElementById("ability power").innerHTML;
													scaling=scaling*json.data[champ_name].spells[2].vars[g].coeff;
													console.log(scaling);

													str = str.replace(a_array[k], scaling);
												}
											}
										}
										
									}
								}
								ab_three_text.innerHTML = str;
								
								
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
							
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
													//str = str.replace(a_array[k] , json.data[champ_name].spells[3].vars[g].coeff);

													setTimeout(getstats, 1000);
													var scaling=document.getElementById("ability power").innerHTML;
													scaling=scaling*json.data[champ_name].spells[3].vars[g].coeff;
													console.log(scaling);

													str = str.replace(a_array[k], scaling);
												}
											}
										}
										
									}
								}
								ab_four_text.innerHTML = str;
								
								
							},
							error: function (XMLHttpRequest, textStatus, errorThrown) {
								
							}
						});
					}
					
			}
			
			
			
		</script>
		
	</div>
	<div>
		<!-- get ready for an abomination of a table for the runes -->
		<h2 class="section_headers" id="runeandgame">Runes and Game Details</h2>
		
		<p style="text-align: center;"> Now it is time for you to choose the rune page you will be using. Please pick 9 Marks, 9 Seals, 9 Glyphs, and 3 Quints.</p>
		
		<form name="gamedetails" id="gamedetails" method="post">
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
	</div>
	
	<input id="attackrange" name="attackrange" type="hidden"></input>
	<input id="mpperlevel" name="mpperlevel" type="hidden"></input>
	<input id="mp" name="mp" type="hidden"></input>
	<input id="attackdamage" name="attackdamage" type="hidden"></input>
	<input id="hp" name="hp" type="hidden"></input>
	<input id="hpperlevel" name="hpperlevel" type="hidden"></input>
	<input id="attackdamageperlevel" name="attackdamageperlevel" type="hidden"></input>
	<input id="armor" name="armor" type="hidden"></input>
	<input id="mpregenperlevel" name="mpregenperlevel" type="hidden"></input>
	<input id="hpregen" name="hpregen" type="hidden"></input>
	<input id="critperlevel" name="critperlevel" type="hidden"></input>
	<input id="mrperlevel" name="mrperlevel" type="hidden"></input>
	<input id="mpregen" name="mpregen" type="hidden"></input>
	<input id="attackspeedperlevel" name="attackspeedperlevel" type="hidden"></input>
	<input id="mr" name="mr" type="hidden"></input>
	<input id="movespeed" name="movespeed" type="hidden"></input>
	<input id="crit" name="crit" type="hidden"></input>
	<input id="hpregenperlevel" name="hpregenperlevel" type="hidden"></input>
	<input id="armorperlevel" name="armorperlevel" type="hidden"></input>
	<input id="attackspeedoffset" name="attackspeedoffset" type="hidden"></input>
	<input id="flatarmormod" name="flatarmormod" type="hidden"></input>
	<input id="flatattackspeedmod" name="flatattackspeedmod" type="hidden"></input>
	<input id="flatcritchancemod" name="flatcritchancemod" type="hidden"></input>
	<input id="flathppoolmod" name="flathppoolmod" type="hidden"></input>
	<input id="flathpregenmod" name="flathpregenmod" type="hidden"></input>
	<input id="flatmppoolmod" name="flatmppoolmod" type="hidden"></input>
	<input id="flatmpregenmod" name="flatmpregenmod" type="hidden"></input>
	<input id="flatmagicdamagemod" name="flatmagicdamagemod" type="hidden"></input>
	<input id="flatmovementspeedmod" name="flatmovementspeedmod" type="hidden"></input>
	<input id="flatphysicaldamagemod" name="flatphysicaldamagemod" type="hidden"></input>
	<input id="flatspellblockmod" name="flatspellblockmod" type="hidden"></input>
	<input id="percentarmormod" name="percentarmormod" type="hidden"></input>
	<input id="percentattackspeedmod" name="percentattackspeedmod" type="hidden"></input>
	<input id="percentcritchancemod" name="percentcritchancemod" type="hidden"></input>
	<input id="percenthppoolmod" name="percenthppoolmod" type="hidden"></input>
	<input id="percenthpregenmod" name="percenthpregenmod" type="hidden"></input>
	<input id="percentmppoolmod" name="percentmppoolmod" type="hidden"></input>
	<input id="percentmpregenmod" name="percentmpregenmod" type="hidden"></input>
	<input id="percentmagicdamagemod" name="percentmagicdamagemod" type="hidden"></input>
	<input id="percentmovementspeedmod" name="percentmovementspeedmod" type="hidden"></input>
	<input id="percentphysicaldamagemod" name="percentphysicaldamagemod" type="hidden"></input>
	<input id="percentspellblockmod" name="percentspellblockmod" type="hidden"></input>
	<input id="gold3" name="gold3" type="hidden"></input>

	<div>
		


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
				<li><input style="width: 50px;" type="number" name ="kills" value="0"></li>				<li><input style="width: 50px;" type="number" name="assists" value="0"></li>
				<li><input style="width: 50px;" type="number" name="cs" value="0"></li>
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
				<li><input style="width: 50px;" type="number" value="0" name="towers"></li>
				<li><input style="width: 50px;" type="number" value="0" name="dragons"></li>
				<li><input style="width: 50px;" type="number" value="0" name="barons"></li>
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
		<h2 class="section_headers" style="position: relative; right: 10px;" id="shop">Shop</h2>
		
		<div id="shopicons">
			<!-- shows 80 item icons -->
			<div class="hoverinfo">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon0" src="images/EmptyIcon_Item.png"><p id="temp2" class="temp2">Empty Item Slot</p>
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon1" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon2" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon3" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon4" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon5" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon6" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon7" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon8" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon9" src="images/EmptyIcon_Item.png">
			
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon10" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon11" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon12" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon13" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon14" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon15" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon16" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon17" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon18" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon19" src="images/EmptyIcon_Item.png">
			
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon20" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon21" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon22" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon23" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon24" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon25" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon26" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon27" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon28" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon29" src="images/EmptyIcon_Item.png">
			
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon30" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon31" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon32" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon33" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon34" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon35" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon36" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon37" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon38" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon39" src="images/EmptyIcon_Item.png">
			
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon40" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon41" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon42" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon43" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon44" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon45" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon46" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon47" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon48" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon49" src="images/EmptyIcon_Item.png">
			
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon50" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon51" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon52" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon53" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon54" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon55" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon56" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon57" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon58" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon59" src="images/EmptyIcon_Item.png">
			
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon60" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon61" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon62" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon63" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon64" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon65" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon66" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon67" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon68" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon69" src="images/EmptyIcon_Item.png">
			
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon70" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon71" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon72" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon73" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon74" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon75" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon76" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon77" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon78" src="images/EmptyIcon_Item.png">
			<img onclick="add_inventory(this.id)" onmouseover="item_stats(this.id)" class="shopicon" id="shop_icon79" src="images/EmptyIcon_Item.png">
			</div>
		</div>
	
		<div id="gold">
			<h4>Gold: <span id="gold2">0000</span></h4>
		</div>
		<div id="inventory">
			<h4>Inventory</h4>
			<div class="hoverinfo">
			<img onclick="remove_item(this.id)" onmouseover="item_stats(this.id)" id="inventory_item0" src="images/EmptyIcon_Item.png"><p id="temp" class="temp">Empty Item Slot</p>
			<img onclick="remove_item(this.id)" onmouseover="item_stats(this.id)" id="inventory_item1" src="images/EmptyIcon_Item.png">
			<img onclick="remove_item(this.id)" onmouseover="item_stats(this.id)" id="inventory_item2" src="images/EmptyIcon_Item.png">
			<img onclick="remove_item(this.id)" onmouseover="item_stats(this.id)" id="inventory_item3" src="images/EmptyIcon_Item.png">
			<img onclick="remove_item(this.id)" onmouseover="item_stats(this.id)" id="inventory_item4" src="images/EmptyIcon_Item.png">
			<img onclick="remove_item(this.id)" onmouseover="item_stats(this.id)" id="inventory_item5" src="images/EmptyIcon_Item.png">
			</div>
		</div>
		
		<div class="filterlist">
			<h3>Filter</h3>
			Defense
			<ul class="filter">
				<li><input onclick="shop_filter()" id="health_filter" type="checkbox">Health</li>
				<li><input onclick="shop_filter()" id="MR_filter" type="checkbox">Magic Resist</li>
				<li><input onclick="shop_filter()" id="armor_filter" type="checkbox">Armor</li>
			</ul>	
			Attack
			<ul class="filter">
				<li><input onclick="shop_filter()" id="AD_filter" type="checkbox">Attack Damage</li>
				<li><input onclick="shop_filter()" id="AS_filter" type="checkbox">Attack Speed</li>
				<li><input onclick="shop_filter()" id="crit_filter" type="checkbox">Critical Chance</li>
				<li><input onclick="shop_filter()" id="lifesteal_filter" type="checkbox">Lifesteal</li>
			</ul>
			Magic
			<ul class="filter">
				<li><input onclick="shop_filter()" id="AP_filter" type="checkbox">Ability Power</li>
				<li><input onclick="shop_filter()" id="CDR_filter" type="checkbox">Cooldown Reduction</li>
				<li><input onclick="shop_filter()" id="mana_filter" type="checkbox">Mana</li>
				<li><input onclick="shop_filter()" id="mana_regen_filter" type="checkbox">Mana Regen</li>
			</ul>
			Movement
			<ul class="filter">
				<li><input onclick="shop_filter()" id="MS_filter"type="checkbox">Movespeed</li>
			</ul>
			
		</div>
	</div>

	

	<script>
		<!-- This function adds items to the inventory -->
		function add_inventory(clicked_id){

			//if(document.getElementById("gold2")>=json.gold.total)
			//{ 

			var shop_image = document.getElementById(clicked_id);
			var clicked_image = shop_image.src;
			var iven_zero = document.getElementById('inventory_item0');
			var iven_one = document.getElementById('inventory_item1');
			var iven_two = document.getElementById('inventory_item2');
			var iven_three = document.getElementById('inventory_item3');
			var iven_four = document.getElementById('inventory_item4');
			var iven_five = document.getElementById('inventory_item5');
			
			var zero_src = iven_zero.src;
			var one_src = iven_one.src;
			var two_src = iven_two.src;
			var three_src = iven_three.src;
			var four_src = iven_four.src;
			var five_src = iven_five.src;
			
			console.log(zero_src);
			
			var src_temp_zero = zero_src.substr(zero_src.length - 25, zero_src.length);
			var src_temp_one = one_src.substr(one_src.length - 25, one_src.length);
			var src_temp_two = two_src.substr(two_src.length - 25, two_src.length);
			var src_temp_three = three_src.substr(three_src.length - 25, three_src.length);
			var src_temp_four = four_src.substr(four_src.length - 25, four_src.length);
			var src_temp_five = five_src.substr(five_src.length - 25, five_src.length);
			
			var empty_item = "images/EmptyIcon_Item.png";

			console.log(iven_zero.src);
			
			if(src_temp_zero == empty_item){
				iven_zero.src = clicked_image;
			}else{
				if(src_temp_one == empty_item){
					iven_one.src = clicked_image;
				}else{
					if(src_temp_two == empty_item){
						iven_two.src = clicked_image;
					}else{
						if(src_temp_three == empty_item){
							iven_three.src = clicked_image;
						}else{
							if(src_temp_four == empty_item){
								iven_four.src = clicked_image;
							}else{
								if(src_temp_five == empty_item){
									iven_five.src = clicked_image;
								}
							}
						}
					}
				}	
			}
			//}

			var item_id = clicked_image;
			item_id = item_id.substr(item_id.length - 8);
			item_id = item_id.slice(0,4);
			
			item_url = "https://global.api.pvp.net/api/lol/static-data/na/v1.2/item/" + item_id + "?itemData=all&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184";

			<!-- will be used to send item information to the database -->
			$.ajax({
				url:  item_url,
				type: 'GET',
				dataType: 'json',
				data: {

				},
				success: function (json) {

					var item_stats = {FlatArmorMod:"0",FlatAttackSpeedMod:"0",FlatCritChanceMod:"0",FlatHPPoolMod:"0",FlatHPRegenMod:"0",FlatMPPoolMod:"0",FlatMPRegenMod:"0",
									  FlatMagicDamageMod:"0",FlatMovementSpeedMod:"0",FlatPhysicalDamageMod:"0",FlatSpellBlockMod:"0",PercentArmorMod:"0",PercentAttackSpeedMod:"0",
									  PercentCritChanceMod:"0",PercentHPPoolMod:"0",PercentMPRegenMod:"0",PercentMagicDamageMod:"0",PercentMovementSpeedMod:"0",PercentPhysicalDamageMod:"0",
									  PercentSpellBlockMod:"0"};

					for(var property in item_stats)
					{
						if(json.stats.hasOwnProperty(property))
						{
							item_stats[property]=json.stats[property];
						}
					}

					document.getElementById("flatarmormod").value=item_stats.FlatArmorMod;
					document.getElementById("flatattackspeedmod").value=item_stats.FlatAttackSpeedMod;
					document.getElementById("flatcritchancemod").value=item_stats.FlatCritChanceMod;
					document.getElementById("flathppoolmod").value=item_stats.FlatHPPoolMod;
					document.getElementById("flathpregenmod").value=item_stats.FlatHPRegenMod;
					document.getElementById("flatmppoolmod").value=item_stats.FlatMPPoolMod;
					document.getElementById("flatmpregenmod").value=item_stats.FlatMPRegenMod;
					document.getElementById("flatmagicdamagemod").value=item_stats.FlatMagicDamageMod;
					document.getElementById("flatmovementspeedmod").value=item_stats.FlatMovementSpeedMod;
					document.getElementById("flatphysicaldamagemod").value=item_stats.FlatPhysicalDamageMod;
					document.getElementById("flatspellblockmod").value=item_stats.FlatSpellBlockMod;
					document.getElementById("percentarmormod").value=item_stats.PercentArmorMod;
					document.getElementById("percentattackspeedmod").value=item_stats.PercentAttackSpeedMod;
					document.getElementById("percentcritchancemod").value=item_stats.PercentCritChanceMod;
					document.getElementById("percenthppoolmod").value=item_stats.PercentHPPoolMod;
					document.getElementById("percentmpregenmod").value=item_stats.PercentMPRegenMod;
					document.getElementById("percentmagicdamagemod").value=item_stats.PercentMagicDamageMod;
					document.getElementById("percentmovementspeedmod").value=item_stats.PercentMovementSpeedMod;
					document.getElementById("percentphysicaldamagemod").value=item_stats.PercentPhysicalDamageMod;
					document.getElementById("percentspellblockmod").value=item_stats.PercentSpellBlockMod;
					document.getElementById("gold3").value=json.gold.total;

					$.ajax({
		                type: 'post',
		                url: 'additem.php',
		                data: $('form').serialize(),
		                success: function () {
		                  alert('Stats updated!');
		                }
		            });

					setTimeout(getstats, 1000);
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("Empty Item Slot!");
				}
			}); 
		}

		<!-- This function will remove an item from the inventory if it is clicked on -->
		function remove_item(clicked_id){
			var inven_image = document.getElementById(clicked_id);
			var image_source = inven_image.src;
			inven_image.src = "images/EmptyIcon_Item.png";
			
			var remove_id = image_source;
			remove_id = remove_id.substr(remove_id.length - 8);
			remove_id = remove_id.slice(0,4);
			
			item_url = "https://global.api.pvp.net/api/lol/static-data/na/v1.2/item/" + remove_id + "?itemData=all&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184";

			<!-- will be used to send item information to the database -->
			$.ajax({
				url:  item_url,
				type: 'GET',
				dataType: 'json',
				data: {

				},
				success: function (json) {
					
					var item_stats = {FlatArmorMod:"0",FlatAttackSpeedMod:"0",FlatCritChanceMod:"0",FlatHPPoolMod:"0",FlatHPRegenMod:"0",FlatMPPoolMod:"0",FlatMPRegenMod:"0",
									  FlatMagicDamageMod:"0",FlatMovementSpeedMod:"0",FlatPhysicalDamageMod:"0",FlatSpellBlockMod:"0",PercentArmorMod:"0",PercentAttackSpeedMod:"0",
									  PercentCritChanceMod:"0",PercentHPPoolMod:"0",PercentMPRegenMod:"0",PercentMagicDamageMod:"0",PercentMovementSpeedMod:"0",PercentPhysicalDamageMod:"0",
									  PercentSpellBlockMod:"0"};
		
					for(var property in item_stats)
					{
						if(json.stats.hasOwnProperty(property))
						{
							item_stats[property]=json.stats[property];
						}
					}
		
					document.getElementById("flatarmormod").value=item_stats.FlatArmorMod;
					document.getElementById("flatattackspeedmod").value=item_stats.FlatAttackSpeedMod;
					document.getElementById("flatcritchancemod").value=item_stats.FlatCritChanceMod;
					document.getElementById("flathppoolmod").value=item_stats.FlatHPPoolMod;
					document.getElementById("flathpregenmod").value=item_stats.FlatHPRegenMod;
					document.getElementById("flatmppoolmod").value=item_stats.FlatMPPoolMod;
					document.getElementById("flatmpregenmod").value=item_stats.FlatMPRegenMod;
					document.getElementById("flatmagicdamagemod").value=item_stats.FlatMagicDamageMod;
					document.getElementById("flatmovementspeedmod").value=item_stats.FlatMovementSpeedMod;
					document.getElementById("flatphysicaldamagemod").value=item_stats.FlatPhysicalDamageMod;
					document.getElementById("flatspellblockmod").value=item_stats.FlatSpellBlockMod;
					document.getElementById("percentarmormod").value=item_stats.PercentArmorMod;
					document.getElementById("percentattackspeedmod").value=item_stats.PercentAttackSpeedMod;
					document.getElementById("percentcritchancemod").value=item_stats.PercentCritChanceMod;
					document.getElementById("percenthppoolmod").value=item_stats.PercentHPPoolMod;
					document.getElementById("percentmpregenmod").value=item_stats.PercentMPRegenMod;
					document.getElementById("percentmagicdamagemod").value=item_stats.PercentMagicDamageMod;
					document.getElementById("percentmovementspeedmod").value=item_stats.PercentMovementSpeedMod;
					document.getElementById("percentphysicaldamagemod").value=item_stats.PercentPhysicalDamageMod;
					document.getElementById("percentspellblockmod").value=item_stats.PercentSpellBlockMod;
					document.getElementById("gold3").value=json.gold.total;
		
					$.ajax({
		              type: 'post',
		              url: 'removeitem.php',
		              data: $('form').serialize(),
		              success: function () {
		                alert('Stats updated!');
		              }
		          });
		
					setTimeout(getstats, 1000);
				},
				error: function (XMLHttpRequest, textStatus, errorThrown) {
					alert("error getting Summoner data!");
				}
			});
		}
		
		function item_stats(hovered_id){
			var inven_image = document.getElementById(hovered_id);
			var image_source = inven_image.src;
			
			var stats = document.getElementById('temp');
			var stats2 = document.getElementById('temp2');
				
			var item_id = image_source;
			item_id = item_id.substr(item_id.length - 8);
			item_id = item_id.slice(0,4);
			
			item_url = "https://global.api.pvp.net/api/lol/static-data/na/v1.2/item/" + item_id + "?itemData=all&api_key=3f6239b0-97b4-42fa-8d52-63aabb176184";
			
			
			var src_temp = image_source.substr(image_source.length - 25, image_source.length);

				
			
			if(src_temp != "images/EmptyIcon_Item.png"){
				$.ajax({
					url:  item_url,
					type: 'GET',
					dataType: 'json',
					data: {

					},
					success: function (json) {	
						console.log(json.gold.total);
						stats.innerHTML = "Gold: " + json.gold.total + "      |      " + json.sanitizedDescription;
						stats2.innerHTML = "Gold: " + json.gold.total + "      |      " + json.sanitizedDescription;
					},
					error: function (XMLHttpRequest, textStatus, errorThrown) {
						alert("error getting Summoner data!");
					}
				});
			}else{
				stats.innerHTML = "Empty Item Slot"
			}
		}
			
			
			
	</script>
	
	
	<div>
		<h2>End of Page</h2>
	</div>

</div>

</body>
</html>