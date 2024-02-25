<?php
session_start();
include_once('../connexion.php');
$theme = str_replace(array('"',"'","\r", "\n"), ' ', $_POST['theme']);
$detail = str_replace(array('"',"'","\r", "\n"), ' ', $_POST['detail']);
$objective = str_replace(array('"',"'","\r", "\n"), ' ', $_POST['object']);
if($_SESSION['type'] == 'ens')
{
    $requete = $connection->prepare("INSERT INTO projet 
    VALUES(NULL,'$theme',$_SESSION[id],'$detail' ,'$objective')
    " );
    $requete->execute();
}
header("location: ../home.php#theme");

?>