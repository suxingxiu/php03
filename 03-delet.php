<?php
    header('content-type:text/html;charset=utf-8');

        //获得每行对应的编号 根据编号进行删除

        $id =$_GET['id'];

        // 先把数据从txt中提取出来,转为数组
        $str=file_get_contents('./01-data.txt');

        $arr=unserialize($str);
        //根据编号删除数组的项
        unset($arr[$id]);

        //删除过后再把数组转为字串(序列化)放入txt文件中
        $str1=serialize($arr);
        file_put_contents('./01-data.txt',$str1);

        echo "删除成功";
        header('refresh:2;url=01-wang.php');



?>