<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:87:"D:\xampp\htdocs\thinkphp5-samplecode\public/../application/index\view\teacher\edit.html";i:1467771367;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <title>编辑数据</title>
    <link rel="stylesheet" type="text/css" href="/thinkphp5-samplecode/public/static/bootstrap/css/bootstrap.min.css">
</head>

<body class="contanier">
    <div class="row">
        <hr />
        <div class="col-md-12">
            <form action="<?php echo url('update'); ?>" method="post" class="form-inline">
            <div class="form-group">
                <label for="exampleInputName2">姓名:</label>
                <input type="hidden" name="id" value="<?php echo $teacher->getData('id'); ?>" />
                <input type="text" class="form-control" name="name"  value="<?php echo $teacher->getData('name'); ?>" />
                <label>用户名:</label>
                <input type="text" class="form-control" name="username" value="<?php echo $teacher->getData('username'); ?>" />
                <label>性别:</label>
                <select name="sex" class="form-control">
                    <option value="0">男</option>
                    <option value="1" <?php if($teacher->getData('sex') == '1'): ?>selected="selected"<?php endif; ?>>女</option>
                </select>
                <label>邮箱:</label>
                <input type="email"  class="form-control" name="email" value="<?php echo $teacher->getData('email'); ?>" />
                <button type="submit"  class="btn btn-primary">保存</button>
            </div>
            </form>
        </div>
        <hr />
    </div>
</body>

</html>