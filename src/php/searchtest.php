<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->

<?php
include 'sql_search.php';
include 'sql_main.php';
?>

<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
            $txt_string = TEST;
            func_s_searchGlobal($txt_string);
        ?>
    </body>
</html>
