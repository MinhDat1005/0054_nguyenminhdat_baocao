<?php
use App\Models\Post;
$mod_lastpost = Post::where ([['status','=', 1],['topic_id','=',8],['type','=','post']])
->select('image','title','detail')
->get();
?>

<section class="hdl-lastpost bg-main mt-3 py-4">
      <div class="container">
         <div class="row">
            <div class="col-md-9">
               <h3>BÀI VIẾT MỚI</h3>
               <div class="row">
                  <div class="col-md-6">
                     <?php foreach($mod_lastpost as $mod_row_post):?>
                     <div class="row mb-3">
                        <div class="col-md-4">
                           <a href="post_detail.html">
                              <img class="img-fluid" src="public/images/post/<?=$mod_row_post->image;?>" />
                           </a>
                        </div>
                        <div class="col-md-8">
                           <h3 class="post-title fs-5">
                              <a href="post_detail.html">
                              <?=$mod_row_post->title;?>
                              </a>
                           </h3>
                           <p>Tieu đề bài viết mói nhất 1Tieu đề bài viết mói nhất 1Tieu đề bài viết mói nhất 1</p>
                        </div>
                     </div>
                     <?php endforeach;?>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </section>
   