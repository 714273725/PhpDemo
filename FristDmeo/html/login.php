<!DOCTYPE html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=gb2312"/>
    <title>登录</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no"/>
    <meta name="format-detection" content="telephone=no"/>
    <meta name="apple-mobile-web-app-capable" content="yes"/>
    <meta name="apple-mobile-web-app-status-bar-style" content="black">
    <script type="text/javascript" src="../js/jquery.js"></script>
    <style>
        body {
            font-size: 62.5%;
            font-family: "微软雅黑";
            overflow-x: hidden;
            overflow-y: auto;
        }

        .viewport {
            max-width: 640px;
            min-width: 300px;
            margin: 0;
        }

        .warning {
            /*titleBar的样式*/
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: auto; /* 这样写兼容低版本ie*/
            padding-top: 0.5rem; /*为了兼容ie ，否则写成 固定值 10px 等*/
            padding-bottom: 0.5rem;
            box-shadow: 0px 0px 10px #757575;
            /*阴影*/
            /*针对不同浏览器的效果*/
            background: -webkit-linear-gradient(#FFFFFF, #FFFFFF);
            -moz-box-shadow: 0px 0px 10px #757575; /*firefox*/
            -webkit-box-shadow: 0px 0px 10px #757575; /*webkit*/
            /* 以下两句兼容低版本ie*/
            /*filter: progid:DXImageTransform.Microsoft.Gradient(startColorStr='#FFFFFF', endColorStr='#FFFFFF', gradientType='0');
            filter:progid:DXImageTransform.Microsoft.Shadow(color=#909090,direction=120,strength=4);*/
            background-color: #FFFFFF;
            background: -moz-linear-gradient(#FFFFFF, #FFFFFF);
            background: -o-linear-gradient(#FFFFFF #FFFFFF);
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#FFFFFF), to(#FFFFFF));
            background: linear-gradient(#FFFFFF, #FFFFFF);
            opacity: 0.95;
            /*透明度*/
            text-align: center;
            font-size: x-large;
            color: #D79314;
            text-align: -moz-center;
            text-align: center;
            z-index: 1000;
            /*clear: both;*/
        }

        .holder {
            top: 0;
            left: 0;
            width: 100%;
            padding-top: 0.5rem;
            padding-bottom: 0.5rem;
            /*阴影*/
            background: -webkit-linear-gradient(#FFFFFF, #FFFFFF);
            /*针对不同浏览器的效果*/
            background: -moz-linear-gradient(#FFFFFF, #FFFFFF);
            background: -o-linear-gradient(#FFFFFF #FFFFFF);
            background: -webkit-gradient(linear, 0 0, 0 100%, from(#FFFFFF), to(#FFFFFF));
            background: linear-gradient(#FFFFFF, #FFFFFF);
            opacity: 0.0;
            /*透明度*/
            text-align: center;
            font-size: x-large;
            color: #D79314;
        / / text-align: -moz-center;
            z-index: 1000;
            /*clear: both;*/
        }

        input[type=text],
        input[type=password] {
            border-color: #bbb;
            height: 38px;
            font-size: 14px;
            border-radius: 2px;
            outline: 0;
            border: #ccc 1px solid;
            padding: 0px 0px;
            width: 100%;
            -webkit-transition: box-shadow .5s;
            margin-bottom: 15px;
        }

        .button {
            display: inline-block;
            outline: none;
            cursor: pointer;
            text-align: center;
            text-decoration: none;
            font: 16px/100% 'Microsoft yahei', Arial, Helvetica, sans-serif;
            padding: .5em 2em .55em;
            text-shadow: 0 1px 1px rgba(0, 0, 0, .3);
            background: #d79314;
            -webkit-border-radius: .5em;
            -moz-border-radius: .5em;
            border-radius: .5em;
            -webkit-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
            -moz-box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
            box-shadow: 0 1px 2px rgba(0, 0, 0, .2);
            color: #FFFFFF;
        }

        .orange:hover {
            background: #f47c20;
            background: -webkit-gradient(linear, left top, left bottom, from(#f88e11), to(#f06015));
            background: -moz-linear-gradient(top, #f88e11, #f06015);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f88e11', endColorstr='#f06015');
        }

        .orange:active {
            color: #fcd3a5;
            background: -webkit-gradient(linear, left top, left bottom, from(#f47a20), to(#faa51a));
            background: -moz-linear-gradient(top, #f47a20, #faa51a);
            filter: progid:DXImageTransform.Microsoft.gradient(startColorstr='#f47a20', endColorstr='#faa51a');
        }
    </style>
    <script type="text/javascript">
        function refreshVerifyCode() {
            document.getElementById('code').src = "getVerify.php?" + Math.random();
        }
        function login() {
            /*var xhr = new XMLHttpRequest;
             xhr.open('post', '../php/mysql.php');
             xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
             var params = 'username=' + document.getElementById('username').value
             + '&password=' + document.getElementById('password').value;
             xhr.send(params);
             xhr.onreadystatechange = function () {
             if (xhr.readyState == 4 && xhr.status == 200) {

             }
             }*/



            var name = document.getElementById('username').value;
            var psd = document.getElementById('password').value;


           /* $.ajax({
                type: "Post",
                url: "http://localhost/project/PhpDemo/FristDmeo/php/mysql.php",
                contentType: "application/json; charset=utf-8",
                dataType: "json",
                data: "{ 'username': '" + name + "', 'password': '" + psd + "' }",
                success: function (data) {
                    alert("success");
                },
                error: function (err) {
                    alert("error");
                }
            });*/


            $.post(
                "http://localhost/project/PhpDemo/FristDmeo/php/mysql.php",
                {
                    username: "name",
                    password: "psd"
                },
                function (results) {
                    alert("dfsfsdf");
                    var parsedJson = jQuery.parseJSON(results);
                    alert(parsedJson.username);
                }
                ,
                "json");
        }
    </script>
</head>
<body>

<body>
<div class="warning">
    登陆
</div>
<div class="holder">

</div>
<div style="margin-top: 5%;">
    <input type="text" id="username" placeholder="用户名" name="username">
    <input type="password" id="password" placeholder="密码" name="password">

    <p><input type="email" id="verify" placeholder="验证码" name="verify"
              style="width: 30% ; height: 38px;vertical-align: middle;line-height:28px;margin:0px"> <img
            id="code" src="getVerify.php" style="vertical-align: middle" onclick="refreshVerifyCode()"></p>

</div>
<div style="align-content: center; width: 100%;">
    <center>
        <button class="button" onclick="login()">登陆</button>
    </center>
</div>
</body>
<!--<br>用户名<input type="text" name="username"/><br/>
<br>密码<input type="password" name="password"/><br/>

验证码<img id="code" src="getVerify.php" onclick="refreshVerifyCode()">
<input type="submit" value="提交">-->
</body>
</html>
