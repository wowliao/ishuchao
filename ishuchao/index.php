

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

    <title>书巢</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../bootstrap/css/navbar.css" rel="stylesheet">

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

      <!-- Static navbar -->
      <nav class="navbar navbar-default">
        <div class="container-fluid">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="#">书籍分类</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="guoxue.php">国学</a></li>
              <li><a href="jingguan.php">经管</a></li>
              <li><a href="jujia.php">居家</a></li>
              <li><a href="lishi.php">历史</a></li>
              <li><a href="waiwen.php">外文</a></li>
              <li><a href="wenxue.php">文学</a></li>
              <li><a href="xiaoshuo.php">小说</a></li>
              <li><a href="xuexi.php">学习</a></li>
              <li><a href="yiti.php">艺体</a></li>
              <li><a href="zhengzhi.php">政治</a></li>
              <li><a href="zhexue.php">哲学</a></li>
              <li><a href="zhuanji.php">传记</a></li>
            </ul>
            <ul class="nav navbar-nav navbar-right">
              <li><a href="showbooks.php">显示所有书籍</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">操作<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="addbook.php">添加</a></li>
                  <li><a href="do.php?action=export">导出</a></li>
                  <li><a href="login.html">登录</a></li>
                  <li><a href="login.php?action=logout">注销</a></li>
                </ul>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">关于<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  
                  <li><a href="http://wowliao.com">博客</a></li>
                  <li><a href="http://zhejiangren.club">浙江人</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>



<p>搜索（可模糊查询）</p>
<div class="row">
  <form action="action.php?action=search" method='post'>
        <div class="col-md-8">
          书籍名称或作者
          <div class="row">
            <div class="col-md-6"><input type="text" name="书名" placeholder="书籍名称"></div>
            <div class="col-md-6"><input type="text" name="作者" placeholder="书籍作者"></div>
          </div>
        </div>
        <div class="col-md-4"><input type="submit" value="确定" /></div>
      </form>
      </div>
<hr>

<?php 
  include_once ("conn.php");
  $count1=mysqli_query($conn,"select count(*) from l_books where 类别='国学'");
  $rs1=mysqli_fetch_array($count1);
  $total1=$rs1[0];
  $count2=mysqli_query($conn,"select count(*) from l_books where 类别='经管'");
  $rs2=mysqli_fetch_array($count2);
  $total2=$rs2[0];
  $count3=mysqli_query($conn,"select count(*) from l_books where 类别='居家'");
  $rs3=mysqli_fetch_array($count3);
  $total3=$rs3[0];
  $count4=mysqli_query($conn,"select count(*) from l_books where 类别='历史'");
  $rs4=mysqli_fetch_array($count4);
  $total4=$rs4[0];
  $count5=mysqli_query($conn,"select count(*) from l_books where 类别='外文'");
  $rs5=mysqli_fetch_array($count5);
  $total5=$rs5[0];
  $count6=mysqli_query($conn,"select count(*) from l_books where 类别='文学'");
  $rs6=mysqli_fetch_array($count6);
  $total6=$rs6[0];
  $count7=mysqli_query($conn,"select count(*) from l_books where 类别='小说'");
  $rs7=mysqli_fetch_array($count7);
  $total7=$rs7[0];
  $count8=mysqli_query($conn,"select count(*) from l_books where 类别='学习'");
  $rs8=mysqli_fetch_array($count8);
  $total8=$rs8[0];
  $count9=mysqli_query($conn,"select count(*) from l_books where 类别='艺体'");
  $rs9=mysqli_fetch_array($count9);
  $total9=$rs9[0];
  $count10=mysqli_query($conn,"select count(*) from l_books where 类别='政治'");
  $rs10=mysqli_fetch_array($count10);
  $total10=$rs10[0];
  $count11=mysqli_query($conn,"select count(*) from l_books where 类别='哲学'");
  $rs11=mysqli_fetch_array($count11);
  $total11=$rs11[0];
  $count12=mysqli_query($conn,"select count(*) from l_books where 类别='传记'");
  $rs12=mysqli_fetch_array($count12);
  $total12=$rs12[0];
  
  $countall=mysqli_query($conn,"select count(*) from l_books");
  $rsall=mysqli_fetch_array($countall);
  $totalall=$rsall[0];
?>
<div class="table-responsive">
<table class="table table-bordered">
  <caption>书籍数量（单位：本）</caption>
  <tbody>
  <tr>
    <td>国学</td><td><?php echo $total1;?></td>
    <td>经管</td><td><?php echo $total2;?></td>
    <td>居家</td><td><?php echo $total3;?></td>
    
  </tr>
  <tr>
    <td>历史</td><td><?php echo $total4;?></td>
    <td>外文</td><td><?php echo $total5;?></td>
    <td>文学</td><td><?php echo $total6;?></td>
    
  </tr>
  <tr>
    <td>小说</td><td><?php echo $total7;?></td>
    <td>学习</td><td><?php echo $total8;?></td>
    <td>艺体</td><td><?php echo $total9;?></td>
    
  </tr>
  <tr>
    <td>政治</td><td><?php echo $total10;?></td>
    <td>哲学</td><td><?php echo $total11;?></td>
    <td>传记</td><td><?php echo $total12;?></td>
  </tr>
  <tr>
    <td align="center" colspan="3">汇总</td><td align="center" colspan="3"><?php echo $totalall;?></td>
  </tr>
  </tbody>
</table>
</div>
    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
  </body>

</html>


