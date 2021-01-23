<?php
namespace app\index\controller;
//use think\Controller;

class Index extends Base
{
    public function index()
    {
//        $info=db('user')->select();
////        var_dump($info);
//        $this->assign('lists',$info);
        return $this->fetch();
    }
}
