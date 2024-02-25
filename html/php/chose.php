<?php
    session_start();
    include('../connexion.php');
    $id_projet = $_GET['id'];
    $requete = $connection->prepare("INSERT INTO affecter VALUES($_SESSION[id], $id_projet )");
    $requete->execute();
    header('location:../home.php#theme');
?>