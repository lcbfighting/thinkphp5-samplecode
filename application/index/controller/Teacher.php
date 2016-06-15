<?php
namespace app\index\controller;
use think\Db;

/**
 * 教师管理
 */
class Teacher
{
	public function index()
	{
		// return 'hello teacher';//测试类及方法的正确性
		//获取教师表中所有数据
		$teachers = Db::name('teacher')->select();

		//显示表中所有数据
		dump ($teachers);
	}
}
