<?php

use App\Models\Order;
use App\Models\User;
use App\Libraries\MyClass;

if(isset($_POST['THEMDONHANG'])){
    $order= new User();
    //lấy từ form
    $order->deliveryname = $_POST['deliveryname'];
    $order->deliveryphone = $_POST['deliveryphone'];
    $order->deliveryemail = $_POST['deliveryemail'];
    $order->deliveryaddress = $_POST['deliveryaddress'];
    $order->status = $_POST['status'];
    
    //tự sinh ra

    $order->created_at = date('Y-m-d H:i:s'); 
    var_dump($order);
    //lưu vào CSDL
    $order->save();
    //chuyển về hướng index
    MyClass::set_flash('message', ['msg'=>'Thêm thành công', 'type'=>'success']);
    header("location:index.php?option=order");
}


if(isset($_POST['CAPNHAT'])){
    $id =  $_POST['id'];
    $order= Order::find ($id);
    if($order==null)
    {
    MyClass::set_flash('message', ['msg'=>'Lỗi trang 404', 'type'=>'danger']);
    header("location:index.php?option=order");
    }
{
    header("location:index.php?option=order");
}
    //lấy từ form
    $order->deliveryname = $_POST['deliveryname'];
    $order->deliveryphone = $_POST['deliveryphone'];
    $order->deliveryemail = $_POST['deliveryemail'];
    $order->deliveryaddress = $_POST['deliveryaddress'];
    $order->status = $_POST['status'];  

    //xử lý upload file
    if(strlen($_FILES['image']['deliveryname'])>0)
    {
        //Xóa hình cũ
        
        //Thêm hình mới
        $target_dir = "../public/images/order/";
        $target_file = $target_dir . basename($_FILES["image"]["deliveryname"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(in_array($extension,['jpg', 'jpeg', 'png','gif','Webp'] )) 
        {
            $filename = $order->slug. '.' .$extension;
            move_uploaded_file($_FILES['image']['tmp_deliveryname'], $target_dir . $filename);
            $order->image = $filename;
        }   
    }
    
    //tự sinh ra

    $order->updated_at = date('Y-m-d H:i:s');
    $order->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($order);
    //lưu vào CSDL
    $order->save();
    //chuyển về hướng index
    MyClass::set_flash('message', ['msg'=>'Thêm thành công', 'type'=>'success']);
    header("location:index.php?option=order");
}