<?php
//sql library einbinden
     require_once 'sql_main.php';
//     wenn session nicht gestartet, starten
     if(!isset($_SESSION))
     {
	 session_start();
     }
     /**
      * Security
      * wenn benutzer nicht angemeldet, weiterleiten auf loginseite
      */
     if(isset($_SESSION["login"]))
     {
	 if($_SESSION["login"] != 1)
	{
	     try {
		header("Location: fro_Auswahl.php?action=home");
		die();
	    } catch (Exception $ex) {}
	}
     }
     else
     {
	try {
	    header("Location: fro_Auswahl.php?action=home");
	    die();
	} catch (Exception $ex) {}
     }
     
//     daten aller benutzer laden
     $all_users = func_a_getBenutzer();

     /**
      * gibt alle benutzernamen als teil eines select feldes aus
      * @param type $users
      */
     function print_users_as_options($users)
     {
	 foreach ($users as $user)
	{
	    echo "<option value='".$user["benutzer_id"]."'>".$user["benutzer_name"]."</option>";
	}
     }
//     prüfen, ob das formular abgeschickt wurde
     if (isset($_POST["txt_Benutzer_add"]))
    {
	 /**
	  * unterscheidung nach aktion
	  * hinzufügen
	  * ändern
	  * löschen
	  */

	switch ($_GET["action"]) {
//	    löschen
	case "delete":
//	    abfragen der benutzer_id
	    $benutzerid = $_POST["txt_Benutzer_add"];
//	    löschen dess benutzers
	    $returnwert = func_form_delBenutzerByID($benutzerid);
	    /**
	     * je nach ergebnis wwiterleitung auf startseite mit erfolgs- oder fehlermeldung
	     */
	    if ($returnwert == 1)
	    {
		try {
		    header("Location: fro_Auswahl.php?action=home&message=".urlencode("Benutzer erfolgreich gelöscht"));
		    die();
		} catch (Exception $ex) {}
	    }
	    else
	    {
		try {
		    header("Location: fro_Auswahl.php?action=home&message=".urlencode("Benutzer konnte nicht gelöscht werden"));
		    die();
		} catch (Exception $ex) {}
	    }

	    break;
//	    hunzufügen
	case "add":
	    /**
	     * formulardaten abfragen
	     */
	    $benutzername = $_POST["txt_Benutzer_add"];
	    $PW = $_POST["txt_Passwort"];
	    $PW_WH = $_POST["txt_Passwort_wh"];
	    $email = $_POST["txt_email"];
	    
//	    prüfen, ob das neu passwort mit dem check übereinstimmt
	    if ($PW == $PW_WH)
	    {
//		benutzer hinzufügen
		$returnwert = func_form_insertBenutzer($benutzername, $PW, $email);
		/**
		 * je nach ergebnis wwiterleitung auf startseite mit erfolgs- oder fehlermeldung
		 */
		if ($returnwert == 1)
		{
		    try {
			header("Location: fro_Auswahl.php?action=home&message=".urlencode("Benutzer erfolgreich hinzugefügt"));
			die();
		    } catch (Exception $ex) {}
		}
		else
		{
		    try {
			header("Location: fro_Auswahl.php?action=home&message=".urlencode("Benutzer konnte nicht hinzugefügt werden"));
			die();
		    } catch (Exception $ex) {}
		}

	    }

	    else
	    {
//		weiterleitung auf startseite mit fehlermeldung
		try {
			header("Location: fro_Auswahl.php?action=home&message=".urlencode("Passwörter stimmen nicht überein"));
			die();
		    } catch (Exception $ex) {}
	    }
	    break;
//	    ändern
	case "change":
	    /**
	     * formulardaten afragen
	     */
	    $benutzerid = $_POST["txt_Benutzer_add"];
	    $passwort_alt = $_POST["txt_Passwort_alt"];
	    $passwort_neu = $_POST["txt_Passwort_neu"];
	    $passwort_neu_wh = $_POST["txt_Passwort_neu_wh"]; 
//	    prüfen ob neue passörter übereinstimmen
	    if($passwort_neu == $passwort_neu_wh)
	    {
//		benutzer ändern
		$returnwert = funct_form_KennwortAendern($benutzerid, $passwort_alt, $passwort_neu);
		/**
		 * je nach ergebnis wwiterleitung auf startseite mit erfolgs- oder fehlermeldung
		 */
		if ($returnwert == 1)
		{
		    try {
			header("Location: fro_Auswahl.php?action=home&message=".urlencode("Passwort erfolgreich geändert"));
			die();
		    } catch (Exception $ex) {}
		}
		elseif ($returnwert == 0)
		{
		    try {
			header("Location: fro_Auswahl.php?action=home&message=".urlencode("Aktuelles Passwort für den ist falsch"));
			die();
		    } catch (Exception $ex) {}
		}
                else
                {
                    try {
			header("Location: fro_Auswahl.php?action=home&message=".urlencode("Passwort konnte nicht geändert werden"));
			die();
		    } catch (Exception $ex) {}
                }
	    }
            else
            {
                try {
			header("Location: fro_Auswahl.php?action=home&message=".urlencode("Neue Passwort stimmt mit der Wiederholung nicht überein"));
			die();
		    } catch (Exception $ex) {}
            }
	    break;

	default:
	    break;
	}
    }

