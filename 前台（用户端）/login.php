<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>用户登录</title>
    <link rel="stylesheet" type="text/css" href="css/login.css"/>
</head>
<body>
<div style="text-align:center">
    <br><br>
    <form action="./api/dologin.php" method="post" name="myForm">
        <input type="text" name="username"  placeholder="用户名" autocomplete="off" required="required"><br>
        <input type="password" name="password"  placeholder="密码" autocomplete="off" required="required"><br>

        <br>
        <input type="submit" value="登录">
    </form>
</div>
</body>