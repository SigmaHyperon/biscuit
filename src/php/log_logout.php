<?php
//einbinden der library, da diese funktion auserhalb des nrmalen kontexts aufgerufen wird
require_once '../lib/manager.php';
//laden der session komponente der library
\utility\loadSessions();
//prüfen, ob ein benutzer angemeldet ist
if(\utility\sessions\sessionGet("benutzername", false))
{
//    wenn ein benutzer angemeldet ist wird dessen session zurückgesetzt
    \utility\sessions\sessionSet("benutzername", "");
    \utility\sessions\sessionSet("login", "");
}
//nach dem logoutvorgang wird auf die startseite weitergeleitet
try {
    header("Location: fro_Auswahl.php");
    die();
} catch (Exception $ex) {}