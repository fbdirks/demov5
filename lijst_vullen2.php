<?php
/* 

	Lijsten maken
	
*/

session_start();

include "functies.php";

$type = logincheck(); # opvragen user type. Wordt hier nog niets mee gedaan.

kop();


include "lijstmenu.php";

// init startvariabelen
$eind=10;

// Deze regels worden alleen uitgevoerd als op de knop "Tien extra regels" is geklikt
if (isset($_POST['Tien'])) {
	$eind=$_POST['aantal_regels']+10;
}

// Deze regels worden alleen uitgevoerd als op de knop "invoeren" is geklikt
if (isset($_POST['muteren'])) {
	$nr = $_POST['lijstnr'];
	$ingevuld = $_POST['rij'];
	$aantal = count($ingevuld);
	$eind=$aantal;
	
	// Aanname: iedere regel is veranderd, en dus moet ieder element van $_POST worden opgeslagen
	// Gevolg: we kunnen de oude items van de lijst gerust weggooien. 
	// Daarna slaan we de items als 'nieuwe' op.
	
	$mysql = db_contact();
	$query = "DELETE FROM items WHERE lijstnummer = $nr";
	//print "verwijder query: $query";
	$res = mysqli_query($mysql,$query) or die ("Kon de oude items niet verwijderen");
	
	// Nu lopen we de onderdelen van de array langs, een voor een. Als er wat staat leidt dat tot een insert query.
	for ($i=1;$i<=$aantal;$i++) {
		if (!empty($ingevuld[$i][0])) {
			$k1 = $ingevuld[$i][0];
			$k2 = $ingevuld[$i][1];
			$query = "INSERT INTO items (`lijstnummer`,`itemnr`,`kolom1`,`kolom2`) VALUES ($nr,$i,'$k1','$k2')";
			$res = mysqli_query($mysql,$query) or die ("Kon $r1k1 niet toevoegen..");	
		}
	}
	
	
}
// lijstnaam ophalen
$nr = $_POST['lijstnr'];
$query = "SELECT * FROM lijsten WHERE lijstnummer = $nr";
$mysql=db_contact();
$res = mysqli_query($mysql,$query);
list($lijstnummer,$lijstnaam,$lijstomschrijving,$kolomlinks,$kolomrechts) = mysqli_fetch_array($res);

echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
echo "<div align=\"center\"><br />";
echo "<h2><i>$lijstnaam</i></h2>";
?>
<form action="lijst_vullen2.php" method="post">
<table class="invullijst">
<tr class="opschrift">
	<td><input type="hidden" name="lijstnr" value="<?php echo $nr; ?>"><input type="hidden" name="aantal_regels" value="<?php echo $eind; ?>"></td>
	<td><?php echo $kolomlinks; ?></td>
	<td><?php echo $kolomrechts; ?></td>
</tr>

<?php
	// kijken of er gegevens zijn en deze zo nodig invullen.
	$query = "SELECT itemnr,kolom1,kolom2 FROM items WHERE lijstnummer=$lijstnummer";
	$res = mysqli_query($mysql,$query) or die ("Kon geen items ophalen");
	// een array met de resultaten vullen
	$aantal=0;
	while (list($itemnr,$kolom1,$kolom2)=mysqli_fetch_array($res)) {
		$rij[$itemnr][1]=$kolom1;
 		$rij[$itemnr][2]=$kolom2;
		$eind2=$itemnr;
	}
	if (isset($eind2)) {
		if ($eind2 > $eind) { 
			$eind = $eind2;
		} 
	}
	//print_r($rij);
	for ($i=1;$i<=$eind;$i++) {
		// als $i nog niet zo groot is als $aantal is er inhoud voor de kolommen van rij $i
		if (isset($rij[$i])) {
			$inhoud1 = $rij[$i][1];
			$inhoud2 = $rij[$i][2];
		} else {
			$inhoud1 = "";
			$inhoud2 = "";
		}

		print "<tr>";
		print "<td>$i</td><td><input type=\"hidden\" name=\"itemnr[]\" value=\"$i\"><input type=\"text\" name=\"rij[$i][]\" value=\"$inhoud1\"></td>";
		print "<td><input type=\"text\" name=\"rij[$i][]\" value=\"$inhoud2\"></td>";
		print "</tr>";
	}
	
?>
<tr><td colspan="3""></td></tr>
<tr>
	<td colspan="3">Actie: <input type="submit" name="muteren" value="invoeren"><input type="submit" name="Tien" value="Tien extra regels"><input type="reset" name="wissen" value="wissen"></td>
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



echo "</div>";
echo "</td></tr></table>";


voet();
?>
