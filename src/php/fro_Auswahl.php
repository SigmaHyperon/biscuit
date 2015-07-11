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
                <td><a href="fro_Raeume.php"><button>R&auml;me</button></a></td>
            </tr>
            <tr>
                <td><a href="fro_Lieranten.php"><button>Lieferanten</button></a></td>
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
    
    include "../lib/manager.php";
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
	    
	}
    }
    
    function func_v_edit()
    {
	
    }
    
    ?>    
</body>
</html>