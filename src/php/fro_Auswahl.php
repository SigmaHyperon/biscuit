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
<!-- ---------------------------- Start des Hauptfeldes -------------------- -->
    <div id="main" > 
<!-- ---------------------------- Start des Bannerfeldes ------------------- -->    
        <div id="Header" >
            <marquee class="marquee" behavior="alternate">Inventar</marquee>
        </div>
 <!-- --------------------------- Start des Navigationsfeldes -------------- -->
        <div id="left">
            <br>
            <table border="0" align="center">
                <tr>
                    <td><a href="fro_Auswahl.php?action=home"><button>Home</button></a></td>
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
                    <td><a href="fro_Auswahl.php?action=list&table=zulaessigewerte"><button>Zulässige Werte</button></a></td>
                </tr> 
                <tr>
                    <td><a href="fro_Auswahl.php?action=detail&table=geraete_komponente"><button>Zuordnung Geräte Komponente</button></a></td>
                </tr> 
                
            </table>
        </div>
<!-- --------------------- Start des Interaktionsfeldes -------------------- -->    
        <div id="right">
        <?php
	require_once './log_Auswahl.php';
        ?>
        </div>

    </div>  
</body>
</html>
