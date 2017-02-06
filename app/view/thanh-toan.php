<section class="content">
        <div class="container">
            <div class="breadcrumb">
                <li><a href="/">Trang chủ</a></li>
                <li class="active">Thanh toán</li>
            </div>
            <div class="col-md-12">
                <div class>
                    <div class="title">
                        <h3>Thanh toán</h3>
                    </div>
                    <div class="row form-pay">
                        <form action method="post" class="payment-block clearfix ng-pristine ng-invalid ng-invalid-required ng-valid-email" id="checkout-container">
        <div class="col-md-4 col-sm-12 col-xs-12 payment-step">
            <div class="step">
                <h4>1. Địa chỉ thanh toán và giao hàng</h4>
                <div class="step-preview clearfix">
                    <h2 class="title">Thông tin thanh toán</h2>
                    <!-- ngIf: CustomerId>0 -->
                    <!-- ngIf: CustomerId<=0 --><div class="form-block ng-scope" ng-if="CustomerId<=0">
                        <div class="user-login"><a href="/dang-ky.html">Đăng ký tài khoản mua hàng</a><a href="/dang-nhap.html">Đăng nhập</a></div>
                        <label>Mua hàng không cần tài khoản</label>
                        <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Họ Tên" type="text" ng-model="$parent.CustomerName" required="" name="txtname"></div>
                        <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Số điện thoại" type="text" ng-model="$parent.CustomerPhone" required="" name="phone"></div>
                        <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-valid-email ng-invalid ng-invalid-required" placeholder="Email" type="email" ng-model="$parent.CustomerEmail" required="" name="email"></div>
                        <div class="form-group"><input class="form-control ng-pristine ng-untouched ng-invalid ng-invalid-required" placeholder="Địa chỉ nhận hàng" type="text" ng-model="$parent.CustomerAddress" required="" name="address"></div>
                        <textarea class="form-control ng-pristine ng-untouched ng-valid" rows="4" placeholder="Ghi chú đơn hàng" ng-model="$parent.Description" name="desc"></textarea>
                    </div><!-- end ngIf: CustomerId<=0 -->
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12 payment-step">
            <div class="step">
                <h4>2. Thanh toán và vận chuyển</h4>
                <div class="step-preview clearfix">
                <h2 class="title">Vận chuyển</h2>
                <div class="form-group ">
                    <select class="form-control ng-pristine ng-untouched ng-valid" ng-model="ShippingRateId" ng-options="item.Id as item.Name for item in ShippingRates" ng-change="changeShippingRate()"><option value="?" selected="selected"></option></select>
                </div>
                <h2 class="title">Thanh toán</h2>
                <!-- ngRepeat: item in PaymentMethods --><div class="radio ng-scope" ng-repeat="item in PaymentMethods">
                    <label class="ng-binding">
                        <input type="radio" value="1009" name="optionsRadios" ng-model="PaymentMethodId" ng-click="changePaymentMethod(item.Id)" class="ng-pristine ng-untouched ng-valid">
                        Thanh toán khi giao hàng (COD)
                    </label>
                </div><!-- end ngRepeat: item in PaymentMethods --><div class="radio ng-scope" ng-repeat="item in PaymentMethods">
                    <label class="ng-binding">
                        <input type="radio" value="1010" name="optionsRadios" ng-model="PaymentMethodId" ng-click="changePaymentMethod(item.Id)" class="ng-pristine ng-untouched ng-valid">
                        Chuyển khoản qua ngân hàng
                    </label>
                </div>
                </div>
            </div>
        </div>
        <div class="col-md-4 col-sm-12 col-xs-12 payment-step">
            <div class="step">
                <h4>3. Thông tin đơn hàng</h4>
                <div class="step-preview">
                    <div class="cart-info">
                        <div class="cart-items border">
                            <?php
                            if (isset($_SESSION['cart']['list'])) {
                            foreach ($_SESSION['cart']['list'] as $item) {
                            ?>
                            <div class="cart-item clearfix ng-scope" ng-repeat="item in OrderDetails">
                                <span class="image pull-left" style="margin-right:10px;">
                                    <a href="?u=productController/detail/<?=$item['id']?>">
                                        <img src="public/img/<?=$item['image']?>" class="img-responsive">
                                    </a>
                                </span>
                                <div class="product-info pull-left">
                                    <span class="product-name">
                                        <a href="?u=productController/detail/<?=$item['id']?>" class="ng-binding"><?=$item['name']?></a> x <span class="ng-binding"><?=$item['qty']?></span>
                                    </span>
                                    <!-- ngIf: item.IsVariant==true -->
                                </div>
                                <div class="price ng-binding pull-right"><?=number_format($item['cout'])?> ₫</div>
                            </div>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="total-price border">
                            Thành tiền  <label class="ng-binding pull-right"> <?=number_format($_SESSION['cart']['info']['total'])?> ₫</label>
                        </div>
                        <div class="shiping-price border">
                            Phí vận chuyển  <label class="ng-binding pull-right">0 ₫</label>
                        </div>
                        <div class="total-payment border">
                            Thanh toán <span class="ng-binding pull-right"> <?=number_format($_SESSION['cart']['info']['total'])?> ₫</span>
                        </div>
                        <div class="button-submit pull-right">
                            <button class="btn btn-default" type="submit" name="submit">Gửi</button>
                        </div>
                        <?php
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </form>
                    </div>
                </div><!--end .product-->
            </div>
        </div>
    </section>