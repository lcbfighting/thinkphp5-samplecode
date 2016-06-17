<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:88:"D:\xampp\htdocs\thinkphp5-samplecode\public/../application/index\view\teacher\index.html";i:1466179645;}*/ ?>
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
            <table class="table table-hover table-bordered">
			<tr class="info">
				<th>序号</th>
				<th>姓名</th>
				<th>性别</th>
				<th>用户名</th>
				<th>邮箱</th>
			</tr>
			<?php if(is_array($teachers) || $teachers instanceof \think\Collection): $i = 0; $__LIST__ = $teachers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teacher): $mod = ($i % 2 );++$i;?>
			<tr>
				<td><?php echo $key; ?></td>
				<td><?php echo $teacher->getData("name"); ?></td>
				<td><?php if($teacher->getData("sex") == '0'): ?>男<?php else: ?>女<?php endif; ?></td>
				<td><?php echo $teacher->getData("username"); ?></td>
				<td><?php echo $teacher->getData("email"); ?></td>
			</tr>
			<?php endforeach; endif; else: echo "" ;endif; ?>
		 </table>
        </div>
    </div>
</body>
</html>