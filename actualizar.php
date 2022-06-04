<?php

include 'config/database.php';

$id = isset($_GET['id']) ? $_GET['id'] : "";
$name = isset($_GET['name']) ? $_GET['name'] : "";
$quantity = isset($_GET['quantity']) ? $_GET['quantity'] : "";
$quantity=intval($quantity);
$user_id=1;
 

$query = "UPDATE cart_items SET quantity=? WHERE product_id=? AND user_id=?";
 

$stmt = $con->prepare($query);
 

$stmt->bindParam(1, $quantity);
$stmt->bindParam(2, $id);
$stmt->bindParam(3, $user_id);
 

if($stmt->execute()){
    
    header('Location: carro.php?action=quantity_updated&id=' . $id . '&name=' . $name);
}
 

else{
    
    header('Location: carro.php?action=failed&id=' . $id . '&name=' . $name);
}
?>