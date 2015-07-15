
<table align="center"> 
    <tr>
    <th><h1>Benutzer hinzufügen</h1></th>
    <th><h1>Passwort ändern</h1><th>
<tr>
    <td>
	    <form action="fro_home_loggedin.php" method="post">
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
	<form action="fro_home_loggedin.php" method="post">
		<table class="formular">
		    <tr>
			<td>Benutzername:</td><td><input type="text" name="txt_Benutzer_pw_edit"/></td>
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
    <form action="fro_home_loggedin.php" method="post">
		<table class="formular">
		    <tr>
			<td>Benutzername:</td><td><input type="text" name="txt_Benutzer_del"/></td>
                    </tr>
			<td colspan="2" align="center"> <input type="submit" value="Löschen" /><input type="reset" value="Verwerfen" /></td>
		    </tr>              
		</table>        
	    </form>
	    



<?PHP

         require_once 'sql_main.php';
	
/*Benutzer hinzufügen */
    if (isset($_POST["txt_Benutzer_add"]))
        
    {
       /*session_start();*/
       $benutzername = $_POST["txt_Benutzer_add"];
       $PW = $_POST["txt_Passwort"];
       $PW_WH = $_POST["txt_Passwort_wh"];
       $email = $_POST["txt_email"];
       
       if ($PW == $PW_WH)
       {
           $returnwert = func_form_insertBenutzer($benutzername, $PW, $email);
           
           if ($returnwert == 1)
           {
               echo "Benutzer erfolgreich hinzugefügt";
           }
           else
           {
               echo "Benutzer konnte nicht hinzugefügt werden";
           }
           
       }
       
       else
       {
           echo "Passwörter stimmen nicht überein";
       }
    }

    /*Benutzer löschen*/
    if (isset($_POST["txt_Benutzer_del"]))
    {
        
        /*session_start();*/
        $benutzername = $_POST["txt_Benutzer_del"];
        $returnwert = func_form_delBenutzerByName($benutzername);
        
        if ($returnwert == 1)
        {
            echo "Benutzer erfolgreich gelöscht";
        }
        else
        {
            echo "Benutzer konnte nicht gelöscht werden";
        }
        
    }
    
    /*Passwort ändern */
    if (isset($_POST["txt_Benutzer_pw_edit"]))
    
    {
        /*session_start();*/
        $benutzername = $_POST["txt_Benutzer_pw_edit"];
        $passwort_alt = $_POST["txt_Passwort_alt"];
        $passwort_neu = $_POST["txt_Passwort_neu"];
        $passwort_neu_wh = $_POST["txt_Passwort_neu_wh"];
        
        if($passwort_neu == $passwort_neu_wh)
        {
            $returnwert = funct_form_KennwortAendern($benutzername, $passwort_alt, $passwort_neu);
            var_dump($returnwert);
        }
                
        
        
    }

?>