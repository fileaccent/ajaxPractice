
function isUserCorrect(){
  var txt=document.getElementById("registerName").value;
  if(txt==null||txt==""){
    document.getElementById("registerHint").innerHTML="用户名不能为空";
  }
  else if(/^[a-z0-9_-]{3,16}$/.test(txt)){
    document.getElementById("registerHint").innerHTML="";     
  }
  else{
    document.getElementById("registerHint").innerHTML="用户名格式错误";   
  }
}
function isPasswordCorrect(){/*检验密码的有效性*/
  var txt=document.getElementById("registerPassword").value;
  if(txt==null||txt==""){
    document.getElementById("registerHint").innerHTML="密码不能为空";
  }
  else if(/^[a-z0-9_-]{6,18}$/.test(txt)){
    document.getElementById("registerHint").innerHTML="";     
  }
  else{
    document.getElementById("registerHint").innerHTML="密码格式错误"; 
  
  }
}
$(function(){
  $("#registerSubmit").on("click",function(){
      var str = $("form").serialize(); 
      $.get("http://127.0.0.1/txt/practice/loginScreen/doLogin.php",{
        user: $('#registerName')[0].value,
        password: $('#registerPassword')[0].value
      },function(data){
        console.log(data);
        data=eval("("+data+")");
        alert(data);
          if(data=="登陆成功"){
              location = "http://127.0.0.1/txt/practice/message/message.html";
          }else{
              alert("用户名或密码错误！！！");
          }
      });
  });
});
