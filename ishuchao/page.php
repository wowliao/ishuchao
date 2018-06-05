<?php
if($page<1){
    $page=1;
}
if($page>$totalPage){
    $page=$totalPage;
}
if($totalPage<10){
    $start=1;
    $end=$totalPage;
}else{

    
if($page<10){
    $start=1;
    $end=9;
}elseif($page>=10&&$page<($totalPage-8)){
    $start=$page-4;
    $end=$page+4;
}elseif($page>=($totalPage-8)){
    $start=$totalPage-8;
    $end=$totalPage;
}
}
$pre=$page-1;
if($pre==0){
    $pre=1;
}
$next=$page+1;
?>

