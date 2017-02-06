    <div class="main-content">
        <h3 class="name-page">Danh sách danh mục</h3>
        <div class="form-search">
          <div class="col-md-6 pull-right">
            <form>
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search for...">
                <span class="input-group-btn">
                  <button class="btn btn-default" type="button">
                    <i class="glyphicon glyphicon-search"></i>
                  </button>
                </span>
              </div>
            </form>
          </div>
        </div>
        <div class="list-cate">
          <table class="table table-hover">
          <thead>
            <tr>
              <th>STT</th>
              <th>Tên</th>
              <th>Mô tả</th>
              <th>Số lượng sản phẩm</th>
            </tr>
          </thead>
          <tbody>
            <?php
            $i=1;
              foreach ($listCate as $value) {
            ?>
              <tr>
              <td><?=$i++?></td>
              <td><?=$value['name']?>
                <div class="action">
                  <a href="?u=categoryController/edit/<?=$value['id']?>" alt title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
                  <a href="?u=categoryController/delete/<?=$value['id']?>" alt title="delete"><i class="glyphicon glyphicon-trash"></i></a>
                </div>
              </td>
              <td><?=$value['desc']?></td>
              <td>10</td>
            </tr>
            <?php
              }
            ?>
          </tbody>
        </table>
        </div>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script type="text/javascript" src="public/bootstrap3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public/js/admin.js"></script>
<script src="https://use.fontawesome.com/8da12d219b.js"></script>
</body>
</html>