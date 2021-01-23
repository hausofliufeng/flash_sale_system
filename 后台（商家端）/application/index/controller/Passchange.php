<?php
namespace app\index\controller;
//use think\Controller;
use think\Request;
use think\Session;
use think\Db;

class Passchange extends Base
{
    public function index()
    {
        return $this->fetch();
    }
    
    public function doChange(){
        $request = Request::instance();
        $get = $request->get();//获取get上传的内容
        
        $data=[
            'pass_old'=>$get['pass_old'],
            'pass_new'=>$get['pass'],
            'user_id'=>Session::get('user_id'),
            ];
        
        $result=Db::table('user_seller')
            ->where('user_id',$data['user_id'])
            ->where('user_password',$data['pass_old'])
            ->find();
        if($result){
            $r=Db::table('user_seller')->where('user_id',$data['user_id'])->setField('user_password', $data['pass_new']);
            if($r==1){
                echo "密码修改成功！";
            }else{
                echo "未知错误！";
            }
        }else{
            echo "旧密码错误！";
        }
    }
}
