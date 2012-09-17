<?php

session_start();

$nr = $_GET['vraag'];
$_SESSION['antwoord'][$nr]=$_GET['antwoord'];

echo $_GET['vraag']." <br/>";
echo $_SESSION['antwoord'][1]." <br/>";
			
?>