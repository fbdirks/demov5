<?php
// standaard schermopbouw
//require_once("db_inc.php");

include "functies.php";

kop();
// Is het registratieformulier zojuist ingevoerd?
if (isset($_POST['nieuw'])) {

    // JA
    echo "Uw registratie wordt uitgevoerd.";

    toon($_POST);
    // opvragen wat ingevuld is
   
    $username = $_POST['username'];
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
        echo "<a href=\"u_registreren.php\">Opnieuw proberen</a>";
        exit;
    } else {
    	
    		echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
				echo "<div align=\"center\"><br />";

        //contact zoeken met mysql
       	$mysql = db_contact();
        //query opbouwen en uitvoeren
        $mw = trim($ww1);
        $mw = md5($mw);
        // Hier stond een VIEZE fout!! een spatie achter $mw " die ervoor zorgde dat die spatie steeds mee gesaved werd!!!!!
        $query = "INSERT INTO gebruikers  (username,wachtwoord, voornaam, achternaam, straat, huisnummer, postcode, plaats, telefoon, type) VALUES ('$username','$mw','$vnaam','$anaam','$straat','$huisnummer','$postcode','$plaats','$telefoon','user');";
        echo $query; #  DEBUGREGEL
        //resultaat verwerken
        $resultaat = mysqli_query($mysql,$query) or die("Fout: query niet goed uitgevoerd");

        // FEEDBACK
        // klantnummer opvragen
        $laatsteNieuwe = hoogste_nummer();
        echo "<br>Hoogste nieuwe nummer: $laatsteNieuwe<br />";
        //op basis hiervan de net ingevoerde gegevens opvragen
        $query = "SELECT * FROM gebruikers WHERE nummer = $laatsteNieuwe";
        $resultaat = mysqli_query($mysql,$query) or die("Fout: nieuwe klantgegevens niet gevonden..");

        // deze gegevens in een array plaatsen.
        $rij = mysqli_fetch_array($resultaat, MYSQL_NUM);

        // mysql verbinding sluiten
        mysqli_close($mysql);
        // voor de zekerheid ook de $_POST array even legen...
        unset($_POST);

        // Feedback op scherm: de ingevoerde gegevens nog een keer tonen.
        echo "<table><tr>";
        echo "<td>Klantnummer:</td><td>$rij[0]</td>";
        echo "</tr><tr>";
        echo "<td>Voornaam:</td><td>$rij[1]</td>";
        echo "</tr><tr>";
        echo "<td>Achternaam:</td><td>$rij[2]</td>";
        echo "</tr><tr>";
        echo "<td>Straat:</td><td>$rij[4]</td>";
        echo "</tr><tr>";
        echo "<td>Huisnummer:</td><td>$rij[5]</td>";
        echo "</tr><tr>";
        echo "<td>Postcode:</td><td>$rij[6]</td>";
        echo "</tr><tr>";
        echo "<td>Woonplaats:</td><td>$rij[7]</td>";
        echo "</tr><tr>";
        echo "<td>Telefoon:</td><td>$rij[8]</td>";
        echo "</tr><tr>";

        echo "<td>Accounttype:</td><td>$rij[9]</td>";
        echo "</tr></table>";
        echo "<br /><a href=\"index.php\">Terug naar de indexpagina</a>";
        
        echo "</div>";
				echo "</td></tr></table>";

    }

} else {

    //$nummer = hoogste_nummer() + 1;
    
    echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
		echo "<div align=\"center\"><br />";
    
    echo "U wilt zich registreren als gebruiker van onze applicatie.<br />";
    echo "Vult u daartoe onderstaand formulier in.<br />";
    // formulier op scherm
    echo "<form method=\"post\" action =\"".$_SERVER['PHP_SELF']."\">\n";
    echo "<table><tr><td>";
    echo "Usernaam: </td><td>";
    echo "<input type=\"text\" name=\"username\">";
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

voet();

?>

