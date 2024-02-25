<div class="s "id="theme" >
<a id="right" class='button' href="#affect">&#8658;</a>
<script src='../js/confirmationBox.js'></script>
    <fieldset class='fieldsetTab'>
        <div id='btntheme'>
            <button class="BTN" onclick="takeScreen('theme',0)"></button>
            
            <?php
                include('updateAddFrom.php');
                include('alert.php');
                if(isset($_SESSION)){?>
                    <button id='add' class='none' onclick="showForm('Ajouter un Projet' ,null ,null, null ,'php/addTheme.php')"></button>
            <?php } ?>
            <div></div>
        </div>
        <legend>Liste des theme proposés</legend>


            <?php
            $idt_user =$_SESSION['id'];
                $requete  = $connection -> prepare("SELECT
                    projet.theme,
                    projet.idt_projet,
                    projet.objectif_prj,
                    projet.detail_prj
                FROM
                    projet
                LEFT OUTER JOIN ens ON ens.idt_ens = projet.idt_ens
                LEFT OUTER JOIN affecter ON projet.idt_projet = affecter.idt_projet
                LEFT OUTER JOIN etud ON affecter.idt_etud = etud.idt_etud
                WHERE
                    etud.idt_etud IS NULL 
                AND 
                    ens.idt_ens = $idt_user
                            ");
                $requete->execute();
                $resultat = $requete->fetchall();


                $i=0;
                if(!empty($resultat)){
                    ?>
                    <table>
                    <thead>
                    <tr>
                        <th>Theme</th>
                        <th>objectif</th>
                        <th id="tdAction" colspan="3">Action</th>
                    </tr>
                    </thead>
                    <tbody>
                <?php
                    while($i < count($resultat))
                    {
                        ?>
                        <tr>
                        <td><?php echo $resultat[$i]['theme']; ?> </td>
                        <td><?php echo $resultat[$i]['objectif_prj']; ?></td>
                        <td id="update"  class="ActionContainer">
                                <a class="none iconAction"  onclick="showForm('Update Theme' ,'<?php echo $resultat[$i]['theme'] ?>' ,'<?php echo $resultat[$i]['objectif_prj'] ?>', '<?php echo $resultat[$i]['detail_prj'] ?>' , 'php/update.php?id= <?php echo $resultat[$i]['idt_projet']; ?>')">             
                                <img src="../img/icons/update.png" alt="update">
                            </a></td>
                            <td id="delete" class="ActionContainer"><a  class="none iconAction"  onclick="showConfirmation(<?php echo $resultat[$i]['idt_projet'] ?>)">
                                <img src="../img/icons/delete.png" alt="update">
                            </a></td>
                            <td id="detail" class="ActionContainer">
                                <a class="none iconAction">
                                <img src='../img/icons/detail.png' alt='detail'>
                                </a>
                                <?php
                                    if($resultat[$i]['detail_prj'])
                                    {
                                        echo '<p> ' . $resultat[$i]['detail_prj'] . '</p>';
                                    }
                                    else{
                                        echo '<p> ' . 'Null' . '</p>';
                                    }
                                ?>               
                                
                            </td>
                            </tr>
                        <?php

                        $i++;
                    }
                }else
                {
                    echo '<h3 class="emptyTable">Vous n\'avez pas encore proposer un Theme<br>cliquez sur (+) pour proposer un<h3>';
                }
                    ?>
                
                </tbody>
                                
        </table> 

    </fieldset>
</div>
