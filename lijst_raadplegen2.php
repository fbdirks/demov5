<?php
/* 
	Lijsten maken
*/

session_start();

include "functies.php";

$type = logincheck(); # opvragen user type. Wordt hier nog niets mee gedaan.

kop();

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
<table class="overzicht">
<tr class="opschrift">
	<td></td>
	<td><?php echo "$kolomlinks"; ?></td>
	<td><?php echo "$kolomrechts"; ?></td>
</tr>

<?php
// ophalen van de lijst items
$query = "SELECT * FROM items WHERE lijstnummer=$nr";
$res = mysqli_query($mysql,$query) or die ("Kon geen items vinden voor deze lijst");

$i=0;
	while (list($itemnr,$lijstnummer,$kolom1,$kolom2) = mysqli_fetch_array($res)) {
		$i++;
		print "<tr>";
		print "<td>$i</td>";
		print "<td>$kolom1</td>";
		print "<td>$kolom2</td>";
		print "</tr>";
	}
	
?>

</table>

<?php
echo "</div>";
echo "</td></tr></table>";
voet();
?>