?>
<table align="center"> 
    <?php
//    wenn fehler meldung vorhanden, diese anzeigen
	if(isset($_GET["message"]))
	{
	    echo "<tr><td colspan='2' align='center'>".$_GET["message"]."</td></tr>";
	}
    ?>
    <tr>
    <th><h1>Benutzer hinzufügen</h1></th>
    <th><h1>Passwort ändern</h1><th>
<tr>
    <td>
	    <form action="fro_home_loggedin.php?action=add" method="post">
                <table class="formular">
		    <tr>
			<td>Benutzername:</td><td><input type="text" name="txt_Benutzer_add"/></td>
		    </tr>
		    <tr>
			<td>Passwort:</td><td><input type="password" name="txt_Passwort"/></td>
                    </tr>
                    <tr>
			<td>Passwort wiederholen:</td><td><input type="password" name="txt_Passwort_wh"/></td>
                    </tr>
		    <tr>
			<td>Email-Adresse:</td><td><input type="email" name="txt_email"/></td>
		    </tr>
		    <tr>
			<td colspan="2" align="center"> <input type="submit" value="Anlegen" /><input type="reset" value="Verwerfen" /></td>
		    </tr>              
		</table>        
	    </form>
         
    </td>
    <td>
	<form action="fro_home_loggedin.php?action=change" method="post">
		<table class="formular">
		    <tr>
			<td>Benutzername:</td><td><select name="txt_Benutzer_add">
				<?php
//				alle benutzer ausgeben
				print_users_as_options($all_users);
				?>
			    </select></td>
		    </tr>
		    <tr>
			<td>altes Passwort:</td><td><input type="password" name="txt_Passwort_alt"/></td>
                    </tr>
                    <tr>
			<td>neues Passwort:</td><td><input type="password" name="txt_Passwort_neu"/></td>
                    </tr>
		    <tr>
                        <td>Passwort wiederholen</td><td><input type="password" name="txt_Passwort_neu_wh"/></td>
		    </tr>
		    <tr>
			<td colspan="2" align="center"> <input type="submit" value="Ändern" /><input type="reset" value="Verwerfen" /></td>
		    </tr>              
		</table>
            
	    </form>
    </td>
</tr>
</table>
<h1 align="center">Benutzer löschen</h1>
    <form action="fro_home_loggedin.php?action=delete" method="post">
		<table class="formular">
		    <tr>
			<td>Benutzername:</td><td><select name="txt_Benutzer_add">
				<?php
//				alle benutzer ausgeben
				print_users_as_options($all_users);
				?>
			    </select></td>
                    </tr>
			<td colspan="2" align="center"> <input type="submit" value="Löschen" /><input type="reset" value="Verwerfen" /></td>
		    </tr>              
		</table>        
	    </form>
