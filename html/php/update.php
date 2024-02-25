<?php
    
    session_start();
    include('../connexion.php');
    $theme = str_replace(array("\\","\t",'"',"'","\r", "\n"), ' ', $_POST['theme']);
    $detail = str_replace(array("\\","\t",'"',"'","\r", "\n"), ' ', $_POST['detail']);
    $objective = str_replace(array("\\","\t",'"',"'","\r", "\n"), ' ', $_POST['object']);
    $id_prj = $_GET['id'];
    if($_SESSION['type'] == 'ens')
    {
        $requete = $connection->prepare("UPDATE
        projet
    SET
        projet.theme = '$theme',
        projet.detail_prj = '$detail',
        projet.objectif_prj = '$objective'
        Where projet.idt_ens = $_SESSION[id] AND projet.idt_projet = $id_prj;
    " );
    $requete->execute();
        
    }
    echo '<pre>';
    print_r($_POST);
    print_r($_GET);
    echo '</pre>';
    header("location: ../home.php#theme");
?>