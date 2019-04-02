<?php
/* 

	Lijsten bekijken
	
*/

session_start();

include "functies.php";

$type = logincheck(); # opvragen user type. Wordt hier nog niets mee gedaan.

kop();


include "lijstmenu.php";


echo "<div class=\"menu\"><br />";
echo "<h2>Lijsten Bekijken</h2>";
?>
<p >U hebt de volgende keuzes:
<ul class="menu">
<li><a href="lijst_maken.php">Maak een nieuwe lijst aan</a></li>
<li><a href="lijst_kiezen2.php">Wijzig/Vul een lijst</a> <a href="lijst_kiezen.php"> [methode2 - inferieur]</a></li>
<li><a href="lijst_raadplegen.php">Bekijk een lijst</a></i>
</ul>
</p>
<?php
echo "<br /><br />";

echo "</div>";



voet();
?>
