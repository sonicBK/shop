<section class="content">
        <div class="container">
            <div class="breadcrumb">
                <li><a href="/">Trang chủ</a></li>
                <li class="active">Giao hàng</li>
            </div>
            <div class="col-md-12">
                <div class="cart">
                    <div class="title">
                        <h3>Giỏ hàng của bạn</h3>
                    </div>
                    <div class="cart-block">
                        <div class="cart-info table-responsive">
                            <table class="table product-list">
                                <thead>
                                    <tr>
                                        <th>Sản phẩm</th>
                                        <th>Hình ảnh</th>
                                        <th>Giá</th>
                                        <th>Số lượng</th>
                                        <th>Thành tiền</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                  <?php
                                  if (isset($_SESSION['cart']['list'])) {
                                      foreach ($_SESSION['cart']['list'] as $item){
                                        ?>
                                    <tr ng-repeat="item in OrderDetails" class="ng-scope">
                                        <td class="des">
                                            <h2 class="ng-binding"><?=$item['name']?></h2>
                                            <span class="ng-binding"></span>
                                        </td>
                                        <td class="image">
                                            <img class="img-responsive" src="/public/img/<?=$item['image']?>">
                                        </td>
                                        <td class="price ng-binding"><?=number_format($item['new_price'])?>đ</td>
                                        <td class="quantity">
                                            <input type="number" value="<?=$item['qty']?>" data-id=<?=$item['id']?>  class="text ng-pristine ng-untouched ng-valid">
                                        </td>
                                        <td class="amount ng-binding">
                                            <?=number_format($item['cout'])?>đ
                                        </td>
                                        <td class="remove">
                                            <a  href="/?u=cartController/remove_item/<?=$item['id']?>">
                                                <i class="glyphicon glyphicon-trash"></i>
                                            </a>
                                        </td>
                                    </tr><!-- end ngRepeat: item in OrderDetails -->
                                        <?php
                                  }}
                                  ?>
                                </tbody>
                            </table>
                        </div>
                        <div class="clearfix text-right">
                            <span><b>Tổng thanh toán</b></span>
                            <span class="pay-price ng-binding">
                                <?php if(isset($_SESSION['cart']['info']['total'])) echo number_format($_SESSION['cart']['info']['total']); else echo 0?>đ
                            </span>
                        </div>
                        <div class="button text-right">
                       		<a href style="color: blue; font-size: 15px; padding-right: 5px"><i class="glyphicon glyphicon-refresh"></i></a>
                            <a class="btn btn-default" href="/" >mua thêm</a>
                            <a class="btn btn-primary" href="/thanh-toan.html">thanh toán</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>