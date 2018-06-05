<?php

        session_start();  
      
    //检测是否登录，若没登录则转向登录界面  
    if(!isset($_SESSION['userid'])){  
      echo '<script>alert("未登录！");window.location.href=document.referrer;</script> ';
      #header("Location: login.html");
    }  else{
      include_once ("conn.php"); //连接数据库 
$sql="set names utf8";
mysqli_query($conn,$sql);
$id=$_GET['id'];
$sql="select * from l_books where id=$id";
$query=mysqli_query($conn,$sql);
$rs = mysqli_fetch_assoc($query);
?>
<!DOCTYPE html>
<html lang="zh-CN">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- 上述3个meta标签*必须*放在最前面，任何其他内容都*必须*跟随其后！ -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">

    <title>修改</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug 
    <link href="../../assets/css/ie10-viewport-bug-workaround.css" rel="stylesheet">-->

    <!-- Custom styles for this template -->
    <link href="../../bootstrap/css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../assets/js/ie8-responsive-file-warning.js"></script><![endif]-->
    <script src="../../bootstrap/js/ie-emulation-modes-warning.js"></script>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!--[if lt IE 9]>
      <script src="https://cdn.bootcss.com/html5shiv/3.7.3/html5shiv.min.js"></script>
      <script src="https://cdn.bootcss.com/respond.js/1.4.2/respond.min.js"></script>
    <![endif]-->
  </head>
<body>



<div class="container">
      <div class="header clearfix">
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="index.php">首页</a></li>
            <li role="presentation"><a href="javascript:history.back(-1);">返回</a></li>
          </ul>
        </nav>
      </div>
      <hr>

<div class="jumbotron">
  <p class="lead">
<div class="table-responsive">
<form action="action.php?action=edit" method="post">
    <input type="hidden" name="id" value="<?php echo $rs['id']?>"/>
    <table class="table table-bordered" align="center">
       <tr>
        <td>书名</td>
        <td> <input type="text" style="border-style:none" name="书名" size="100" value=<?php echo $rs['书名'] ?> /></td>
       </tr>
       <tr>
        <td>封面</td>
        <td> <input type="text" style="border-style:none" name="封面" size="100" value=<?php echo $rs['封面'] ?> /></td>
       </tr>
       <tr>
        <td>作者</td>
        <td> <input type="text" style="border-style:none" name="作者" size="100" value=<?php echo $rs['作者'] ?> /></td>
       </tr>
       <tr>
        <td>类别</td>
        <td> <input type="text" style="border-style:none" name="类别" size="100" value=<?php echo $rs['类别'] ?> /></td>
       </tr>
       <tr>
        <td>状态</td>
        <td> <input type="text" style="border-style:none" name="状态" size="100" value=<?php echo $rs['状态'] ?> style="border-style:none"/></td>
       </tr>
       <tr>
        <td>格式</td>
        <td> <input type="text" style="border-style:none" name="格式" size="100" value=<?php echo $rs['格式'] ?> style="border-style:none"/></td>
       </tr>
       <tr>
        <td>备注</td>
        <td> <input type="text" style="border-style:none" name="备注" size="100" value=<?php echo $rs['备注'] ?> /></td>
       </tr>
        
       <tr>
           <td colspan="2" align="center"><input type="submit" value="确定修改" /></td>
       </tr>
       </table>
       </form>
</div>
</div>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<?php
}
?>