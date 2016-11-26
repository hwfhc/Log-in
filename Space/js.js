function Comment(value,user){
   this.value = value;
   this.user = user;
}

function init(){
  document.getElementById('CommentContainer').style.height = "800px";
}

Comment.prototype.draw = function () {
  var node = document.createElement('div');
  node.innerHTML = this.value + this.user;
  document.getElementById('CommentContainer').appendChild(node);
};
