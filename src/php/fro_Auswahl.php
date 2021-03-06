<!-----------------------------------------------------------------
Ersteller:          Pf3y
Erstell-Datum:      10.07.2015
Änderungsdatum:     12.07.2015
Inhalt:             Hauptseite mit Auswahlmöglichkeiten
------------------------------------------------------------------->

<?php
//    require necessary stuff
require_once './sql_main.php';
require_once '../lib/manager.php';
\utility\loadForms();
\utility\loadSessions();
//var_dump($_SESSION);
?>
<!DOCTYPE>
<html >

<head>
    <title> Inventory </title>
    <link href="../css/main.css" rel="stylesheet" type="text/css"/>
    <script src="../js/jquery.js" type="text/javascript"></script>
    <script src="../js/konami.js" type="text/javascript"></script>
    <script>
	/**
	 * script um abhängig von der bildschirmgröße die höhe der unteren teile der seite zu setzen
	 * @returns {undefined}
	 */
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
    <link rel="icon" 
      type="image/png" 
      href="../ico/Folder_Biscuit.ico">
</head>
             

<body>
<!-- ---------------------------- Start des Hauptfeldes -------------------- -->
    <div id="main" > 
<!-- ---------------------------- Start des Bannerfeldes ------------------- -->    
        <div id="Header" >
            <h2>Inventar</h2>
	    <?php
		if(\utility\sessions\sessionGet("benutzername", false))
		{
		    echo "<div class='logonname'><span class='username'>angemeldet als: ".\utility\sessions\sessionGet("benutzername", false)."</span> <a class='logout' href='log_logout.php'><button>logout</button></a></div>";
		}
	    ?>
        </div>
 <!-- --------------------------- Start des Navigationsfeldes -------------- -->
        <div id="left">
            
            <table class="navi_buttons">
                <tr>
                    <td><a href="fro_Auswahl.php?action=home"><button>Home</button></a></td>
                </tr>
                <tr>
                    <td><a href="fro_Auswahl.php?action=suche"><button>Suche</button></a></td>
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
                    <td><a href="fro_Auswahl.php?action=list&table=komponentenarten"><button>Komponentenarten</button></a></td>
                </tr>
                <tr>
                    <td><a href="fro_Auswahl.php?action=list&table=komponentenattribute"><button>Komponentenattribute</button></a></td>
                </tr>
                
            </table>
        </div>
<!-- --------------------- Start des Interaktionsfeldes -------------------- -->    
        <div id="right">
            <?php
//	    enbindung der logikdatei
                 require_once './log_Auswahl.php';
            ?>
        </div>

    </div>  
</body>
</html>
