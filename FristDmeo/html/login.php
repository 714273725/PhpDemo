<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <title>登录</title>
    <script type="text/javascript">
        function refreshVerifyCode() {
            document.getElementById('code').src = "getVerify.php?"+Math.random();
        }
    </script>
</head>
<body>

<form action="http://127.0.0.1:2046/wed/LoginServlet" method="post">
    用户：<input type="text" name="username"/><br/>
    密码：<input type="password" name="password"/><br/>
    验证码:<img id="code" src="getVerify.php" title="验证码" onclick="refreshVerifyCode()">
    <input type="submit" value="宝宝我爱你"/>
</form>
</body>
</html>
