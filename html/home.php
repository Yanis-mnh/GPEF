<?php
    session_start();
    if(!isset($_SESSION['id'] )|| !isset($_SESSION['nom'] )|| !isset($_SESSION['prenom']) ) 
    {
        header('location: index.php?errorLogin=erreur de connexion#login');
        return;
    }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Getionaire des PFS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/mainStyle.css">
        <link rel="stylesheet" href="../css/theme.css">
        <link rel="stylesheet" href="../css/etudEns.css">
        <script src="../js/loading.js"></script>
        <?php require("connexion.php") ?>
    </head>

    <body>
        <div id="loading">
            <h3>loading...</h3>
        </div>
        <?php include('styleBackground.php') ?>
        
            <?php   
                //include("accueil.php");
            ?>
            <!-- nav -->
        <nav>
            <ul>

                <li><img src="../img/icons/theme.png"><a href="#theme">Theme proposes</a></li>
                <li><img src="../img/icons/affiliate.png"><a href="#affect">Affectation</a></li>
                <li id="dropMenu">
                    <img src="../img/icons/user.png">
                    <a ><?php echo $_SESSION['nom']; ?></a>
                    <ul id="dropMenuContent">
                        <li><img src="../img/icons/logout.png"><a href="php/logout.php">Déconnecter</a></li>
                    </ul>
                </li>
                <li class="none" id='darkModeContainer'>
                    <input id="dark-mode-checkbox" type="checkbox">
                    <label for="dark-mode-checkbox">
                        <img class="darkMode" src="../img/icons/dark-mode.png" >
                    </label>
                </li>
            </ul>
        </nav>
<div class="scroll">
    <div class="scrollElt">
        <!-- theme proposer -->
            <?php
                if($_SESSION['type'] == 'ens')
                    include("themePropose.php");
                else
                    include('AllthemePropose.php');
                     
            ?>

            <!-- theme affecter -->
        <?php include('affectation.php') ?>
    </div>
</div>
            <!-- fin des tableux -->
            
    </main>
</body>
    <script src="../js/takeScreenOnClick.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/showUpdateForm.js" ></script>
    <script src="../js/darkmode.js" ></script>
</html>