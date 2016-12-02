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
