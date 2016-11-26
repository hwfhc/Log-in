<?php

  $Connect = new mysqli("localhost", "root", "879574764","WebSite");
  $sql="SELECT * FROM comments";
  $result = $Connect->query($sql);

while($row = $result->fetch_assoc())
{
    $value = $row['Value'];
    $user = $row['User'];
    echo "<div class='user'>".$row['User']."</div>" ;
    echo "<div class='comment'>".$row['Value']."</div>" ;
}

?>
