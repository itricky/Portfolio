<?php
require_once("conndb.php");

if( isset($_GET["price1"]) && isset($_GET["price2"]) && ($_GET["price1"]<=$_GET["price2"]) ){
    $query_RecProduct = "SELECT * FROM product WHERE productprice BETWEEN ? AND ? ORDER BY productid DESC";
	$stmt = $db_link->prepare($query_RecProduct);
	$stmt->bind_param("ii", $_GET["price1"], $_GET["price2"]);
}

$stmt->execute();

$RecProduct = $stmt->get_result();

$arryID = array();

while($row_RecProduct=$RecProduct->fetch_assoc()){ 
    // array_push($arryID, $row_RecProduct["productid"]);
    $arryID[] = $row_RecProduct;
};

// echo "<pre>";
// print_r($arryID);
// echo "</pre>";

// print_r($arryID);

// echo "<br>";

// echo $arryID[0];

// echo "<br>";

mysqli_close($db_link);

echo json_encode($arryID);
