<?php
namespace app\index\controller;
//use think\Controller;

use think\Request;
use think\Session;
use think\Db;

class Dologin extends \think\Controller
{
    public function index()
    {
        $request=Request::instance();
        $post=$request->post();
        if(!$post){
            $this->error('登陆失败，请重新登录','/index/login');
        }else{
            $username=$post['username'];
            $password=$post['password']; // 获取用户输入的用户名和密码
        }

        $result=Db::table('user_seller')
            ->where('user_name',$username)
            ->where('user_password',$password)
            ->find();
        if($result){
            //将相关信息存到session中，同时跳转至主页
            _info2session($result);

            $this->success('登陆成功，正在跳转','/index/index');
        }else{
            $this->error('登陆失败，请重新登录','/index/login');
        }
    }
}
