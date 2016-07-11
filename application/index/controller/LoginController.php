<?php
namespace app\index\controller;
use think\Controller;
use app\model\Teacher;

class LoginController extends Controller
{
	//用户登录表单
	public function index()
	{
		//显示登录表单
		return $this->fetch();
	}
	//用户提交的登录数据
	public function logIn()
	{
		//var_dump(input('post.'));
		//return 'login';
		//验证用户名是否存在
		// $map = array('username'=>input('post.usename'));
		// $Teacher = Teacher::get($map);
		// var_dump($Teacher);
		// if(false !== $Teacher && $Teacher->getData('password') === input('post.password'))
		// {
		// 	//验证密码是否正确
		// 	//用户名密码正确，将teacherId存session
		// 	session('teacherId', $Teacher->getData('id'));
  		//return $this->success('login success', url('Teacher/index'));
		// }else
		// {
		// 	//用户名密码错误
		// 	return $this->error('username or password incrrect',url('index'));
		// }
		// 直接调用M层方法，进行登录。
        if (Teacher::logIn(input('post.username'), input('post.password')))
        {
            return $this->success('login success', url('Teacher/index'));
        } else {
            return $this->error('username or password incorrent', url('index'));
        }
	}

	//用户注销
	public function logOut()
	{
		if(teacher::logOut())
		{
			return $this->success('logout success!',url('index'));
		}else
		{
			return $this->error('logout error!',url('index'));
		}
	}
}
