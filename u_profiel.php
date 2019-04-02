<?php
/*

	Profiel inzien en eventueel wijzigen.

*/
session_start();

include "functies.php";

kop();

logincheck();

if (isset($_POST['delta'])) {
    echo "Uitvoeren wijziging";
    echo "<br />";


    // wat zijn de gegevens
    $voornaam = $_POST['voornaam'];
    $achternaam = $_POST['achternaam'];
    $nummer = $_POST['knummer'];
    $straat = $_POST['straat'];
    $huisnummer = $_POST['huisnummer'];
    $postcode = $_POST['postcode'];
    $plaats = $_POST['plaats'];
    $telefoon = $_POST['telefoon'];
    $ww1 = $_POST['wachtwoord1'];
    $ww2 = $_POST['wachtwoord2'];


    // opbouwen, uitvoeren van de query

    $mysql = db_contact();

    $query = "UPDATE gebruikers SET voornaam = \"$voornaam\", achternaam = \"$achternaam\" , straat = $straat, huisnummer = $huisnummer, postcode = $postcode, plaats = $plaats, telefoon = $telefoon, WHERE nummer = $nummer;";

    $resultaat = mysqli_query($mysql,$query) or die("Fout: ik kon de wijziging niet doorvoeren.");

    echo "<br /><h3>Usergegevens veranderd!</h3> ";

}


// uit Session opvragen wie ingelogd is.
$nummer = $_SESSION['nummer'];

// user gegevens opvragen uit de database (zie code in registreren.php)

//contact zoeken met mysql
$mysql = db_contact();

//query opbouwen en uitvoeren
$query = "SELECT * FROM gebruikers WHERE nummer = $nummer";
$resultaat = mysqli_query($mysql,$query) or die("Fout: nieuwe klantgegevens niet gevonden..");
$rij = mysqli_fetch_array($resultaat, MYSQL_NUM);

$num = $rij['0'];
$vn = $rij['1'];
$an = $rij['2'];
$ww = $rij['3'];
$st = $rij['4'];
$hn = $rij['5'];
$pc = $rij['6'];
$pl = $rij['7'];
$te = $rij['8'];
$ty = $rij['9'];


// user gegevens plaatsen in een wijzigingsformulier (voorinvullen)
echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
echo "<div align=\"center\"><br />";
echo "<h2>Uw profiel</h2>";
echo "U hebt hieronder de mogelijkheid om enkele gegevens uit uw profiel te wijzigen.<br />";
echo "<form action=\"".$_SERVER['PHP_SELF']."\" method=\"POST\">";
echo "<table><tr>";
echo "<td>Nummer: </td><td bgcolor=\"#FF4500\"><input type=\"hidden\" name=\"knummer\" value=\"$num\">$num</td>";
echo "</tr><tr>";
echo "<td>Voornaam: </td><td><input type=\"text\" name=\"voornaam\" value=\"$vn\"></td>";
echo "</tr><tr>";
echo "<td>Achternaam: </td><td><input type=\"text\" name=\"achternaam\" value=\"$an\"></td>";
echo "</tr><tr>";
echo "<td>Straat: </td><td><input type=\"text\" name=\"achternaam\" value=\"$st\"></td>";
echo "</tr><tr>";
echo "<td>Huisnummer: </td><td><input type=\"text\" name=\"achternaam\" value=\"$hn\"></td>";
echo "</tr><tr>";
echo "<td>Postcode: </td><td><input type=\"text\" name=\"achternaam\" value=\"$pc\"></td>";
echo "</tr><tr>";
echo "<td>Plaats: </td><td><input type=\"text\" name=\"achternaam\" value=\"$pl\"></td>";
echo "</tr><tr>";
echo "<td>Telefoon: </td><td><input type=\"text\" name=\"achternaam\" value=\"$te\"></td>";
echo "</tr><tr>";
echo "<td>Wachtwoord: </td><td><a href=\"u_pwdchange.php\">Wijzig hier</a> uw wachtwoord.</td>";
echo "</tr><tr>";
echo "<td>Type: </td><td bgcolor=\"#FF4500\">$ty   </td>";
echo "</tr><tr>";
echo "<td >&nbsp;</td><td bgcolor=\"#FF4500 \">= niet wijzigbaar</td></tr><tr>";
echo "<td>Veranderen:<input type=\"hidden\" name=\"delta\" value=\"ok\"> </td><td><input type=\"submit\" name=\"verander\" value=\"Bevestig Verandering\"></td>";
echo "</tr></table>";
echo "<br /><br />";
echo "</div>";
echo "</td></tr></table>";


// als user op opslaan klikt moeten de (gewijzigde) gegevens opgeslagen worden
// vergeet de invoercontrole niet!!


// terug naar de index pagina
echo "<a href=\"index.php\">Indexpagina</a>";


voet();
?>