<?php
include("conndb.php"); 
$sql_query= "INSERT INTO `product` (`categoryid`, `productname`, `productprice`, `productimages`, `description`) VALUES (?, ?, ?, ?, ?)";
$stm=$db_link->prepare($sql_query);
$stm->bind_param("sssss", $categoryid,  $productname, $productprice, $productimages, $description);
$categoryid=mysqli_real_escape_string($db_link,$_POST["pets"]);
$productname=mysqli_real_escape_string($db_link,$_POST["m_name"]);
$productprice=mysqli_real_escape_string($db_link,$_POST["m_price"]);
$productimages=mysqli_real_escape_string($db_link,$_POST["m_picture"]);
$description=mysqli_real_escape_string($db_link,$_POST["m_description"]);
// $stm->execute()
if($stm->execute()){
    $db_link->close();
    echo '<script type ="text/JavaScript">';  
    echo 'setTimeout("window.location.href=\'index_commodity.html\'",1000);';
    echo 'alert("新增成功")'; 
    echo '</script>';
}else{
    echo '<script type ="text/JavaScript">';  
    echo 'setTimeout("window.location.href=\'index_commodity.html\'",1000);';
    echo 'alert("新增失敗，請重先檢查")'; 
    echo '</script>';
}
?>