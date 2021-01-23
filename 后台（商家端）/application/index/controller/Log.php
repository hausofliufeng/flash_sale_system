<?php
namespace app\index\controller;

class Log extends Base
{
    public function index()
    {
        $info=db('log')->select();
//        var_dump($info);
        $this->assign('lists',$info);

        return $this->fetch();
    }
}