<?php

use App\Models\User;

$list = User::where('status', '!=', 0)->orderBy('created_at', 'DESC')->get();

?>

<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=customer&cat=process" method="post" enctype="multipart/form-data">
   <div class="content-wrapper">
      <section class="content-header">
         <div class="container-fluid">
            <div class="row mb-2">
               <div class="col-sm-12">
                  <h1 class="d-inline">Thêm mới khách hàng</h1>
               </div>
            </div>
         </div>
      </section>
      <section class="content">
         <div class="card">
            <div class="card-header text-right">
               <a href="../backend/product_index.html" class="btn btn-sm btn-info">
                  <i class="fa fa-arrow-left" aria-hidden="true"></i>
                  Về danh sách
               </a>
               <button class="btn btn-sm btn-success" name="CHANGEADD">
                  <i class="fa fa-save" aria-hidden="true"></i>
                  Thêm khách hàng
               </button>
            </div>
            <div class="card-body">
            <?php require_once "../views/backend/message.php"; ?> 
               <div class="row">
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label>Họ tên (*)</label>
                        <input type="text" name="name" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Điện thoại</label>
                        <input type="text" name="phone" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Email</label>
                        <input type="email" name="email" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Tên đăng nhập</label>
                        <input type="text" name="username" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Mật khẩu</label>
                        <input type="password" name="password" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Xác nhận mật khẩu</label>
                        <input type="password" name="password_re" class="form-control">
                     </div>
                  </div>
                  <div class="col-md-6">
                     <div class="mb-3">
                        <label>Giới tính</label>
                        <select name="gender" class="form-control">
                           <option value="1">Nam</option>
                           <option value="0">Nữ</option>
                        </select>
                     </div>
                     <div class="mb-3">
                        <label>Hình đại diện</label>
                     <input type="file" name="image" class="form-control">
                     </div>
                     <div class="mb-3">
                        <label>Trạng thái</label>
                        <select name="status" class="form-control">
                           <option value="1">Xuất bản</option>
                           <option value="2">Chưa xuất bản</option>
                        </select>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </section>
   </div>
</form>
<!-- END CONTENT-->
<?php require_once "../views/backend/footer.php"; ?>
