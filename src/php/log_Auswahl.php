<?php
/**
 * überprüft ob ein Benutzer als Admin angemeldet ist
 * @return boolean
 */
function func_b_isAdmin()
{
    return \utility\sessions\sessionGet("login", false);
}

//leitet abfragen anhand des inhalts von $_GET["action"] an bestimmte funktionen weiter
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
//    wenn keine action ausgwählt wurde, wird auf die startseite weitergeleitet
    func_v_home();
}

/**
 * funktion zum handeln von listen
 */
function func_v_list()
{
//    prüfen ob eine tabelle ausgewählt wurde
    if($s_table = \utility\forms\get("table", false))
    {
//	definieren der arrays, die die Tabellenattribute enthalten
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
//	zuordnung von befüllungsfunktionen zu tabellen
	$a_table_links = [
	    "lieferanten"	=>  "func_a_getLieferanten",
	    "raeume"		=>  "func_a_getRaeume",
	    "geraete"		=>  "func_a_getGeraete",
	    "komponenten"	=>  "func_a_getKomponenten",
	    "komponentenarten"	=>  "func_a_getKomponentenArten",
	    "geraetearten"	=>  "func_a_getGeraeteArten",
	    "komponentenattribute"	=>  "func_a_getAttribute",
	];
//	zuordnung von Listenüberschriften zu tabellen
	$a_table_title = [
	    "lieferanten"	=>  "Lieferanten",
	    "raeume"		=>  "Räume",
	    "geraete"		=>  "Geräte",
	    "komponenten"	=>  "Komponenten",
	    "komponentenarten"	=>  "Komponentenarten",
	    "geraetearten"	=>  "Gerätearten",
	    "komponentenattribute"	=>  "Komponentenattribute",
	];
//	prüfen, ob daten zu der ausgewählten tabelle existieren
	if(isset($a_table_links[$s_table]))
	{
//	    umgebungsvariable für die liste mit den eigentlichen einträgen befüllen
	    $aErgebnisse = call_user_func($a_table_links[$s_table]);
//	    umgebungsvariable für listenattribute setzen
	    $aErgebnis_attribute = $a_table_attributes[$s_table];
//	    umgebungsvariable für listentitel setzen
	    $sTitel = $a_table_title[$s_table];
//	    dynamische liste includieren
//	    hier werden alle 3 umgebungsvariablen dann verwendet
//	    ich weiß ,dass das unschön ist, aber ich hatte keine zeit für eine bessere lösung
	    include "log_Liste.php";
	}
	else
	{
//	    wenn keine daten zur tabelle vorliegen wird ein fehler angezeigt
	    func_v_invalid();
	}
    }
    else
    {
//	wenn keine tabelle ausgewählt wurde wird ein fehler angezeigt
	func_v_invalid();
    }
}
/**
 * funktion zum handeln von editiervorgängen 
 */
function func_v_edit()
{
//    prüfen ob eine tabelle ausgewählt wurde
    if($s_table = \utility\forms\get("table", false))
    {
//	zuordnung tabellen <-> anzeigedateien
	$a_table_links = [
	    "raeume"	    =>	"fro_Raeume_aendern.php",
	    "lieferanten"	    =>	"fro_Lieferanten_aendern.php",
	    "geraete"	    =>	"fro_Geraete_aendern.php",
	    "komponenten"	    =>	"fro_Komponenten_aendern.php",
	    "komponentenarten"	    =>	"fro_Komponentenarten_aendern.php",
	    "geraetearten"	    =>	"fro_Geraetearten_aendern.php",
	    "komponentenattribute"	    =>	"fro_Komponentenattribute_aendern.php",
	];
//	prüfen ob für die gewählt tabelle eine seite existiert
	if(isset($a_table_links[$s_table]))
	{
//	    entsprechende datei einbinden
	    include $a_table_links[$s_table];
	}
	else
	{
//	    wenn keine daten zur tabelle vorliegen wird ein fehler angezeigt
	    func_v_invalid();
	}
    }
    else
    {
//	wenn keine tabelle ausgewählt wurde wird ein fehler angezeigt
	func_v_invalid();
    }
}
/**
 * funktion zum handeln von hinzufügungsvorgängen
 */
function func_v_add()
{
//    prüfen, ob eine tabelle ausgewählt wurde
    if($s_table = \utility\forms\get("table", false))
    {
//	zuordnung tabellen <-> anzeigedateien
	$a_table_links = [
	    "lieferanten"	=>  "fro_Lieferanten_hinzufuegen.php",
	    "raeume"	=>  "fro_Raeume_hinzufuegen.php",
	    "geraete"	=>  "fro_Geraete_hinzufuegen.php",
	    "komponenten"	=>  "fro_Komponenten_hinzufuegen.php",
	    "komponentenarten"	=>  "fro_Komponentenarten_hinzufuegen.php",
	    "geraetearten"	=>  "fro_Geraetearten_hinzufuegen.php",
	    "komponentenattribute"	=>  "fro_Komponentenattribute_hinzufuegen.php",
	];
//	prüfen ob für die gewählt tabelle eine seite existiert
	if(isset($a_table_links[$s_table]))
	{
//	    entsprechende datei einbinden
	    include $a_table_links[$s_table];
	}
	else
	{
//	    wenn keine daten zur tabelle vorliegen wird ein fehler angezeigt
	    func_v_invalid();
	}
    }
    else
    {
//	wenn keine tabelle ausgewählt wurde wird ein fehler angezeigt
	func_v_invalid();
    }
}
/**
 * funktion zum handeln von löschvorgängen
 */
