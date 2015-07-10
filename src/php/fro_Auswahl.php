<!DOCTYPE>
<html >

<head>
    <title>fro_Auswahl</title>

</head>
             

<body>
    <br>
    
    <table border="1" align="center">
        <tr>
            <td><a href="fro_Hinzufuegen.php">Hinzuf&uuml;gen</a></td>
            <td><a href="fro_Aendern.php">&Auml;ndern</a></td>      
            <td><a href="fro_Loeschen.php">L&ouml;schen</a></td>
        </tr>   
    </table>
    
    <br><br>
    
    <table border="1"> 
        <tr>
            <td><a href="fro_Raeume.php">R&auml;me</a></td>
        </tr>
        <tr>
            <td><a href="fro_Lieranten.php">Lieferanten</a></td>
        </tr>
        <tr>
            <td><a href="fro_Geraete.php">Ger&auml;te</a></td>
        </tr>
        <tr>
            <td><a href="fro_Komponenten.php">Komponenten</a></td>
        </tr>
        <tr>
            <td><a href="fro_Arten.php">Arten</a></td>
        </tr>       
    </table>



    <?php
    
    include "log_lieferanten.php";
    
    ?>    
</body>
</html>