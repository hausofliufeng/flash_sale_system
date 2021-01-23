<?php
namespace app\index\controller;
//use think\Controller;
use think\Db;
use think\Request;
use think\Session;

class Makeitem extends Base
{
    public function index()
    {
        return $this->fetch();
    }

    public function doSubmit(){
        $request=Request::instance();
        $post=$request->post(); //获得提供的表单数据
        
        $data = [
            'name' => $post['name'], 
            'price'=>$post['price'],
            'seller'=>Session::get('username'),
            'time_start'=>strtotime($post['time_start']),
            'time_end'=>(int)strtotime($post['time_start'])+(int)$post['period']*3600,
            'period'=>(int)$post['period']*3600,
            'stock_origin'=>$post['stock_origin'],
            'stock_left'=>$post['stock_origin']
            ];
        
        Db::table('item_detail')->insert($data);
        echo "添加成功";
    }
}
