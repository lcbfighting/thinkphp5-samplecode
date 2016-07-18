<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:85:"D:\xampp\htdocs\thinkphp5-samplecode\public/../application/index\view\klass\edit.html";i:1468809764;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>编辑</title>
</head>
<body>
	<form action="<?php echo url('update'); ?>" method="post">
        <input type="hidden" name="id" value="<?php echo $Klass->getData('id'); ?>" />
        <label for="name">name:</label>
        <input type="text" name="name" id="name" value="<?php echo $Klass->getData('name'); ?>" />
        <label for="teacher">teacher:</label>
        <select name="teacher_id" id="teacher">
           <?php if(is_array($teachers) || $teachers instanceof \think\Collection): $i = 0; $__LIST__ = $teachers;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$teacher): $mod = ($i % 2 );++$i;?>
           <option value="<?php echo $teacher->getData('id'); ?>"
            <?php if($teacher->getData('id') == $Klass->getData('teacher_id')): ?> selected="selected"<?php endif; ?>><?php echo $teacher->getData('name'); ?></option>
           <?php endforeach; endif; else: echo "" ;endif; ?>
        </select>
        <button type="submit">submit</button>
    </form>
</body>
</html>