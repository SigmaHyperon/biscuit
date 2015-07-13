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
</head>
             

<body>
    <div id="Header" >
        <h2 align="center">Inventar</h2>
    </div>
    
    <div id="left">
        <table border="0">
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
                <td><a href="fro_Geraete.php"><button>Ger&auml;te</button></a></td>
            </tr>
            <tr>
                <td><a href="fro_Komponenten.php"><button>Komponenten</button></a></td>
            </tr>
            <tr>
                <td><a href="fro_Arten.php"><button>Arten</button></a></td>
            </tr>       
        </table>
    </div>
    
    <div id="right">
        moin<br>


    <?php
    
    //include "log_lieferanten.php";
    
    require_once "../lib/manager.php";
    //\utility\cake_test();
    \utility\loadForms();
    if($s_action = \utility\forms\get("action", false))
    {
	switch($s_action)
	{
	    case "list": 
		func_v_list();
		break;
	    case "edit":
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
	    $a_table_links = [
		"lieferanten"	=>  "log_Zeige_lieferanten.php",
		"raeume"	=>  "log_Zeige_raeume.php",
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
    }
    
    function func_v_edit()
    {
	
    }
    
    function func_v_add()
    {
	if($s_table = \utility\forms\get("table", false))
	{
	    $a_table_links = [
		"lieferanten"	=>  "fro_Lieferanten_hinzufuegen.php",
//		"raeume"	=>  "log_Zeige_raeume.php",
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
    }
    
    function func_v_invalid()
    {
	echo "<h1 color='red'>invalid action selected!</h1>";
	die();
    }
    
    ?>
    </div>
</body>
</html>