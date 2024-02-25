<?php
    session_start();
    include('../connexion.php');
    $id_affect = $_GET['id'];
    $id_etud = $_SESSION['$id'];
    $requete = $connection->prepare("DELETE affecter WHERE id_affecter = $id_affect AND id_etud = $id_etud ");
    $requete->execute();
    header('location:../home.php#theme');
?>