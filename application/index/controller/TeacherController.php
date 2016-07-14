<?php
namespace app\index\controller;
use think\Controller;//用于与V层进行数据传递
use app\model\Teacher; //teacher表

/**
 * 教师管理
 */
class TeacherController extends IndexController
{
	
    public function index()
	{
        //获取查询信息
    	$name = input('get.name');
    	//echo $name;
    	// 获取当前页
    	//$page = input('get.page/d')< 1 ? 1 : input('get.page/d');
        // 设置每页大小
        $pageSize = 5;
        // 获取偏移量offset
        //$offset = ($page - 1) * $pageSize;
    	//$pageSize = 5; //设置页码
        $Teacher  = new Teacher;
	    $teachers = $Teacher->where('name', 'like', '%' . $name . '%')->paginate($pageSize);
		//$teachers = $Teacher->Limit($offset,$pageSize)->select();
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
  		// var_dump($teacher -> getData());
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
        $message    = '';   // 反馈消息
        $error      = '';   // 反馈错误信息
        try{
            //接收传入数据
            //$teacher = input('post.');
            //引用teacher模型
            $teacher            = new Teacher;
            $teacher->name      = input('post.name');
            $teacher->username  = input('post.username');
            $teacher->sex       = input('post.sex');
            $teacher->email     = input('post.email');

            //加入验证信息
            if (false ===  $teacher->validate(true)->save()) {
                $error =  '新增失败'. $teacher->getError();
            } else{
                $message = $teacher['name'].'添加成功';
            }
        }catch (\Exception $e)
        {
            $error = '系统错误:' . $e->getMessage();
        }
        //判断是否发生错误，返回不同信息
        if ($error === '')
            {
                return $this->success($message, url('index'));
            } else {
                return $this->error($error);
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
        try {
            $htmls = $this->fetch();//获取V层数据
            return $htmls;//返回给用户
        } catch (\Exception $e) {
            return '系统错误' . $e->getMessage();
        }
    }

    //测试方法
    public function test()
    {
        $pageSize = 5;//每页显示5条数据
        $Teacher  = new Teacher();

        //调用分页
        $teachers = $Teacher->paginate($pageSize);

        //不调用分页
        $teachers = $Teacher->select();
        var_dump($teachers);
        // $data = array();
        // $data['username'] = 'ceshi';
        // $data['name'] = '1';
        // $data['sex'] = '1';
        // $data['email'] = 'hello';
        // var_dump($this->validate($data, 'Teacher'));
    }

    //删除方法
    public function delete()
    {
        $message = ''; //返回信息
        $error   = ''; //错误信息
        //接收ID，并转换为int型
        try{
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
	       
	        if($count = Teacher::destroy($id))
	        {
	        	$message =  '成功删除' . $count . '条数据';
	        }else
	        {
	        	$message =  '删除失败';
	        }
        }catch(\Exception $e){
        	$error = '系统错误' . $e->getMessage();
        }
        
        if($error === '')
        {
        	//进行跳转
       	 	return $this->success($message, url('index'));
        }else
      		return $this->error($error);  
    }

    //编辑方法
    public function edit()
    {
        try{
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
        }catch(\Exception $e){
        	return '系统错误'. $e->getMessage();	
        }
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
    	$message = ''; //反馈消息
    	$error   = ''; //反馈错误信息
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
                $error = '更新失败！' . $teacher->getError();
            }

        } catch (\Exception $e)
        {
            // 处理异常需要查看具体的异常位置及信息，故抛弃语句 throw $e;
            $error = '系统错误' . $e->getMessage();
        }
        if($error === '')
        {
        	return $this->success($message,url('index'));
        }else
        {
        	return $this->error($error);
        }
    }

}
