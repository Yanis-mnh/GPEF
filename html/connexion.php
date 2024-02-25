
<?php
    $serveur = "localhost";
    $login = "root";
    $pass = "";
    
    try{
        $connection = new PDO("mysql:host=$serveur;dbname=pfe", $login, $pass);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
    catch(PDOException $e)
    {
        echo 'ERROR: ' . $e->getMessage();
        return;
    }
?>