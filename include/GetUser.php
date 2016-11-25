<?php
/*
 *效果说明:
 *获取某用户的相关信息，若该用户不存在则返回false
 *
 */

    require_once("/var/www/html/include/ConnectToDatabase.php");

    //从WebSite数据库中提取user数据
    function GetUser($username)
    {

       global $Connect;//声明Connect是一个全局变量，否则会视为局部变量

       $sql = "SELECT * FROM USER WHERE Username='$username'";
       $result = $Connect->query($sql);
       $row = $result->fetch_assoc();

       if(count($row))//判断row是否为空，若为空则返回false(该用户未存在)
       {
         return $row;
       }
       else
       {
         return false;
       }
    }

?>
