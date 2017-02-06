    <div class="main-content">
      <h3 class="name-page">Thêm danh mục</h3>
      <div class="form col-md-7">
          <form action method="post">                    
             <div class="form-group">
                 <label>Tên danh mục</label>
                 <input class="form-control" name="txtName">
             </div>
             <div class="form-group">
                 <label>Danh mục cha</label>
                 <select class="form-control" name='parent_id'>
                    <option value="0">--không chọn--</option>
                    <?php
                    foreach ($cates as $value) {
                    ?>
                    <option value="<?=$value['id']?>"><?=$value['name']?></option>
                    <?php
                    }
                    ?>
                 </select>
             </div><div class="form-group">
                 <label>Mô tả</label>
                 <textarea class="form-control" name="txtDesc"></textarea>
             </div>
             <div class="form-group">
                 <button class="btn btn-primary"  name='submit'>Thêm</button>
             </div>
          </form>
      </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script type="text/javascript" src="public/bootstrap3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public/js/admin.js"></script>
<script src="https://use.fontawesome.com/8da12d219b.js"></script>
</body>
</html>