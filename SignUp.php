<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主页</title>
</head>
<body>

  <?php
  $username = $_POST["username"];
  $password = $_POST["password"];

  /***************创建连接*******************/
  require_once("/var/www/html/include/GetUser.php");

  /***************注册部分******************/
  if($username != "" && $password != "")
  {
    if(GetUser($username) == false){
        //sql存储要对数据库进行的操作
        $sql = "INSERT INTO USER VALUES ('$username', '$password')";

        if ($Connect->query($sql) === TRUE){
          echo "<p>注册成功</p>";
        }
        else {
          echo "<p>注册失败</p>";
        }
    }
    else {
        echo "<p>该用户名已存在</p>";
    }
  }
  else{
    echo "<h1>账号或密码不能为空！</h1>";
  }

  ?>

  <a href="index.html">跳转回主页</a>

</body>
</html>
