<div class="s "id="affect">
    <a id='left' class="button" href="#theme" >&#8656;</a>
    <fieldset class="fieldsetTab">
        <button class='BTN' onclick="takeScreen('affect',1)"></button>
        <legend>liste des projet affecter:</legend>
        <table>
            
            <?php
                $id = $_SESSION['id'];
                
                if($_SESSION['type'] == 'ens')
                 {
                    $requete  = $connection -> prepare("SELECT
                    etud.nom_etud,etud.prenom_etud,projet.theme
                FROM
                    projet
                INNER JOIN ens ON ens.idt_ens = projet.idt_ens
                INNER JOIN affecter ON projet.idt_projet = affecter.idt_projet
                INNER JOIN etud ON etud.idt_etud = affecter.idt_etud
                WHERE projet.idt_ens = '$id'");

                $requete->execute();
                $resultat = $requete->fetchall();
                if($resultat != null)
                {
            ?>
                <tr>
                    <th>Theme</th>
                    <th style="width:200px" >Affecter á </th>
                </tr>
                <?php

                
                $i=0;
                while($i < count($resultat))
                    {
                    ?>
                    <tr>
                    <td><?php echo $resultat[$i]['theme']; ?> </td>
                    <td><?php echo $resultat[$i]['nom_etud'] . " " . $resultat[$i]['prenom_etud']; ?> </td>
                    </tr>
                    <?php
                    $i++;
                    }
                  }else{
                    echo '<h3 class="emptyTable">Vous n\'êtes affecté à aucun projet<h3>';
                    }
                }
                elseif($_SESSION['type'] == 'etud'){
                    $requete  = $connection -> prepare("SELECT
                    ens.nom_ens,ens.prenom_ens,projet.theme
                FROM
                    projet
                INNER JOIN ens ON ens.idt_ens = projet.idt_ens
                INNER JOIN affecter ON projet.idt_projet = affecter.idt_projet
                INNER JOIN etud ON etud.idt_etud = affecter.idt_etud
                WHERE affecter.idt_etud = '$id'");

                $requete->execute();
                $resultat = $requete->fetchall();
                if($resultat != null)
                {
            ?>
                <tr>
                    <th>Theme</th>
                    <th>Proposer par </th>
                </tr>
                <?php


                $i=0;
                while($i < count($resultat))
                    {
                    ?>
                    <tr>
                    <td><?php echo $resultat[$i]['theme']; ?> </td>
                    <td><?php echo $resultat[$i]['nom_ens'] . " " . $resultat[$i]['prenom_ens']; ?> </td>
                    </tr>
                    <?php
                    $i++;
                    }

                }
                else{
                    echo '<h3 class="emptyTable">Vous n\'êtes affecté à aucun projet<h3>';
                }
            }
                
            
                
        ?>
                                            
        </table>
    </fieldset>
</div>