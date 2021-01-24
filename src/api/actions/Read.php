<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once '../config/Database.php';
include_once '../objects/Operative.php';

$database = new Database();
$db = $database->getConnection();

$items = new Operative($db);

$stmt = $items->getEmployees();


if($stmt !== null){
    $employeeArr["body"] = [];
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        extract($row);
        /** @var TYPE_NAME $id */
        /** @var TYPE_NAME $name */
        /** @var TYPE_NAME $img */
        $e = [
            "id" => $id,
            "name" => $name,
            "img" => $img
        ];

        array_push($employeeArr["body"], $e);
    }
    echo json_encode($employeeArr);
}

else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No record founde.")
    );
}
?>