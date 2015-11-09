create table Game_Instance(
	lvl integer,
	towers_killed integer,
	creep_score integer,
	kills integer,
	deaths integer,
	assists integer,
	game_time time,
	barons integer,
	dragons integer,
	clears integer,
	ability_seq VARCHAR(24)
);

create table Champs_Stats(
	champ_id varchar(10),
	health integer,
	health_regen numeric(3,2),
	mana integer,
	mana_regen numeric(3,2),
	armor integer,
	magic_resist integer,
	attack_damage integer,
	ability_power integer,
	flat_armor_pen integer,
	percent_amror_pen integer,
	flat_magic_pen integer,
	percent_magic_pen integer,
	attack_speed numeric(1,2),
	flat_move_speed integer,
	percent_move_speed integer,
	crit_chance integer,
	cooldown_reduction integer,
	lifesteal integer,
	spellvamp integer
);

create table Item_Stats(
        item_id varchar(10),
        health integer,
	health_regen numeric(3,2),
	mana integer,
	mana_regen numeric(3,2),
	armor integer,
	magic_resist integer,
	attack_damage integer,
	ability_power integer,
	flat_armor_pen integer,
	percent_amror_pen integer,
	flat_magic_pen integer,
	percent_magic_pen integer,
	attack_speed numeric(1,2),
	flat_move_speed integer,
	percent_move_speed integer,
	crit_chance integer,
	cooldown_reduction integer,
	lifesteal integer,
	spellvamp integer
);

create table Rune_Page_Stats(
);

create table Dragon_Buff_Stats(
        dragon_num integer,
        bonus_attack_damage numeric(1,2),
        bonus_ability_power numeric(1,2),
        bonus_movement_speed numeric(1,2)
);

create table Current_Stats(
);

create table Inventory(
        item_name varchar(30),
        item_id varchar(10) references Item_Stats(item_id),
        inventory_num integer
);
