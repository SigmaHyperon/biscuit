

<div id="logindiv">
    <form action="fro_Home.php" method="post" >
        <table class="login">
            <tr>
                <td>Benutzer:</td><td><input type="text" name="txt_Benutzer"/></td>
            </tr>
            <tr>
                <td>Passwort</td><td><input type="password" name="txt_Passwort"/></td>
            </tr>
            <tr>
                <td colspan="2" align="center"> <input type="submit" value="Login" /><input type="reset" value="Verwerfen" /></td>
            </tr>              
        </table>        
    </form>
</div>




<?PHP 
    require_once 'sql_main.php';

    $benutzername = $_POST["txt_Benutzer"];
    $passwort = $_POST["txt_Passwort"];
    
    if (func_form_login($benutzername, $passwort))
        
    {
        $_SESSION["benutzername"] = $benutzername;
        $_SESSION["login"] = 1;
        
        echo "test";
    }



?>