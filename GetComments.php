<?php

  $Connect = new mysqli("localhost", "root", "879574764","WebSite");
  $sql="SELECT * FROM comments";
  $result = $Connect->query($sql);

while($row = $result->fetch_assoc())
{
    echo $row['Value']."      ---".$row['User']."<br>" ;
}

?>
