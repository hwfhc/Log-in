<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主页</title>

    <link rel="stylesheet" href="Space/style.css">
</head>
<body>

<script>
function Refresh() {
  var xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("CommentContainer").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","GetComments.php",true);
  xmlhttp.send();
}
</script>

<div id="container">

    <form method="POST" action="PostComments.php">
        评论:<br>
        <input type="text" name="value">
        <br>
        <input type="submit" value="发表">
    </form>

    <button onclick="Refresh()">刷新</button>

    <div id="CommentContainer">
    eagfrsdgf
    </div>
</div>

</body>
</html>
