<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <title>��¼</title>
    <script type="text/javascript">
        function refreshVerifyCode() {
            document.getElementById('code').src = "getVerify.php?"+Math.random();
        }
    </script>
</head>
<body>

<form action="http://127.0.0.1:2046/wed/LoginServlet" method="post">
    �û���<input type="text" name="username"/><br/>
    ���룺<input type="password" name="password"/><br/>
    ��֤��:<img id="code" src="getVerify.php" title="��֤��" onclick="refreshVerifyCode()">
    <input type="submit" value="�����Ұ���"/>
</form>
</body>
</html>
