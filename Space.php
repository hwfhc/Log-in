<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>主页</title>
</head>
<body>
  <p><b>发表评论:</b></p>

  <form method="POST" action="PostComments.php">
      评论:<br>
      <input type="text" name="value">
      <br>
      <input type="submit" value="发表">
  </form>

<p><b>查看评论:</b></p>
<button onclick="Refresh()">刷新</button>

<script>
function Refresh() {
  var xmlhttp=new XMLHttpRequest();

  xmlhttp.onreadystatechange=function() {
    if (this.readyState==4 && this.status==200) {
      document.getElementById("txtHint").innerHTML=this.responseText;
    }
  }
  xmlhttp.open("GET","GetComments.php",true);
  xmlhttp.send();
}
</script>

<div id="txtHint"></div>

</body>
</html>
