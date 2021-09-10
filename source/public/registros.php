<?php

include('../public/index.php');

use App\SQLiteQuery;

header('Content-type:application/json;charset=utf-8');

$sqlite = new SQLiteQuery($pdo); // Criação do objeto SQLiteQuery

if(isset($_GET['type']) && isset($_GET['deleted'])) { // Caso 1

    $typeURL = $_GET['type'];
    $deletedURL = $_GET['deleted'];
    $result = $sqlite->GetTypeAndDeleted($typeURL, $deletedURL); // Executa a Query

    if($result) {
        http_response_code(200);
        print json_encode($result);

    } else {
        http_response_code(404);
        $error404 = array(
            "status" => "404", 
            "reason" => "NOT_FOUND", 
            "message" => "No matching value found");
        print json_encode($error404);
    }

} else if (isset($_GET['type'])) { // Caso 2

    $typeURL = $_GET['type'];
    $result = $sqlite->GetType($typeURL); // Executa a Query

    if($result) {
        http_response_code(200);
        print json_encode($result);

    } else {
        http_response_code(404);
        $error404 = array(
            "status" => "404", 
            "reason" => "NOT_FOUND", 
            "message" => "No matching value found");
        print json_encode($error404);
    }

} else if(isset($_GET['deleted'])) { // Caso 3

    $deletedURL = $_GET['deleted'];
    $result = $sqlite->GetDeleted($deletedURL); // Executa a Query

    if($result) {
        http_response_code(200);
        print json_encode($result);

    } else {
        http_response_code(404);
        $error404 = array(
            "status" => "404", 
            "reason" => "NOT_FOUND", 
            "message" => "No matching value found");
        print json_encode($error404);
    }

} else { // Caso 4

    $result = $sqlite->Get(); // Executa a Query

    if($result) {
        http_response_code(200);
        print json_encode($result);

    } else {
        http_response_code(404);
        $error404 = array(
            "status" => "404", 
            "reason" => "NOT_FOUND", 
            "message" => "No value found");
        print json_encode($error404);
    }
}

