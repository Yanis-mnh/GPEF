<?php
include ('../connexion.php');
$id = $_GET['id'];

$requete = $connection->prepare("DELETE FROM projet WHERE idt_projet = $id");
$requete->execute();
header('location: ../home.php#theme');

?>