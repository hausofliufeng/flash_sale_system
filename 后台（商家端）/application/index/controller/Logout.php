<?php
namespace app\index\controller;
//use think\Controller;

use think\Session;

class Logout extends \think\Controller
{
    public function index()
    {
        //权限检查，未登录用户无需退出
        if(!Session::has('username')){
//            die('no');
            $this->error('您未登录，无需退出','/index/login');
        }
        //清除Session
        Session::clear();
        $this->success('退出成功','/index/login');
    }
}
