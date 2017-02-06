<section class="content">
		<div class="container">
			<div class="breadcrumb">
				<li><a href="/">Trang chủ</a></li>
				<li class="active">Tin tức</li>
			</div>
			<div class="col-md-9 pull-left">
				<div class="news">
					<div class="title">
						<h3>sản phẩm</h3>
					</div>
					<div class="row">
						<div class="list">
							<?php
						foreach ($listProducts as $value) {
						?>
						<div class="col-md-4 col-sm-4 box-item">
								<div class="product-item">
									<div class="image">
										<a href="?u=productController/detail/<?=$value['id']?>">
											<img src="public/img/<?=$value['image']?>">
										</a>
										<div class="desc-sort">
											<?=$value['desc']?>
										</div>
									</div>
									<div class="name"><a href="?u=productController/detail/<?=$value['id']?>"><?=$value['name']?></a></div>
									<div class="price">
										<span class="price-new"><?=number_format($value['new_price'],0,'','.')?>&nbsp;₫</span>
									<?php if(!empty($value['old_price'])) echo '<span class="price-old">'.number_format($value["old_price"],0,"",".").'&nbsp;₫</span>'?>
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
						<nav aria-label="Page navigation" class="clearfix">
							<ul class="pagination">
							    <?php echo $listPages?>
							 </ul>
						</nav>
					</div>
				</div><!--end .product-->
			</div>
			<div class="col-md-3 pull-right">
				<div class="news">
					<div class="title">
						<h3>Tin tức</h3>
					</div>
					<div class="list col-md-12">
					</div>
				</div><!--end .news-->
			</div>
		</div>
	</section>