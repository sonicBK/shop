<section class="content">
		<div class="container">
			<div class="breadcrumb">
				<li><a href="/">Trang chủ</a></li>
				<li><a href="/san-pham">Sản phẩm</a></li>
				<li class="active"><?=$product['name']?></li>
			</div>
			<div class="col-md-9 pull-left">
				<div class="product-detail">
					<div class="product-info">
						<div class="row">
							<div class="col-md-6 box-cover">
								<div class="cover">
									<img src="/public/img/<?=$product['image']?>">
								</div>
							</div>
							<div class="col-md-6">
								<div class="name">
									<h2><?=$product['name']?></h2>
								</div>
								<div class="price"><?=number_format($product['new_price'])?>đ</div>
								<div class="social">
									<div class="fb-like" data-href="/?u=productController/detail/<?=$product['id']?>" data-layout="button_count" data-action="like" data-size="small" data-show-faces="false" data-share="true" height="30px"></div>
								</div>
								<div class="quantity">
								<label>Số lượng</label>
									<div>
										<input type="number" name="quantity" min="1" max="10" value="1">
									</div>
								</div>
								<div class="book">
									<a href="javascript:void(0)" class="add-to-cart" data-id=<?=$product['id']?> data-toggle="modal" data-target=".bs-example-modal-lg">
									<i class="glyphicon glyphicon-shopping-cart"></i>Thêm vào giỏ hàng</a>
									<a href="/?u=cartController/buy/<?=$product['id']?>" class="buy">
									<i class="glyphicon glyphicon-ok"></i>mua ngay</a>
								</div>
									<div class="modal fade bs-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="myLargeModalLabel">
			  <div class="modal-dialog modal-lg" role="document">
			    <div class="modal-content">
			      
			    </div>
			  </div>
	</div>
							</div>
						</div>
					</div>
					<div id="tabs">
						<ul class="nav nav-tabs">
						    <li class="active"><a data-toggle="tab" href="#home">Chi tiết sản phẩm</a></li>
						    <li><a data-toggle="tab" href="#menu1">Hướng dẫn sử dụng</a></li>
						</ul>
						<div class="tab-content">
						    <div id="home" class="tab-pane fade in active padding">
						      <?=$product['detail']?>
						    </div>
						    <div id="menu1" class="tab-pane fade padding">
						      <?=$product['desc']?>
						    </div>
						</div>
					</div>
				</div>
				<div class="relative product">
					<div class="title">
						<h3>Sản phẩm khác</h3>
					</div>
					<div class="row">
						<div class="list">
							<?php
						foreach ($relative as $value) {
						?>
						<div class="col-md-4 col-sm-4 box-item">
								<div class="product-item">
									<div class="image">
										<a href="/san-pham/<?=$value['alias']?>-<?=$value['id']?>.html">
											<img src="/public/img/<?=$value['image']?>">
										</a>
										<div class="desc-sort">
											<?=$value['desc']?>
										</div>
									</div>
									<div class="name"><a href="/san-pham/<?=$value['alias']?>-<?=$value['id']?>.html"><?=$value['name']?></a></div>
									<div class="price">
										<span class="price-new"><?=number_format($value['new_price'],0,'','.')?>&nbsp;đ</span>
									<?php if(!empty($value['old_price'])) echo '<span class="price-old">'.number_format($value["old_price"],0,"",".").'&nbsp;â‚«</span>'?>
									</div>
									<div class="buy">
										<a href="#">mua</a>
									</div>
									
								</div>
						</div>
						<?php
						}
						?>
						</div>
					</div>
				</div>
				<div class="comment">
					<div class="fb-comments" data-href="http://sonic123.org/san-pham/<?=$value['alias']?>-<?=$value['id']?>.html" data-numposts="5" data-width="100%"></div>
				</div>
			</div>
			<div class="col-md-3 pull-right">
				<div class="special">
					<div class="title">
						<h3>Xem nhiều</h3>
					</div>
					<div class="list col-md-12">
						<?php
						foreach ($listSpecials as $value) {
						?>
						<div class="box-item">
								<div class="product-item">
									<div class="image">
										<a href="/san-pham/<?=$value['alias']?>-<?=$value['id']?>.html">
											<img src="/public/img/<?=$value['image']?>">
										</a>
										<div class="desc-sort">
											<?=$value['desc']?>
										</div>
									</div>
									<div class="name"><a href="/san-pham/<?=$value['alias']?>-<?=$value['id']?>.html"><?=$value['name']?></a></div>
									<div class="price">
										<span class="price-new"><?=number_format($value['new_price'],0,'','.')?>&nbsp;đ</span>
										<span class="price-old"><?php if(!empty($value['old_price'])) echo number_format($value['old_price'])."&nbsp;đ"?></span>
									</div>
									<div class="buy">
										<a href="#">mua</a>
									</div>
									<div class="views">
										<i class="glyphicon glyphicon-eye-open">&nbsp;<?=$value['views']?></i>
									</div>
									
								</div>
						</div>
						<?php
						}
						?>
					</div>
				</div><!--end .special-->
			</div>
		</div>
	</section>