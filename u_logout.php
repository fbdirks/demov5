<?php
/*
	Uitloggen en sessie vernietigen.
*/


session_start(); # om session te kunnen bereiken

session_unset(); # leegmaken en..
session_destroy(); # weggooien
header('Location: index.php');
?>
