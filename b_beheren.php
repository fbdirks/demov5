<?php
/* 

	Deze pagina bouwtt het beheerdersmenu op.
	Dit wordt echter alleen getoond als de user Beheerder is. 
	
*/

session_start();

include "functies.php";

$type = logincheck();

kop();

if ($type != "B") {
    echo "U bent niet bevoegd deze pagina te gebruiken!";
} else {
		echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
		echo "<div align=\"center\"><br />";
    echo "<h2>Beheerderspagina</h2>";
    echo "<br /><br />";
    echo "Ogol beheerpagina. Maak uw keuze:<br /><br />";
    echo "<ul>";
    echo "<li><a href=\"b_ub.php\">Users lijst + beheren</a><br /></li>";
    echo "<li><a href=\"b_newuser.php\">Nieuwe gebruiker aanmaken</a><br /></li>";
    echo "</ul>";
    echo "</div>";
		echo "</td></tr></table>";
}

voet();

?>
