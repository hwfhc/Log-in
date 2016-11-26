

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主页</title>

    <link rel="stylesheet" href="Sign/style.css">
    <meta name="viewport" content="width=device-width, initial-scale=1" />

</head>
<body>
<div>
   <img src="fun.png">


  <?php
  $user = $_COOKIE['user'];
  $value = $_POST["value"];

  /***************创建连接*******************/
  require_once("/var/www/html/include/ConnectToDatabase.php");

  if($user == ''){
    echo '<p>咱能先登陆吗</p>';
  }
  else {
    //sql存储要对数据库进行的操作
    $sql = "INSERT INTO comments VALUES ('$value','$user')";
    $Connect->query($sql);
    echo '<p>发表成功</p>';
  }

  echo "<a href='Space.php'>跳转</a>";
  ?>

</div>

</body>
</html>
