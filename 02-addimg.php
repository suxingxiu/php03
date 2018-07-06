<?php
header('content-type:text/html;charset=utf-8');
//处理上传文件

    // 判断文件是否正常上传
    if($_FILES['file']['error']==0){

        // 判断上传的文件是否是我们要的类型
           $type=['image/jpeg','image/png','image/gif'];
           if(in_array($_FILES['file']['type'],$type)){
             //文件类型争取,就把文件的后缀截取出来  然后重新命名   再存入目标文件
                //找到点.后缀开始的位置(下标)
                $rpos = strrpos($_FILES['file']['name'],'.');
                //从点.开始截取
                $ext = substr($_FILES['file']['name'],$rpos);
                //为文件重命名
                $new_name=time().rand(1000,99999999).$ext;
                //把文件重临时路径存放到目标文件img
                $path='./img/'.$new_name;
                move_uploaded_file($_FILES['file']['tmp_name'],$path);

           }else {
               echo "文件类型不正确";
               header ('refresh:2;url=02-addimg.html');
               die();
           }


    }else {
        echo "上传文件失败请重新上传";
        header ('refresh:2;url=02-addimg.html');
        die();
    }

// //接收表单数据 图片名称和大小

    $name=$_POST['name'];
    $size=$_POST['size'];


//将文件写入文件01-data.txt
    //先把01-data.txt中的内容读取出来
    $str=file_get_contents('./01-data.txt');
    //再把$str转为数组
    $arr=unserialize($str);

    // print_r($arr);
    // die();

    //把获取到的表单数据转成数组,追加到二位数组$arr中
    $tmp = [
        'name'=>$name,
        'size'=>$size,
        'url'=>$path
    ];

    array_push($arr,$tmp);
    // print_r($arr);

    //把数组再转为字符串 ,放到01-data.txt中

    $str1=serialize($arr);
    file_put_contents('./01-data.txt',$str1 );

    echo "壁纸添加成功";
    header('refresh:2;url=02-addimg.html');





?>