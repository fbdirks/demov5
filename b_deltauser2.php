<?php

/*
	Het veranderen van users finaliseren (vervolg van b_deltauser.php)
	// ToDo: proberen te integreren met b_deltauser.php
*/

session_start();

include "functies.php";

$type = logincheck();

kop();

if ($type != "B") {
    echo "U bent niet bevoegd deze pagina te gebruiken!";
} else {
    //ingevoerde gegevens opvragen
    $kn = $_POST['klantnummer'];
    $vn = $_POST['voornaam'];
    $an = $_POST['achternaam'];
    $st = $_POST['straat'];
    $hn = $_POST['huisnummer'];
    $pc = $_POST['postcode'];
    $pl = $_POST['plaats'];
    $te = $_POST['telefoon'];
    $ty = $_POST['type'];

    /*    #debug
	print "<pre>";
    print_r($_POST);
    print "</pre>";
	*/
    //contact zoeken met database
    $mysql = db_contact();

    // query opbouwen
    $query = "UPDATE gebruikers SET voornaam = \"$vn\" , achternaam = \"$an\", straat = \"$st\", huisnummer = \"$hn\", postcode = \"$pc\", plaats = \"$pl\", telefoon = \"$te\", type = \"$ty\" WHERE nummer = $kn;";
    // print "$query"; # debug
    //query uitvoeren
    $resultaat = mysqli_query($mysql,$query) or die("Fout: update query niet gelukt.");

    // feedback
	echo "<table align=\"center\" width=\"50%\"><tr><td>";
    echo "Gegevens user $kn gewijzigd:<br />";
    echo "Voornaam: $vn <br />";
    echo "Achternaam: $an <br />";
    echo "Straat: $st <br />";
    echo "Huisnummer: $hn <br />";
    echo "Postcode: $pc <br />";
    echo "Plaats: $pl <br />";
    echo "Telefoon: $te <br />";

    echo "Type: $ty <br />";
    echo "<br />";
    echo "<a href=\"b_ub.php\">Terug naar userbeheer</a>";
	
	echo "</td></tr></table>";
	

}

voet();

?>
