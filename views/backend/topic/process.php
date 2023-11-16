<?php

use App\Models\Topic;
use App\Libraries\MyClass;

if(isset($_POST['THEM'])){
    $topic= new Topic();
    //lấy từ form
    $topic->name = $_POST['name'];
    $topic->slug = (strlen($_POST['slug'])>0)?$_POST['slug']: MyClass::str_slug($_POST['name']);
    $topic->status = $_POST['status'];

    //xử lý upload file
    if(strlen($_FILES['image']['name'])>0)
    {
        $target_dir = "../public/images/topic/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(in_array($extension,['jpg', 'jpeg', 'png','gif','Webp'] )) 
        {
            $filename = $topic->slug. '.' .$extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $topic->image = $filename;
        }   
    }
    
    //tự sinh ra

    $topic->created_at = date('Y-m-d H:i:s');
    $topic->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($topic);
    //lưu vào CSDL
    $topic->save();
    //chuyển về hướng index
    MyClass::set_flash('message', ['msg'=>'Thêm thành công', 'type'=>'success']);
    header("location:index.php?option=topic");
}


if(isset($_POST['CAPNHAT'])){
    $id =  $_POST['id'];
    $topic= Topic::find ($id);
    if($topic==null)
    {
    MyClass::set_flash('message', ['msg'=>'Lỗi trang 404', 'type'=>'danger']);
    header("location:index.php?option=topic");
    }
{
    header("location:index.php?option=topic");
}
    //lấy từ form
    $topic->name = $_POST['name'];
    $topic->slug = (strlen($_POST['slug'])>0)?$_POST['slug']: MyClass::str_slug($_POST['name']);
    $topic->status = $_POST['status'];

    //xử lý upload file
    if(strlen($_FILES['image']['name'])>0)
    {
        //Xóa hình cũ
        
        //Thêm hình mới
        $target_dir = "../public/images/topic/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(in_array($extension,['jpg', 'jpeg', 'png','gif','Webp'] )) 
        {
            $filename = $topic->slug. '.' .$extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $topic->image = $filename;
        }   
    }
    
    //tự sinh ra

    $topic->updated_at = date('Y-m-d H:i:s');
    $topic->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($topic);
    //lưu vào CSDL
    $topic->save();
    //chuyển về hướng index
    MyClass::set_flash('message', ['msg'=>'Thêm thành công', 'type'=>'success']);
    header("location:index.php?option=topic");
}