<?php
include("conndb.php"); 
echo "aaa";
if($_COOKIE["username"] != "" && $_COOKIE["password"]!="" ){
    $username = $_COOKIE["username"];
    $password = hash('sha3-256',hash('sha3-256',$_COOKIE["password"]));
    
    # 輸出所有欄位資料（除錯用）
    // echo "<pre>";
    // print_r($_COOKIE);
    // echo "</pre>";
}

// =====================================================================

// 建立admin帳號密碼
// $stmt =$db_link->prepare("INSERT INTO `memberdata` (`my_name`, `my_password`) VALUES (?,?)");
// $stmt->bind_param("ss", $account, $pwd);
// $account = "admin";
// $pwd = hash('sha3-512','1qaz@WSX3edc');
// $stmt->execute();
// echo hash('sha3-256', hash('sha3-256','admin'));
// =====================================================================


// =====================================================================

// echo '<pre>', print_r(hash_algos());
// echo hash('sha3-512','1qaz@WSX3edc').'<br>';
// print_r(hash_algos());
// sha3-512

// $sql = "SELECT * FROM `memberdata` ORDER BY `my_password` ASC";
// $result = mysqli_query($db_link, $sql);
// $rowcount = mysqli_num_rows($result);
// echo $rowcount;
// if (mysqli_num_rows($result) > 0) {
//     // 输出数据
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "id: ". $row["my_id"]."<br>";
//     }
// } else {
//     echo "0 结果";
// }

// =====================================================================
// echo "帳號：".$_POST["username"]."<br>";
// echo "密碼：".$_POST["password"]."<br>"."<br>";
// echo "記住密碼：".$_POST["rememberme"]."<br>"."<br>";

// 讀取POST
if ( isset($_POST["username"]) && isset($_POST["password"]) ) {
    $username = $_POST["username"];
    $password = hash('sha3-256',hash('sha3-256',$_POST["password"]));
    # 輸出所有欄位資料（除錯用）
    echo "<pre>";
    print_r($_POST);
    echo "</pre>";
}

$sql = "SELECT * FROM `memberdata` WHERE username='$username' AND password='$password'";
echo $sql;
$result = mysqli_query($db_link, $sql);
$rowcount = mysqli_num_rows($result);
mysqli_close($db_link);
// echo $rowcount;

// if (mysqli_num_rows($result) > 0) {
//     // 输出数据
//     while($row = mysqli_fetch_assoc($result)) {
//         echo "id: ". $row["my_id"]."<br>";
//     }
// } else {
//     echo "0 结果";
// }

if (mysqli_num_rows($result) == 1) {
    echo "帳號密碼正確"."<br>";
    session_start();

    $_SESSION["username"]=$_POST["username"];
    echo $_SESSION["username"];
    echo "<br>";

    $_SESSION["password"]=$_POST["password"];
    echo $_SESSION["password"];
    echo "<br>";

    $_SESSION["login"] = "1";
    echo $_SESSION["login"];
    echo "<br>";

    if ($_POST["rememberme"]=="true"){
        setcookie("username",$_POST["username"], time()+3600*24*365);
        echo $_COOKIE["username"];
        echo "<br>";
        setcookie("password",$_POST["password"], time()+3600*24*365);
        echo $_COOKIE["password"];
    }else{
        setcookie("username",$_POST["username"], time()+3600*24);
        echo $_COOKIE["username"];
        echo "<br>";
        setcookie("password",$_POST["password"], time()+3600*24);
        echo $_COOKIE["password"];
    }
    header('Location:index_commodity.html');
    
}else{

    header('Location:index.html?login=error');

}
    



?>