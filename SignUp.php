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
  require_once("include/ConnectToDatabase.php");

  //sql存储要对数据库进行的操作
  $sql = "INSERT INTO USER VALUES ('$username', '$password')";

  if ($conn->query($sql) === TRUE) {
      echo "<p>注册成功</p>";
  } else {
      echo "<p>注册失败</p>";
  }

  ?>

  <a href="index.html">跳转回主页</a>

</body>
</html>
