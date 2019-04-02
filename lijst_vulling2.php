<?php
/* 

	Lijsten maken
	
*/

session_start();

include "functies.php";

$type = logincheck(); # opvragen user type. Wordt hier nog niets mee gedaan.

kop();

include "lijstmenu.php";
$nr = $_POST['lijstnummer'];
$query = "SELECT * FROM lijsten WHERE lijstnummer = $nr";
$mysql=db_contact();
$res = mysqli_query($mysql,$query)($query,$mysql);
list($lijstnummer,$lijstnaam,$lijstomschrijving) = mysqli_fetch_array($res);

echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
echo "<div align=\"center\"><br />";
echo "<h2>Mutaties lijst <i>$lijstnaam</i> verwerken</h2>";
/*
print"<pre>";
print_r($_POST);
print"</pre>";
*/
//$ingevuld = array();
$ingevuld = $_POST['rij'];
$aantal = count($ingevuld);

$mysql = db_contact();

for ($i=1;$i<11;$i++) {
	if (!empty($ingevuld[$i][0])) {
		$k1 = $ingevuld[$i][0];
		$k2 = $ingevuld[$i][1];
		$query = "INSERT INTO items (`lijstnummer`,`kolom1`,`kolom2`) VALUES ($lijstnummer,'$k1','$k2')";
		$res = mysqli_query($mysql,$query)($query,$mysql) or die ("Kon $r1k1 niet toevoegen..");	
	}
}

$query = "SELECT * FROM items WHERE `lijstnummer` = $lijstnummer";

$res = mysqli_query($mysql,$query) ($query, $mysql) or die ("Kon de lijstinhoud niet opvragen..");

?>
<table>
<tr class="opschrift">
	<td>kolom1</td>
	<td>kolom2</td>
</tr>

<?php
	print "<tr><td colspan=\"2\"><input type=\"hidden\" name=\"lijstnummer\" value=\"$lijstnummer\"></td></tr>";
	while (list($lijstnummer,$itemnummer,$kolom1,$kolom2) = mysqli_fetch_array($res)) {
		print "<tr><td>$kolom1</td><td>$kolom2</td></tr>";	
	}
	
?>

</table>
</form>

<?php

echo "</div>";
echo "</td></tr></table>";


voet();
?>
