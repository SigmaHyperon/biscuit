<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      10.07.2015
Änderungsdatum:     12.07.2015
Inhalt:             Hauptseite mit Auswahlmöglichkeiten
-------------------------------------------------------------------> 

<!DOCTYPE>
<html >

<head>
    <title>fro_Auswahl</title>
    <link href="../css/main.css" rel="stylesheet" type="text/css"/>
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script>
	$(function(){
	    var dyn = $(document).height()-163+"px";
	    $("#left").css("height", dyn);
	    $("#right").css("height", dyn);
	    $( window ).resize(function() {
		dyn = $(document).height()-163+"px";
		$("#left").css("height", dyn);
		$("#right").css("height", dyn);
	    });
	});
    </script>
</head>
             

<body>
    <div id="main" > 
    <div id="Header" >
        <h2 align="center">Inventar</h2>
    </div>
 
    <div id="left">
        <table border="0" align="center">
            <tr>
                <td><a href="fro_Auswahl.php"><button>Home</button></a></td>
            </tr>
            <tr>
                <td><a href="fro_Auswahl.php?action=list&table=raeume"><button>R&auml;ume</button></a></td>
            </tr>
            <tr>
                <td><a href="fro_Auswahl.php?action=list&table=lieferanten"><button>Lieferanten</button></a></td>
            </tr>
            <tr>
                <td><a href="fro_Auswahl.php?action=list&table=geraete"><button>Ger&auml;te</button></a></td>
            </tr>
            <tr>
                <td><a href="fro_Auswahl.php?action=list&table=geraetearten"><button>Ger&auml;tearten</button></a></td>
            </tr>
            <tr>
                <td><a href="fro_Auswahl.php?action=list&table=komponenten"><button>Komponenten</button></a></td>
            </tr>
            <tr>
                <td><a href="fro_Arten.php"><button>Komponentenarten</button></a></td>
            </tr>       
        </table>
    </div>
    
    <div id="right">
        


    <?php
    
    //include "log_lieferanten.php";
    
    require_once "../lib/manager.php";
    require_once "./sql_main.php";
    //\utility\cake_test();
    \utility\loadForms();
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
	    default:
		func_v_invalid();
		break;
	}
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
		],
		"geraete"	=>  [
		    "Id",
		    "Raum",
		    "Lieferant",
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
	    ];
	    $a_table_links = [
		"lieferanten"	=>  "func_a_getLieferanten",
		"raeume"	=>  "func_a_getRaeume",
		"geraete"	=>  "func_a_getGeraete",
		"komponenten"	=>  "func_a_getKomponenten"
	    ];
	    if(isset($a_table_links[$s_table]))
	    {
		$aErgebnisse = call_user_func($a_table_links[$s_table]);
		$aErgebnis_attribute = $a_table_attributes[$s_table];
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
		"komponenten"	=>  "fro_Komponenten_hinzufuegen.php"
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
    
    function func_v_invalid()
    {
	echo "<h1 color='red'>invalid action selected!</h1>";
	die();
    }
    
    ?>
    </div>
    </div>  
</body>
</html>
