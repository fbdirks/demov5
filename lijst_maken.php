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
echo "<h2>Lijsten Aanmaken</h2>";
?>
<form action="lijst_maken.php" method="post">
<table>
<tr>
	<td>Naam van de lijst:</td>
	<td><input type="text" name="lijstnaam"></td>
</tr>
<tr>
	<td>Omschrijving:</td>
	<td><textarea name="omschrijving"></textarea></td>
</tr>
<tr>
	<td>Opschrift linkerkolom:</td>
	<td><input type="text" name="kolomlinks"></textarea></td>
</tr>
<tr>
	<td>Opschrift rechterkolom:</td>
	<td><input type="text" name="kolomrechts"></textarea></td>
</tr>
<tr>
	<td>Actie:</td>
	<td><input type="submit" name="Invoeren" value="aanmaken"><input type="reset" name="wissen" value="wissen"></td>
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
		$kolomlinks = $_POST['kolomlinks'];
		$kolomrechts = $_POST['kolomrechts'];
		$query = "INSERT INTO lijsten (`lijstnaam`,`omschrijving`,`kolomlinks`,`kolomrechts`) VALUES ('$naam','$omschrijving','$kolomlinks','$kolomrechts')";
		$mysql = db_contact();
		$res = mysqli_query($mysql,$query) or die ("Kon de lijst niet toevoegen..");
		$melding .= "Invoegquery uitgevoerd voor $naam ($omschrijving)";
	}
	//  mededeling
	print "$melding";
}





echo "</div>";
echo "</td></tr></table>";


voet();
?>
