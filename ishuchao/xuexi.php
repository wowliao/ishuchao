
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

    <title>学习</title>

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
              <a class="navbar-brand" href="xuexi.php">学习目录</a>
            </div>
            <div id="navbar" class="navbar-collapse collapse">
              <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">首页</a></li>
              <li><a href="addbook.php">添加</a></li>
              <li><a href="login.html">登录</a></li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">其他<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="guoxue.php">国学</a></li>
                  <li><a href="jingguan.php">经管</a></li>
                  <li><a href="jujia.php">居家</a></li>
                  <li><a href="lishi.php">历史</a></li>
                  <li><a href="waiwen.php">外文</a></li>
                  <li><a href="wenxue.php">文学</a></li>
                  <li><a href="xiaoshuo.php">小说</a></li>
                  <li><a href="yiti.php">艺体</a></li>
                  <li><a href="zhengzhi.php">政治</a></li>
                  <li><a href="zhexue.php">哲学</a></li>
                  <li><a href="zhuanji.php">传记</a></li>
                </ul>
              </li>
              </ul>
              <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">关于<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="do.php?action=export">导出</a></li>
                  <li><a href="http://wowliao.com">博客</a></li>
                  <li><a href="http://zhejiangren.club">关于</a></li>
                </ul>
              </li>
              </ul>
            </div><!--/.nav-collapse -->
          </div><!--/.container-fluid -->
        </nav>



    <div class="row">
      <form action="action.php?action=query" method='post'>
      <div class="col-md-8">
          <select name="前提">
                    <option value="书名">书名</option>
                    <option value="作者">作者</option>
                </select>
        <div class="row">
            <!--
            <div class="col-md-6"><input type="text" name="条件" size='30' placeholder="请不要多字、少字或输入错别字！" required="" onfocus="javascript:if(this.value=='请不要多字、少字或输入错别字！')this.value='';" />
          </div>
        -->
          <div class="col-md-6"><input type="text" name="条件" size='30' placeholder="请不要多字、少字或输入错别字！" required autofocus />
          </div>
        </div>
      </div>
      <div class="col-md-4"><input type="submit" value="查询" />
      </div>
      </form>
    </div>

<hr>

<div class="table-responsive">
  <table class="table">
    <thead>
      <tr>
        <th>书名</th>
        <th>状态</th>
        <th>点击量</th>
        <th>操作</th>
      </tr>
    </thead>
    <tbody>
      <?php
include_once ("conn.php"); //连接数据库 
$sql="set names utf8";
mysqli_query($conn,$sql);//运行sql,把结果保存在变量$rs
$perNumber=25;//每页显示的记录数
$page=$_GET['page'];//获取当前的页面值
//print_r($page);
$count=mysqli_query($conn,"select count(*) from l_books where 类别='学习'");//获得记录总数
$rs=mysqli_fetch_array($count);
$totalNumber=$rs[0];
$totalPage=ceil($totalNumber/$perNumber);//计算出总页数
//print_r($totalPage);
if (!isset($page)) {
    $page=1;
}//如果没有值，则赋值1
//print_r($page);
$startCount=($page-1)*$perNumber;//分页开始，根据此方法计算出开始的记录
//print_r($startCount);
//查询数据
$sql="select * from l_books where 类别='学习' limit $startCount,$perNumber ";//根据前面的计算出开始的记录和记录数
$rs=mysqli_query($conn,$sql);
$recordcount=mysqli_num_rows($rs);//得到sql运行返回的行数
//print_r($recordcount);

if ($recordcount>0) //如果有返回行
{
    
    //遍历每一行
    
    while ($row=mysqli_fetch_array($rs)) //得到一行
    {   
        echo "<tr>";
        echo "<td>";
        echo "<a href='showbook.php?id=".$row['id']."'>";
        echo $row['书名'];
        echo "</td>";
        echo "<td>";
        echo $row['状态'];
        echo "</td>";
        echo "<td>";
        echo $row['点击量'];
        echo "</td>";
        echo "<td>";
        ?>
        <a href="editbook.php?id=<?php echo $row['id'];?>">修改</a>
        <?php
        echo "</td>";
        echo "</tr>";
        
    }
    
}
else
{
    echo "<tr><td colspan='4' align='center'>";
    echo "暂无";
    echo "</td></tr>";
}
mysqli_close($conn);

?>
    </tbody>
  </table>
</div>
<center>
<a href="xuexi.php">第一页</a>
<?php 
include_once ("page.php");
?>
<a href="xuexi.php?page=<?php echo $pre;?>">上一页</a>
<?php
for($i=$start;$i<=$end;$i++){
    ?>
    <a href="xuexi.php?page=<?php echo $i;?>"><?php echo $i;?></a>
<?php
}
?>
<a href="xuexi.php?page=<?php echo $next;?>">下一页</a>
当前第<font color="red"><?php echo $page;?></font>页，共<?php echo $totalPage;?>页
</center>
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


