<?php
function race($race){
	switch($race){
		case '1': $_race = "Human";
			break;
		case '2': $_race = "Orc";
			break;
		case '3': $_race = "Dwarf";
			break;
		case '4': $_race = "Night Elf";
			break;
		case '5': $_race = "Undead";
			break;
		case '6': $_race = "Tauren";
			break;
		case '7': $_race = "Gnome";
			break;
		case '8': $_race = "Troll";
			break;
		case '9': $_race = "Goblin";
			break;
		case '10': $_race = "Blood Elf";
			break;
		case '11': $_race = "Draenei";
			break;
		case '22': $_race = "Worgen";
			break;
		default: $_race = "All Races";
	}
	return $_race;
}

function classx($classx){
switch($classx){
	case '1': $_class = "Warrior";
		break;
	case '2': $_class = "Paladin";
		break;
	case '3': $_class = "Hunter";
		break;
	case '4': $_class = "Rogue";
		break;
	case '5': $_class = "Priest";
		break;
	case '6': $_class = "Death Knight";
		break;
	case '7': $_class = "Shaman";
		break;
	case '8': $_class = "Mage";
		break;
	case '9': $_class = "Warlock";
		break;
	case '11': $_class = "Druid";
		break;
	default: $_class = "All Class";
}
return $_class;
}

function quality($quality){
switch($quality){
case "Poor":
return 0;
break;
case "Common":
return 1;
break;
case "Uncommon":
return 2;
break;
case "Rare":
return 3;
break;
case "Epic":
return 4;
break;
case "Legendary":
return 5;
break;
case "Artifact":
return 6;
break;
case "Heirloom":
return 7;
break;
}}


?>