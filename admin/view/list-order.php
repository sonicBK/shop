    <div class="main-content">
        <h3 class="name-page">Danh sách đơn hàng</h3>
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
                <th>Tên khách hàng</th>
                <th>Tiền</th>
                <th>Tình trạng</th>
                <th>Ngày đặt hàng</th>
              </tr>
            </thead>
            <tbody>
             	<?php 
             	$i=1;
             	foreach ($list_order as $item){
             	?>
             	<?php
             	}
             	?>
            </tbody>
          </table>
        </div>
        <nav aria-label="Page navigation">
          <ul class="pagination">	
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