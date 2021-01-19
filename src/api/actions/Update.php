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

$data = json_decode(file_get_contents("php://input"));

$item->id = $data->id;

// наши value
$item->id = $data->id;
$item->name = $data->name;
$item->img = $data->img;

if($item->updateEmployee()){
    echo json_encode("Operative data updated.");
} else{
    echo json_encode("Operative could not be updatedededed");
}
?>