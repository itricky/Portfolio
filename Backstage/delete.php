<?php
include("conndb.php"); 
$_POST = json_decode(file_get_contents("php://input"),true);

// $sql = "DELETE FROM product WHERE productid='36'";
$sql = "DELETE FROM product WHERE productid='".$_POST[name]."'";

if(mysqli_query($db_link, $sql)){
    echo "success";
} else{
    echo "error: $sql. " . mysqli_error($db_link);
}
?>