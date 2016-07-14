<?php
namespace app\index\controller;
use app\model\Klass; //班级
use app\model\Teacher;//教师

class KlassController extends IndexController
{
	public function index()
    {
        $klasses = Klass::paginate(3);
        $this->assign('klasses', $klasses);
        return $this->fetch();
    }

    public function add()
    {
    	//获取所有教师的信息
    	$teachers = Teacher::all();
    	$this -> assign('teachers',$teachers);
    	return $this->fetch();
    }

    public function save()
    {
    	// var_dump(input('post.'));
    	$klass = new Klass();
		$klass->name = input('post.name');
		$klass->teacher_id = input('post.teacher_id/d');
		if(false === $klass->validate()->save())
		{
			return $this->error('数据添加错误:'.$klass->getError());
		}else{
			return $this->success('操作成功！',url('index'));
		}
    }
}