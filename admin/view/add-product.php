      <div class="main-content">
        <h3 class="name-page">Thêm sản phẩm</h3>
        <div class="form col-md-7">
            <form action method="post" enctype="multipart/form-data">                    
               <div class="form-group">
                   <label>Tên sản phẩm</label>
                   <input class="form-control" name="txtname">
               </div>
               <div class="form-group">
                   <label>Giá cũ</label>
                   <input class="form-control" name="old-price">
               </div>
               <div class="form-group">
                   <label>Giá mới</label>
                   <input class="form-control" name="new-price">
               </div>
               <div class="form-group">
                   <label>Mô tả</label>
                   <textarea class="form-control" name="txtDesc"></textarea>
               </div>
               <div class="form-group">
                   <label>Chi tiết</label>
                   <textarea class="form-control" name="txtDetail" id="detail"></textarea>
               </div>
               <div class="form-group">
                   <label>Ảnh</label>
                   <input type="file" name="fImage">
                   <div class="img">
                       <img src="">
                   </div>
               </div>
               <div class="form-group">
                   <label>Danh mục</label>
                   <select class="form-control" name="cate">
                      <option>----</option>
                      <?php
                      foreach ($listCate as $value) {
                      ?>
                      <option value="<?=$value['id']?>"><?=$value['name']?></option>
                      <?php
                      }
                      ?>
                   </select>
               </div>
               <div class="form-group">
                   <label>Trạng thái</label>
                   <div>
                        <label class="radio-inline"><input type="radio" value="1" name="status" checked="checked">Hiển thị</label>
                       <label class="radio-inline"><input type="radio" value="0" name="status">Ẩn</label>
                    </div>
               </div>
               <div class="form-group">
                   <label>Keywords</label>
                   <textarea class="form-control" name="keywords"></textarea>
               </div>
               <div class="form-group">
                   <button class="btn btn-primary" name="submit">xong</button>
                   <button class="btn btn-default" name="continue">Thêm tiếp sản phẩm</button>
               </div>
            </form>
        </div>
      </div>
  </div>
  <script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
  <script type="text/javascript" src="public/bootstrap3/js/bootstrap.min.js"></script>
  <script type="text/javascript" src="public/js/admin.js"></script>
  <script src="https://use.fontawesome.com/8da12d219b.js"></script>
  <script>    CKEDITOR.replace( 'detail' );</script>
</body>
</html>