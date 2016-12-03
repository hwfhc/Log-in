<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>划水</title>

    <link rel="stylesheet" href="Sign/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

</head>
<body>
<div>
  <img src="fun.png">

  <?php
  $username = $_POST["username"];
  $password = $_POST["password"];
  $password_ensure = $_POST["password_ensure"];

  /***************创建连接*******************/
  require_once("/var/www/html/include/GetUser.php");

  /***************注册部分******************/
  if($username != "" && $password != "")
  {
    if(GetUser($username) == false){
        //sql存储要对数据库进行的操作
        $sql = "INSERT INTO USER VALUES ('$username', '$password')";

        if ($Connect->query($sql) == TRUE){
          echo "<p>注册成功</p>";
        }
        else {
          echo "<p>注册失败</p>";
        }
      }
    }
  ?>

  <a href="index.html">跳转回主页</a>
</div>

</body>
</html>
