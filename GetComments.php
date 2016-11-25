<?php

  require_once("include/ConnectToDatabase.php");

  $sql="SELECT * FROM comments";
  $result = $conn->query($sql);

  while($row = $result->fetch_assoc())
  {
     echo $row['Value']."      ---".$row['User']."<br>" ;
  }

?>
