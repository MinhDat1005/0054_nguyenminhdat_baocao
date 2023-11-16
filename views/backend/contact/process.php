<?php

use App\Models\Contact;
use App\Libraries\MyClass;

if(isset($_POST['CAPNHAT'])){
    $id =  $_POST['id'];
    $contact= Contact::find ($id);
    if($contact==null)
    {
    MyClass::set_flash('message', ['msg'=>'Lỗi trang 404', 'type'=>'danger']);
    header("location:index.php?option=contact");
    }
{
    header("location:index.php?option=contact");
}
    //lấy từ form
    $contact->name = $_POST['name'];
    $contact->phone = $_POST['phone'];
    $contact->email = $_POST['email'];
    $contact->title = $_POST['title'];
    $contact->status = $_POST['status'];

    //xử lý upload file
    if(strlen($_FILES['image']['name'])>0)
    {
        //Xóa hình cũ
        
        //Thêm hình mới
        $target_dir = "../public/images/contact/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(in_array($extension,['jpg', 'jpeg', 'png','gif','Webp'] )) 
        {
            $filename = $contact->slug. '.' .$extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $contact->image = $filename;
        }   
    }
    
    //tự sinh ra

    $contact->updated_at = date('Y-m-d H:i:s');
    $contact->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($contact);
    //lưu vào CSDL
    $contact->save();
    //chuyển về hướng index
    MyClass::set_flash('message', ['msg'=>'Thêm thành công', 'type'=>'success']);
    header("location:index.php?option=contact");
}