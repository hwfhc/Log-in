<?php
    $user = $_COOKIE['user'];
    $value = $_POST["value"];

/***************创建连接*******************/
    require_once("include/ConnectToDatabase.php");

    if($user == ''){
      echo '咱能先登陆吗';
    }
    else {
      //sql存储要对数据库进行的操作
      $sql = "INSERT INTO comments VALUES ('$value','$user')";
      $conn->query($sql);
    }
?>
