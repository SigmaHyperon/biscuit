
<?PHP 
function showLogin()
{
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

    




    if (isset($_POST["txt_Benutzer"]))
        
    {
        require_once 'sql_main.php';
	session_start();

        $benutzername = $_POST["txt_Benutzer"];
        $passwort = $_POST["txt_Passwort"];

       if (func_form_login($benutzername, $passwort))
            {
                $_SESSION["benutzername"] = $benutzername;
                $_SESSION["login"] = 1 ;

                try {
		    header("Location: fro_Auswahl.php");
		    die();
		} catch (Exception $ex) {}
            }
        else 
            {
                echo "Benutzername oder Passwort falsch"; 
             
            }
            
    }
    

?>
