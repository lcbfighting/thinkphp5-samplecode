<?php
namespace app\index\controller;
use think\Controller;//用于与V层进行数据传递
use app\model\Teacher; //teacher表

/**
 * 教师管理
 */
class TeacherController extends Controller
{
	public function index()
	{
		$Teacher = new Teacher;
		$teachers = $Teacher -> select();
		
		// 向V层传数据
		$this->assign('teachers', $teachers);
       
        // 取回打包后的数据
        $htmls = $this->fetch();

        // 将数据返回给用户
        return $htmls;

		// var_dump($teachers);
		// 获取第0个数据
		// $teacher = $teachers[0];

		// // 调用上述对象的getData()方法
  //       var_dump($teacher -> getData());
		// echo $teacher -> getData('name');
		// var_dump($teacher -> getData('name'));
		// return $teacher -> getData('name');
		// return 'hello teacher';//测试类及方法的正确性
		//获取教师表中所有数据
		// $teachers = Db::name('teacher')->select();

		// //显示表中所有数据
		// dump ($teachers);
	}
}
