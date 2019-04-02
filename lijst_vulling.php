<?php
/* 

	Lijsten maken
	
*/

session_start();
include "kop.php";
include "functies.php";

$type = logincheck(); # opvragen user type. Wordt hier nog niets mee gedaan.
include "lijstmenu.php";
$nr = $_POST['lijstnummer'];
$query = "SELECT * FROM lijsten WHERE lijstnummer = $nr";
$mysql=db_contact();
$res = mysqli_query($mysql,$query);
list($lijstnummer,$lijstnaam,$lijstomschrijving) = mysqli_fetch_array($res);

echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
echo "<div align=\"center\"><br />";
echo "<h2>Mutaties lijst <i>$lijstnaam</i> verwerken</h2>";

// Dit moet veel slimmer kunnen....
$r1k1 = $_POST['k1rij1'];
$r1k2 = $_POST['k2rij1'];
$r2k1 = $_POST['k1rij2'];
$r2k2 = $_POST['k2rij2'];
$r3k1 = $_POST['k1rij3'];
$r3k2 = $_POST['k2rij3'];
$r4k1 = $_POST['k1rij4'];
$r4k2 = $_POST['k2rij4'];
$r5k1 = $_POST['k1rij5'];
$r5k2 = $_POST['k2rij5'];
$r6k1 = $_POST['k1rij6'];
$r6k2 = $_POST['k2rij6'];
$r7k1 = $_POST['k1rij7'];
$r7k2 = $_POST['k2rij7'];
$r8k1 = $_POST['k1rij8'];
$r8k2 = $_POST['k2rij8'];
$r9k1 = $_POST['k1rij9'];
$r9k2 = $_POST['k2rij9'];
$r10k1 = $_POST['k1rij10'];
$r10k2 = $_POST['k2rij10'];

$mysql = db_contact();

if (!empty($r1k1)) {
	$query = "INSERT INTO items (`lijstnummer`,`kolom1`,`kolom2`) VALUES ($lijstnummer,'$r1k1','$r1k2')";

	$res = mysqli_query($mysql,$query) or die ("Kon $r1k1 niet toevoegen..");
}
if (!empty($r2k1)) {
	$query = "INSERT INTO items (`lijstnummer`,`kolom1`,`kolom2`) VALUES ($lijstnummer,'$r2k1','$r2k2')";
	$res = mysqli_query($mysql,$query) or die ("Kon $r2k1 niet toevoegen..");
}
if (!empty($r3k1)) {
	$query = "INSERT INTO items (`lijstnummer`,`kolom1`,`kolom2`) VALUES ($lijstnummer,'$r3k1','$r3k2')";
	$res = mysqli_query($mysql,$query) or die ("Kon $r3k1 niet toevoegen..");
}
if (!empty($r4k1)) {
	$query = "INSERT INTO items (`lijstnummer`,`kolom1`,`kolom2`) VALUES ($lijstnummer,'$r4k1','$r4k2')";
	$res = mysqli_query($mysql,$query) or die ("Kon $r4k1 niet toevoegen..");
}
if (!empty($r5k1)) {
	$query = "INSERT INTO items (`lijstnummer`,`kolom1`,`kolom2`) VALUES ($lijstnummer,'$r5k1','$r5k2')";
	$res = mysqli_query($mysql,$query) or die ("Kon $r5k1 niet toevoegen..");
}
if (!empty($r6k1)) {
	$query = "INSERT INTO items (`lijstnummer`,`kolom1`,`kolom2`) VALUES ($lijstnummer,'$r6k1','$r6k2')";
	$res = mysqli_query($mysql,$query) or die ("Kon $r6k1 niet toevoegen..");
}
if (!empty($r7k1)) {
	$query = "INSERT INTO items (`lijstnummer`,`kolom1`,`kolom2`) VALUES ($lijstnummer,'$r7k1','$r7k2')";
	$res = mysqli_query($mysql,$query) or die ("Kon $r7k1 niet toevoegen..");
}
if (!empty($r8k1)) {
	$query = "INSERT INTO items (`lijstnummer`,`kolom1`,`kolom2`) VALUES ($lijstnummer,'$r8k1','$r8k2')";
	$res = mysqli_query($mysql,$query) or die ("Kon $r8k1 niet toevoegen..");
}
if (!empty($r9k1)) {
	$query = "INSERT INTO items (`lijstnummer`,`kolom1`,`kolom2`) VALUES ($lijstnummer,'$r9k1','$r9k2')";
	$res = mysqli_query($mysql,$query) or die ("Kon $r9k1 niet toevoegen..");
}
if (!empty($r10k1)) {
	$query = "INSERT INTO items (`lijstnummer`,`kolom1`,`kolom2`) VALUES ($lijstnummer,'$r10k1','$r10k2')";
	$res = mysqli_query($mysql,$query) or die ("Kon $r10k1 niet toevoegen..");
}

$query = "SELECT * FROM items WHERE `lijstnummer` = $lijstnummer";

$res = mysqli_query ($mysql,$query) or die ("Kon de lijstinhoud niet opvragen..");





?>
<table>
<tr>
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


include "voet.php";
?>
