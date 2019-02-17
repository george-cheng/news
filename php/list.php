<?php

$conn = mysqli_connect('localhost','root','root') or die('数据库连接失败');

//获取所有的新闻内容并显示
//操作数据库获取数据
include_once 'news_public.php';
//组织SQL获取所有新闻信息
$sql = 'select * from n_news';
$res = my_error($conn,$sql);
//循环遍历所有数组
/*
$news = array();  //保存取出的记录 数组
$num = mysqli_num_fields($res);
for($i = 0;$i<$num;$i++){
    $news[] = mysqli_fetch_assoc($res);
}
*/
print_r($news);
