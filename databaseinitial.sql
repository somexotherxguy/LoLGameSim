create table Game_Instance(
	lvl float(5,2),
	towers_killed float(5,2),
	creep_score float(5,2),
	kills float(5,2),
	deaths float(5,2),
	assists float(5,2),
	game_time time,
	barons float(5,2),
	dragons float(5,2),
	clears float(5,2),
	ability_seq VARCHAR(24)
);

create table Champs_Stats(
	champ_id varchar(10),
	health float(5,2),
	health_regen numeric(3,2),
	mana float(5,2),
	mana_regen numeric(3,2),
	armor float(5,2),
	magic_resist float(5,2),
	attack_damage float(5,2),
	ability_power float(5,2),
	flat_armor_pen float(5,2),
	percent_amror_pen float(5,2),
	flat_magic_pen float(5,2),
	percent_magic_pen float(5,2),
	attack_speed float(5,2),
	flat_move_speed float(5,2),
	percent_move_speed float(5,2),
	crit_chance float(5,2),
	cooldown_reduction float(5,2),
	lifesteal float(5,2),
	spellvamp float(5,2)
);

create table Item_Stats(
    item_id varchar(10),
    gold_value float(5,2),
    health float(5,2),
	health_regen numeric(3,2),
	mana float(5,2),
	mana_regen numeric(3,2),
	armor float(5,2),
	magic_resist float(5,2),
	attack_damage float(5,2),
	ability_power float(5,2),
	flat_armor_pen float(5,2),
	percent_amror_pen float(5,2),
	flat_magic_pen float(5,2),
	percent_magic_pen float(5,2),
	attack_speed float(5,2),
	flat_move_speed float(5,2),
	percent_move_speed float(5,2),
	crit_chance float(5,2),
	cooldown_reduction float(5,2),
	lifesteal float(5,2),
	spellvamp float(5,2)
);

/* need to determine a way to deal with scaling runes */

create table Rune_Page_Stats(
    rune_id varchar(30),
    quantity float(5,2),
    ability_power float(5,2),
    armor float(5,2),
    armor_pen float(5,2),
    magic_resist float(5,2),
    magic_pen float(5,2),
    attack_damage float(5,2),
    attack_speed float(5,2),
    cooldown_reduction float(5,2),
    crit_chance float(5,2),
   	crit_damage float(5,2),
   	energy float(5,2),
   	energy_regen numeric(3,2),
   	health float(5,2),
   	health_regen numeric(3,2),
    percent_health float(5,2),
    mana float(5,2),
    mana_regen numeric(3,2),
    lifesteal float(5,2),
    move_speed float(5,2)
);

create table Dragon_Buff_Stats(
    dragon_num float(5,2),
    bonus_attack_damage float(5,2),
    bonus_ability_power float(5,2),
    bonus_movement_speed float(5,2)
);

create table Current_Stats(
	gold float(5,2),
    health float(5,2),
	health_regen numeric(3,2),
	mana float(5,2),
	mana_regen numeric(3,2),
	armor float(5,2),
	magic_resist float(5,2),
	attack_damage float(5,2),
	ability_power float(5,2),
	flat_armor_pen float(5,2),
	percent_armor_pen float(5,2),
	flat_magic_pen float(5,2),
	percent_magic_pen float(5,2),
	attack_speed float(5,2),
	flat_move_speed float(5,2),
	percent_move_speed float(5,2),
	crit_chance float(5,2),
	crit_damage float(5,2),
	energy float(5,2),
	energy_regen float(5,2),
	cooldown_reduction float(5,2),
	lifesteal float(5,2),
	spellvamp float(5,2)
);

create table Inventory(
    item_name varchar(30),
    item_id varchar(10) references Item_Stats(item_id),
    inventory_num float(5,2)
);
