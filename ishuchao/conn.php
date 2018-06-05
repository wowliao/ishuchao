<?php
$conn=mysqli_connect('mysql.hostinger.com.hk','u802617760_root','930411');
if (!$conn) {
    die('数据库连接失败');
}

$result=mysqli_select_db($conn,'u802617760_book');

if (!$result) {
    die('指定数据库失败');
}

mysqli_query($conn,"set names utf8");

?>