<?php

/*
	Aanmaken van nieuwe user door beheerder.
	ToDo: integeren met u_registreren.php
*/

session_start();


include "functies.php";

$type = logincheck();

kop();

if ($type != "B") {
    echo "U bent niet bevoegd deze pagina te gebruiken!";
} else {

    // Is het registratieformulier zojuist ingevoerd?
    if (isset($_POST['nieuw'])) {

        echo "De user wordt toegevoegd.";

        // toon($_POST); #debug

        // opvragen wat ingevuld is
        $unaam = $_POST['usernaam'];
        $vnaam = $_POST['voornaam'];
        $anaam = $_POST['achternaam'];
        $straat = $_POST['straat'];
        $huisnummer = $_POST['huisnummer'];
        $postcode = $_POST['postcode'];
        $plaats = $_POST['plaats'];
        $telefoon = $_POST['telefoon'];
        $ww1 = $_POST['wachtwoord1'];
        $ww2 = $_POST['wachtwoord2'];

        // controleren of twee keer hetzelfde wachtwoord is ingevuld.
        if ($ww1 != $ww2) {
            echo "De wachtwoorden komen niet overeen.<br />";
            echo "<a href=\"registreren.php\">Opnieuw proberen</a>";
            exit;
        } else {
        	
        		echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
						echo "<div align=\"center\"><br />";

            $mysql = db_contact();
            //query opbouwen en uitvoeren
            $mw = trim($ww1);
            $mw = md5($mw);
            // Hier stond een VIEZE fout!! een spatie achter $mw " die ervoor zorgde dat die spatie steeds mee gesaved werd!!!!!
            $query = "INSERT INTO gebruikers  (username, wachtwoord, voornaam, achternaam, straat, huisnummer, postcode, plaats, telefoon,type) VALUES ('$unaam','$mw','$vnaam','$anaam','$straat', '$huisnummer','$postcode','$plaats', '$telefoon', 'U');";
            echo $query;  #DEBUGREGEL
            //resultaat verwerken
            $resultaat = mysqli_query($mysql,$query) or die("Fout: query niet goed uitgoevoerd");

            // FEEDBACK
            // klantnummer opvragen
            $laatsteNieuwe = hoogste_nummer();
            //op basis hiervan de net ingevoerde gegevens opvragen
            $query = "SELECT * FROM gebruikers WHERE nummer = $laatsteNieuwe";
            $resultaat = mysqli_query($mysql,$query) or die("Fout: nieuwe klantgegevens niet gevonden..");

            // deze gegevens in een array plaatsen.
            $rij = mysqli_fetch_assoc($resultaat);

            // mysql verbinding sluiten
            mysqli_close($mysql);
            

               
            // Feedback op scherm: de ingevoerde gegevens nog een keer tonen.
            echo "<table><tr>";
            echo "<td>Usernaam:</td><td>$rij[username]</td>";
            echo "</tr><tr>";
            echo "<td>Voornaam (=unieke inlognaam):</td><td>$rij[voornaam]</td>";
            echo "</tr><tr>";
            echo "<td>Achternaam:</td><td>$rij[achternaam]</td>";
            echo "</tr><tr>";
            echo "<td>Straat:</td><td>$rij[straat]</td>";
            echo "</tr><tr>";
            echo "<td>Huisnummer:</td><td>$rij[huisnummer]</td>";
            echo "</tr><tr>";
            echo "<td>Postcode:</td><td>$rij[postcode]</td>";
            echo "</tr><tr>";
            echo "<td>Plaats:</td><td>$rij[plaats]</td>";
            echo "</tr><tr>";
            echo "<td>Telefoon:</td><td>$rij[telefoon]</td>";
            echo "</tr><tr>";
            echo "<td>Accounttype:</td><td>$rij[type]</td>";
            echo "</tr></table>";
            echo "<br /><a href=\"b_ub.php\">Terug naar userbeheer</a>";
            
            echo "</div>";
						echo "</td></tr></table>";

        }

    } else {

        
        
        echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
				echo "<div align=\"center\"><br />";
        
        $nummer = hoogste_nummer()+ 1;
        
        echo "Invoeren nieuwe klant<br />";
        echo "Vul de onderstaande gegevens in.<br />";
        // formulier op scherm
        echo "<form method=\"post\" action =\"$_SERVER[PHP_SELF]\">\n";
        echo "<table><tr><td>";
        echo "<input type=\"hidden\" name=\"nummer\" value=\"$nummer\">";
        echo "Usernaam: </td><td>";
        echo "<input type=\"text\" name=\"usernaam\">";
        echo "</td></tr><tr><td>";
        echo "Voornaam: </td><td>";
        echo "<input type=\"text\" name=\"voornaam\">";
        echo "</td></tr><tr><td>";
        echo "Achternaam: </td><td>";
        echo "<input type=\"text\" name=\"achternaam\">";
        echo "</td></tr><tr><td>";

        echo "Straat: </td><td>";
        echo "<input type=\"text\" name=\"straat\">";
        echo "</td></tr><tr><td>";
        echo "Huisnummer: </td><td>";
        echo "<input type=\"text\" name=\"huisnummer\">";
        echo "</td></tr><tr><td>";
        echo "Postcode: </td><td>";
        echo "<input type=\"text\" name=\"postcode\">";
        echo "</td></tr><tr><td>";
        echo "Plaats: </td><td>";
        echo "<input type=\"text\" name=\"plaats\">";
        echo "</td></tr><tr><td>";
        echo "Telefoon: </td><td>";
        echo "<input type=\"text\" name=\"telefoon\">";
        echo "</td></tr><tr><td>";

        echo "Wachtwoord: </td><td>";
        echo "<input type=\"password\" name=\"wachtwoord1\">";
        echo "</td></tr><tr><td>";
        echo "Nog een keer het wachtwoord: </td><td>";
        echo "<input type=\"password\" name=\"wachtwoord2\">";
        echo "</td></tr><tr><td>";
        echo "<input type=\"submit\" value=\"Registeren\" name=\"verzonden\"></td><td><input type=\"reset\" value=\"herstel\" name=\"reset\">";
        echo "</td></tr></table>";
        echo "<input type=\"hidden\" value=\"nieuw\" name=\"nieuw\">";
        echo "</form>";
        echo "<br /><br />";
        
        echo "</div>";
				echo "</td></tr></table>";

    }

}

// cosmetica
voet();

?>
