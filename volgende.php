<?php
/*
	Dit is een 'template pagina'. Gebruik deze als voorbeeld voor nieuwe pagina's.
	Het 'echte' gedeelte van de pagina moet tussen de commentaarregels in het midden komen.
*/


session_start();
include "kop.php";
include "functies.php";
logincheck();

echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
echo "<div align=\"center\"><br />";

//========__=====tussen deze commentaarregels de php code===__=========

echo "U bent op de volgende pagina! gefeliciteerd!"; # deze code natuurlijk vervangen door iets zinnigers

//========^^=================================================^^========

echo "<br>Terug naar de index pagina. <a href=\"index.php\">klik</a><br />";
echo "<br>Uitloggen <a href=\"u_logout.php\">klik</a><br />";

echo "</div>";
echo "</td></tr></table>";

include "voet.php";

?>
