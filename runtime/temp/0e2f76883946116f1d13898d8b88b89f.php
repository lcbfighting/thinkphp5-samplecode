<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:86:"D:\xampp\htdocs\thinkphp5-samplecode\public/../application/index\view\login\index.html";i:1468199227;}*/ ?>
<!DOCTYPE html>
<html lang="zh-cn">
<head>
    <meta charset="UTF-8">
    <title>login</title>
    <link rel="stylesheet" type="text/css" href="/thinkphp5-samplecode/public/static/bootstrap/css/bootstrap.min.css">
</head>
<body>
    <form action="<?php echo url('login'); ?>" method="post">
        <label for="username">username:</label><input type="text" name="username" id="username" />
        <label for="password">password:</label><input type="password" name="password" id="password" />
        <button type="submit">submit</button>
    </form>
</body>
</html>