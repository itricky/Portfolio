<?php
require_once("conndb.php");
/*
    if(isset($_GET["cid"])&&($_GET["cid"]!="")){
        $query_RecProduct = "SELECT * FROM product WHERE categoryid=? ORDER BY productid DESC";
        $stmt = $db_link->prepare($query_RecProduct);
        $stmt->bind_param("i", $_GET["cid"]);
        //若有搜尋關鍵字時未加限制顯示筆數的SQL敘述句
    }elseif(isset($_GET["keyword"])&&($_GET["keyword"]!="")){
        $query_RecProduct = "SELECT * FROM product WHERE productname LIKE ? OR description LIKE ? ORDER BY productid DESC";
        $stmt = $db_link->prepare($query_RecProduct);
        $keyword = "%".$_GET["keyword"]."%";
        $stmt->bind_param("ss", $keyword, $keyword);	
        //若有價格區間關鍵字時未加限制顯示筆數的SQL敘述句
    }elseif(isset($_GET["price1"]) && isset($_GET["price2"]) && ($_GET["price1"]<=$_GET["price2"])){
        $query_RecProduct = "SELECT * FROM product WHERE productprice BETWEEN ? AND ? ORDER BY productid DESC";
        $stmt = $db_link->prepare($query_RecProduct);
        $stmt->bind_param("ii", $_GET["price1"], $_GET["price1"]);
        //預設狀況下未加限制顯示筆數的SQL敘述句
    }else{
        $query_RecProduct = "SELECT * FROM product ORDER BY productid DESC";
        $stmt = $db_link->prepare($query_RecProduct);
    }
*/

if(isset($_GET["keyword"])&&($_GET["keyword"]!="" )){
    $query_RecProduct = "SELECT * FROM product WHERE productname LIKE ? OR description LIKE ? ORDER BY productid DESC";
    $stmt = $db_link->prepare($query_RecProduct);
    $keyword = "%".$_GET["keyword"]."%";
    $stmt->bind_param("ss", $keyword, $keyword);
}

// $all_RecProduct = $stmt->get_result();

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
