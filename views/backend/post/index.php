<?php
use App\Models\Post;
$list = Post::where('post.status','!=', 0)
->join('topic','topic.id','=','post.topic_id')
->select("post.*","topic.name as topic_name")
    ->orderBy('post.created_at','DESC')
    ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
<!-- CONTENT -->
<form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
            <section class="content-header">
               <div class="container-fluid">
                  <div class="row mb-2">
                     <div class="col-sm-6">
                        <h1 class="d-inline">Tất cả bài viết</h1>
                     </div>
                     <div class="col-sm-6 text-right">
                        <a href="index.php?option=post&cat=create" class="btn btn-sm btn-primary">Thêm bài viết</a>
                     </div>
                  </div>
               </div>
            </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header p-2">
               <div class="col-md-6 p-2">
                  <a href="index.php?option=post" class="btn btn-sm btn-primary mb-2">Tất cả </a> |
                  <a class="btn btn-danger btn-xs" href="index.php?option=post&cat=trash"><i class="fas fa-trash"></i> Thùng rác</a>
               </div>
               </div>
              
               <div class="card-body p-2">
                  <table class="table table-bordered">
                     <thead>
                        <tr>
                           <th class="text-center" style="width:30px;">
                              <input type="checkbox">
                           </th>
                           <th class="text-center" style="width:130px;">Hình ảnh</th>
                           <th>Tiêu đề bài viết</th>
                           <th>Tên chủ đề</th>
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
                                    <img class="img-fluid" src="../public/images/post/<?= $item->image; ?>" alt="<?= $item->image; ?>">
                                 </td>
                                 <td>
                                    <div class="name">
                                       <?= $item->title; ?>
                                    </div>
                                    <div class="function_style">
                                    <?php if ($item->status == 1) : ?>
                                             <a class="btn btn-primary btn-xs" href="index.php?option=post&cat=status&id=<?= $item->id; ?>">
                                                <i class="fas fa-toggle-on"></i> Hiện
                                             </a> |
                                          <?php else : ?>
                                             <a class="btn btn-warning btn-xs" href="index.php?option=post&cat=status&id=<?= $item->id; ?>">
                                                <i class="fas fa-toggle-off"></i> Ẩn
                                             </a> |
                                          <?php endif; ?>
                                          <a class="btn btn-secondary btn-xs" href="index.php?option=post&cat=edit&id=<?= $item->id; ?>">
                                             <i class="fas fa-edit"></i> Chỉnh sửa
                                          </a> |
                                          <a class="btn btn-info btn-xs" href="index.php?option=post&cat=show&id=<?= $item->id; ?>">
                                             <i class="fas fa-eye"></i> Chi tiết
                                          </a> |
                                          <a class="btn btn-danger btn-xs" href="index.php?option=post&cat=delete&id=<?= $item->id; ?>">
                                             <i class="fas fa-trash"></i> Xoá
                                          </a>
                                    </div>
                                 </td>
                                 <td><?=$item->topic_name;?></td>
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