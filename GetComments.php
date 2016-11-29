<?php
  require_once("/var/www/html/include/ConnectToDatabase.php");

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
