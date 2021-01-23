<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>我的订单</title>
    <link rel="stylesheet" type="text/css" href="css/order.css"/>
</head>
<body>
<div class="container">
    <div class="banner">
        <?php
        session_start();

        function get_item_list(){
            $con=mysqli_connect('localhost','shop','修改为自己的密码','shop');
            if(!$con){
                die('数据库连接失败'.$mysqli_error());
            }
            mysqli_select_db($con,'item_detail');

            $sql="select * from item_detail";
            $result=mysqli_query($con,$sql);
            $row=mysqli_fetch_all($result,MYSQLI_ASSOC);

            $lists=Array();
            foreach ($row as $value){
                $lists[$value['id']]=$value;
            }
            return $lists;
        }

        function trans_form($orders){
            $results=array();
            foreach ($orders as $order) {
                $goods=get_item_list()[$order['item_id']];
                $temp=array($order['order_number'],$order['status'],$order['order_time'],$goods['name'],$goods['price'],$order['count']);
                array_push($results,$temp);
                }
            return $results;
        }

        if(isset($_SESSION['username'])){
            echo '<div class="welcome">'.$_SESSION['username'].'的订单</div>';
            echo '<div class="logout_box"><a href="index.php">返回主页</a></div>';

            $con=mysqli_connect('localhost','shop','修改为自己的密码','shop');
            if(!$con){
                die('数据库连接失败'.$mysqli_error());
            }
            mysqli_select_db($con,'user_order');

            $sql="select * from user_order where user_id='".$_SESSION['user_id']."'";
            $result=mysqli_query($con,$sql);
            $orders=mysqli_fetch_all($result,MYSQLI_ASSOC);

            $form=trans_form($orders);
        }else{
            echo "用户未登录!";
            echo '<a href="index.php">返回</a>';
            die();
        }
        ?>
    </div>
    <div class="order_box">
        <h3>成功订单</h3>
        <?php
        function tableF($isFirst,$isS){
            if($isFirst){
                if($isS){
                    echo '<table border="1">
            <tr>
                <th>订单编号</th>
                <th>状态</th>
                <th>下单时间</th>
                <th>商品名称</th>
                <th>单价</th>
                <th>数量</th>
                <th>应付总额</th>
            </tr>';
                }else{
                    echo '<table border="1">
            <tr>
                <th>订单编号</th>
                <th>状态</th>
                <th>下单时间</th>
                <th>商品名称</th>
                <th>单价</th>
                <th>数量</th>
            </tr>';
                }
            }else{
                echo '</table>';
            }
        }
        function displayS($form,$flag,$placeholder){
            foreach ($form as $f){
                if($f[1]==$flag){
                    $date=date('Y-m-d, H:i:s',$f[2]);
                    echo '<tr>
                <td>'.$f[0].'</td>
                <td>'.$placeholder.'</td>
                <td>'.$date.'</td>
                <td>'.$f[3].'</td>
                <td>￥'.$f[4].'</td>
                <td>'.$f[5].'</td>
                <td>￥'.strval((int)$f[4]*(int)$f[5]).'</td>
            </tr>';
                }
            };
        }
        function displayF($form,$flag,$placeholder){
            foreach ($form as $f){
                if($f[1]==$flag){
                    $date=date('Y-m-d, H:i:s',$f[2]);
                    echo '<tr>
                <td>'.$f[0].'</td>
                <td>'.$placeholder.'</td>
                <td>'.$date.'</td>
                <td>'.$f[3].'</td>
                <td>￥'.$f[4].'</td>
                <td>'.$f[5].'</td>
            </tr>';
                }
            };
        }
        tableF(true,true);
        displayS($form,'1','抢购成功，待付款');
        tableF(false,true);
        ?>
        <br>
        <h3>失败订单</h3>
        <?php
        tableF(true,false);
        displayF($form,'-2','抢购失败，库存不足');
        displayF($form,'-1','抢购失败，不在抢购时间段');
        displayF($form,'0','抢购失败');
        tableF(false,false);
        ?>
    </div>
</div>
</body>