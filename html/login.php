<?php
    session_start();
    require('connexion.php');
    if( !isset($_POST['email']) || !isset($_POST['pass'] ))
    {
        header("location: index.php?error");
        return;
    }
    $mail= trim($_POST['email']);
    $password = trim($_POST['pass']);
    $type = 'ens';


    //pour les ens
    $requete = $connection->prepare("SELECT * FROM ens WHERE email_ens = '$mail' AND pass_ens = '$password'");
    $requete->execute();
    $resultat = $requete->fetchall();
    $type = 'ens';
    
    if( $resultat != NULL )
    {
        $_SESSION['id'] = $resultat[0]['idt_ens'];
        $_SESSION['nom'] = $resultat[0]['nom_ens'];
        $_SESSION['prenom'] = $resultat[0]['prenom_ens'];
        $_SESSION['type'] = 'ens';
        header('location: home.php');
        return;
    }
    $requete = $connection->prepare("SELECT * FROM etud WHERE email_etud = '$mail' AND pass_etud = '$password'");
    $requete->execute();
    $resultat = $requete->fetchall();
    $type = 'etud';
    if($resultat != NULL )
    {
        $_SESSION['id'] = $resultat[0]['idt_etud'];
        $_SESSION['nom'] = $resultat[0]['nom_etud'];
        $_SESSION['prenom'] = $resultat[0]['prenom_etud'];
        $_SESSION['type'] = 'etud';
        header('location: home.php');
        return;
    }
    header("location: index.php?errorLogin=informations saisies incorrectes#login");
    
?>