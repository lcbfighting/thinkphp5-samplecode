<?php
namespace app\index\controller;
use app\model\Klass; //班级

class KlassController extends IndexController
{
	public function index()
    {
        $klasses = Klass::paginate(2);
        $this->assign('klasses', $klasses);
        return $this->fetch();
    }
}