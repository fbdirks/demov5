<?php
/* 

	Deze pagina bouwtt het beheerdersmenu op.
	Dit wordt echter alleen getoond als de user Beheerder is. 
	
*/

session_start();
include "kop.php";
include "functies.php";

$type = logincheck();

if ($type == "us") {
    echo "U bent niet bevoegd deze pagina te gebruiken!";
} else {
	echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
	echo "<div align=\"center\"><br />";
    echo "<h2>Lijsten maken/wijzigen</h2>";
    echo "<br /><br />";
    echo "Lijstenbeheer. Maak uw keuze:<br /><br />";
    echo "<ul>";
    echo "<li><a href=\"\">Nieuwe lijst maken</a><br /></li>";
    echo "<li><a href=\"\">Bestaande lijst wijzigen</a><br /></li>";
    echo "</ul>";
    echo "</div>";
	echo "</td></tr></table>";
}

include "voet.php";
?>
