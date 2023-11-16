<?php
use App\Models\Post;
use App\Libraries\MyClass;
use App\Models\Topic;

$id = $_REQUEST['id'];
$post = Post::find($id);
if($post==null)
{
   MyClass::set_flash('message', ['msg'=>'Lỗi trang 404', 'type'=>'danger']);
    header("location:index.php?option=post");
}

$list_topic = Topic::where('parent_id', '=', '0')->orderBy('created_at', 'DESC')
   ->select('id', 'name')->get();
$topic_id_html ='';
foreach($list_topic as $topic)
{
   $topic_id_html .="<option value='$topic->id'>$topic->name</option>";
}
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
   <form action="index.php?option=post&cat=process" method="post" enctype="multipart/form-data">
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Cập nhật bài viết</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <button class="btn btn-sm btn-success" type="submit" name="CAPNHAT"> 
                     <i class="fa fa-save" aria-hidden="true"></i>
                     Cập nhật
                  </button>
                  <a href="index.php?option=post" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               </div>
               <div class="card-body">
                  <div class="row">
                     <div class="col-md-9">
                        <div class="mb-3">
                        <input type="hidden" name="id" value="<?=$post->id;?>">
                           <label>Tiêu đề bài viết (*)</label>
                           <input type="text" value="<?=$post->title;?>" name="title" class="form-control" >
                        </div>
                        <div class="mb-3">
                           <label>Slug</label>
                           <input type="text" value="<?=$post->slug;?>" name="slug" class="form-control">
                        </div>
                        <div class="mb-3">
                        <label>Chi tiết (*)</label>
                              <textarea name="detail" placeholder="Nhập chi tiết sản phẩm" rows="5"
                              class="form-control"></textarea>
                        </div>
                     </div>
                     <div class="col-md-3">
                        <div class="mb-3">
                           <label>Chủ đề (*)</label>
                           <select name="topic_id" class="form-control">
                              <option value=""></option>
                              <?=$topic_id_html;?>
                           </select>
                        </div>
                        <div class="mb-3">
                           <label>Hình đại diện</label>
                           <input type="file" name="image" class="form-control">
                        </div>
                        <div class="mb-3">
                           <label>Trạng thái</label>
                           <select name="status" class="form-control">
                           <option value="1"<?=($post->status==1)? 'selected' : '';?>>Xuất bản</option>
                              <option value="2"<?=($post->status==2)? 'selected' : '';?>>Chưa xuất bản</option>
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