

<h1>Benutzer hinzufügen</h1>
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
         

<h1>Benutzer löschen</h1>

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
	

    if (isset($_POST["txt_Benutzer_add"]))
        
    {
       session_start();
       $benutzername = $_POST["txt_Benutzer_add"];
       $PW = $_POST["txt_Passwort"];
       $PW_WH = $_POST["txt_Passwort_wh"];
       $email = $_POST["txt_email"];
       
       if ($PW == $PW_WH)
       {
           $errorcode = func_form_insertBenutzer($benutzername, $PW, $email);
           
           if ($errorcode== 1)
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
    
    elseif (isset($_Post["txt_Benutzer_del"])) 
    {
        session_start();
    }


?>