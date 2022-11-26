<?php


try {
    $db = new PDO(
        'mysql:host=localhost;dbname=vbs-mining-transport-db;charset=utf8',
        'root',
        ''
    );
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

//Get drivers datas
$driversStatement = $db->prepare('SELECT * FROM chauffeurs');
$driversStatement->execute();
$drivers = $driversStatement->fetchAll();
//////////////////



//Get employes datas
$employesStatement = $db->prepare('SELECT * FROM employes');
$employesStatement->execute();
$employes = $employesStatement->fetchAll();
//////////////////


//Get all engins Type datas
$typesEnginStatement = $db->prepare('SELECT * FROM types_engin');
$typesEnginStatement->execute();
$types = $typesEnginStatement->fetchAll();
//////////////////