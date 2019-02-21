<?php
//新闻管理 删除指定新闻
//接受要删除的新闻ID
header('Content-type:text/html;charset=utf-8');
$conn = mysqli_connect('localhost','root','root') or die('数据库连接失败');
$id = isset($_GET['id']) ? (integer) $_GET['id'] : 0;  // 0不会存在

if($id == 0){
    header('Refresh:1;url=list.php');
    echo '当前要删除的新闻不存在!';
    exit();
};

//删除数据库
include_once 'news_public.php';
my_error($conn,'delete from n_news where id = '. $id);
//提示
header('Refresh:1;url=list.php');
echo '当前新闻删除成功!';