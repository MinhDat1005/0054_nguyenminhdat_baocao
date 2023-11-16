<?php
use App\Models\Contact;
$list = Contact::where('status','!=', 0)
    ->orderBy('created_at','DESC')
    ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <form action="index.php?option=contact&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Tất cả liên hệ</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <div class="col-md text-left">
                     <a href="index.php?option=contact" class="btn btn-sm btn-primary mb-2">Tất cả </a> |
                        <a class="btn btn-danger btn-xs" href="index.php?option=contact&cat=trash"><i class="fas fa-trash"></i> Thùng rác</a>
                  </div>
               </div>
               <div class="card-body">
               <?php require_once "../views/backend/message.php"; ?>  
                  <table class="table table-bordered" id="mytable">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th>Họ tên</th>
                           <th>Điện thoại</th>
                           <th>Email</th>
                           <th>Tiêu đề</th>
                        </tr>
                     </thead>
                     <tbody>
                     <?php if(count($list)>0): ?>
                        <?php foreach($list as $item): ?>
                        <tr class="datarow">
                           <td>
                              <input type="checkbox">
                           </td>
                           <td>
                              <div class="name">
                              <?= $item->name; ?>
                              </div>
                              <div class="function_style">
                                 <?php if($item->status == 1) : ?>
                                    <a class="btn btn-primary btn-xs" href="index.php?option=contact&cat=status&id=<?= $item->id; ?>">
                                         <i class="fas fa-toggle-on"></i> Hiện
                                      </a> |
                                   <?php else : ?>
                                      <a class="btn btn-warning btn-xs" href="index.php?option=contact&cat=status&id=<?= $item->id; ?>">
                                         <i class="fas fa-toggle-off"></i> Ẩn
                                      </a> |
                                   <?php endif; ?>
                                   <a class="btn btn-secondary btn-xs" href="index.php?option=contact&cat=edit&id=<?= $item->id; ?>">
                                      <i class="fas fa-edit"></i> Chỉnh sửa
                                   </a> |
                                   <a class="btn btn-info btn-xs" href="index.php?option=contact&cat=show&id=<?= $item->id; ?>">
                                      <i class="fas fa-eye"></i> Chi tiết
                                   </a> |
                                   <a class="btn btn-danger btn-xs" href="index.php?option=contact&cat=delete&id=<?= $item->id; ?>">
                                      <i class="fas fa-trash"></i> Xoá
                                   </a>
                              </div>
                           </td>
                           <td> <?= $item->phone; ?></td>
                           <td> <?= $item->email; ?></td>
                           <td>Tiêu đề</td>
                        </tr>
                        <?php endforeach; ?>
                        <?php endif; ?>
                     </tbody>
                  </table>
               </div>
            </div>
         </section>
      </div>
      </form>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php"; ?>