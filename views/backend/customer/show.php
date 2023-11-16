<?php
use App\Models\User;
use App\Libraries\MyClass;

$id = $_REQUEST['id'];
$customer = User::find($id);
if($customer==null)
{
   MyClass::set_flash('message', ['msg'=>'Lỗi trang 404', 'type'=>'danger']);
    header("location:index.php?option=customer");
}
?>

<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Chi tiết thành viên</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=customer" class="btn btn-sm btn-info">
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
                        <td><?=$customer->id;?></td>
                     </tr>
                     <tr>
                        <td>NAME</td>
                        <td><?=$customer->name;?></td>
                     </tr>
                     <tr>
                        <td>USERNAME</td>
                        <td><?=$customer->username;?></td>
                     </tr>
                     <tr>
                        <td>PASSWORD</td>
                        <td><?=$customer->password;?></td>
                     </tr>
                     <tr>
                        <td>EMAIL</td>
                        <td><?=$customer->email;?></td>
                     </tr>
                     <tr>
                        <td>GENDER</td>
                        <td><?=$customer->gender;?></td>
                     </tr>
                     <tr>
                        <td>PHONE</td>
                        <td><?=$customer->phone;?></td>
                     </tr>
                     <tr>   
                        <td>IMAGE</td>
                        <td><img class="img-fluid" style="width:100px" src="../public/images/customer/<?= $customer->image; ?>" alt="<?= $customer->image; ?>"></td>
                     </tr>
                     
                     <tr>
                        <td>ROLES</td>
                        <td><?=$customer->roles;?></td>
                     </tr>
                     <tr>
                        <td>ADDRESS</td>
                        <td><?=$customer->address;?></td>
                     </tr>
                        <td>CREATED_AT</td>
                        <td><?=$customer->created_at;?></td>
                     </tr>
                     <tr>
                        <td>CREATED_BY</td>
                        <td><?=$customer->created_by;?></td>
                     </tr>
                     <tr>
                        <td>UPDATED_AT</td>
                        <td><?=$customer->updated_at;?></td>
                     </tr>
                     <tr>
                        <td>UPDATED_BY</td>
                        <td><?=$customer->updated_by;?></td>
                     </tr>
                     <tr>
                        <td>STATUS</td>
                        <td><?=$customer->status;?></td>
                     </tr>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php"; ?>