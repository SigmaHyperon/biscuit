<?php
/**
 * diese datei ist am letzten tag entstanden, also nicht über den bullshit wundern
 */
//laden der array komponente der library
\utility\loadArrays();
//aufrufen der globalen suchfunktion
$results = func_s_searchGlobal(\utility\forms\post("txt_Suche_global", false));
//definieren der namensfelder der ergebnisse
$names = array("", "benutzer_name", "geraet_name", "geraete_art_name", "komponente_name", "komponenten_art_name", "komponenten_attribut_name", "lieferant_firmenname", "raum_name");
//definieren der idfelder der ergebnisse
$ids = array("", "benutzer_id", "geraete_id", "geraete_art_id", "komponenten_id", "komponenten_art_id", "komponenten_attribut_id", "lieferant_id", "raum_id");
//einführen eines checkwertes, der angibt, ob ergebnisse gefunden wurden
$result = false;
//prüfen, ob ergebnisse im ersten bereich (benutzer) gefunden wurden
if(count($results[1]) > 0)
{
    $result = true;
//    überschrift ausgeben
    echo '<h2>Benutzer</h2>';
//    jedes ergebnis ausgeben
    foreach ($results[1] as $eintrag)
    {
	echo "<p>";
	echo $eintrag[$names[1]];
	echo "</p>";
    }
}
//dann noch 7 mal das selbe für jede kategorie, jedesmal nur mit angepasstem titel und link
if(count($results[2]) > 0)
{
    $result = true;
    echo '<h2>Geräte</h2>';
    foreach ($results[2] as $eintrag)
    {
	echo "<p>";
	echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[2]]."&action=Ändern&table=geraete'>".$eintrag[$names[2]]."</a>";
	echo "</p>";
    }
}
if(count($results[3]) > 0)
{
    $result = true;
    echo '<h2>Gerätearten</h2>';
    foreach ($results[3] as $eintrag)
    {
	echo "<p>";
	echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[3]]."&action=Ändern&table=geraetearten'>".$eintrag[$names[3]]."</a>";
	echo "</p>";
    }
}
if(count($results[4]) > 0)
{
    $result = true;
    echo '<h2>Komponenten</h2>';
    foreach ($results[4] as $eintrag)
    {
	echo "<p>";
	echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[4]]."&action=Ändern&table=komponenten'>".$eintrag[$names[4]]."</a>";
	echo "</p>";
    }
}
if(count($results[5]) > 0)
{
    $result = true;
    echo '<h2>Komponentenarten</h2>';
    foreach ($results[5] as $eintrag)
    {
	echo "<p>";
	echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[5]]."&action=Ändern&table=komponentenarten'>".$eintrag[$names[5]]."</a>";
	echo "</p>";
    }
}
if(count($results[6]) > 0)
{
    $result = true;
    echo '<h2>Komponentenattribute</h2>';
    foreach ($results[6] as $eintrag)
    {
	echo "<p>";
	echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[6]]."&action=Ändern&table=komponentenattribute'>".$eintrag[$names[6]]."</a>";
	echo "</p>";
    }
}
if(count($results[7]) > 0)
{
    $result = true;
    echo '<h2>Lieferanten</h2>';
    foreach ($results[7] as $eintrag)
    {
	echo "<p>";
	echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[7]]."&action=Ändern&table=lieferanten'>".$eintrag[$names[7]]."</a>";
	echo "</p>";
    }
}
if(count($results[8]) > 0)
{
    $result = true;
    echo '<h2>Räume</h2>';
    foreach ($results[8] as $eintrag)
    {
	echo "<p>";
	echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[8]]."&action=Ändern&table=raeume'>".$eintrag[$names[8]]."</a>";
	echo "</p>";
    }
}
//wenn keine ergebnisse gefunden wurden, wird eine statusmeldung ausgegeben
if ($result == false)
{
    echo "<h2>Es wurden keine Einträge mit ihrem Suchbegriff gefunden</h2>";
}