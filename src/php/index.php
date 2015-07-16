<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
//auf fro_Auswahl.php?action=home wieterleiten
try {
    header("Location: fro_Auswahl.php?action=home");
    die();
} catch (Exception $ex) {}