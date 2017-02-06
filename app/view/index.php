<section class="content">
		<div class="container">
			<div class="col-md-9 pull-left">
				<div class="product">
					<div class="title">
						<h3>Sản phẩm</h3>
					</div>
					<div class="row">
						<div class="list">
						<?php
						foreach ($listProducts as $value) {
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
									<?php if(!empty($value['old_price'])) echo '<span class="price-old">'.number_format($value["old_price"],0,"",".").'&nbsp;đ</span>'?>
									</div>
									<div class="buy">
										<a href="/?u=cartController/buy/<?=$value['id']?>">mua</a>
									</div>
									
								</div>
						</div>
						<?php
						}
						?>
						</div>
						<div class="col-md-12 more">
							<a href="/san-pham">
							xem nhiều hơn
							<i class="fa fa-angle-double-right" aria-hidden="true"></i>
							</a>
						</div>
					</div>
				</div><!--end .product-->
				<div class="articles">
					<div class="title">
						<h3>Bí quyết làm đẹp</h3>
					</div>
					<div class="row">
						<div class="list col-md-12">
						<?php
						foreach ($listNews as $item) {
						?>
						<div class="col-md-4 box-new">
								<div class="new-item">
									<a href="/san-pham/<?=$value['alias']?>-<?=$value['id']?>.html">
										<div class="image">
											<img title="<?=$item['name']?>" alt src="/<?=$item['img']?>">
										</div>
									</a>
									<div class="name"><a href="?u=newsController/detail/<?=$item['id']?>"><?php echo $item['name']?></a></div>
									<div class="time"><?=$item['create_at']?></div>
									<div class="desc">
										<a href="?u=newsController/detail/<?=$item['id']?>"><?=$item['desc']?></a>
									</div>
								</div>
							</div>
						<?php
						}
						?>
						</div>
					</div>
				</div><!--end .articles-->
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
								<div class="product-item" ">
									<div class="image">
										<a href="/san-pham/<?=$value['alias']?>-<?=$value['id']?>.html">
											<img src="/public/img/<?=$value['image']?>">
										</a>
										<div class="desc-sort">
											<?=$value['desc']?>
										</div>
									</div>
									<div class="name"><a href="/san-pham/<?=$value['alias']?>-<?=$value['id']?>.html"><?=$value['name'] ?></a></div>
									<div class="price">
										<span class="price-new"><?=number_format($value['new_price'],0,'','.')?>&nbsp;đ</span>
										<span class="price-old"><?php if(!empty($value['old_price'])) echo number_format($value['old_price'])."&nbsp;đ"?></span>
									</div>
									<div class="buy">
										<a href="/?u=cartController/buy/<?=$value['id']?>">mua</a>
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
				<!-- <div class="news">
					<div class="title">
						<h3>Tin tá»©c</h3>
					</div>
					<div class="list col-md-12">
						<div class="box-item">
								<div class="product-item" ">
									<a href="">
										<div class="image">
											<img src="public/img/td1.jpg">
										</div>
									</a>
									<div class="name">OHUI AUTO COVER CREAM</div>
									<div class="price">1.300.000Ä‘</div>
									<div class="buy">mua</div>
								</div>
							</div>
							<div class="box-item">
								<div class="product-item" ">
									<a href="">
										<div class="image">
											<img src="public/img/td1.jpg">
										</div>
									</a>
									<div class="name">OHUI AUTO COVER CREAM</div>
									<div class="price">1.300.000Ä‘</div>
									<div class="buy">mua</div>
								</div>
							</div>
							<div class="box-item">
								<div class="product-item" ">
									<a href="">
										<div class="image">
											<img src="public/img/td1.jpg">
										</div>
									</a>
									<div class="name">OHUI AUTO COVER CREAM</div>
									<div class="price">1.300.000Ä‘</div>
									<div class="buy">mua</div>
								</div>
							</div>
					</div>
				</div> --><!--end .news-->
			</div>
		</div>
	</section>