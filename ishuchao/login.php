    <?php  
    //登录  
    #if(!isset($_POST['submit'])){  
        #exit('非法访问!');  
    #}
    if(isset($_POST['submit'])){
    $username = htmlspecialchars($_POST['username']);  
    $password = $_POST['password'];  
    //包含数据库连接文件  
    include('conn.php');  
    //检测用户名及密码是否正确  
    $sql="select userid from user_list where username='$username' and password='$password' limit 1"; 
    $check_query=mysqli_query($conn,$sql);
 
    $result = mysqli_fetch_array($check_query);
    
    if($result >0){  
        //登录成功  
        session_start();  
        $_SESSION['username'] = $username;  
        
        $_SESSION['userid'] = $result['userid'];  
        echo '<script>alert("登录成功！"); window.location.href=document.referrer;</script>';
        #echo $username,' 欢迎你！进入 <a href="my.php">首页</a><br />';  
        #echo '点击此处 <a href="login.php?action=logout">注销</a> 登录！<br />';  
        exit;  
    } else {  
        exit('登录失败！点击此处 <a href="javascript:history.back(-1);">返回</a> 重试');  
    }  
    } 
      
      
    //注销登录  
    #if($_GET['action'] == "logout" && isset($_SESSION['userid'])){
    if($_GET['action'] == "logout"){  
        unset($_SESSION['userid']);  
        unset($_SESSION['username']);  
        #session_destroy();

        #echo '注销登录成功！点击此处 <a href="login.html">登录</a>';  
        echo '<script>alert("注销成功！");location.href="login.html";</script>';
        exit;  
    }  
      
    ?>  