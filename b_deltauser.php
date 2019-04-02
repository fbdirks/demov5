<?php
/*
* Verwerken van de invoer van b_ub.php (het beheren van gebruikers)
* 
*/
session_start();

include "functies.php";

$type = logincheck();

kop();

// mag dit type gebruiker deze pagina wel zien?
if ($type == "B") {


    // opvragen invoer
    $aantal = $_POST['aantal'];

    // zorgen dat de noodzakelijk actie eerst op 'false' staat.
    $wijzigen = false;
    $verwijderen = false;

    // bepalen welke knop van welke rij van de klantentabel is ingedrukt
    for ($i = 0; $i <= $aantal; $i++) {
        if (isset($_POST['wijzig'][$i])) {
            $wijzigen = true;
            $wijzig_klant = $i;
        }
        if (isset($_POST['weg'][$i])) {
            $verwijderen = true;
            $weg_klant = $i;
        }
    }


    // als het verwijderen is..
    if ($verwijderen) {
		echo "<table width=\"50%\" align=\"center\"><tr><td>";
        echo "U wilt klant nummer $weg_klant verwijderen.";
        echo "<br><br>Weet u dit zeker?";
        echo "<form action=\"b_rem_user.php\" method=\"post\">";
        echo "<input type=\"submit\" value=\"Ja\" name=\"ja\">";
        echo "<input type=\"submit\" value=\"Nee\" name=\"nee\">";
        echo "<input type=\"hidden\" value=\"$weg_klant\" name=\"nr\">";
        echo "</form>";
		echo "</td></tr></table>";
		
    }

    // als het wijzigen is..
    if ($wijzigen) {
    	
    		echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
				echo "<div align=\"center\"><br />";
        
        echo "U wilt klant nummer $wijzig_klant wijzigen.";

        // formulier opbouwen met de juiste gegevens van de klant
        // query opbouwen en uitvoeren
        $query = "SELECT * FROM gebruikers WHERE nummer=$wijzig_klant;";

        $klant=arrayquery($query); # deze functie staat in functies
        
        $num = $klant['0'];
	$un = $klant[1];
        $vn = $klant['2'];
        $an = $klant['3'];
        $st = $klant['5'];
        $hn = $klant['6'];
        $pc = $klant['7'];
        $pl = $klant['8'];
        $te = $klant['9'];
        $ty = $klant['10'];


        // DAARNA: formulier neerzetten en invullen.
        echo "<form action=\"b_deltauser2.php\" method=\"post\">";
        echo "<table border = \"1\"><tr>";
        echo "<td>Klantnummer:</td><td>$wijzig_klant (niet te wijzigen)</td>";
        echo "</tr><tr>";
        echo "<td>Voornaam:</td><td><input type=\"text\" name=\"voornaam\" value=\"$vn\"></td>";
echo "</tr><tr>";
        echo "<td>Usernaam:</td><td><input type=\"text\" name=\"voornaam\" value=\"$un\"></td>";
        echo "</tr><tr>";
        echo "<td>Achternaam:</td><td><input type=\"text\" name=\"achternaam\" value=\"$an\"></td>";
        echo "</tr><tr>";
        echo "<td>Straat:</td><td><input type=\"text\" name=\"straat\" value=\"$st\"></td>";
        echo "</tr><tr>";
        echo "<td>Huisnummer:</td><td><input type=\"text\" name=\"huisnummer\" value=\"$hn\"></td>";
        echo "</tr><tr>";
        echo "<td>Postcode:</td><td><input type=\"text\" name=\"postcode\" value=\"$pc\"></td>";
        echo "</tr><tr>";
        echo "<td>Plaats:</td><td><input type=\"text\" name=\"plaats\" value=\"$pl\"></td>";
        echo "</tr><tr>";
        echo "<td>Telefoon:</td><td><input type=\"text\" name=\"telefoon\" value=\"$te\"></td>";
        echo "</tr><tr>";

        echo "<td>Type:</td><td><input type=\"text\" name=\"type\" value=\"$ty\"></td>";
        echo "</tr><tr>";
        echo "<td>Klik om wijzigingen op te slaan:</td><td><input type=\"submit\" value=\"Wijzig\">";
        echo "</tr></table>";
        echo "<input type=\"hidden\" name=\"klantnummer\" value=$wijzig_klant>";
        echo "</form>";
        
        echo "</div>";
				echo "</td></tr></table>";

    }
} else {
    echo "U bent niet bevoegd deze pagina te gebruiken.";
}


voet();
?>
