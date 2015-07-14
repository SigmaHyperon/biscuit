<?php
require_once '../lib/manager.php';
\utility\loadSessions();
if(\utility\sessions\sessionGet("benutzername", false))
{
    \utility\sessions\sessionSet("benutzername", "");
    \utility\sessions\sessionSet("login", "");
}
try {
    header("Location: fro_Auswahl.php");
    die();
} catch (Exception $ex) {}
