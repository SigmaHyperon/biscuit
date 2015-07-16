<?php

function func_b_isAdmin()
{
    return \utility\sessions\sessionGet("login", false);
}

if($s_action = \utility\forms\get("action", false))
{
    switch($s_action)
    {
	case "list": 
	    func_v_list();
	    break;
	case "Ändern":
	    func_v_edit();
	    break;
	case "Hinzufügen":
	    func_v_add();
	    break;
	case "Löschen":
	    func_v_delete();
	    break;
	case "detail":
	    func_v_detail();
	    break;
	case "Details":
	    func_v_detail();
	    break;
	case "home":
	    func_v_home();
	    break;
	case "suche":
	    func_v_search();
	    break;
	default:
	    func_v_home();
	    break;
    }
}
else
{
    func_v_home();
}

function func_v_list()
{
    if($s_table = \utility\forms\get("table", false))
    {
	$a_table_attributes = [
	    "lieferanten"	=>  [
		"Id",
		"Firmenname",
		"Vorname",
		"Nachname",
		"Postleitzahl",
		"Ort",
		"Strasse",
	    ],
	    "raeume"	=>  [
		"Id",
		"Notiz",
		"Name",
		"Stockwerk",
	    ],
	    "geraete"	=>  [
		"Id",
		"Raum",
		"Lieferant",
		"Name",
		"Einkaufsdatum",
		"Notiz",
		"Hersteller",
		"Gewährleistungsbeginn",
		"Gewährleistungsende",
		"Seriennummer",
		"Art",
	    ],
	    "komponenten"	=>  [
		"Id",
		"Name",
		"Bestand",
		"Art"
	    ],
	    "komponentenarten"	=>  [
		"Id",
		"Name"
	    ],
	    "geraetearten"	=>  [
		"Id",
		"Name"
	    ],
	    "komponentenattribute"	=>  [
		"Id",
		"Name"
	    ],
	];
	$a_table_links = [
	    "lieferanten"	=>  "func_a_getLieferanten",
	    "raeume"		=>  "func_a_getRaeume",
	    "geraete"		=>  "func_a_getGeraete",
	    "komponenten"	=>  "func_a_getKomponenten",
	    "komponentenarten"	=>  "func_a_getKomponentenArten",
	    "geraetearten"	=>  "func_a_getGeraeteArten",
	    "komponentenattribute"	=>  "func_a_getAttribute",
	];
	$a_table_title = [
	    "lieferanten"	=>  "Lieferanten",
	    "raeume"		=>  "Räume",
	    "geraete"		=>  "Geräte",
	    "komponenten"	=>  "Komponenten",
	    "komponentenarten"	=>  "Komponentenarten",
	    "geraetearten"	=>  "Gerätearten",
	    "komponentenattribute"	=>  "Gerätearten",
	];
	if(isset($a_table_links[$s_table]))
	{
	    $aErgebnisse = call_user_func($a_table_links[$s_table]);
	    $aErgebnis_attribute = $a_table_attributes[$s_table];
	    $sTitel = $a_table_title[$s_table];
	    include "log_Liste.php";
	}
	else
	{
	    func_v_invalid();
	}
    }
    else
    {
	func_v_invalid();
    }
}

function func_v_edit()
{
    if($s_table = \utility\forms\get("table", false))
    {
	$a_table_links = [
	    "raeume"	    =>	"fro_Raeume_aendern.php",
	    "lieferanten"	    =>	"fro_Lieferanten_aendern.php",
	    "geraete"	    =>	"fro_Geraete_aendern.php",
	    "komponenten"	    =>	"fro_Komponenten_aendern.php",
	    "komponentenarten"	    =>	"fro_Komponentenarten_aendern.php",
	    "geraetearten"	    =>	"fro_Geraetearten_aendern.php",
	    "komponentenattribute"	    =>	"fro_Komponentenattribute_aendern.php",
	];
	if(isset($a_table_links[$s_table]))
	{
	    include $a_table_links[$s_table];
	}
	else
	{
	    func_v_invalid();
	}
    }
    else
    {
	func_v_invalid();
    }
}

function func_v_add()
{
    if($s_table = \utility\forms\get("table", false))
    {
	$a_table_links = [
	    "lieferanten"	=>  "fro_Lieferanten_hinzufuegen.php",
	    "raeume"	=>  "fro_Raeume_hinzufuegen.php",
	    "geraete"	=>  "fro_Geraete_hinzufuegen.php",
	    "komponenten"	=>  "fro_Komponenten_hinzufuegen.php",
	    "komponentenarten"	=>  "fro_Komponentenarten_hinzufuegen.php",
	    "geraetearten"	=>  "fro_Geraetearten_hinzufuegen.php",
	    "komponentenattribute"	=>  "fro_Komponentenattribute_hinzufuegen.php",
	];
	if(isset($a_table_links[$s_table]))
	{
	    include $a_table_links[$s_table];
	}
	else
	{
	    func_v_invalid();
	}
    }
    else
    {
	func_v_invalid();
    }
}

function func_v_delete()
{
    if($s_table = \utility\forms\get("table", false))
    {
	$a_table_links = [
	    "lieferanten"	=>  "func_form_delLieferantByID",
	    "raeume"	=>  "func_form_delRaumByID",
	    "geraete"	=>  "func_form_delGeraetByID",
	    "komponenten"	=>  "func_form_delKomponenteByID",
	    "komponentenarten"	=>  "func_form_delKomponentenArtByID",
	    "geraetearten"	=>  "func_form_delGeraeteArtByID",
	    "komponentenattribute"	=>  "func_form_delAttributByID",
	];
	if(isset($a_table_links[$s_table]) && $int_selektiert = \utility\forms\get("selektiert", false))
	{
	    if(call_user_func($a_table_links[$s_table], $int_selektiert))
	    {
		func_v_list();
	    }
	    else 
	    {
		echo "An error occured!";
	    }
	    
	}
	else
	{
	    func_v_invalid();
	}
    }
    else
    {
	func_v_invalid();
    }
}

function func_v_invalid()
{
    echo "<h1 color='red'>invalid action selected!</h1>";
    die();
}

function func_v_home()
{
    if(func_b_isAdmin())
    {
	include "./fro_Home_loggedin.php";
    }
    else
    {
	include "./fro_Home.php";
    }
}

function func_v_detail()
{
    if($s_table = \utility\forms\get("table", false))
    {
	$a_table_links = [
	    "geraete"	=>  "fro_Zuordnung_geraete_komponenten.php",
	    "komponenten"	=>  "fro_Zuordnung_komponenten_attribute.php",
	];
	if(isset($a_table_links[$s_table]))
	{
	    include $a_table_links[$s_table];
	}
	else
	{
	    func_v_invalid();
	}
    }
    else
    {
	func_v_invalid();
    }
}

function func_v_search()
{
    if(\utility\forms\post("txt_Suche_global", false))
    {
	include './log_search.php';
    }
    else
    {
	include "./fro_Suche_global.php";
    }
}
