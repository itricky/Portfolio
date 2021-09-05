<?php
include("conndb.php"); 
session_start(); 

if(isset($_POST["action"])&&($_POST["action"]=="update")){
    // echo $_SESSION["admin"];
    // echo "<br>";
    // echo $_POST["m_name"];
    // echo "<br>";
    // echo $_POST["m_price"];
    // echo "<br>";
    // echo $_POST["m_picture"];
    // echo "<br>";
    // echo $_POST["m_description"];
    // echo "<br>";
    // echo $_POST["myID"];
    // echo "<br>";
    // echo $ID;
    // echo "<br>";
    // echo $_POST["action"];
    // echo "<br>";


    $ID=$_POST["myID"]+1;
    $sql_query= 
    "UPDATE `product` SET ".
    "productname='" . mysqli_real_escape_string($db_link,$_POST["m_name"]) . "',".
    "productprice='" . mysqli_real_escape_string($db_link,$_POST["m_price"]) . "',".
    "productimages='" . mysqli_real_escape_string($db_link,$_POST["m_picture"]) . "',".
    "description='" . mysqli_real_escape_string($db_link,$_POST["m_description"]) . "'".
    "WHERE `product`.`productid`=".$ID;
    // print_r($sql_query);
    $result = mysqli_query($db_link,$sql_query);
    // print_r($result);
    if($result){
        $db_link->close();
        echo '<script type ="text/JavaScript">';  
        echo 'setTimeout("window.location.href=\'index_commodity.html\'",1000);';
        echo 'alert("修改成功")'; 
        echo '</script>';
    }else{
        echo '<script type ="text/JavaScript">';  
        echo 'setTimeout("window.location.href=\'index_commodity.html\'",1000);';
        echo 'alert("修改失敗，請重先檢查")'; 
        echo '</script>';
    }
    
};


?>