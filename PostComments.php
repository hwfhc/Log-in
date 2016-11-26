<?php
$user = $_COOKIE['user'];
$value = $_POST["value"];

/***************创建连接*******************/
$conn = new mysqli("localhost", "这是数据库所有者", "这是数据库密码","WebSite");

if($user == ''){
  echo '咱能先登陆吗';
}
else {
  //sql存储要对数据库进行的操作
  $sql = "INSERT INTO comments VALUES ('$value','$user')";
  $Connect->query($sql);
}
?>
