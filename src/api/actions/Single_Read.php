<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

include_once '../config/Database.php';
include_once '../objects/Operative.php';

$database = new Database();
$db = $database->getConnection();

$item = new Operative($db);

$item->id = isset($_GET['id']) ? $_GET['id'] : die();

$item->getSingleEmployee();

if($item->name != null){
    // здесь создаем наш массив
    $emp_arr = [
        "id" =>  $item->id,
        "name" => $item->name,
        "img" => $item->img
    ];

    http_response_code(200);
    echo json_encode($emp_arr);
}

else{
    http_response_code(404);
    echo json_encode("Operative not found.");
}
?>