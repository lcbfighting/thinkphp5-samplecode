<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\xampp\htdocs\thinkphp5-samplecode\public/../application/index\view\course\index.html";i:1470119002;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>课程管理</title>
	<link rel="stylesheet" type="text/css" href="/thinkphp5-samplecode/public/static/bootstrap/css/bootstrap.min.css">
</head>
<body class="container">
    <div class="row">
        <div class="col-md-12">
            <hr />
            <div class="row">
                <div class="col-md-8">
                    <form class="form-inline" action="<?php echo url('', input('get.')); ?>">
                        <div class="form-group">
                            <label class="sr-only" for="name">名称</label>
                            <input name="name" type="text" class="form-control" placeholder="名称..." value=<?php echo input('get.name'); ?>>
                        </div>
                        <button type="submit" class="btn btn-default"><i class="glyphicon glyphicon-search"></i>&nbsp;查询</button>
                    </form>
                </div>
                <div class="col-md-4 text-right">
                    <a href="<?php echo url('add'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;新增课程</a>
                </div>
            </div>
            <hr />
            <table class="table table-hover table-bordered">
                <tr class="info">
                    <th>序号</th>
                    <th>名称</th>
                    <th>操作</th>
                </tr>
                {volist name="courses" id="course" key="key"}
                <tr>
                <td><?php echo $key; ?></td>
                <td><?php echo $course->getData('name'); ?></td>
                <td>
					<a href="<?php echo url('edit?id=' . $course->getData('id')); ?>"><button type="button" class="btn btn-primary">编辑</button></a>&nbsp;&nbsp;
				</td>
                </tr>
            </table>
        </div>
    </div>
</body>
</html>