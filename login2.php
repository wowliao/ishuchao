

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

    <title>登录</title>

    <!-- Bootstrap core CSS -->
    <link href="https://cdn.bootcss.com/bootstrap/3.3.7/css/bootstrap.min.css" rel="stylesheet">

    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <link href="../../bootstrap/css/ie10-viewport-bug-workaround.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="../../bootstrap/css/navbar.css" rel="stylesheet">
    <link href="../../bootstrap/css/signin.css" rel="stylesheet">

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
            <a class="navbar-brand" href="#">欢迎访问</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">首页</a></li>
              <li><a href="login.php?action=logout">注销</a></li>
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
              <li><a href="xuexi.php">学习</a></li>
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
                  
                  <li><a href="http://wowliao.com">博客</a></li>
                  <li><a href="http://zhejiangren.club">浙江人</a></li>
                </ul>
              </li>
            </ul>
          </div><!--/.nav-collapse -->
        </div><!--/.container-fluid -->
      </nav>


<form class="form-signin" action="login.php" method="post" onSubmit="return InputCheck(this)">
        <h2 class="form-signin-heading">Please sign in</h2>
        <label for="username" class="sr-only">username</label>
        <br>
        <input type="type" name="username" id="username" class="form-control" placeholder="username" required autofocus>
        <br>
        <label for="password" class="sr-only">password</label>
        <input type="password" name="password" id="password" class="form-control" placeholder="password" required>
        <br>
        <input type="submit" class="btn btn-lg btn-primary btn-block" name="submit"  value="Sign in">
      </form>




    </div> <!-- /container -->


    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://cdn.bootcss.com/jquery/1.12.4/jquery.min.js"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery.min.js"><\/script>')</script>
    <script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../bootstrap/js/ie10-viewport-bug-workaround.js"></script>
<?php  
    //登录  
    if(isset($_POST['submit'])){  
          
    $username = htmlspecialchars($_POST['username']);  
    #$password = $_POST['password'];
    $password = htmlspecialchars($_POST['password']);
    //包含数据库连接文件  
    include('conn.php');  
    //检测用户名及密码是否正确  
    $sql="select userid from user_list where username='$username' and password='$password' limit 1"; 
    $check_query=mysqli_query($conn,$sql);
    if($result = mysqli_fetch_array($check_query))
    {
      //登录成功  
        session_start();  

        $_SESSION['username'] = $username;  
        
        $_SESSION['userid'] = $result['userid'];  
        echo '<script>alert("登录成功！"); window.location.href=document.referrer;</script>';
        #echo $username,' 欢迎你！进入 <a href="index.php">首页</a><br />';  
        #echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';  
        exit;  
    } else {  
        exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');  
    } 
    }
    //注销登录  
    if($_GET['action'] == "logout"){  
        unset($_SESSION['userid']);  
        unset($_SESSION['username']);  
        

        echo '注销登录成功！点击此处 <a href="login.html">登录</a>';  
        #echo '<script>alert("注销成功！");window.location.href=document.referrer;;</script>';
        exit;  
    }  
      
    ?>

  </body>

</html>


