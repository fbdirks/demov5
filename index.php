<?php
session_start();
include "kop.php";
include "functies.php";

$type = logincheck();
print"<h6>$type</h6>";
//print_r($_SESSION);

/*
Alles hieronder wordt alleen getoond als de gebruiker succesvol ingelogd heeft! 
*/

if ($type != 999) {

echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";

echo "<h1 align=\"center\">Welkom " . $_SESSION['voornaam'] . "!</h1>";
echo "<div align=\"center\"><br />";
echo "<br /><a href=\"lijst_bekijken.php\">Lijsten Bekijken</a><br />";
echo "<br /><a href=\"lijst_bewerken.php\">Lijsten Bewerken en Beheren</a><br />";
echo "<br />-------------------------------------------------------------------------------<br />";
echo "<br /><a href=\"u_profiel.php\">Hier</a> kun je je profiel bewonderen en wijzigen.<br />";
echo "<br />";
if ($_SESSION['soort'] == "B") {
    echo "<a href=\"b_beheren.php\">Naar de beheerderspagina</a><br />";
}
$ag = hoogste_nummer();
echo "<br />Op dit moment in de database:  $ag gebruikers";
echo "<br /><br /><a href=\"volgende.php\">naar volgende pagina</a><br />";
echo "</div>";
echo "</td></tr></table>";
} else {
	print "Inloggen niet gelukt. probeer het opnieuw <a href=\"index.php\">Inloggen</a>";
}


include "voet.php";
?>
