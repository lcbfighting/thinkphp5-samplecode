<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"D:\xampp\htdocs\thinkphp5-samplecode\public/../application/index\view\klass\index.html";i:1469230381;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">

<head>
    <meta charset="UTF-8">
    <title>班级管理</title>
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
                    <a href="<?php echo url('add'); ?>" class="btn btn-primary"><i class="glyphicon glyphicon-plus"></i>&nbsp;增加</a>
                </div>
            </div>
            <hr />
            <table class="table table-hover table-bordered">
                <tr class="info">
                    <th>序号</th>
                    <th>名称</th>
                    <th>辅导员</th>
                    <th>操作</th>
                </tr>
                <?php if(is_array($klasses) || $klasses instanceof \think\Collection): $key = 0; $__LIST__ = $klasses;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$klass): $mod = ($key % 2 );++$key;?>
                <tr>
                    <td><?php echo $key; ?></td>
                    <td><?php echo $klass->getData('name'); ?></td>
                    <td><?php echo $klass->getTeacher->getData('name'); ?></td>
                    <td><a class="btn btn-danger btn-sm" href="<?php echo url('delete?id=' . $klass->getData('id')); ?>"><i class="glyphicon glyphicon-trash"></i>&nbsp;删除</a>&nbsp;<a class="btn btn-sm btn-primary" href="<?php echo url('edit?id=' . $klass->getData('id')); ?>"><i class="glyphicon glyphicon-pencil"></i>&nbsp;编辑</a></td>
                </tr>
                <?php endforeach; endif; else: echo "" ;endif; ?>
            </table>
            <?php echo $klasses->render(); ?>
        </div>
    </div>
</body>

</html>