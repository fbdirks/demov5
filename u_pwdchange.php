<?php
/*

	Password veranderen

*/
session_start();
include "kop.php";
include "functies.php";

logincheck();

if (isset($_POST['pdelta'])) {
    echo "Uitvoeren wijziging";
    echo "<br />";

    // opvragen van de ingevulde passwords en het klantnummer
    $pwd_oud = $_POST['oud'];
    $pwd_nieuw1 = $_POST['nieuw1'];
    $pwd_nieuw2 = $_POST['nieuw2'];
    $nummer = $_POST['knummer']; // dit is nodig om de klantgegevens op te kunnen halen en het nieuwe password op de goede plaats te kunnen stallen.

    // controle uitvoeren op de ingevoerde passwords
    // a) is het oude password correct? zo niet: pagina opnieuw neerzetten
	$mysql = db_contact();

    //query opbouwen en uitvoeren
    echo "$query";
    $query = "SELECT wachtwoord from gebruikers WHERE nummer = $nummer";
    $resultaat = mysqli_query($mysql,$query) or die("Fout: nieuwe klantgegevens niet gevonden..");
    $ww = mysqli_fetch_array($resultaat, MYSQL_NUM);

    $ww_oud = $ww[0];
    mysql_close($mysql);

    if ($ww_oud != md5($pwd_oud)) {
        echo_r($ww);
        echo "Oude wachtwoord is niet correct.<br />";
        echo "<a href=\"pwdchange.php\">Terug naar wachtwoord veranderen</p>";
        exit;
    } elseif ($pwd_nieuw1 != $pwd_nieuw2) {
        echo "Beide nieuwe wachtwoorden komen niet met elkaar overeen.<br />";
        echo "<a href=\"pwdchange.php\">Terug naar wachtwoord veranderen</p>";
        exit;
    } else {
        $wwn = md5($pwd_nieuw1);
        $mysql = db_contact();
        $query = "UPDATE gebruikers SET wachtwoord = \"$wwn\" WHERE nummer = $nummer";
        echo $query;
        $resultaat = mysqli_query($mysql,$query) or die("Fout: nieuwe klantgegevens niet gevonden..");
        mysqli_close($mysql);
        echo "Wachtwoord veranderd!";
        echo "<a href=\"index.php\">Terug naar de indexpagina</a>";
    }

}


// uit Session opvragen wie ingelogd is.
$nummer = $_SESSION['nummer'];
$naam = $_SESSION['voornaam'] . " " . $_SESSION['achternaam'];

// user gegevens opvragen uit de database (zie code in registreren.php)

//contact zoeken met mysql
$mysql = db_contact();

//query opbouwen en uitvoeren
$query = "SELECT * FROM gebruikers WHERE nummer = $nummer";
$resultaat = mysqli_query($mysql,$query) or die("Fout: nieuwe klantgegevens niet gevonden..");
$rij = mysqli_fetch_array($resultaat, MYSQL_NUM);

$num = $rij['0'];
$ww = $rij['1'];
$vn = $rij['2'];
$an = $rij['3'];
$ty = $rij['4'];

mysqli_close($mysql);

// user gegevens plaatsen in een wijzigingsformulier (voorinvullen)
echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
echo "<div align=\"center\"><br />";


echo "<h2>Wachtwoord wijzigen</h2>";
echo "U hebt hieronder de mogelijkheid om uw wachtwoord te wijzigen.<br />";
echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">";
echo "<table><tr>";
echo "<td>Klantnummer: </td><td>$num </td>";
echo "</tr><tr>";
echo "<td>Naam: </td><td>$naam </td>";
echo "</tr><tr>";
echo "<td>Oude wachtwoord: </td><td><input type=\"password\" name=\"oud\" > </td>";
echo "</tr><tr>";
echo "<td>Nieuwe wachtwoord: </td><td><input type=\"password\" name=\"nieuw1\" > </td>";
echo "</tr><tr>";
echo "<td>Nog een keer nieuwe wachtwoord: </td><td><input type=\"password\" name=\"nieuw2\"></td>";
echo "</tr><tr>";
echo "<td>Veranderen:";
echo "<input type=\"hidden\" name=\"knummer\" value=\"$num\">"; // voor doorgeven van het klantnummer!
echo "<input type=\"hidden\" name=\"pdelta\" value=\"ok\">";
echo "</td><td>";
echo "<input type=\"submit\" name=\"verander\" value=\"Bevestig Verandering\"></td>";
echo "</tr></table></form>";
echo "<br /><br />";

echo "</div>";
echo "</td></tr></table>";

// als user op opslaan klikt moeten de (gewijzigde) gegevens opgeslagen worden
// vergeet de invoercontrole niet!!

// terug naar de index pagina
echo "<a href=\"index.php\">Indexpagina</a>";


include "voet.php";
?>