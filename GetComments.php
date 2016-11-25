<?php

  $conn = new mysqli("localhost", "这是数据库所有者", "这是数据库密码","WebSite");

  $sql="SELECT * FROM comments";
  $result = $conn->query($sql);

while($row = $result->fetch_assoc())
{
    echo $row['Value']."      ---".$row['User']."<br>" ;
}

?>
