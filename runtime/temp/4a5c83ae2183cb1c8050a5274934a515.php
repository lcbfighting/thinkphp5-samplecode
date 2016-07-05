<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\xampp\htdocs\thinkphp5-samplecode\public/../application/index\view\teacher\index.html";i:1467710557;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<title>教师管理</title>
	<link rel="stylesheet" type="text/css" href="/thinkphp5-samplecode/public/static/bootstrap/css/bootstrap.min.css">
</head>
</head>
<body class="container">
    <div class="row">
        <div class="col-md-12">
         	<hr />
         	<div class="row">
	         	<div class="col-md-8">
	                    <form class="form-inline" action="<?php echo url(); ?>">
	                        <div class="form-group">
	                            <label class="sr-only" for="name">姓名</label>
	                            <input name="name" type="text" class="form-control" placeholder="姓名...">
	                        </div>
	                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>&nbsp;查询</button>
	                    </form>
	            </div>
	            <div class="col-md-4 text-right">
            	<a href="<?php echo url('add'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;增加</a>
            	</div>
            </div>
            <hr />
            <table class="table table-hover table-bordered">
			<tr class="info">
				<th>序号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>用户名</th>
				<th>邮箱</th>
				<th>操作</th>
			</tr>
			<?php if(is_array($teachers) || $teachers instanceof \think\Collection): $key = 0; $__LIST__ = $teachers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teacher): $mod = ($key % 2 );++$key;?>
			<tr>
				<td><?php echo $key; ?></td>
				<td><?php echo $teacher->getData("name"); ?></td>
				<td><?php if($teacher->getData("sex") == '0'): ?>男<?php else: ?>女<?php endif; ?></td>
				<td><?php echo $teacher->getData("username"); ?></td>
				<td><?php echo $teacher->getData("email"); ?></td>
				<td>
					<a href="<?php echo url('edit?id=' . $teacher->getData('id')); ?>">编辑</a>&nbsp;&nbsp;
					<a href="<?php echo url('delete?id=' . $teacher->getData('id')); ?>">删除</a>
				</td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		    </table>
		    <nav>
                <ul class="pagination">
                    <li>
                        <a href="<?php echo url('?page=1'); ?>" aria-label="Previous">
                            <span aria-hidden="true">&laquo;</span>
                        </a>
                    </li>
                    <li><a href="<?php echo url('?page=1'); ?>">1</a></li>
                    <li><a href="<?php echo url('?page=2'); ?>">2</a></li>
                    <li><a href="<?php echo url('?page=3'); ?>">3</a></li>
                    <li>
                        <a href="<?php echo url('?page=3'); ?>" aria-label="Next">
                            <span aria-hidden="true">&raquo;</span>
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</body>
</html>