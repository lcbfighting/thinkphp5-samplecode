<?php
namespace app\index\controller;
use app\model\Course;//课程
use app\model\Klass;//班级
use app\model\KlassCourse;//班级课程表
/**
 * 课程管理
 */
class CourseController extends IndexController
{
    public function index()
    {
        return $this->fetch();
    }

    public function add()
    {
        $Course = new Course();
        $this->assign('Course', $Course);//传入数据到V层
        return $this->fetch();//获取V模板返给url
    }

    public function save()
    {
        //var_dump(input('post.'));
        $Course = new Course();
        $Course->name = input('post.name');
        if (false === $Course->validate(true)->save())
        {
            return $this->error('保存错误：' . $Course->getError());
        } 
        //新增班级课程信息
        //接收klass_id这个数组
        $klassIds = input('post.klass_id/a')?input('post.klass_id/a'):array();// /a表示获取的类型为数组,不选择班级时选用空数组作为默认值。
        if (false === $Course->Klasses()->saveAll($klassIds))
        {
            return $this->error('保存错误：' . $Course->Klasses()->getError());
        }


        // // 利用klass_id这个数组，拼接为包括klass_id和course_id的二维数组。
        // $datas = array();
        // foreach ($klassIds as $klassId) 
        // {
        // 	$data = array();
        // 	$data['klass_id'] = $klassId;
        // 	$data['course_id'] = $Course->id; //此时，由于前面已经执行过数据插入操作，所以可以直接获取到Course对象中的ID值。
        // 	array_push($datas,$data);
        // }
        // // 利用saveAll()方法，来将二维数据存入数据库。
        // if (count($datas))
        // {
        //     $KlassCourse = new KlassCourse;
        //     if (false === $KlassCourse->validate(true)->saveAll($datas))
        //     {
        //         return $this->error('保存错误：' . $KlassCourse->getError());
        //     }
        // }
        // $KlassCourse = new KlassCourse;
        // if (false === $KlassCourse->validate(true)->saveAll($datas))
        // {
        //     return $this->error('保存错误：' . $KlassCourse->getError());
        // }

        return $this->success('操作成功', url('index'));
    }
}