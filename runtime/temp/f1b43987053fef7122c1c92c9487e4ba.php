<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"D:\xampp\htdocs\thinkphp5-samplecode\public/../application/index\view\teacher\add.html";i:1467597706;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <title>添加数据</title>
</head>
<body class="container">
    <div class="row">
        <div class="col-md-12">
            <form action="<?php echo url('insert'); ?>" method="post">
                <label>姓名：</label>
                <input type="text" name="name" /> 
                <label>性别：</label>
                <select name="sex">
                   <option value="0">男</option> 
                   <option value="1">女</option>
                </select>
                <label>用户名：</label>
                <input type="text" name="username" />
                <label>邮箱：</label>
                <input type="email" name="email" />
                <button type="submit">保存</button>
            </form>
        </div>
    </div> 
</body>
</html>