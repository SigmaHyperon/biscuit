<?php
\utility\loadArrays();
$results = func_s_searchGlobal(\utility\forms\post("txt_Suche_global", false));
$names = array("", "benutzer_name", "geraet_name", "geraete_art_name", "komponente_name", "komponenten_art_name", "komponenten_attribut_name", "lieferant_firmenname", "raum_name");
$ids = array("", "benutzer_id", "geraete_id", "geraete_art_id", "komponenten_id", "komponenten_art_id", "komponenten_attribut_id", "lieferant_id", "raum_id");

echo '<h2>Benutzer</h2>';
foreach ($results[1] as $eintrag)
{
    echo "<p>";
    echo $eintrag[$names[1]];
    echo "</p>";
}
echo '<h2>Geräte</h2>';
foreach ($results[2] as $eintrag)
{
    echo "<p>";
    echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[2]]."&action=Ändern&table=geraete'>".$eintrag[$names[2]]."</a>";
    echo "</p>";
}
echo '<h2>Gerätearten</h2>';
foreach ($results[3] as $eintrag)
{
    echo "<p>";
    echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[3]]."&action=Ändern&table=geraetearten'>".$eintrag[$names[3]]."</a>";
    echo "</p>";
}
echo '<h2>Komponenten</h2>';
foreach ($results[4] as $eintrag)
{
    echo "<p>";
    echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[4]]."&action=Ändern&table=komponenten'>".$eintrag[$names[4]]."</a>";
    echo "</p>";
}
echo '<h2>Komponentenarten</h2>';
foreach ($results[5] as $eintrag)
{
    echo "<p>";
    echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[5]]."&action=Ändern&table=komponentenarten'>".$eintrag[$names[5]]."</a>";
    echo "</p>";
}
echo '<h2>Komponentenattribute</h2>';
foreach ($results[6] as $eintrag)
{
    echo "<p>";
    echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[6]]."&action=Ändern&table=komponentenattribute'>".$eintrag[$names[6]]."</a>";
    echo "</p>";
}
echo '<h2>Lieferanten</h2>';
foreach ($results[7] as $eintrag)
{
    echo "<p>";
    echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[7]]."&action=Ändern&table=lieferanten'>".$eintrag[$names[7]]."</a>";
    echo "</p>";
}
echo '<h2>Räume</h2>';
foreach ($results[8] as $eintrag)
{
    echo "<p>";
    echo "<a href='fro_Auswahl.php?selektiert=".$eintrag[$ids[8]]."&action=Ändern&table=raeume'>".$eintrag[$names[8]]."</a>";
    echo "</p>";
}