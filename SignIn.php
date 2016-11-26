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
      require_once("/var/www/html/include/GetUser.php");

      $username = $_POST['username'];
      $password = $_POST['password'];

      if($username != '' && $password != ''){
          $row = GetUser($username);
          if(($row['Username'] == $username) && ($row['Password'] == $password))
          {
             echo "<p>登录成功</p>";
             echo "<a href='Space.php'>跳转</a>";
             setcookie("user", "$username");//设置cookie
          }
          else
          {
             echo "<p>用户名或密码错误</p>";
             echo "<a href='index.html'>跳转回主页</a>";
          }
      }
      else{
        echo "<p>用户名或密码错误</p>";
        echo "<a href='index.html'>跳转回主页</a>";
      }

  ?>
</div>

</body>
</html>
