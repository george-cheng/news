<?php

// php操作MySQL的公共文件
header('Content-type:text/html;charset=utf-8');
//连接初始化
$conn = mysqli_connect('localhost','root','root') or die('数据库连接失败');

//封装mysql语法错误检查函数并执行
/*
 * @param1 string $sql 要执行的SQL指令
 * @return $res, 正确执行完返回的结果,如果SQL错误 直接终止
 *
 * */
function my_error($conn,$sql){
//执行SQL
    $res = mysqli_query($conn,$sql);
    //处理可能存在的错误
    if(!$res){
        echo 'SQL执行错误,错误编号为:'.mysqli_errno($conn) . '</br>';
        echo 'SQL执行错误,错误信息为:'.mysqli_error($conn) . '</br>';
        exit();
    }
    //返回结果
    return $res;
}
my_error($conn,'set names utf8');

//选择数据库
my_error($conn,'use News');
