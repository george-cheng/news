<?php
// 查询摸个新闻信息对应的表单中(编辑第一步)
header('Content-type:text/html;charset=utf-8');
$conn = mysqli_connect('localhost','root','root') or die('数据库连接失败');
$id = isset($_GET['id']) ? (integer) $_GET['id'] : 0;  // 0不会存在

if($id == 0){
    header('Refresh:1;url=list.php');
    echo '当前要编辑的新闻不存在!';
    exit();
};

//获取当前ID对应的新闻信息
include_once 'news_public.php';
$sql = "select * from n_news where id = {$id}";
$res = my_error($conn,$sql);
$news = mysqli_fetch_assoc($res);


include_once '../edit.html';