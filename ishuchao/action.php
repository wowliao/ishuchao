<?php
include_once ("conn.php"); //连接数据库 
$action = $_GET['action']; 
if ($action == 'add')
{ 
    $书名=$_POST["书名"];
    $作者=$_POST["作者"];
    $封面=$_POST["封面"];
    $类别 = $_POST['类别'];
    $状态 = $_POST['状态'];
    $格式=$_POST["格式"];
    $备注 = $_POST['备注'];
    
    $data_values .= "('$书名','$作者','$封面','$类别','$状态','$格式','$备注'),"; 

    $sql="set names utf8";
  
    $data_values = substr($data_values,0,-1); //去掉最后一个逗号

    $sql="insert into l_books(书名,作者,封面,类别,状态,格式,备注) VALUES $data_values";
    $que = mysqli_query($conn,$sql);
    
    if(!$que)
    {
        mysqli_close($conn);
        die("保存失败，请稍后再试");
    }
    #echo $书名;
    $sql="select * from l_books where 书名='$书名'";
    #echo $sql;
    $query=mysqli_query($conn,$sql);
    $recordcount=mysqli_num_rows($query);//得到sql运行返回的行数
    if ($recordcount>0) //如果有返回行
    {
    //遍历每一行
        while ($row=mysqli_fetch_array($query)) //得到一行
        {
            //echo $row['id'];
            //echo "<a href='showbook.php?id=".$row['id']."'>";
            echo '<script>alert("添加成功！"); window.location.href=history.back(-1); </script>';
        }   
    }
    else
    {
        echo "error";
    }      
    mysqli_close($conn);
    
    
}elseif($action=='query')
{
    $前提=$_POST["前提"];
    $条件=$_POST["条件"];
    $sql="set names utf8";
    if ($前提=='书名') {
        $sql="select * from l_books where 书名='$条件' ";
   		 $query=mysqli_query($conn,$sql);
   		
    }elseif($前提=='作者')
    {
        $sql="select * from l_books where 作者='$条件' ";
    	$query=mysqli_query($conn,$sql);
    }else
    {
    	echo '<script>alert("不能为空！"); window.location.href=history.back(-1); </script>';
    }
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

    <title>查询</title>

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
      <!--<div class="header clearfix">-->
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="index.php">首页</a></li>
            <li role="presentation"><a href="javascript:history.back(-1);">返回</a></li>
          </ul>
        </nav>
      </div>
      <hr>


<div class="table-responsive">

 	<table class="table table-bordered" align="center">
 
    <tr><td>书名</td><td>作者</td><td>封面</td><td>类别</td><td>状态</td><td>点击量</td><td>格式</td><td>备注</td><td>修改</td></tr>
    


<?php

    $recordcount=mysqli_num_rows($query);//得到sql运行返回的行数

    if ($recordcount>0) //如果有返回行
    {
    //遍历每一行
        while ($row=mysqli_fetch_array($query)) //得到一行
        {   
            echo "<tr>";
            echo "<td>";
            echo "<a href='showbook.php?id=".$row['id']."'>";
            echo $row['书名'];
            echo "</td>";
                echo "<td>";
                echo $row['作者'];
                echo "</td>";
                echo "<td>";
                echo $row['封面'];
                echo "</td>";
                echo "<td>";
                echo $row['类别'];
                echo "</td>";
                echo "<td>";
                echo $row['状态'];
                echo "</td>";
                echo "<td>";
                echo $row['点击量'];
                echo "</td>";
                echo "<td>";
                echo $row['格式'];
                echo "</td>";
                echo "<td>";
                echo $row['备注'];
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
</table></div>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<?php
}elseif($action=='search')
{
    $书名=$_POST["书名"];
    $作者=$_POST["作者"];
    if ($书名!=''&$作者=='') {
    	$sql="set names utf8";
    	$sql="select * from l_books where 书名 like '%$书名%'";
    	$query=mysqli_query($conn,$sql);
    }elseif ($书名==''&$作者!='') {
    	$sql="set names utf8";
    	$sql="select * from l_books where 作者 like '%$作者%'";
    	$query=mysqli_query($conn,$sql);
    }elseif ($书名!=''&$作者!='') {
    	$sql="set names utf8";
    	$sql="select * from l_books where 书名 like '%$书名%' and 作者 like '%$作者%'";
    	$query=mysqli_query($conn,$sql);
    }else
    {
    	echo '<script>alert("不能为空！"); window.location.href=history.back(-1); </script>';
    }
    
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

    <title>搜索</title>

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
     
        <nav>
          <ul class="nav nav-pills pull-right">
            <li role="presentation" class="active"><a href="index.php">首页</a></li>
            <li role="presentation"><a href="javascript:history.back(-1);">返回</a></li>
          </ul>
        </nav>
      </div>
      <hr>

<div class="jumbotron">

<div class="table-responsive">

 	<table class="table table-bordered" align="center">
    
    <tr><td>书名</td><td>作者</td><td>封面</td><td>类别</td><td>状态</td><td>点击量</td><td>格式</td><td>备注</td></tr>

    
<?php

    $recordcount=mysqli_num_rows($query);//得到sql运行返回的行数
    if ($recordcount>0) //如果有返回行
    {
        while ($row=mysqli_fetch_array($query)) //得到一行
        {   
            echo "<tr>";
            echo "<td>";
            echo "<a href='showbook.php?id=".$row['id']."'>";
        echo $row['书名'];
        echo "</td>";
        echo "<td>";
        echo $row['作者'];
        echo "</td>";
        echo "<td>";
        echo $row['封面'];
        echo "</td>";
        echo "<td>";
        echo $row['类别'];
        echo "</td>";
        echo "<td>";
        echo $row['状态'];
        echo "</td>";
        echo "<td>";
        echo $row['点击量'];
        echo "</td>";
        echo "<td>";
        echo $row['格式'];
        echo "</td>";
        echo "<td>";
        echo $row['备注'];
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
</table></div></div></div>
  <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
</body>
</html>
<?php

}elseif($action=='edit')
{
    $id=$_POST['id'];
    $书名=$_POST["书名"];
    $作者=$_POST["作者"];
    $封面=$_POST["封面"];
    $类别 = $_POST['类别'];
    $状态 = $_POST['状态'];
    $格式=$_POST["格式"];
    $备注 = $_POST['备注'];

    $sql="update l_books set 书名='$书名',作者='$作者',封面='$封面',类别='$类别',状态='$状态',格式='$格式',备注='$备注' where id='$id'";
    $query = mysqli_query($conn,$sql); 
    
    if(!$query)
    {
        mysqli_close($conn);
        die("修改失败，请稍后再试");
    }
    mysqli_close($conn);
    header("location:showbook.php?id='$id'");
}
?>
