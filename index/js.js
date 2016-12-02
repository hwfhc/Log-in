
/*
 *效果说明:
 *在登录和注册界面间切换
 */
var Switch = SignUp_switch;

function SignIn_switch()
{
    document.getElementById('SignUp_form').style.display = 'none';
    document.getElementById('SignIn_form').style.display = 'block';
    Switch = SignUp_switch;
}

function SignUp_switch()
{
    document.getElementById('SignIn_form').style.display = 'none';
    document.getElementById('SignUp_form').style.display = 'block';
    Switch = SignIn_switch;
}

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
    if( password.value === password_ensure.value && password.value != ''){
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
   *只有一个XMLHttpRequest对象，每次触发函数时都将重置这个对象
   *之前发送的请求相当于无效(虽然)
   */

   /*初始化输入框背景*/
   element.style.border = '2px solid orange';
   element.style.background = '#f8fc50';
   usernameIsUnique = false;

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
