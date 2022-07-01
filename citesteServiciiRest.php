<?php
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");

include_once 'databaseRest.php';

$database = new DatabaseRest();
$db = $database->getConnectionRest(); 

$query = "SELECT Id, Id_cat, Pret, Oras, First_date, Last_date FROM services;";
$stmt = $db->prepare($query);
$stmt->execute();     

$num = $stmt->rowCount();

if($num>0){
    $contacts_arr=array("message" => $num. " Services.");
    $contacts_arr["records"]=array();

    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)){
        $contact=array(
            "Id" => $row['Id'],
            "Id_cat" => $row['Id_cat'],
            "Pret" => $row['Pret'],
            "Oras" => $row['Oras'],
            "First_date" => $row['First_date'],
            "Last_date" => $row['Last_date']
        ); 
        array_push($contacts_arr["records"], $contact);
    }
    http_response_code(200);
    echo json_encode($contacts_arr);
}
else{
    http_response_code(404);
    echo json_encode(
        array("message" => "No Services.")
    );
}