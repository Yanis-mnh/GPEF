<div class="s "id="theme" >
<a id="right" class='button' href="#affect">&#8658;</a>
    <fieldset class='fieldsetTab'>
        <div>
            <button class="BTN" onclick="takeScreen('theme',0)"></button>
            
        </div>
        <legend>Liste des projet proposés</legend>
            <?php
            $requete  = $connection -> prepare("SELECT
            projet.idt_projet,
            projet.theme,
            projet.objectif_prj,
            ens.nom_ens,ens.prenom_ens
            FROM
            projet
            LEFT OUTER JOIN ens ON ens.idt_ens = projet.idt_ens
            LEFT OUTER JOIN affecter ON projet.idt_projet = affecter.idt_projet
            LEFT OUTER JOIN etud ON affecter.idt_etud = etud.idt_etud
            WHERE
            etud.idt_etud IS NULL
            ORDER BY ens.nom_ens
            ");
            $requete->execute();
            $resultat = $requete->fetchall();
            if(!empty($resultat))
            {
            ?>
            <table>
            <tr>
                <th>Theme</th>
                <th>objectif</th>
                <th colspan='2' >Proposé par</th>

            </tr>
            <?php

 


                $i=0;
                while($i < count($resultat))
                {
                    ?>
                    <tr>

                    <td><?php echo $resultat[$i]['theme'] ;  ?> </td>
                    <td><?php echo $resultat[$i]['objectif_prj']; ?> </td>
                    <td><?php echo $resultat[$i]['nom_ens'] .' '. $resultat[$i]['prenom_ens']; ?> </td>
                    <?php
                    if(!empty($_SESSION['id']))
                    {
                    if($_SESSION['type']=='etud')
                    {
                        
                        ?>
                    <td id="chose" class="ActionContainer"><a class='none' href="php/chose.php?id= <?php echo $resultat[$i]['idt_projet'] ?> ">
                        <img src="../img/icons/add.png">
                    </a></td>
                        <?php
                    }
                    }
                    ?>
                    </tr>
                    <?php

                    $i++;
                }
                
                ?>
                
            <?php
            }else{
                echo '<h3 class="emptyTable">La liste des projet proposés est actuellement vide,  mais n\'hésitez pas à revenir ultérieurement<h3>';
            }
            ?>                         
        </table> 

    </fieldset>
</div>