<?php

$conn = mysqli_connect('localhost','root','root') or die('数据库连接失败');

//获取所有的新闻内容并显示
//操作数据库获取数据
include_once 'news_public.php';
//组织SQL获取所有新闻信息
$sql = 'select * from n_news';
$res = my_error($conn,$sql);
//循环遍历所有数组
//方案1 获取结果集中的记录数 然后for循环
/*
$news = array();  //保存取出的记录 数组
$num = mysqli_num_fields($res);
for($i = 0;$i<$num;$i++){
    $news[] = mysqli_fetch_assoc($res);
}
*/
//方案2 利用while循环 每次渠道数据之后判断保存数据的结果 只要结果不为false 那么一直取
while($row = mysqli_fetch_assoc($res)){
    $news[] = $row;
}

//包含显示模板(HTML文件)
include_once '../list.html';