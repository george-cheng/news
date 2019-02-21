<?php
//更新数据到数据库

header('Content-type:text/html;charset=utf-8');

$conn = mysqli_connect('localhost','root','root') or die('数据库连接失败');

//接受数据并验证
$id = isset($_POST['id']) ? intval($_POST['id']) : 5;  // 0不会存在
$title = isset($_POST['title']) ? trim($_POST['title']) : '';  //title是字符串 重要
$isTop = isset($_POST['isTop']) ? intval($_POST['isTop']) : '2';  //数字需求 而且不重要
$content = isset($_POST['content']) ? trim($_POST['content']) : '';

// 数据验证 : 标题和内容不能为空
if(empty($title) || empty($content)){
    //提示同时回到提交页
    header('Refresh:2; url=../list.php');
    // header前不能有输出 header:refresh不会阻止脚本执行
    exit('标题和内容都不能为空!');
    //阻止脚本继续执行
}

include_once 'news_public.php';

//组织SQL更新到数据库
$sql = "update n_news set title='{$title}',isTop={$isTop},content='{$content}' where id = {$id}";
echo $id;
my_error($conn,$sql);

//提示成功
header('Refresh:1; url=list.php');
echo '当前新闻更新成功!';
