<?php
session_start();

if(!isset($_SESSION['username'])){
    //阻止未登录用户直接访问api
    echo "101非法访问，请登录。";
    die();
}elseif (!isset($_REQUEST['item_id'])) {
    //阻止登录用户直接访问api
    echo "102非法访问";
    die();
}

$order=[
    'time'=>(int)time(),
    'count'=>(int)$_REQUEST['count'],
    'item_id'=>(int)$_REQUEST['item_id'],
    'user_id'=>(int)$_SESSION['user_id'],
    ];

function f1($order){
    // 向用户订单中添加订单信息，并设置订单状态为失败
    // 接下来抢购成功再返回设置为成功
    $con=mysqli_connect('localhost','shop','修改为自己的密码','shop');
    if(!$con){
        die('数据库连接失败'.$mysqli_error());
    }
    mysqli_select_db($con,'user_order');
    
    $sql = "INSERT INTO user_order (order_number,user_id, item_id, count,order_time) VALUES (".on_gen($order).",".$order['user_id'].",".$order['item_id'].",".$order['count'].",".$order['time'].")";
    $result=mysqli_query($con,$sql);
    if($result){
        mysqli_close($con);
        return true;
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
        mysqli_close($con);
        return false;
    }
}

function on_gen($order){
    //order number generator
    $str_num=strval($order['user_id']).strval($order['time']).strval($order['item_id']);
    return $str_num;
}

function itwork($order,$flag){
    //设置订单标志位
    //-2，抢购失败，库存不足
    //-1，抢购失败，不在抢购时间段
    //0，抢购失败（初始值无需主动设置）
    //1，抢购成功待付款
    $con=mysqli_connect('localhost','shop','修改为自己的密码','shop');
    if(!$con){
        die('数据库连接失败'.$mysqli_error());
    }
    mysqli_select_db($con,'item_detail');
    
    $order_number=on_gen($order);
    $sql="UPDATE user_order SET status='".$flag."' WHERE order_number='".$order_number."'";
    $result=mysqli_query($con,$sql);
    if($result){
        mysqli_close($con);
        return true;
    }else{
        echo "Error: " . $sql . "<br>" . mysqli_error($con);
        mysqli_close($con);
        return false;
    }
}

function f2($order){
    //开始抢购，判断抢购时间和库存是否满足要求
    //订单库存修改部分用事务方式执行
    $con=mysqli_connect('localhost','shop','修改为自己的密码','shop');
    if(!$con){
        die('数据库连接失败'.$mysqli_error());
    }
    mysqli_select_db($con,'item_detail');
    
    $sql="select * from item_detail where id=".$order['item_id'];
    // echo $sql;
    $result=mysqli_query($con,$sql);
    $row=mysqli_fetch_array($result,MYSQLI_ASSOC);
    
    if($order['time']<$row['time_start'] || $order['time']>$row['time_end']){
        mysqli_close($con);
        itwork($order,-1);
        die("抢购失败，非抢购时间段！");
    }
    
    if($order['count']>$row['stock_left']){
        mysqli_close($con);
        itwork($order,-2);
        die("抢购失败，库存不足！");
    }
    
    //时间和库存都没问题，以事务方式修改数据库，并设置订单标志为成功
    mysqli_query($con, "SET AUTOCOMMIT=0"); // 设置为不自动提交，因为MYSQL默认立即执行
    mysqli_begin_transaction($con);            // 开始事务定义
    
    $sl=$row['stock_left']-$order['count'];
    $sql="UPDATE item_detail SET stock_left='".$sl."' WHERE id='".$order['item_id']."'";
    
    $r=mysqli_query($con,$sql);
    if($r){
        mysqli_commit($con);            //执行事务
        mysqli_close($con);
        itwork($order,1);
    }else{
        mysqli_query($con, "ROLLBACK"); // 判断当执行失败时回滚
        mysqli_commit($con);            //执行事务
        mysqli_close($con);
    }
    echo("订单提交成功，请到我的订单查看订单状态！");
}

$flag=f1($order);
if($flag){
    f2($order);
}else{
    echo("订单创建失败！");
}






// echo "订单提交成功，请到我的订单查看状态。";