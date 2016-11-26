<?php
/***************创建连接*******************/
//从WebSite数据库中提取数据
function GetUser($username)
{
     $Connect = new mysqli("localhost", "这是数据库所有者", "这是数据库密码","WebSite");

     $sql = "SELECT * FROM USER WHERE Username='$username'";
     $result = $Connect->query($sql);
     $row = $result->fetch_assoc();

     return $row;
}

/**********************/

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
