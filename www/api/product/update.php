<?php
// required headers
header("Access-Control-Allow-Origin: *");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Methods: POST");
header("Access-Control-Max-Age: 3600");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");
 
// подключаем базу данных
include_once '../config/database.php';
include_once '../objects/product.php';
 
$database = new Database();
$db = $database->getConnection();
 
$product = new Product($db);
 
$data = json_decode(file_get_contents("php://input"));
 
$product->id = $data->id;
 
$product->name = $data->name;
$product->price = $data->price;
$product->description = $data->description;
$product->category_id = $data->category_id;
 
// update the product
if($product->update()){
    echo '{';
        echo '"message": "Product was updated."';
    echo '}';
} 
// if unable to update the product, tell the user
else{
    echo '{';
        echo '"message": "Unable to update product."';
    echo '}';
}
?>