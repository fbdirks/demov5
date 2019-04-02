<?php
/* 
	Lijsten maken
*/

session_start();
include "kop.php";
include "functies.php";

$type = logincheck(); # opvragen user type. Wordt hier nog niets mee gedaan.
include "lijstmenu.php";

$nr = $_POST['lijstnr'];
$query = "SELECT * FROM lijsten WHERE lijstnummer = $nr";
$mysql=db_contact();
$res = mysqli_query($mysql,$query);
list($lijstnummer,$lijstnaam,$lijstomschrijving,$kolomlinks,$kolomrechts) = mysqli_fetch_array($res);

echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
echo "<div align=\"center\"><br />";
echo "<h2><i>$lijstnaam</i></h2>";
?>
<form action="lijst_vulling.php" method="post">
<table>
<tr class="opschrift">
	<td><?php echo "$kolomlinks"; ?></td>
	<td><?php echo "$kolomrechts"; ?></td>
</tr>

<?php
	print "<tr><td colspan=\"2\"><input type=\"hidden\" name=\"lijstnummer\" value=\"$lijstnummer\"></td></tr>";
	for ($i=1;$i<11;$i++) {
		print "<tr>";
		print "<td><input type=\"text\" name=\"k1rij$i\"></td>";
		print "<td><input type=\"text\" name=\"k2rij$i\"></td>";
		print "</tr>";
	}
	
?>

<tr>
	<td colspan="2">Actie: <input type="submit" name="Invoeren" value="invoeren"> <input type="reset" name="wissen" value="wissen"></textarea></td>
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
		$query = "INSERT INTO lijsten (`lijstnaam`,`omschrijving`, `kolomlinks`,`kolomrechts`) VALUES ('$naam','$omschrijving',$kolomlinks,$kolomrechts)";
		$mysql = db_contact();
		$res = mysqli_query($mysql,$query) or die ("Kon de lijst niet toevoegen..");
		$melding .= "Invoegquery uitgevoerd voor $naam ($omschrijving)";
	}
	//  mededeling
	print "$melding";
}

echo "</div>";
echo "</td></tr></table>";

include "voet.php";
?>
