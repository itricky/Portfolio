<?php
	require_once("conndb.php");

    //選擇要撈取的資料， * 表示全部。
    $sql = "SELECT * FROM `product`";

    //找出 result 的語法
    $result = mysqli_query($db_link, $sql); 

    //新增一個 PHP 陣列，用來轉成 Json 格式
    $myarray = array();

    //判斷資料表有沒有內容，如果是空的就不執行查詢
    if(mysqli_num_rows($result) > 0){
        while($row = mysqli_fetch_assoc($result)){
            $myarray[] = $row;
        }
        //轉成 json 語法
        // echo "<pre>";
        // print_r($myarray);
        // echo "</pre>";
        echo json_encode($myarray);
    }else{
        echo '沒有資料內容';
    }

    mysqli_close($db_link);
