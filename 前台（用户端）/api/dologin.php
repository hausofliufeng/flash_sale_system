<?php
session_start();

$input_un=$_REQUEST["username"];
$input_pw=$_REQUEST["password"];

$con=mysqli_connect('localhost','shop','修改为自己的密码','shop');
if(!$con){
    die('数据库连接失败'.$mysqli_error());
}
mysqli_select_db($con,'user_buyer');

$sql="select * from user_buyer where user_name='$input_un' and user_password='$input_pw'";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_array($result,MYSQLI_ASSOC);

if($row){
    $_SESSION['username']=$row['user_name'];
    $_SESSION['token']=$row['user_token'];
    $_SESSION['user_id']=$row['user_id'];
    echo "登陆成功！";
    echo '<a href="../index.php">返回</a>';
}else{
    echo "登陆失败！";
    echo '<a href="../login.php">返回</a>';
}
