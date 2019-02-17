<?php

header('Content-type:text/html;charset=utf-8');

$conn = mysqli_connect('localhost','root','root') or die('数据库连接失败');

$title = isset($_POST['title']) ? trim($_POST['title']) : '';  //title是字符串 重要
$isTop = isset($_POST['isTop']) ? (integer)$_POST['isTop'] : '2';  //数字需求 而且不重要
$content = isset($_POST['content']) ? trim($_POST['content']) : '';
$publisher = isset($_POST['publisher']) ? trim($_POST['publisher']) : '佚名'; //trim 针对字符串

// 数据验证 : 标题和内容不能为空
if(empty($title) || empty($content)){
    //提示同时回到提交页
    header('Refresh:2; url=../add.html');
    // header前不能有输出 header:refresh不会阻止脚本执行
    exit('标题和内容都不能为空!');
    //阻止脚本继续执行
}

// 数据入库

include_once 'news_public.php';
$time = time();
$sql = "INSERT INTO n_news VALUES(null,'{$title}','{$content}','{$isTop}','{$publisher}',$time)";
$insert_id = my_error($conn,$sql);

//成功操作
//提示同时去到列表页
header('Refresh:2; url=./list.php');
echo $title .'增加成功!';