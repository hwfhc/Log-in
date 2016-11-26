<?php
    require_once("/var/www/html/include/GetUser.php");

    $username = $_POST['username'];
    $password = $_POST['password'];

    $row = GetUser($username);
    if(($row['Username'] == $username) && ($row['Password'] == $password))
    {
       echo "反正登录成功";
       echo "<a href='Space.php'>跳转</a>";
       setcookie("user", "$username");//设置cookie
    }
    else
    {
       echo "反正登录失败";
       echo "<a href='index.html'>跳转回主页</a>";
    }

?>
