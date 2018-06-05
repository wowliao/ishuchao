<?php
header("Content Type:text/html; charset=utf-8");
include_once ("conn.php"); //连接数据库 
$action = $_GET['action']; 
$dir=dirname(__FILE__);
#require "./Classes/PHPExcel.php";
require_once dirname(__FILE__) . '/../Classes/PHPExcel.php';
#require_once '/../Classes/PHPExcel/IOFactory.php';
require_once dirname(__FILE__) . '/../Classes/PHPExcel/IOFactory.php';
require_once dirname(__FILE__) . '/../Classes/PHPExcel/Reader/Excel5.php';
if ($action == 'import') //导入CSV 
{ 
    //导入处理 
    $filename = $_FILES['file']['tmp_name']; 

    if(empty ($filename)) 
    { 
      echo '<script>alert("请选择文件！"); window.location.href=document.referrer; </script>';
      exit; 
    } 

//$objReader=PHPExcel_IOFactory::createReader($filename);
$objPHPExcel=PHPExcel_IOFactory::load($filename);
$objWorksheet = $objPHPExcel->getActiveSheet();//取得总行数
        $highestRow = $objWorksheet->getHighestRow();//取得总行数
 
        //echo 'highestRow='.$highestRow;
$highestColumn=$objWorksheet->getHighestColumn();
$highestColumnIndex=PHPExcel_Cell::columnIndexFromString($highestColumn);//总列数
//echo 'highestColumnIndex='.$highestColumnIndex;
//$headtitle=array();echo '<br/>';
for($row=2;$row<=$highestRow;$row++)
{
  $strs=array();

  for($col=0;$col<$highestColumnIndex;$col++)
  {
    $strs[$col]=$objWorksheet->getCellByColumnAndRow($col,$row)->getValue();
  }
  $sql="insert into l_books(书名,作者,封面,类别,状态,点击量,格式,备注) VALUES ('{$strs[0]}','{$strs[1]}','{$strs[2]}','{$strs[3]}','{$strs[4]}','{$strs[5]}','{$strs[6]}','{$strs[7]}')";
$query=mysqli_query($conn,$sql); //批量插入数据表中 

if(!$query)
    {
mysqli_close($conn);
echo '<script>alert("上传失败"); window.location.href=document.referrer; </script>';
  }
}

mysqli_close($conn);
echo '<script>alert("恭喜您，操作成功！"); window.location.href=document.referrer; </script>';


}elseif($action=='export') //导出CSV 
{ 
 //导出处理 
  $objPHPExcel=new PHPExcel();
  $objPHPExcel->setActiveSheetIndex(0);
  $objSheet=$objPHPExcel->getActiveSheet();
  $data = mysqli_query($conn,"select * from l_books order by id asc"); 
 
  $objSheet->setCellValue("A1","书名")->setCellValue("B1","作者")->setCellValue("C1","封面")->setCellValue("D1","类别")->setCellValue("E1","状态")->setCellValue("F1","点击量")->setCellValue("G1","格式")->setCellValue("H1","备注");
  
  $j=2;
  foreach ($data as $key => $val) {
    $objSheet->setCellValue("A".$j,$val['书名'])->setCellValue("B".$j,$val['作者'])->setCellValue("C".$j,$val['封面'])->setCellValue("D".$j,$val['类别'])->setCellValue("E".$j,$val['状态'])->setCellValue("F".$j,$val['点击量'])->setCellValue("G".$j,$val['格式'])->setCellValue("H".$j,$val['备注']);
    $j++;
  }


header('Content-Type: application/vnd.ms-excel');
             header('Content-Disposition: attachment;filename="'.$name.'.xls"');
             header('Cache-Control: max-age=0');
             $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
             $objWriter->save('php://output');
             exit;
}elseif($action=='exportfl') //导出CSV 
{ 
 //导出处理 
  $objPHPExcel=new PHPExcel();
  $objPHPExcel->setActiveSheetIndex(0);
  $objSheet=$objPHPExcel->getActiveSheet();
  $data = mysqli_query($conn,"select * from l_books where 类别='法律' order by id asc"); 
 
  $objSheet->setCellValue("A1","书名")->setCellValue("B1","作者")->setCellValue("C1","封面")->setCellValue("D1","类别")->setCellValue("E1","状态")->setCellValue("F1","点击量")->setCellValue("G1","格式")->setCellValue("H1","备注");
  
  $j=2;
  foreach ($data as $key => $val) {
    $objSheet->setCellValue("A".$j,$val['书名'])->setCellValue("B".$j,$val['作者'])->setCellValue("C".$j,$val['封面'])->setCellValue("D".$j,$val['类别'])->setCellValue("E".$j,$val['状态'])->setCellValue("F".$j,$val['点击量'])->setCellValue("G".$j,$val['格式'])->setCellValue("H".$j,$val['备注']);
    $j++;
  }


header('Content-Type: application/vnd.ms-excel');
             header('Content-Disposition: attachment;filename="'.$name.'.xls"');
             header('Cache-Control: max-age=0');
             $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel5');
             $objWriter->save('php://output');
             exit;
}

