<?php
namespace app\index\controller;
use think\Controller;

class LoginController extends Controller
{
	//用户登录表单
	public function index()
	{
		//显示登录表单
		return $this->fetch();
	}
	//用户提交的登录数据
	public function login()
	{
		return 'login';
		//验证用户名是否存在
		//验证密码是否正确
		//用户名密码正确，将teacherId存session
		//用户名密码错误，返回登录页面
	}
}
