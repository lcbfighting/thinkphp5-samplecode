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

    public function edit()
    {
    	$id = input('get.id/d');
    	//获取所有的教师信息
    	$teachers = Teacher::all();
    	$this -> assign('teachers',$teachers);
    	//获取用户操作的班级信息
    	if(false === $Klass = Klass::get($id)) 
    	{
    		return $this->Error('系统未找到ID为'.$id.'的记录！');
    	}
    	$this->assign('Klass',$Klass);
    	return $this->fetch();
    }

    public function update()
    {
    	$id = input('post.id/d');
    	//获取传入的班级信息
    	$Klass = Klass::get('id');
    	if(false === $Klass)
    	{
    		$this->Error('系统未找到ID为'.'$id'.'记录');
    	}
    	//数据更新
    	$Klass->name = input('post.name');
    	$Klass->teacher_id = input('post.teacher_id');
    	if (false === $Klass->validate(true)->save())
    	{
    		$this->Error('更新错误！'.$Klass->getError());
    	}else
    	{
    		$this->success('操作成功！',url('index'));
    	}
    }
}