function func_v_delete()
{
//    prüfen, ob eine tabelle ausgewählt wurde
    if($s_table = \utility\forms\get("table", false))
    {
//	Zurodnung tabellen <-> löschen-funktionen
	$a_table_links = [
	    "lieferanten"	=>  "func_form_delLieferantByID",
	    "raeume"	=>  "func_form_delRaumByID",
	    "geraete"	=>  "func_form_delGeraetByID",
	    "komponenten"	=>  "func_form_delKomponenteByID",
	    "komponentenarten"	=>  "func_form_delKomponentenArtByID",
	    "geraetearten"	=>  "func_form_delGeraeteArtByID",
	    "komponentenattribute"	=>  "func_form_delAttributByID",
	];
//	prüfen, ob eine funktion zur gewünschten tabelle existiert und ob ein eintrag ausgewählt wurde
	if(isset($a_table_links[$s_table]) && $int_selektiert = \utility\forms\get("selektiert", false))
	{
//	    ausführen des Löschvorgangs und prüfung, ob dieser erfolgreich war
	    if(call_user_func($a_table_links[$s_table], $int_selektiert))
	    {
//		wenn der vorgang erfolgreich war, wird die liste aus der gelöscht wurde angezeigt
		func_v_list();
	    }
	    else 
	    {
//		wenn der vorgang fehlschlägt wird eine fehler angezeigt
		echo "An error occured!";
	    }
	    
	}
	else
	{
//	    wenn keine daten für die tabelle exitieren, oder kein eintrage ausgewählt wurde wird ein fehler angezeigt
	    func_v_invalid();
	}
    }
    else
    {
//	wenn keine tabelle ausgwählt wurde wird ein fehler angezeigt
	func_v_invalid();
    }
}
/**
 * funktion die einen generischen Fehler anzeigt
 */
function func_v_invalid()
{
    
    echo "<h1 color='red'>invalid action selected!</h1>";
    die();
}
/**
 * funktion die abhängig vom loginstatus die startseite anzeigt
 */
function func_v_home()
{
//    prüfen ob der benutzer angemeldet ist
    if(func_b_isAdmin())
    {
//	wenn der benutzer angemeldet ist, wird die startseite für angemeldete benutzer angezeigt
	include "./fro_Home_loggedin.php";
    }
    else
    {
//	wenn der benutzer nicht angemeldet ist wird die startseite für nicht angemeldete benutzer angezeigt (loginseite) 
	include "./fro_Home.php";
    }
}
/**
 * funktion zum handeln von detailanfragen
 */
function func_v_detail()
{
//    prüfen, ob eine tabelle ausgewählt wurde
    if($s_table = \utility\forms\get("table", false))
    {
//	spezialbehandlung für die tabelle räume
	if($s_table == "raeume")
	{
	    /**
	     * anzeigen einer besonderen geräteliste, die nur geräte aus einem bestimmten raum enthält
	     */
//	    abfragen des selektierten raumes
	    $iselected = \utility\forms\get("selektiert", false);
//	    abfragen aller geräte im ausgewählten raum
	    $aErgebnisse = func_a_getGeraeteInRaum($iselected);
//	    definieren der tabellenattribute fpr die liste
	    $aErgebnis_attribute = [
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
	    ];
//	    abfragen der daten des gewählten raums
	    $raum_data = func_a_getRaum($iselected);
//	    setzen des titels der tabelle mit dem raumnamen
	    $sTitel = "Geräte in Raum ".$raum_data["raum_name"];
	    include "log_Liste.php";
	}
	else
	{
//	    zurodnung tabellen <-> detailseiten
	    $a_table_links = [
		"geraete"	=>  "fro_Zuordnung_geraete_komponenten.php",
		"komponenten"	=>  "fro_Zuordnung_komponenten_attribute.php",
	    ];
//	    prüfen, ob eine detailseite für die geählte tabelle exitiert
	    if(isset($a_table_links[$s_table]))
	    {
//		wenn eine seite existiert wird diese eingebunden
		include $a_table_links[$s_table];
	    }
	    else
	    {
//		wenn keine detailseite existitert wird ein fehler angezeigt
		func_v_invalid();
	    }
	}
	
    }
    else
    {
//	wenn keine tabelle ausgewählt wurde wird ein fehler angezeigt
	func_v_invalid();
    }
}
/**
 * funktion zum handeln von suchanfragen
 */
function func_v_search()
{
//    prüfen, ob eine suchanfrage existiert
    if(\utility\forms\post("txt_Suche_global", false))
    {
//	wenn eine suchanfrage existiert wird die ergebnisseite eingebunden
	include './log_search.php';
    }
    else
    {
//	wenn keine suchanfrage existiert, wird das suchformular eingebunden
	include "./fro_Suche_global.php";
    }
}
