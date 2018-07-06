<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $str=file_get_contents('./01-data.txt');
    $arr = unserialize($str);
    ?>
    <table border="1" width="600">
        <thead>
        <tr>
            <th>编号</th>
            <th>名称</th>
            <th>图片</th>
            <th>尺寸</th>
            <th>操作</th>
            </tr>
        </thead>
        <tbody>
        <?php $i=1; ?>
        <?php foreach($arr as $key=>$value){ ?>
           
            <tr>
            <td><?php echo $i;?></td>
            <td><?php echo $value['name'];?></td>
            <td><img src="<?php echo  $value['url'];?>" width="60"></td>
            <td><?php echo $value['size'];?></td>
            <td>修改
                <!-- 跳转到delete.php页面 并且把id传过去 -->
                <!-- get方式传参以?号分割 -->
                <a href="03-delet.php?id=<?php echo $key; ?>">删除</a> </td>     
            </tr>      
        </tbody>
        <?php $i++; }
         ?>
    
    </table>
</body>
</html>