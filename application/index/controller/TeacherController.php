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
		
        try{
            $Teacher = new Teacher;
		    $teachers = $Teacher -> select();
		
		    // 向V层传数据
		    $this->assign('teachers', $teachers);
       
            // 取回打包后的数据
            $htmls = $this->fetch();

            // 将数据返回给用户
            return $htmls;
        }catch(\Exception $e) {
            // 处理异常后，如果需要返回异常的位置及信息，下行代码的注释要去掉。
            //throw $e;
            return '系统错误' . $e->getMessage();
        }

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

	/**
	 * 插入数据
	 * @return str 
	 */
	public function insert()
    {
        //接收传入数据
        $teacher = input('post.');
       // $teacher['create_time'] = time();   // 加入时间戳
        //var_dump($teacher);
        //引用teacher模型
        $Teacher = new teacher;
        //var_dump($Teacher);

        //加入验证信息
        $result = $Teacher->validate(true)->data($teacher)->save();

        //反馈结果
        if (false === $result) {
        	return '新增失败'. $Teacher->getError();
        } else{
        	return $teacher['name'].'添加成功';
        }
       
        // var_dump($_POST);//与form中的method对应  $_GET同样是
        // $postData = input('post.');//使用助手函数input
        // var_dump($postData);
        // return 'hello insert';//测试
        // 新建测试数据
        // $teacher = array();
        // $teacher['name'] = '王五';
        // $teacher['sex']  = '1';
        // $teacher['username'] = 'wangwu';
        // $teacher['email'] = 'wangwu@163.com';
        // var_dump($teacher);

        // //引用teacher数据表对应的模型
        // $Teacher = new Teacher;
        // var_dump($Teacher);

        // //向Teacher表中插入数据，并判断是否成功
        // $Teacher->data($teacher)->save();
        // return $teacher['name'].'数据插入成功';
    }
    /**
     * 增加数据
     * 
     */
    public function add()
    {
        //return 'hello add'; 测试此方法
        //获取V层数据
        $htmls = $this->fetch();//取回V层数据
        return $htmls;//返回给用户
    }

    //测试方法
    public function test()
    {
        $data = array();
        $data['username'] = 'ceshi';
        $data['name'] = '1';
        $data['sex'] = '1';
        $data['email'] = 'hello';
        var_dump($this->validate($data, 'Teacher'));
    }

    //删除方法
    public function delete()
    {
        //接收ID，并转换为int型
        $id = input('get.id/d');
        //var_dump(input('get.'));
        //引入教师表模型
        // $Teacher = new Teacher;
        // //获取当前记录
        // if (false !== $teacher = $Teacher::get(8))
        // {
        //     // 删除当前ID的记录
        //     if ($state = $teacher->delete())
        //     {
        //         return '删除成功';
        //     }
        // }
        // return '删除失败';
        
        // 直接删除相关关键字记录
       
        if($count = Teacher::destroy(6))
        {
        	$message =  '成功删除' . $count . '条数据';
        }else
        {
        	$message =  '删除失败';
        }

        //进行跳转
        return $this->success($message, url('index'));
    }

    //编辑方法
    public function edit()
    {
        // 获取传入ID
        $id = input('get.id/d');
        // 在Teacher表模型中获取当前记录
        if(false === $teacher = Teacher::get($id))
        {
        	return '系统未找到id为'.$id.'的记录';
        }

        // 将数据传给V层
    	$this -> assign('teacher',$teacher);

    	// 获取封装好的V层内容
        $htmls = $this -> fetch();

        // 将封装好的V层内容返回给用户
        return $htmls;
    }

    public function update()
    {
    	// //var_dump(input('post.'));
    	// // 接收数据
    	// $teacher = input('post.');
     //    // 将数据存入Teacher表
     //    $Teacher = new Teacher();
     //    $message = '更新成功!';
       
     //    // 依据状态定制提示信息
     //    try
     //    {
     //    	if(false === $Teacher->validate(true)->isUpdate(true)->save($teacher))
     //    	{
     //    		return $message='更新失败!' .  $Teacher->getError();
     //    	}
     //    }catch (\Exception $e)
     //    {
     //    	$message='更新失败!'  .  $e->getError();
     //    }
     //    return $message;

        try
        {
            // 接收数据，取要更新的关键字信息
            $id = input('post.id');

            // 获取当前对象
            $teacher = Teacher::get($id);

            // 写入要更新的数据
            $teacher->name = input('post.name');
            $teacher->username = input('post.username');
            $teacher->sex = input('post.sex');
            $teacher->email = input('post.email');

            // 更新
            $message = '更新成功';
            if (false === $teacher->validate(true)->save())
            {
                $message = '更新失败' . $teacher->getError();
            }

        } catch (\Exception $e)
        {
            // 处理异常需要查看具体的异常位置及信息，故抛弃语句 throw $e;
            $message = $e->getMessage();
        }

        return $message;
    }

}
