<?php

use App\Models\Product;
use App\Libraries\MyClass;

if(isset($_POST['THEMSANPHAM'])){
    $product= new Product();
    //lấy từ form
    $product->name = $_POST['name'];
    $product->slug = (strlen($_POST['slug'])>0)?$_POST['slug']: MyClass::str_slug($_POST['name']);
    $product->category_id = $_POST['category_id'];
    $product->brand_id = $_POST['brand_id'];
    $product->detail = $_POST['detail'];
    $product->price = $_POST['price'];
    $product->pricesale = $_POST['pricesale'];
    $product->status = $_POST['status'];

    //xử lý upload file
    if(strlen($_FILES['image']['name'])>0)
    {
        $target_dir = "../public/images/product/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(in_array($extension,['jpg', 'jpeg', 'png','gif','Webp'] )) 
        {
            $filename = $product->slug. '.' .$extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $product->image = $filename;
        }   
    }
    
    //tự sinh ra

    $product->created_at = date('Y-m-d H:i:s');
    $product->created_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($product);
    //lưu vào CSDL
    $product->save();
    //chuyển về hướng index
    MyClass::set_flash('message', ['msg'=>'Thêm thành công', 'type'=>'success']);
    header("location:index.php?option=product");
}


if(isset($_POST['CAPNHAT'])){
    $id =  $_POST['id'];
    $product= Product::find ($id);
    if($product==null)
    {
    MyClass::set_flash('message', ['msg'=>'Lỗi trang 404', 'type'=>'danger']);
    header("location:index.php?option=product");
    }
{
    header("location:index.php?option=product");
}
    //lấy từ form
    $product->name = $_POST['name'];
    $product->slug = (strlen($_POST['slug'])>0)?$_POST['slug']: MyClass::str_slug($_POST['name']);
    $product->category_id = $_POST['category_id'];
    $product->brand_id = $_POST['brand_id'];
    $product->detail = $_POST['detail'];
    $product->price = $_POST['price'];
    $product->pricesale = $_POST['pricesale'];
    $product->status = $_POST['status'];

    //xử lý upload file
    if(strlen($_FILES['image']['name'])>0)
    {
        //Xóa hình cũ
        
        //Thêm hình mới
        $target_dir = "../public/images/product/";
        $target_file = $target_dir . basename($_FILES["image"]["name"]);
        $extension = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
        if(in_array($extension,['jpg', 'jpeg', 'png','gif','Webp'] )) 
        {
            $filename = $product->slug. '.' .$extension;
            move_uploaded_file($_FILES['image']['tmp_name'], $target_dir . $filename);
            $product->image = $filename;
        }   
    }
    
    //tự sinh ra

    $product->updated_at = date('Y-m-d H:i:s');
    $product->updated_by = (isset($_SESSION['user_id'])) ? $_SESSION['user_id'] : 1;
    var_dump($product);
    //lưu vào CSDL
    $product->save();
    //chuyển về hướng index
    MyClass::set_flash('message', ['msg'=>'Thêm thành công', 'type'=>'success']);
    header("location:index.php?option=product");
}