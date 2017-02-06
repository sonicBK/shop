    <div class="main-content">
        <h3 class="name-page">Danh sách sản phẩm</h3>
        <div class="head">
          <div class="col-md-3 pull-left">
            <span>xem</span>
            <select>
              <option>10</option>
              <option>20</option>
              <option>30</option>
            </select>
            <span>sản phẩm</span>
          </div>
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
        <div class="list-product">
          <table class="table table-hover">
            <thead>
              <tr>
                <th>STT</th>
                <th>Tên</th>
                <th>Giá mới</th>
                <th>Giá cũ</th>
                <th>Danh mục</th>
                <th>Trạng thái</th>
                <th>Ngày tạo</th>
              </tr>
            </thead>
            <tbody>
            <?php
            $i=1;
            foreach ($listProduct as $item) {
              ?>
              <tr>
                <td><?=$i++?></td>
                <td>
                 <div class="row">
                    <span class="name"><?=$item['name']?></span>
                  <span class="action">
                    <a href="?u=productController/edit/<?=$item['id']?>" alt title="edit"><i class="glyphicon glyphicon-pencil"></i></a>
                    <a href="?u=productController/delete/<?=$item['id']?>" alt title="delete"><i class="glyphicon glyphicon-trash"></i></a>
                  </span>
                 </div>
                </td>
                <td><?=number_format($item['new_price'], 0, ',', '.')?>đ</td>
                <td><?php if(!empty($item['old_price'])) echo number_format($item['old_price'], 0, ',', '.').'đ';?></td>
                <td><?=$item['cate']?></td>
                <td><a href="javascript:void(0)" data-id=<?=$item['id']?> class="toggle" status=<?=$item['status']?>><i class="fa fa-toggle-<?php if($item['status'] == 1) echo 'on'; else echo 'off' ;?>" aria-hidden="true"></i></a></td>
                <td><?=$item['create_at']?></td>
              </tr>
              <?php
            }
            ?>
            </tbody>
          </table>
        </div>
        <nav aria-label="Page navigation">
          <ul class="pagination">
            <?=$listPages?>
          </ul>
        </nav>
    </div>
</div>
<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.4.js"></script>
<script type="text/javascript" src="public/bootstrap3/js/bootstrap.min.js"></script>
<script type="text/javascript" src="public/js/admin.js"></script>
<script type="text/javascript" src="public/js/ajax.js"></script>
<script src="https://use.fontawesome.com/8da12d219b.js"></script>
</body>
</html>