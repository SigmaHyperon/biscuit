<!DOCTYPE>
<html >

<head>
    <title>fro_Auswahl</title>
    <link href="../css/main.css" rel="stylesheet" type="text/css"/>
</head>
             

<body>
    <br>
    <div id="Header" >
        <table border="0" align="center">
            <tr>
                <td><a href="fro_Hinzufuegen.php"><button>Hinzuf&uuml;gen</button></a></td>
                <td><a href="fro_Aendern.php"><button>&Auml;ndern</button></a></td>      
                <td><a href="fro_Loeschen.php"><button>L&ouml;schen</button></a></td>
            </tr>   
        </table>
    </div>
    <br><br>
    
    <div id="left">
        <table border="0"> 
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
        moin
    </div>

    <?php
    
    //include "log_lieferanten.php";
    
    require_once "../lib/manager.php";
    \utility\cake_test();
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
	    default:
		break;
	}
    }
    
    function func_v_list()
    {
	if($s_table = \utility\forms\get("table", false))
	{
	    $a_table_links = [
		"lieferanten"	=>  "log_lieferanten.php",
		"raeume"	=>  "log_raeume.php",
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
    
    function func_v_invalid()
    {
	echo "<h1 color='red'>invalid action selected!</h1>";
	die();
    }
    
    ?>    
</body>
</html>