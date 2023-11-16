<?php
use App\Models\Menu;
$list = Menu::where('status','=', 0)
    ->orderBy('created_at','DESC')
    ->get();
?>
<?php require_once "../views/backend/header.php"; ?>
      <!-- CONTENT -->
      <div class="content-wrapper">
         <section class="content-header">
            <div class="container-fluid">
               <div class="row mb-2">
                  <div class="col-sm-12">
                     <h1 class="d-inline">Thùng rác</h1>
                  </div>
               </div>
            </div>
         </section>
         <!-- Main content -->
         <section class="content">
            <div class="card">
               <div class="card-header text-right">
                  <a href="index.php?option=menu" class="btn btn-sm btn-info">
                     <i class="fa fa-arrow-left" aria-hidden="true"></i>
                     Về danh sách
                  </a>
               <div class="card-body p-2">
               <?php require_once "../views/backend/message.php"; ?>    
                  <div class="row">
                     <div class="col-md-3">
                        <div class="accordion" id="accordionExample">
                           <div class="card mb-0 p-3">
                              <select name="postion" class="form-control">
                                 <option value="mainmenu">Main Menu</option>
                                 <option value="footermenu">Footer Menu</option>
                              </select>
                           </div>
                           <div class="card mb-0">
                              <div class="card-header" id="headingCategory">
                                 <strong data-toggle="collapse" data-target="#collapseCategory" aria-expanded="true"
                                    aria-controls="collapseCategory">
                                    Danh mục sản phẩm
                                 </strong>
                              </div>
                              <div id="collapseCategory" class="collapse" aria-labelledby="headingCategory"
                                 data-parent="#accordionExample">
                                 <div class="card-body p-3">
                                    <div class="form-check">
                                       <input name="categoryId[]" class="form-check-input" type="checkbox" value=""
                                          id="categoryId">
                                       <label class="form-check-label" for="categoryId">
                                          Default checkbox
                                       </label>
                                    </div>
                                    <div class="my-3">
                                       <button name="ADDCATEGORY" class="btn btn-sm btn-success form-control">Thêm</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card mb-0">
                              <div class="card-header" id="headingBrand">
                                 <strong data-toggle="collapse" data-target="#collapseBrand" aria-expanded="true"
                                    aria-controls="collapseBrand">
                                    Thương hiệu
                                 </strong>
                              </div>
                              <div id="collapseBrand" class="collapse" aria-labelledby="headingBrand"
                                 data-parent="#accordionExample">
                                 <div class="card-body p-3">
                                    <div class="form-check">
                                       <input name="BrandId[]" class="form-check-input" type="checkbox" value=""
                                          id="BrandId">
                                       <label class="form-check-label" for="BrandId">
                                          Default checkbox
                                       </label>
                                    </div>
                                    <div class="my-3">
                                       <button name="ADDBRAND" class="btn btn-sm btn-success form-control">Thêm</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card mb-0">
                              <div class="card-header" id="headingTopic">
                                 <strong data-toggle="collapse" data-target="#collapseTopic" aria-expanded="true"
                                    aria-controls="collapseTopic">
                                    Chủ đề bài viết
                                 </strong>
                              </div>
                              <div id="collapseTopic" class="collapse" aria-labelledby="headingTopic"
                                 data-parent="#accordionExample">
                                 <div class="card-body p-3">
                                    <div class="form-check">
                                       <input name="TopicId[]" class="form-check-input" type="checkbox" value=""
                                          id="TopicId">
                                       <label class="form-check-label" for="TopicId">
                                          Default checkbox
                                       </label>
                                    </div>
                                    <div class="my-3">
                                       <button name="ADDTOPIC" class="btn btn-sm btn-success form-control">Thêm</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card mb-0">
                              <div class="card-header" id="headingPage">
                                 <strong data-toggle="collapse" data-target="#collapsePage" aria-expanded="true"
                                    aria-controls="collapsePage">
                                   Trang đơn
                                 </strong>
                              </div>
                              <div id="collapsePage" class="collapse" aria-labelledby="headingPage"
                                 data-parent="#accordionExample">
                                 <div class="card-body p-3">
                                    <div class="form-check">
                                       <input name="PageId[]" class="form-check-input" type="checkbox" value=""
                                          id="PageId">
                                       <label class="form-check-label" for="PageId">
                                          Default checkbox
                                       </label>
                                    </div>
                                    <div class="my-3">
                                       <button name="ADDPAGE" class="btn btn-sm btn-success form-control">Thêm</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                           <div class="card mb-0">
                              <div class="card-header" id="headingCustom">
                                 <strong data-toggle="collapse" data-target="#collapseCustom" aria-expanded="true"
                                    aria-controls="collapseCustom">
                                    Tuỳ liên kết
                                 </strong>
                              </div>
                              <div id="collapseCustom" class="collapse" aria-labelledby="headingCustom"
                                 data-parent="#accordionExample">
                                 <div class="card-body p-3">
                                    <div class="mb-3">
                                       <label>Tên menu</label>
                                       <input type="text" name="name" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                       <label>Liên kết</label>
                                       <input type="text" name="link" class="form-control">
                                    </div>
                                    <div class="mb-3">
                                       <button name="ADDCUSTOM" class="btn btn-sm btn-success form-control">Thêm</button>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                     <div class="col-md-9">
                        <table class="table table-bordered">
                           <thead>
                              <tr>
                                 <th class="text-center" style="width:30px;">
                                    <input type="checkbox">
                                 </th>
                                 <th>Tên menu</th>
                                 <th>Liên kết</th>
                                 <th>Vị trí</th>
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
                                        <a class="btn btn-info btn-xs" href="index.php?option=menu&cat=restore&id=<?= $item->id; ?>">
                                             <i class="fas fa-undo"></i> Khôi phục
                                          </a> |
                                          <a class="btn btn-danger btn-xs" href="index.php?option=menu&cat=destroy&id=<?= $item->id; ?>">
                                             <i class="fas fa-trash"></i> Xoá vĩnh viễn
                                          </a>
                                    </div>
                                 </td>
                                 <td><?= $item->link; ?></td>
                                 <td>mainmenu</td>
                              </tr>
                              <?php endforeach; ?>
                              <?php endif; ?>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>
            </div>
         </section>
      </div>
      <!-- END CONTENT-->
      <?php require_once "../views/backend/footer.php"; ?>