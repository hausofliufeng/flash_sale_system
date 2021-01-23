<?php
namespace app\index\controller;

use think\Session;

class Base extends \think\Controller {

    public function __construct(\think\Request $request = null) {

        parent::__construct($request);

        //权限检查1，只有登录用户才能访问各种模块
        if(!Session::has('username')){
//            die('no');
            $this->error('您未登录，请登录','/index/login');
        }

        //权限检查2，不同用户组能访问的功能不同
        $request_node=request()->controller();
        if($request_node=='Log'){
            if(Session::get('user_role')!=1){
                $this->error('您无权进行此操作');
            }
        }elseif ($request_node=='Makeitem') {
            if(Session::get('user_role')!=0){
                $this->error('您无权进行此操作');
            }
        }
//        echo var_dump(());

//        echo 'Base:construct';
        //这里的构造函数一定会被执行
        //echo 'hello from Base';
//        if (!session('user_id')) {
//
//            $this->error('请登陆', 'login/index', '', 0);
//        }
//
//        $this->user_id = session('user_id');
//        $this->user_name = session('user_name');
//
//        //权限检查
//        if (!$this->_checkAuthor($this->user_id)) {
//            $this->error('你无权限操作');
//        }
//
//        //记录日志
        $this->_addLog();
    }

    /**
     * 权限检查
     */
    private function _checkAuthor($user_id) {

        if (!$user_id) {
            return false;
        }
        if($user_id==1){
            return true;
        }
        $c = strtolower(request()->controller());
        $a = strtolower(request()->action());

        if (preg_match('/^public_/', $a)) {
            return true;
        }
        if ($c == 'index' && $a == 'index') {
            return true;
        }
        $menu = model('Menu')->getMyMenu($user_id);
        foreach ($menu as $k => $v) {
            if (strtolower($v['c']) == $c && strtolower($v['a']) == $a) {
                return true;
            }
        }
        return false;
    }

    /**
     * 记录日志
     */
    private function _addLog() {

        $data = array();
        $data['querystring'] = request()->query()?'?'.request()->query():'';
        $data['m'] = request()->module();
        $data['c'] = request()->controller();
        $data['a'] = request()->action();
        $data['userid'] = Session::get('user_id');
        $data['username'] = Session::get('username');
        $data['ip'] = ip2long(request()->ip());
        $data['time'] = time();
        $arr = array('Index/index','Log/index','Menu/index');
        db('log')->insert($data);
    }

}