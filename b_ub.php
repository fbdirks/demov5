<?php
session_start();
include "kop.php";
include "functies.php";

$type = logincheck();

if ($type == "B") {

    // Hier de code voor het userbeheer

		echo "<table align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>";
		echo "<div align=\"center\"><br />";


    // OPVRAGEN USERLIJST (default actie)
    $mysql = db_contact();
    
    $query = "SELECT * FROM gebruikers order by type,nummer";
    $resultaat=mysqlquery($query);


    // opvragen hoe groot de resultaat tabel is
    $rijen = aantal_klanten(); # in FUNCTIES
    $velden = mysqli_num_fields($resultaat);

    $maxnr = hoogste_klant(); # uit functies
    echo "Grootste klantnummer: $maxnr"; 


    // start uitvoertabel
    echo "<form action=\"b_deltauser.php\" method=\"post\">";
    echo "<table border=\"1\">";
    echo "<tr>";
    //echo "<td>#</td>";

    // kolomnamen in uitvoertabel zetten met mysql_field_name()
    $i = 0;
    while ($i < $velden) {
        $veld = mysqli_fetch_field($resultaat);
        $veldnaam = $veld->name;
        if ($veldnaam != "wachtwoord") {
            echo "<td>$veldnaam</td>";
        }
        $i++;
    }
    echo "<td>Actie:</td>";

    echo "</tr><tr>";

    // resultaten in de tabel zetten met mysql_fetch_row()

    while ($regel = mysqli_fetch_array($resultaat)) {
        echo "<td>$regel[nummer]</td>";
	echo "<td>$regel[username]</td>";
        echo "<td>$regel[voornaam]</td>";
        echo "<td>$regel[achternaam]</td>";
        echo "<td>$regel[straat]</td>";
        echo "<td>$regel[huisnummer]</td>";
        echo "<td>$regel[postcode]</td>";
        echo "<td>$regel[plaats]</td>";
        echo "<td>$regel[telefoon]</td>";
        echo "<td>$regel[type]</td>";
        echo "<td>";
        echo "<input type=\"submit\" value=\"W\" name=\"wijzig[" . $regel['nummer'] .
            "]\">";
        echo "<input type=\"submit\" value=\"x\" name=\"weg[" . $regel['nummer'] .
            "]\">";
        echo "</td>";
        echo "</tr><tr>";
    }

    echo "</tr></table>";
    echo "<input type=\"hidden\" name=\"aantal\" value=$maxnr>";
    echo "</form>";

    // alleen nuttig tijdens debuggen
    echo "Aantal klanten: $rijen, aantal kolommen: $velden";

    // nieuwe gebruiker aanmaken
    echo "<br /><a href=\"b_newuser.php\">Nieuwe gebruiker aanmaken</a>";
    
    echo "</div>";
		echo "</td></tr></table>";
		
} else {
    echo "U bent niet bevoegd deze pagina te gebruiken.";
}

include "voet.php";
?>
