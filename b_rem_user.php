<?php
/*

	Verwijderen van een user finaliseren (vervolg op b_ub.php)

*/

session_start();
include "kop.php";
include "functies.php";

$type = logincheck();

if ($type != "B") {
    echo "U bent niet bevoegd deze pagina te gebruiken!";
} else {
    $usernummer = $_POST['nr'];
    if (isset($_POST['ja'])) {
        $weggooien = "ja";
    } else {
        $weggooien = "nee";
    }

    if ($weggooien == "ja") {

        $mysql = db_contact();
        $query = "DELETE FROM gebruikers WHERE nummer = $usernummer;";
        // echo "$query"; # debug

        $resultaat = mysqli_query($mysql,$query) or die("Fout: Verwijderingsquery werkte niet.");

        echo "<center>User nummer $usernummer is verwijderd.</center>";

    }

    echo "<br><center><a href=\"b_ub.php\">Terug naar het user overzicht</a></center>";

}


include "voet.php";

?>
