<?php
use App\Libraries\MyClass;
use App\Models\Post;
$list = Post::where([['status','!=', 0],['type','=','page']])
    ->orderBy('created_at','DESC')
    ->get();
?>

<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
   <form action="index.php?option=page&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-6">
                     <h1 class="d-inline">Tất cả trang đơn</h1>
                  </div>
                  <div class="col-sm-6 text-right ">
                     <a href="index.php?option=page&cat=create" class="btn btn-sm btn-primary ">Thêm trang đơn</a>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               
               <div class="col-md-12 p-2">
               <a href="index.php?option=page" class="btn btn-sm btn-primary mb-2">Tất cả </a> |
                  <a class="btn btn-danger btn-xs" href="index.php?option=page&cat=trash"><i class="fas fa-trash"></i> Thùng rác</a>
               </div>
               <div class="card-body p-2">
               <?php require_once "../views/backend/message.php"; ?>     
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>Tên trang đơn</th>
                           <th>slug</th>
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
                                    <img class="img-fluid" src="../public/images/page/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                 </td>
                                 <td>
                                    <div class="name">
                                       <?= $item->title; ?>
                                    </div>
                                    <div class="function_style">
                                    <?php if ($item->status == 1) : ?>
                                             <a class="btn btn-primary btn-xs" href="index.php?option=page&cat=status&id=<?= $item->id; ?>">
                                                <i class="fas fa-toggle-on"></i> Hiện
                                             </a> |
                                          <?php else : ?>
                                             <a class="btn btn-warning btn-xs" href="index.php?option=page&cat=status&id=<?= $item->id; ?>">
                                                <i class="fas fa-toggle-off"></i> Ẩn
                                             </a> |
                                          <?php endif; ?>
                                          <a class="btn btn-secondary btn-xs" href="index.php?option=page&cat=edit&id=<?= $item->id; ?>">
                                             <i class="fas fa-edit"></i> Chỉnh sửa
                                          </a> |
                                          <a class="btn btn-info btn-xs" href="index.php?option=page&cat=show&id=<?= $item->id; ?>">
                                             <i class="fas fa-eye"></i> Chi tiết
                                          </a> |
                                          <a class="btn btn-danger btn-xs" href="index.php?option=page&cat=delete&id=<?= $item->id; ?>">
                                             <i class="fas fa-trash"></i> Xoá
                                          </a>
                                    </div>
                                 </td>
                                 <td><?=$item->slug;?></td>
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