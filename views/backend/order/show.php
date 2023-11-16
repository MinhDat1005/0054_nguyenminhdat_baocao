<?php
use App\Models\Order;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$order = Order::find($id);
if($order==null)
{
   MyClass::set_flash('message', ['msg'=>'Lỗi trang 404', 'type'=>'danger']);
    header("location:index.php?option=order");
}
?>

<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết khách hàng</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=order" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
               <div class="card-body p-2">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th style="width:30%">Tên trường</th>
                           <th>Giá trị</th>
                        </tr>
                     </thead>
                     <tbody>
                     <tr>
                        <td>ID</td>
                        <td><?=$order->id;?></td>
                     </tr>
                     <tr>
                        <td>USER_ID</td>
                        <td><?=$order->user_id;?></td>
                     </tr>
                     <tr>
                        <td>DELIVERYADDRESS</td>
                        <td><?=$order->deliveryaddress;?></td>
                     </tr>
                     <tr>
                        <td>DELIVERYNAME</td>
                        <td><?=$order->deliveryname;?></td>
                     </tr>
                     <tr>
                        <td>DELIVERYPHONE</td>
                        <td><?=$order->deliveryphone;?></td>
                     </tr>
                     <tr>
                        <td>DELIVERYEMAIL</td>
                        <td><?=$order->deliveryemail;?></td>
                     </tr>
                     <tr>
                        <td>NOTE</td>
                        <td><?=$order->note;?></td>
                     </tr>
                     <tr>
                        <td>CREATED_AT</td>
                        <td><?=$order->created_at;?></td>
                     </tr>
                     <tr>
                        <td>UPDATED_AT</td>
                        <td><?=$order->updated_at;?></td>
                     </tr>
                     <tr>
                        <td>UPDATED_BY</td>
                        <td><?=$order->updated_by;?></td>
                     </tr>
                     <tr>
                        <td>STATUS</td>
                        <td><?=$order->status;?></td>
                     </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php"; ?>