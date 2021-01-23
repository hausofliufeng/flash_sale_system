<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>秒杀商城</title>
    <link rel="stylesheet" type="text/css" href="css/style.css"/>
    <script src="https://cdn.jsdelivr.net/npm/vue"></script>
    <script src="https://unpkg.com/axios/dist/axios.min.js"></script>
</head>
<body>

<div class="container">
<div class="banner">
    <?php
    session_start();

    if(isset($_SESSION['username'])){
        echo '<div class="my_order"><a href="myorder.php">我的订单</a></div>';
        echo '<br>';
        echo '<div class="logout_box"><a href="logout.php">退出</a></div>';
        echo '<br>';
        echo '<div class="welcome">欢迎登陆，'.$_SESSION['username'].'！</div>';
    }else{
        echo '<div class="login_box"><a href="login.php">请登录</a></div>';
    }
    ?>
</div>

<div class="item_con"  v-for="(item,index) in items">
    <div class="item">
        <div class="item_pic" :style="item.isGreen?'background:#27c853':''">
            <div class="time_info">{{item.placeholder}}</div>
            <div class=lightning v-show=item.showL></div>
            <div class="count">
                <div class="count_hour">{{item.h}}</div>
                <div class="count_min">{{item.m}}</div>
                <div class="count_sec">{{item.s}}</div>
            </div>
        </div>
        <div class="item_info">
            <div class="item_text">
                <span>商品名：{{item.name}}</span><br>
                <span>价格：￥{{item.price}}</span><br>
                <span>店铺：{{item.seller}}</span><br>
                <span>剩余库存：{{item.stock_left}}</span><br>
            </div>
            <div class="purchase">
                <button style="width:20px;" @click="sub(index)">-</button>
                <span>{{item.cart}}</span>
                <button style="width:20px;" @click="add(index)">+</button>&nbsp;&nbsp;
                <button v-show="item.purchaseButton" @click="dokill(index)">立即抢购</button>
            </div>
        </div>
    </div>
</div>
</div>

<script src="./js/main.js"></script>
</body>
</html>