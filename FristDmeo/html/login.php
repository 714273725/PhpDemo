<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/html">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <title>登录</title>
    <script type="text/javascript">
        function refreshVerifyCode() {
            document.getElementById('code').src = "getVerify.php?" + Math.random();
            /*var xhr = new XMLHttpRequest;
             xhr.open('post', '../php/mysql.php');
             xhr.send(null);
             xhr.onreadystatechange = function () {
             if(xhr.readyState == 4 && xhr.status == 200) {
             alert(xhr.responseText);
             }
             }*/
            /* var ajax = InitAjax();
             var url = "./php/mysql.php";
             ajax.open("POST", url, true);
             ajax.onreadystatechange = function () {
             alert("ppppp");
             if (ajax.readyState == 4 && ajax.status == 200) {
             alert(ajax.responseText);
             } else {
             alert("出错了");
             }
             }*/
        }
    </script>
</head>
<body>

<form action="../php/mysql.php" method="post">
    <br>用户名<input type="text" name="username"/><br/>
    <br>密码<input type="password" name="password"/><br/>
    验证码<img id="code" src="getVerify.php" title="验证码" onclick="refreshVerifyCode()">
    <input type="submit" value="提交">
</form>
</body>
</html>
