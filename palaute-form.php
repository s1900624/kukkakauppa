<?php
require_once 'db.php';
$mysqli = new mysqli($host, $username, $password, $database);

$name = strip_tags($_POST['nimi']);
$sirname = strip_tags($_POST['sukunimi']);
$palautetext = strip_tags($_POST['palaute']);


$sql = "INSERT INTO `harjoituskauppa`.`palaute` (`etunimi`, `sukunimi`, `palaute`) VALUES ('$name', '$sirname', '$palautetext')";

if ($mysqli->query($sql) === TRUE) {
    echo "Palaute teksti on lisätty.";
    echo "<br>";
    echo "2 sekunnin kuluttua sinut palautetaan palaute-sivulla.";
} else {
    echo "Error: " . $sql . "<br>" . $mysqli->error;
}
?>

<meta http-equiv="Refresh" content="2; url=palaute.php">
