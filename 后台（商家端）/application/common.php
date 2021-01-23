<?php
// +----------------------------------------------------------------------
// | ThinkPHP [ WE CAN DO IT JUST THINK ]
// +----------------------------------------------------------------------
// | Copyright (c) 2006-2016 http://thinkphp.cn All rights reserved.
// +----------------------------------------------------------------------
// | Licensed ( http://www.apache.org/licenses/LICENSE-2.0 )
// +----------------------------------------------------------------------
// | Author: 流年 <liu21st@gmail.com>
// +----------------------------------------------------------------------
use think\Session;
use think\Db;

// 应用公共文件
function _info2session($result){
    //设置用户名
    Session::set('username',$result['user_name']);

    //获取用户id
    $user_id=$result['user_id'];
    Session::set('user_id',$user_id);
    
    //设置角色
    Session::set('user_role',$result['user_role']);
}