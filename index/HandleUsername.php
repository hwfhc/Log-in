<?php
/*
 *效果说明:
 *获取某用户的相关信息，若该用户不存在则返回false
 *
 */

    /***************创建连接*******************/
    require_once("/var/www/html/include/GetUser.php");

    //从URL获取参数
    $username = $_REQUEST["username"];

    if(GetUser($username) == false){
      echo "false";
    }
    else{
      echo "true";
    }

?>
