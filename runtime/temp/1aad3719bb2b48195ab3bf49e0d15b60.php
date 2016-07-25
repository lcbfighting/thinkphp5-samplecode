<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\xampp\htdocs\thinkphp5-samplecode\public/../application/index\view\course\index.html";i:1469337550;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
	<meta charset="UTF-8">
	<title>课程管理</title>
	<link rel="stylesheet" type="text/css" href="/thinkphp5-samplecode/public/static/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <form action="<?php echo url('save'); ?>" method="post">
        <label for="username">name:</label><input type="text" name="username" id="username" />
        <button type="submit">submit</button>
    </form>
</body>
</html>