<?php

    // Headers 

    header('Access-Control-Allow-Origin: *');
    header('Content-Type: application/json');
    header('Access-Control-Allow-Methods: GET');
    header('Access-Control-Allow-Headers: Access-Control-Allow-Headers,Content-Type,Access-Control-Allow-Headers, Authorization, X-Requested-Width');

    // include database et rdv model
    include_once '../database/DB.php';
    include_once '../models//M-Admin.php';

    // Instansiation Database 
    $database = new DB();
    $db = $database->connect();

    // Instansiation  
    $client = new ADMIN($db);

    // get donnée
    $data = json_decode(file_get_contents("php://input"));

    $client->id = $data->id;

    $result = $client->lire_unclient();
    if ($result) {
        echo json_encode(
            $result
        );
    } else {
        echo json_encode(
            array("Ton client" => $result)
        );
    }

?>