<?php
    include_once('connexion.php');
    $nom = $_POST['nom'];
    $prenom = $_POST['prenom'];
    $mail = $_POST['email'];
    $pass = $_POST['pass'];
    $type = $_POST['type'];

    $requete = $connection->prepare(
        "SELECT email_etud FROM etud WHERE email_etud = '$mail'
        UNION
        SELECT email_ens FROM ens WHERE email_ens = '$mail'
        "
    );
    $requete->execute();
    $resultat = $requete->fetchall();
    if($resultat != NULL)
    {
        header("location: index.php?errorSignIn=L'e-mail est actuellement utilisé#signIn");
        return;
    }
    if($_POST['type'] == 'ens')
        {
            session_start();
            $requete = $connection->prepare("INSERT INTO 
            ens(nom_ens,prenom_ens,email_ens,pass_ens)
            VALUES('$nom','$prenom','$mail','$pass')
            ");
            $requete->execute();
            $requete = $connection->prepare("SELECT * FROM ens WHERE email_ens = '$mail' AND pass_ens = '$pass'");
            $requete->execute();
            $resultat = $requete->fetchall();
            $_SESSION['id'] = $resultat[0]['idt_ens'];
            $_SESSION['nom'] = $resultat[0]['nom_ens'];
            $_SESSION['prenom'] = $resultat[0]['prenom_ens'];
            $_SESSION['type'] = $type;
        }
    elseif($_POST['type'] == 'etud'){
        $date = $_POST['DN'];
        $opt = $_POST['opt'];
        session_start();
        $requete = $connection->prepare("INSERT INTO 
        etud(nom_etud,prenom_etud,email_etud,pass_etud,date_naissance_etud,opt)
        VALUES('$nom','$prenom','$mail','$pass','$date','$opt')
        ");
        $requete->execute();
        $requete = $connection->prepare("SELECT * FROM etud WHERE email_etud = '$mail' AND pass_etud = '$pass'");
        $requete->execute();
        $resultat = $requete->fetchall();
        $_SESSION['id'] = $resultat[0]['idt_etud'];
        $_SESSION['nom'] = $resultat[0]['nom_etud'];
        $_SESSION['prenom'] = $resultat[0]['prenom_etud'];
        $_SESSION['type'] = $type;
    }
    header('location: home.php');
?>
