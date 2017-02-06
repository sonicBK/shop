<!DOCTYPE html>
<html>
<head>
	<title><?php if(isset($title)) echo $title; ?></title>
	<meta charset="utf-8">
	<link rel="shortcut icon" href="public/img/favicon.png" />
	<link rel="stylesheet" type="text/css" href="public/bootstrap3/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="public/css/style.css">
	<link rel="stylesheet" type="text/css" href="public/css/cart.css">
	<style type="text/css">
		.slider .img-slide{
	width: 100%;
	height: 480px;
	overflow: hidden;
	display: block;
}
.slider img{
	width: 100%;
}
	</style>
</head>
<body>
		<div id="fb-root"></div>
		<script>(function(d, s, id) {
		  var js, fjs = d.getElementsByTagName(s)[0];
		  if (d.getElementById(id)) return;
		  js = d.createElement(s); js.id = id;
		  js.src = "//connect.facebook.net/vi_VN/sdk.js#xfbml=1&version=v2.8&appId=1613684402262934";
		  fjs.parentNode.insertBefore(js, fjs);
		}(document, 'script', 'facebook-jssdk'));</script><!--end plugin fb-->
	<header>
		<div class="top-bar">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<div class="pull-left">
							<i class="glyphicon glyphicon-earphone"></i>
							Hotline: <span>0123456789</span>
						</div>
						<div class="pull-right">
							<ul class="list-unstyled">
								<li><a href="#"><i class="glyphicon glyphicon-earphone"></i>Hotline: <span>0123456789</span></a></li>
								<li><a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>Đăng nhập</a></li>
								<li><a href="#"><i class="fa fa-key" aria-hidden="true"></i>Đăng ký</a></li>
							</ul>
						</div>
					</div>
				</div>
			</div>
		</div><!--end .top-bar -->
		<div class="header-content">
			<div class="container">
				<div class="row">
					<div class="col-md-3 col-xs-12 col-sm-12">
						<div class="logo">
							<a href="/" title>
								<img src="public/img/logo.png" class="img-responsive">
							</a>
						</div>
					</div>
					<div class="col-md-6 col-xs-12 col-sm-12">
						<div class="box-search">
							<div class="input-group">
						    <input type="text" class="form-control" placeholder="Tìm kiếm...">
						    <span class="input-group-btn">
						    <button class="btn btn-default" type="button"><i class="glyphicon glyphicon-search"></i></button>
						    </span>
						 </div><!-- /input-group -->
						</div>
					</div>
					<div class="col-md-3 col-xs-12 col-sm-12">
						<div class="cart pull-right">
							<a href="/gio-hang.html">
								<span class="icon">icon</span>
								<span id="cart-info">
									<?php
									if (isset($_SESSION['cart']['info'])) {
										echo $_SESSION['cart']['info']['qty'] . " sp -- ". number_format($_SESSION['cart']['info']['total']). " đ";
									} else{
										echo "0 sp -- 0 đ";
									}
									?>
								</span>
								<i class="fa fa-arrow-right"></i>
							</a>
							<?php
							if (isset($_SESSION['cart']['list'])) {
							?>
								<div class="box-cart-dropdown">           
	                            <div class="box-cart-dropdown-block">
	                                <div class="total">
	                                    Có <span><?=$_SESSION['cart']['info']['qty']?></span> sản phẩm trong giỏ hàng<br>
	                                </div>
	                                <ul>
	                                    <?php
	                                    foreach ($_SESSION['cart']['list'] as $item) {
	                                    ?>
	                                    <li class="clearfix">
	                                        <span class="image">
	                                            <a href="gio-hang.html">
	                                                <img src="public/img/<?=$item['image']?>" class="img-responsive">
	                                            </a>
	                                        </span>
	                                        <div class="name">
	                                            <a href="/san-pham/<?=$item['alias']?>-<?=$item['id']?>.html"><?=$item['name']?></a>
	                                            <div>
	                                                <?=$item['qty']?> x <span class="price">
	                                                    <?=number_format($item['new_price'],0,'','.')?>
	                                                    đ
	                                                </span>
	                                            </div>
	                                        </div>
	                                        <span class="remove_link">
	                                            <a href="/?u=cartController/remove_item/<?=$item['id']?>" class="remove-item"><i class="fa fa-times-circle"></i></a>
	                                        </span>
	                                    </li>
	                                    <?php
	                                    }
	                                    ?>
	                                </ul>
	                                <div class="cart-payment">
	                                    <div class="amount">
	                                        Tổng tiền: <strong>
	                                            <?=number_format($_SESSION['cart']['info']['total'],0,'','.')?>
	                                            đ
	                                        </strong>
	                                    </div>
	                                    <div class="btn-payment">
	                                        <a class="btn btn-default" href="/thanh-toan.html">Đặt hàng &amp; Thanh toán</a>
	                                    </div>
	                                </div>
	                            </div>
                        	</div>
                        	<?php
							}
							?>
						</div>
					</div>
				</div>
			</div>
		</div><!--end .main-header -->
		<div class="main-nav">
			<div class="container">
				<div class="row">
					<div class="col-md-12">
						<ul class="list-unstyled">
							<li><a href="/">Trang chủ</a></li>
							<li><a class="" href="#">Giới thiệu</a></li>
							<li><a href="/san-pham">Sản phẩm</a></li>
							<li><a href="#">Hướng dẫn mua hàng</a></li>
							<li><a href="#">Tin tức</a></li>
						</ul>
					</div>
				</div>
			</div>
		</div><!--end .main-nav -->
	</header>