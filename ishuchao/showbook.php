
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

    <title>书籍详情</title>

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
            <li role="presentation" ><a href="index.php">首页</a></li>
            <li role="presentation" class="active"><a href="javascript:history.back(-1);">返回</a></li>
          </ul>
        </nav>
      </div>
      <hr>

<div class="jumbotron">
  <p class="lead">
<div class="table-responsive">

    <input type="hidden" name="id" value="<?php echo $rs['id']?>"/>
    <table class="table table-bordered" align="center">
    <?
    $id=$_GET['id'];
    include_once ("conn.php"); 
//设定字符集
$sql="set names utf8";
//mysql_query($sql);//运行sql,把结果保存在变量$rs
//记录点击次数
$sql="update l_books set 点击量=点击量+1 where id=".$id;
$rs=mysqli_query($conn,$sql);
//查询数据
$sql="select * from l_books where id=".$id;
$rs=mysqli_query($conn,$sql);//运行sql,把结果保存在变量$rs
if (!$rs) {//如果运行不成功
  //关闭数据库
  mysqli_close($conn);
  //显示出错信息，程序到此为止，不往下执行
  die("查询数据失败");
}
$recordcount=mysqli_num_rows($rs);//得到sql运行返回的行数
if ($recordcount>0) //如果有返回行
{
  
  //遍历每一行
  while ($row=mysqli_fetch_array($rs)) //得到一行
  {
    echo "<tr>";
    echo "<td>";
    echo "书名";
    echo "</td>";
    echo "<td colspan='4' align='center'>";
    echo $row['书名'];
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "封面";
    echo "</td>";
    echo "<td>";
        echo "<img src='封面/".$row['封面']."'>";
        echo "</td>";
        echo "</tr>";
        echo "<tr>";
    echo "<td>";
    echo "作者";
    echo "</td>";
    echo "<td>";
        echo $row['作者'];
    echo "</td>";
    echo "</tr>";

    echo "<tr>";
    echo "<td>";
    echo "类别";
    echo "</td>";
    echo "<td>";
        echo $row['类别'];
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "状态";
    echo "</td>";
    echo "<td>";
        echo $row['状态'];
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "格式";
    echo "</td>";
    echo "<td>";
        echo $row['格式'];
    echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<td>";
    echo "备注";
    echo "</td>";
    echo "<td>";
        echo $row['备注'];
        echo "</td>";
    echo "</tr>";
    echo "<tr>";
    echo "<tr>";
$type=$row['类别']; 
$sql="select 备注 from l_feilei where 类别='$type'";
//print_r($sql);
$result=mysqli_query($conn,$sql);//运行sql,把结果保存在变量$rs
$dizhi=mysqli_fetch_array($result);
//echo "$dizhi[0]";
?>
      
      
<?php
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
    </table>
  
</div>
</div>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
