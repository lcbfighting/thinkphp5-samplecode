<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:84:"D:\xampp\htdocs\thinkphp5-samplecode\public/../application/index\view\klass\add.html";i:1468495029;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>添加</title>
</head>
<body>
    <form action="<?php echo url('save'); ?>" method="post">
        <label for="name">name:</label><input type="text" name="name" id="name" />
        <label for="teacher">teacher:</label>
			<select name="teacher_id" id="teacher">
			<?php if(is_array($teachers) || $teachers instanceof \think\Collection): $i = 0; $__LIST__ = $teachers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teacher): $mod = ($i % 2 );++$i;?>
			<option value='<?php echo $teacher->getData('id'); ?>'><?php echo $teacher->getData('name'); ?></option>
			<?php endforeach; endif; else: echo "" ;endif; ?>
			</select>
        <button type="submit">submit</button>
    </form>
</body>
</html>