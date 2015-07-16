
<?PHP 
/**
 * definieren eines logins zur späteren verwendung
 */
function showLogin()
{
	/**
	 * wenn eine fehlermeldung vorliegt, diese anzeigen
	 */
	if(isset($_GET["message"]))
	{
	    echo "<p class='loginfehler'>".$_GET["message"]."</p>";
	}
        ?>
	<div id='logindiv'>
	    <form action='fro_Home.php' method='post'>
		<table class='login'>
		    <tr>
			<td>Benutzer:</td><td><input type='text' name='txt_Benutzer'/></td>
		    </tr>
		    <tr>
			<td>Passwort</td><td><input type='password' name='txt_Passwort'/></td>
		    </tr>
		    <tr>
			<td colspan='2' align='center'> <input type='submit' value='Login' /><input type='reset' value='Verwerfen' /></td>
		    </tr>              
		</table>        
	    </form>
	</div>
    <?php
}
/**
 * wenn buntzer nicht angemeldet, login anzeigen
 */
if(isset($_SESSION))
{
    if (isset($_SESSION["login"]))
    {
	if($_SESSION["login"] != 1)
	{
	    showLogin();
	}
    }
    else
    {
	showLogin();
    }
    
}

    



//prüfen, ob des formular bgeschickt wurde.
    if (isset($_POST["txt_Benutzer"]))
        
    {
//	sql library einbinden
        require_once 'sql_main.php';
//	session starten, da evtl auserhalb des normalen kontexts
	session_start();

//	formulardaten laden
        $benutzername = $_POST["txt_Benutzer"];
        $passwort = $_POST["txt_Passwort"];

//	logindaten prüfen
       if (func_form_login($benutzername, $passwort))
            {
//	   wenn erfolgreich angemeldet, Sessiondaten setzen
                $_SESSION["benutzername"] = $benutzername;
                $_SESSION["login"] = 1 ;
//		weiterleitung auf die startseite
                try {
		    header("Location: fro_Auswahl.php");
		    die();
		} catch (Exception $ex) {}
            }
        else 
            {
//	    wenn nicht erfolgreich, weiterleitung auf loginseite mit fehlermeldung
                try {
		    header("Location: fro_Auswahl.php?message=".  urlencode("Benutzername oder Passwort falsch"));
		    die();
		} catch (Exception $ex) {} 
            }
            
    }
    

?>
