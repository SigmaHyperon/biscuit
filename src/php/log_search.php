<?php
\utility\loadArrays();
$results = func_s_searchGlobal(\utility\forms\post("txt_Suche_global", false));
$names = array("", "benutzer_name", "geraet_name", "geraete_art_name", "komponente_name", "komponenten_art_name", "lieferant_firmenname", "raum_name");
$ids = array("", "benutzer_id", "geraete_id", "geraete_art_id", "komponenten_id", "komponenten_art_id", "lieferant_id", "raum_id");
echo "<pre>";
//var_dump($results);

$ergebnisse = \utility\arrays\array_delete($results, 0, true);
$counter = 1;
foreach ($results[0] as $title)
{
    if($results[$counter] != array())
    {
	echo "<h2>".$title."</h2>";
	foreach ($results[$counter] as $eintrag)
	{
	    echo "<p>";
//	    foreach ($eintrag as $zelle)
//	    {
		echo $eintrag[$names[$counter]];
//	    }
	    echo "</p>";
	}
    }
    $counter++;
}
echo "</pre>";