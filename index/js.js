
/*
 *效果说明:
 *在登录和注册界面间切换
 */
Switch.prototype.ToSignIn = function(){
  document.getElementById('SignUp_form').style.display = 'none';
  document.getElementById('SignIn_form').style.display = 'block';
  this.act = this.ToSignUp;
}

Switch.prototype.ToSignUp = function(){
  document.getElementById('SignIn_form').style.display = 'none';
  document.getElementById('SignUp_form').style.display = 'block';
  this.act = this.ToSignIn;
}

function Switch(){
  this.act = this.ToSignUp;
}

var change = new Switch();

/*------------------------注册判断--------------------------------*/

//这两个变量用于判断输入信息是否合法
var usernameIsUnique = false;
var passwordIsSame = false;
function EnableSubmit()
{
  /*
   *效果说明:
   *设置注册按钮可用或不可用
   */
  var element = document.getElementById('SignUp_form').getElementsByTagName('input')[3];

  if( usernameIsUnique == true && passwordIsSame == true){
    element.disabled = '';
  }
  else{
    element.disabled = 'disabled';
  }
}

function IsValid(string)
{
  /*
   *效果说明:
   *判断string是否合法(暂时不为空)
   *true:合法
   *false:不合法
   */
   if( string != '' ){
     return true;
   }
   else{
     return false;
   }
}

function IsSame()
{
  /*
   *效果说明:
   *判断两个密码是否相同，并改变输入框颜色
   */

   //获取两个密码输入框
    var password = document.getElementById('SignUp_form').getElementsByTagName('input')[1];
    var password_ensure = document.getElementById('SignUp_form').getElementsByTagName('input')[2];

    //判断密码，并修改边框和背景
    if( password.value === password_ensure.value && IsValid(password.value) ){
      passwordIsSame = true;

      password.style.border = '2px solid green';
      password_ensure.style.border = '2px solid green';

      password.style.background = '#9cff7a';
      password_ensure.style.background = '#9cff7a';
    }
    else{
      passwordIsSame = false;

      password.style.border = '2px solid red';
      password_ensure.style.border = '2px solid red';

      password.style.background = '#ff9c7a';
      password_ensure.style.background = '#ff9c7a';
    }

    EnableSubmit();
}


var xhttp = new XMLHttpRequest();
function IsRepeat(element)
{
  /*
   *效果说明:
   *判断用户名是否已存在
   *element:输入框元素
   *
   *只有一个XMLHttpRequest对象，每次触发函数时都将重新调用send(输入不合法除外)
   *之前发送的请求相当于无效(但是控制台显示他们的状态是取消)

   (复制)
   每个xmlhttp对象的一次send只能对应相应一个onreadystatechange事件，
   这样当第一次调用后，
   立即发出第二次调用，
   则onreadystatechange会反映第二次调用的状况，
   因此如果有需求需要连续两次或者两次以上调用Send函数，
   则必须每次使用不同的xmlhttp对象

   */

   //初始化输入框背景
   element.style.border = '2px solid orange';
   element.style.background = '#f8fc50';
   usernameIsUnique = false;

   //若输入框值不合法，则不发送请求
   if(IsValid(element.value) != true){
     element.style.border = '2px solid red';
     element.style.background = '#ff9c7a';
     //设置收到response时不进行任何操作
     xhttp.onreadystatechange = function() {};
     return;
   }

   //发送请求
   xhttp.onreadystatechange = function() {
   if (this.readyState == 4 && this.status == 200) {
         if(this.responseText == "false"){//false代表用户名尚未使用
           usernameIsUnique = true;

           element.style.border = '2px solid green';
           element.style.background = '#9cff7a';
         }
         else{
           element.style.border = '2px solid red';
           element.style.background = '#ff9c7a';
         }
      }

    EnableSubmit();
    };

    //用url发送参数
    xhttp.open("GET", "index/HandleUsername.php?username="+element.value, true);
    xhttp.send();
}
