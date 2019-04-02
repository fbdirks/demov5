<?php
/* 

	Lijsten maken
	
*/

session_start();

include "functies.php";

$type = logincheck(); # opvragen user type. Wordt hier nog niets mee gedaan.

kop();

include "lijstmenu.php";
echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
echo "<div align=\"center\"><br />";
echo "<h2>Lijsten kiezen om te vullen</h2>";
?>
<form action="lijst_vullen.php" method="post">
<table>
<tr>
	<td>Naam van de lijst:</td>
	<td>
		<select name="lijstnr">
		
<?php

	$query = "SELECT lijstnummer, lijstnaam FROM lijsten";
	$mysql = db_contact();
	$res = mysqli_query($mysql,$query) or die ("Kon de lijst van lijsten niet ophalen.");
	while (list($nr,$oms) = mysqli_fetch_array($res)) {
		print "<option value=\"$nr\">$oms</option>";
	}
?>
	</select>
	</td>
	
	
</tr>
<tr>
	<td>Actie:</td>
	<td><input type="submit" name="Kies" value="Kies"><input type="reset" name="wissen" value="Wis"></textarea></td>
</tr>

</table>
</form>


<?php

if (isset($_POST['Invoeren'])) {
	$melding = "";
	$fout = false;
	//  invoer controle..
	if (empty($_POST['lijstnaam'])) {
		$melding .= "Lijstnaam (verplicht) ontbreekt..";
		$fout = true;
	} else {
	//  invoer verwerking
		$naam = $_POST['lijstnaam'];
		$omschrijving = $_POST['omschrijving'];
		$query = "INSERT INTO lijsten (`lijstnaam`,`omschrijving`) VALUES ('$naam','$omschrijving')";
		$mysql = db_contact();
		$res = mysqli_query($mysql,$query) or die ("Kon de lijst niet toevoegen..");
		$melding .= "Invoegquery uitgevoerd voor $naam ($omschrijving)";
	}
	//  mededeling
	print "$melding";
}




echo "<br />";

echo "</div>";
echo "</td></tr></table>";


voet();
?>
