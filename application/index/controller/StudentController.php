<?php
namespace app\index\controller;
use app\model\Student;
use app\model\Klass;

class StudentController extends IndexController
{
	public function index()
	{
		$students = Student::paginate();
        $this->assign('students', $students);
        return $this->fetch();
	}
	public function edit()
	{
		$id = input('get.id/d');
		//判断是否存在当前记录
		if(false === $Student = Student::get($id))
		{
			return $this->Error('未找到ID为'.$id.'的记录！');		}
		//取出班级列表
		// $klasses = Klass::all();
		// $this -> assign('klasses',$klasses);

		$this -> assign('Student',$Student);
		return $this->fetch();
	}
}