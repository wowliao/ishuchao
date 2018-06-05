<?php
        session_start();  
      
    //检测是否登录，若没登录则转向登录界面  
    if(!isset($_SESSION['userid'])){  
      echo '<script>alert("未登录！"); window.location.href=document.referrer;</script>';
    }  else{
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

    <title>添加书籍</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    

    <!-- Custom styles for this template -->
    <link href="../../bootstrap/css/jumbotron-narrow.css" rel="stylesheet">

    <!-- Just for debugging purposes. Don't actually copy these 2 lines! -->
    <!--[if lt IE 9]><script src="../../bootstrap/js/ie8-responsive-file-warning.js"></script><![endif]-->
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
            <li role="presentation"><a href="do.php?action=export">导出</a></li>
          </ul>
        </nav>
        <h3 class="text-muted">添加书籍</h3>
      </div>

      <div class="jumbotron">
        <h1>快速添加</h1>
        <p class="lead">
          <form role="form" id="addform" action="do.php?action=import" method="post" enctype="multipart/form-data">
      <div class="form-group">
        <label for="inputfile">请选择要导入的文件（xls）：</label>
        <input type="file" id="inputfile" name="file">
        <input type="submit" class="btn" value="导入"">
       
      </div>
    </form>
        </p>
        
      </div>

     <div class="table-responsive">
<form action="action.php?action=add" method='post'>

<table class="table table-bordered">
    <tr>
    <td align="center">书名：</td><td><input type="text" name="书名" placeholder="书籍名称，不能为空" required autofocus style="border-style:none"/></td>
    </tr><tr>
    <tr>
    <td align="center">封面：</td><td><input type="text" name="封面" value="封面01.png" style="border-style:none"/></td>
    </tr>
    <tr>
    <td align="center">作者：</td><td><input type="text" name="作者" style="border-style:none"/></td>
    </tr>
    <td align="center">类别：</td><td><input type="text" name="类别" style="border-style:none"/></td>
    </tr><tr>
    <td align="center">状态：</td><td><input type="text" name="状态" style="border-style:none"/></td>
    </tr><tr>
    <tr>
    <td align="center">格式：</td><td><input type="text" name="格式" style="border-style:none"/></td>
    </tr>
    <td align="center">备注：</td><td><input type="text" name="备注" style="border-style:none"/></td>
    </tr>
    <tr>
    </td><td align="center" colspan="2"><input type="submit" value="添加" /></td>
    </tr>
</table>
</form>

</div>

      <footer class="footer">
        <p>Cover template for <a href="http://zhejiangren.club">zhejiangren</a>, by <a href="http://wowliao.com">@wowliao</a>.</p>
      </footer>

    </div> <!-- /container -->


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>
</html>
<?php
}
?>
