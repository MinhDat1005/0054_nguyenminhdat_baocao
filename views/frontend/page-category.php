<?php
use App\Models\Post;

$slug = $_REQUEST['cat'];
$page = Post::where ([['slug','=',$slug],['type','=','page'],['status','=',1]])->first();
?>
<?php require_once "views/frontend/header.php"; ?>
   <section class="bg-light">
      <div class="container">
         <nav style="--bs-breadcrumb-divider: '>';" aria-label="breadcrumb">
            <ol class="breadcrumb py-2 my-0">
               <li class="breadcrumb-item">
                  <a class="text-main" href="index.php">Trang chủ</a>
               </li>
               <li class="breadcrumb-item active" aria-current="page">
                  Trang đơn
               </li>
            </ol>
         </nav>
      </div>
   </section>
   <section class="hdl-maincontent py-2">
      <div class="container">
         <div class="row">
            <div class="col-md-3 order-2 order-md-1">
               <ul class="list-group mb-3 list-page">
                  <li class="list-group-item bg-main py-3">Các trang khác</li>
                  <li class="list-group-item">
                     <a href="post_page.html">Chính sách mua hàng</a>
                  </li>
                  <li class="list-group-item">
                     <a href="post_page.html">Chính sách vận chuyển</a>
                  </li>
                  <li class="list-group-item">
                     <a href="post_page.html">Chính sách đổi trả</a>
                  </li>
                  <li class="list-group-item">
                     <a href="post_page.html">Chính sách bảo hành</a>
                  </li>
               </ul>
            </div>
            <div class="col-md-9 order-1 order-md-2">
               <h1 class="fs-2 text-main"><?=$page->title;?></h1>
               <p>
                  Video provides a powerful way to help you prove your point. When you click Online Video, you can paste
                  in the embed code for the video you want to add. You can also type a keyword to search online for the
                  video that best fits your document. To make your document look professionally produced, Word provides
                  header, footer, cover page, and text box designs that complement each other.
                  For example, you can add a matching cover page, header, and sidebar. Click Insert and then choose the
                  elements you want from the different galleries. Themes and styles also help keep your document
                  coordinated. When you click Design and choose a new Theme, the pictures, charts, and SmartArt graphics
                  change to match your new theme.
                  When you apply styles, your headings change to match the new theme. Save time in Word with new buttons
                  that show up where you need them. To change the way a picture fits in your document, click it and a
                  button for layout options appears next to it. When you work on a table, click where you want to add a
                  row or a column, and then click the plus sign.
               </p>
            </div>
         </div>
      </div>
   </section>
   <?php require_once "views/frontend/footer.php"; ?>