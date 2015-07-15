<?php

$results = func_s_searchGlobal(\utility\forms\post("txt_Suche_global", false));
echo "<pre>";
var_dump($results);
echo "</pre>";