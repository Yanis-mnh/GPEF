<?php
    unset($_POST);
?>
<!DOCTYPE html>
<html>
    <head>
        
        <title>Getionaire des PFS</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../css/mainStyle.css">
        <link rel="stylesheet" href="../css/theme.css">
        <link rel="stylesheet" href="../css/login.css">
        <link rel="shortcut icon" href="../img/icons/add.png" type="images/png">
        <script src="../js/loading.js"></script>
        <?php require("connexion.php") ?>
    </head>
    
    <body>
        <div id="loading">
            <h3>loading...</h3>
        </div>
        <nav>
            <ul type="none">
                <a href="#accueil"><li><img src="../img/icons/home.png">Accueil</li></a>
                <a href="#theme">  <li><img src="../img/icons/theme.png">Theme proposes</li></a>
                <a href="#affect"> <li><img src="../img/icons/affiliate.png">Affectation</li></a>
                <a href="#login"> <li><img src="../img/icons/log-in.png">Login</li></a>
                <li class="none" id='darkModeContainer'>
                    <input id="dark-mode-checkbox" type="checkbox">
                    <label for="dark-mode-checkbox">
                        <img class="darkMode" src="../img/icons/dark-mode.png" >
                    </label>
                </li>
            </ul>
        </nav>
        <main>
        <?php include('styleBackground.php') ?>
            <div class="s " id="accueil">
            <div class="about-us-container">
            <h1>Bienvenue sur notre plateforme de gestion de projet de fin d'étude.</h1>
            <p class="about-us-text">
                Ici, vous trouverez toutes les propositions de projets ainsi que les affectations des PFE L3 de l'université d'USTO.
                Notre site offre aux enseignants la possibilité de proposer des projets,
                tandis que les étudiants peuvent choisir plusieurs projets en s'inspirant de notre sélection.
            </p>
            </div>

            </div>
            <!--ici-->
            <div class="scroll">
            <div class="scrollElt">
            <?php include('AllthemePropose.php'); ?>
            <div class="s "id="affect">
            <a id='left' class="button" href="#theme" >&#8656;</a>
                <fieldset class="fieldsetTab">
                    <button class='BTN' onclick="takeScreen('affect',1)"></button>
                    <legend>liste des theme affecter:</legend>
                    <table>
                        <?php
                            $requete  = $connection -> prepare("SELECT
                                ens.nom_ens,etud.nom_etud,projet.theme
                            FROM
                                projet
                            INNER JOIN ens ON ens.idt_ens = projet.idt_ens
                            INNER JOIN affecter ON projet.idt_projet = affecter.idt_projet
                            INNER JOIN etud ON etud.idt_etud = affecter.idt_etud
                        ");
                            $requete->execute();
                            $resultat = $requete->fetchall();
                        if($resultat!=null)
                        {
                        ?>
                        <tr>
                            <th>theme proposes</th>
                            <th>affecter á </th>
                            <th>encadrer par</th>
                        </tr>
                        <?php
                        

                           /* echo '<pre>';
                            print_r($resultat);
                            echo '</pre>';*/
                            $i=0;
                            while($i < count($resultat))
                            {
                                ?>
                                <tr>
                                <td><?php echo $resultat[$i]['theme']; ?> </td>
                                <td><?php echo $resultat[$i]['nom_etud']; ?> </td>
                                <td><?php echo $resultat[$i]['nom_ens'] ?> </td>
                                </tr>
                                <?php
                                $i++;
                            }
                        }else{
                            echo '<h3 class="emptyTable">Aucun projet assigné pour le moment.<h3>';
                        }
                            ?>
                                            
                    </table>
                </fieldset>
                    </div>
                </div>
            </div>
            <div class="scroll">
            <div class="scrollElt EtudEns" >
                <div class="s "id="login" >
                    <h3>LOGIN</h3>
                    <fieldset>
                    <?php if(isset($_GET['errorLogin'])) { ?>
                                <p class="error"> <?php  echo $_GET['errorLogin']; } ?> </p>
                        <form action="login.php" method="post">

                            <div class="input">
                                <img class="none" src="../img/icons/email.svg">
                                <input class="inputLog" type="email" name="email" placeholder="Email" required >
                            </div>
                            <br>
                            <div class="input">
                                
                                <img class="none" src="../img/icons/password.svg">
                                <input class="inputLog" type="password" name="pass" placeholder="Password" required>
                            </div>
                            <br>
                            <div class="BtnForm">
                                <button class="button" type="submit">LOGIN</button>
                                <button class="button" type="reset">RESET</button>
                            </div>
                        </form>
                    </fieldset>
                    <a class="button" href="#signIn">Sign in</a>

                </div>
                <div class="s "id="signIn">
                    <h3>CREATE ACOUNT</h3>
                    <fieldset>
                        <form action="createAcount.php" method="post" >
                        <?php if(isset($_GET['errorSignIn'])) { ?>
                                <p class="error"> <?php  echo $_GET['errorSignIn']; } ?> </p>
                                <div class="input">
                                    <img class="none" src="../img/icons/user.svg">
                                    <input class="inputLog" type="text" name="nom" placeholder="Nom" required>
                                </div>
                                <br>
                                <div class="input">
                                    <img class="none" src="../img/icons/user.svg">
                                    <input class="inputLog" type="text" name="prenom" placeholder="Prenom" required>
                                </div><br>

                                <div class="input">
                                    <img class="none" src="../img/icons/email.svg">
                                    <input class="inputLog" type="email" name="email" placeholder="Email" required>
                                </div><br>
                                <div class="input">
                                    <img class="none" src="../img/icons/password.svg">
                                    <input class="inputLog" type="password" name="pass" placeholder="password" required>
                                </div><br>
                                <div id="type">
                                    <label>ens:</label>
                                    <input type="radio" name="type" value="ens" checked required>
                                    <label>etud:</label>
                                    <input type="radio" name="type" value="etud" required><br>
                                </div>
                                <!-- pour etudient date et option -->
                                <div class='etud' >
                                    <input class="inputLog" type="date" name="DN" placeholder="date" required><br>
                                    <div id="opt">
                                        <label>SI</label>
                                        <input  type="radio" name="opt" value="si"  required>
                                        <label>ISIL</label>
                                        <input type="radio" name="opt" value="isil" required><br>
                                    </div>
                                </div>
                            <div class="BtnForm">
                                <button  class="button" type="submit">SIGN IN</button>
                                <button id="reset" class="button" type="reset">RESET</button>
                            </div>
                        </form>

                    </fieldset>
                    <a class="button" href="#login">Log in</a>
                </div>
            </div>
            </div>
        </main>
    </body>
    <script src="../js/takeScreenOnClick.js"></script>
    <script src="../js/nav.js"></script>
    <script src="../js/darkmode.js" ></script>
    <script src="../js/showFromEtud.js" ></script>
</html>