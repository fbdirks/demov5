<?php

// database gegevens
include "db_inc.php";

/*

	controle(naam, wachtwoord) --
	
		controleert of het ingevoerde wachtwoord gelijk is aan het wachtwoord 
		dat onder naam vermeld staat in de database.
		
		return waarden: true (als het klopt), false (als het niet klopt)

*/
function db_contact() {
	global $db_server, $db_user, $db_pass, $db_name;
		
	$handle = mysqli_connect($db_server, $db_user, $db_pass, $db_name);
	
	if(mysqli_connect_errno()) {
		printf("Connectie mislukt: %s \n",mysqli_connect_errno());
		exit();
	}
	
	return $handle; # return kan geen resources teruggeven! Daarom deze TWEE regels.
}

function db_verbreek($handle) {
	mysqli_close($handle);
}



function controle($naam, $wachtwoord)
{

    // Invoercontrole (moet nog uitgebreider)
    $naam = trim($naam);
    $wachtwoord = trim($wachtwoord);

    // Database functies: contactleggen met mysql en de correcte database
    $mysql = db_contact(); 

		// prepared statement aanpak
		// 1. initialiseren
		$stmt = mysqli_stmt_init($mysql);
		
		// 2. opbouwen query  (Hier een IF omheen???  zie php documentatie)
		mysqli_stmt_prepare($stmt, 'SELECT wachtwoord, nummer, voornaam, achternaam, type FROM gebruikers WHERE username=?');
		
		// 3. koppelen usernaam aan query
		mysqli_stmt_bind_param($stmt, "s", $naam);
		
		// 4. query uitvoeren
		mysqli_stmt_execute($stmt);
		
		// 5. terug te verkrijgen parameters klaarzetten
		mysqli_stmt_bind_result($stmt, $ww,$nr,$vn,$an,$ty); 
		
		// 6. resultaat opvragen
		mysqli_stmt_fetch($stmt);
		
		
		// 7. einde
		mysqli_stmt_close($stmt);
				
	
		// verbinding met de mysql database sluiten
    db_verbreek($mysql);
		
    // controle wachtwoord
    if (strcmp($wachtwoord, $ww) == 0) {
        // als het klopt moeten de sessie variabelen gevuld worden
        $_SESSION['nummer'] = $nr;
        $_SESSION['wachtwoord'] = $ww;
        $_SESSION['voornaam'] = $vn;
        $_SESSION['achternaam'] = $an;
        $_SESSION['soort'] = $ty;
        return true;
    } else {
        // wachtwoord klopt niet
        return false;
    }

}

/*
	logincheck:
		controleert of iemand die een pagina aanvraagt ingelogd is. 
		Als dat niet zo is kan naam+wachtwoord ingevuld worden.
		Als dat wel zo is wordt de naam van de ingelogde persoon boven aan de pagina geplaatst en
		wordt de controle teruggegeven aan het aanroepende script.
*/

function logincheck()
{
    //  is de sessie variabele ingelogd gevuld met OK?
    if (!(isset($_SESSION['ingelogd'])) or ($_SESSION['ingelogd'] != "OK")) {
        // zo nee: is het formulier ingevuld en kloppen de usergegevens?
        if (isset($_POST['verzonden']) && controle($_POST['naam'], md5($_POST['wachtwoord'])) == true) {
            // JA
            $_SESSION['ingelogd'] = "OK";
        } else {
            // NEE: formulier weer op scherm zetten
            //return 999;
            
            kop();
            ?>
<div style="text-align: center">
            
            <!-- echo "<table class=\"inloggen\" align=\"center\" width=\"50%\" bgcolor=\"#FFFF80\"><tr><td>"  -->
						
						<br>
	            <h6>U bent nog niet (correct) ingelogd. Voer uw inloggegevens in.</h6> <br>
	            <form method="post" action = "<?php echo $_SERVER['PHP_SELF']; ?>">
		            <table align="center">
		            	<tr><td>Usernaam: </td><td><input type="text" name="naam" placeholder = "inlognaam"></td></tr>
		            	<tr><td>Wachtwoord: </td><td><input type="password" name="wachtwoord" placeholder="wachtwoord"></td></tr>
		            	<tr><td><input type="submit" value="verzenden" name="verzonden"></td><td><input type="reset" value="herstel" name="reset"></td></tr>
		            </table>
		          </form>
	          	<br><br>
	            
	            <h6><a href="u_registreren.php">Klik hier</a> voor een nieuwe registratie als gebruiker.</h6>
          
        
          </div>  
            <?php
                   
            voet();
            exit;
            
        }
    } else {
        echo "Ingelogd als <a href=\"u_profiel.php\">" . $_SESSION['voornaam'] . " " . $_SESSION['achternaam'] .
            "</a> " . $_SESSION['soort'] . "<br />";
        echo "<hr />";
        return $_SESSION['soort'];

    }

}

function hoogste_nummer() {
    $mysql=db_contact();
    $sql = "Select max(nummer) From gebruikers";
    $resultaat = mysqli_query($mysql,$sql) or die ("Kan geen contact leggen.");
    $r = mysqli_fetch_array($resultaat);
    return $r[0];
}


function toon($lijst,$naam=""){
    echo "<b>Inhoud van $naam:</b><br>";
    echo "<pre>";
    print_r($lijst);
    echo "</pre>";
}

function invoercontrole($invoer) {
	// veel te beknopt!!
	$uitvoer = trim($invoer);
	return $uitvoer;
}


function arrayquery($query) {

        $mysql = db_contact(); 

        $resultaat = mysqli_query($mysql,$query) or die("<b><u>Fout:</u></b> $query <br><i>niet uitgevoerd..</i><br>");

        $klant = mysqli_fetch_array($resultaat);

        return $klant;
}

function mysqlquery($query) {
        $mysql = db_contact(); 

        $resultaat = mysqli_query($mysql,$query) or die("<b><u>Fout:</u></b> $query <br><i>niet uitgevoerd..</i><br>");

        return $resultaat;   
}

function hoogste_klant() {

    $query = "SELECT max(nummer) FROM gebruikers;";
    $maximum = arrayquery($query);
    return  $maximum[0];
}


function aantal_klanten() {
    $query = "SELECT count(*) FROM gebruikers";
    $res = arrayquery($query);
    return $res[0];
}

function kop() {
	?>
	
	<!DOCTYPE html>

	<html>
		<head>
			<link href="https://fonts.googleapis.com/css?family=Cinzel|Merriweather+Sans" rel="stylesheet">
	    <link rel="stylesheet" type="text/css" href="stijl.css">
	    <title>CasaNostra</title>
		</head>

		<body>
			<table align="center"><tr><td><h1 id="titel">
    		<img src='img/onshuis.jpg' alt="Logo" align="middle"> Studie Soci&euml;teit CasaNostra</h1>
			</td></tr></table>
			
    	<hr>
	
	<?php
}

function voet() {
	?>
			
			<div align="center">
				<h6>
					<a href="index.php">home</a>  &copy; ogol industries, 2012
					<a href="u_logout.php">Log Off</a>
				</h6>
			</div>

		</body>
	</html>
	<?php
	
}

?>
