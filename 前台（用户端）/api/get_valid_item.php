<?php
// 从数据库中读取现在可以抢购以及即将开放抢购的商品
// 抢购结束的商品不予展示，即便有剩余库存

$user_time=time();

$con=mysqli_connect('localhost','shop','修改为自己的密码','shop');
if(!$con){
    die('数据库连接失败'.$mysqli_error());
}
mysqli_select_db($con,'item_detail');

$sql="select * from item_detail where time_end>$user_time";
$result=mysqli_query($con,$sql);
$row=mysqli_fetch_all($result,MYSQLI_ASSOC);

$item_num=count($row); //在每个商品对面里添加cart=0属性，方便前端渲染
for($i=0;$i<$item_num;$i++){
    $row[$i]['cart']=0;
    $row[$i]['placeholder']='plholder';
}

$json=json_encode($row,JSON_UNESCAPED_UNICODE);
echo $json;
?>