<?php
class CartController extends Controller
{
	public function __construct()
	{

	}

	public function show()
	{	
		$data = array("title"=>"giỏ hàng");
		$this->view('cart', $data);
	}

	public function add_to_cart(){

		$id = $_POST['id'];
		$qty = $_POST['qty'];
		if ($qty < 1) {
			$qty =1;
		}
		$this->model('product');
		$product= new Product;

		$select = "id, name,alias, image, new_price";
		$row = $product->fetchRow($id, $select);

		if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
			$_SESSION['cart']['list'][$id] = $row;
			$_SESSION['cart']['list'][$id]['qty'] = $qty;

		}
		else 
		{
		if (array_key_exists($id, $_SESSION['cart']['list'])) 
		{
			$_SESSION['cart']['list'][$id]['qty'] += $qty;
		}
		else
		{
			$_SESSION['cart']['list'][$id] = $row;
			$_SESSION['cart']['list'][$id]['qty'] = $qty;
		}
		}

	if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
	 		$_SESSION['cart']['info']['qty'] = 0;
	 		$_SESSION['cart']['info']['total'] = 0;
	 			
	 		foreach ($_SESSION['cart']['list'] as $k => $item) {
	 	
	 			$item['cout'] = $item['new_price']*$item['qty'];
	 			$_SESSION['cart']['list'][$k]['cout'] = $item['cout'];
	 			$_SESSION['cart']['info']['qty'] += $item['qty'];
	 			$_SESSION['cart']['info']['total'] += $item['cout'];
	 		}
	 	
	 	}
		
		$html = "<div class='modal-header'>
			            <button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
			                ×
			            </button>
			            <h4'>Bạn có {$_SESSION['cart']['info']['qty']} sản phẩm trong giỏ hàng.</h4>
			        </div>
			        <div class='modal-body'>
			            <table class='table' style='width:100%;'>
			                <thead>
			                    <tr>
			                        <th></th>
			                        <th>Tên sản phẩm</th>
			                        <th>Số lượng</th>
			                        <th>Giá tiền</th>
			                        <th></th>
			                    </tr>
			                </thead>
			                <tbody>";

			foreach ($_SESSION['cart']['list'] as $value) {
				$html .= "<tr class='line-item ng-scope' ng-repeat='item in OrderDetails'>
			                        <td class='item-image'>
			                            <img class='img-responsive' style='max-height:60px;' src='/public/img/{$value['image']}'>
			                        </td>
			                        <td class='item-title'>
			                            <a href='/san-pham/{$value['alias']}-{$value['id']}.html' class='ng-binding' style='color: #000;'>
			                                {$value['name']}<br>
			                            </a>
			                        </td>
			                        <td class='item-quantity'>
			                            <input type='number' data-id={$value['id']} value={$value['qty']}>
			                        </td>
			                        <td class='item-price'>".number_format($value['new_price'])."₫</td>
			                        <td class='item-delete'><a href='javascript:void(0);' data-id={$value['id']}>Xóa</a></td>
			                    </tr>";
			}
			                    
			         $html .=" </tbody>
			            </table>
			        </div>
			        <div class='modal-footer'>
			            <div class='row'>
			                <div class='col-sm-12'>
			                    <div class='total-price-modal'>
			                        Tổng cộng : <span class='item-total ng-binding'>".number_format($_SESSION['cart']['info']['total'])."₫</span>
			                    </div>
			                </div>
			            </div>
			            <div class='row margin-top-10'>
			                <div class='col-lg-6'>
			                    
			                </div>
			                <div class='col-lg-6 text-right'>
			                    <div class='buttons btn-modal-cart'>
			                        <a class='btn btn-default' href='/thanh-toan.html' style='color: #000;'>
			                            Đặt hàng
			                        </a>
			                    </div>
			                </div>
			            </div>
			        </div>";

			        echo $html;
	 }

	 public function buy($id)
	 {
	 	$this->model('product');
		$product= new Product;

		$select = "id, name, image, new_price";
		$row = $product->fetchRow($id, $select);

		if (!isset($_SESSION['cart']) || empty($_SESSION['cart'])) {
			$_SESSION['cart']['list'][$id] = $row;
			$_SESSION['cart']['list'][$id]['qty'] = 1;

		}
		else 
		{
			if (array_key_exists($id, $_SESSION['cart']['list'])) 
			{
				$_SESSION['cart']['list'][$id]['qty'] += 1;
			}
			else
			{
				$_SESSION['cart']['list'][$id] = $row;
				$_SESSION['cart']['list'][$id]['qty'] = 1;
			}
		}
	 if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
	 		$_SESSION['cart']['info']['qty'] = 0;
	 		$_SESSION['cart']['info']['total'] = 0;
	 			
	 		foreach ($_SESSION['cart']['list'] as $k => $item) {
	 	
	 			$item['cout'] = $item['new_price']*$item['qty'];
	 			$_SESSION['cart']['list'][$k]['cout'] = $item['cout'];
	 			$_SESSION['cart']['info']['qty'] += $item['qty'];
	 			$_SESSION['cart']['info']['total'] += $item['cout'];
	 		}
	 	
	 	}

		header("location: /thanh-toan.html");
	 }
	 
	 public function update_modal()
	 {
	 	$id = $_POST['id'];
	 	
	 	if (isset($_POST['qty'])){
	 		if ($_POST['qty'] < 1){
	 			unset($_SESSION['cart']['list'][$id]);
	 		} else{
	 			$_SESSION['cart']['list'][$id]['qty'] = $_POST['qty'];
	 		}
	 	} else{
	 		unset($_SESSION['cart']['list'][$id]);
	 		
	 		if (count($_SESSION['cart']['list']) == 0){
	 			unset($_SESSION['cart']['list']);
	 		}
	 	}
	 	
	 if (isset($_SESSION['cart']) && !empty($_SESSION['cart'])) {
	 		$_SESSION['cart']['info']['qty'] = 0;
	 		$_SESSION['cart']['info']['total'] = 0;
	 			
	 		foreach ($_SESSION['cart']['list'] as $k => $item) {
	 	
	 			$item['cout'] = $item['new_price']*$item['qty'];
	 			$_SESSION['cart']['list'][$k]['cout'] = $item['cout'];
	 			$_SESSION['cart']['info']['qty'] += $item['qty'];
	 			$_SESSION['cart']['info']['total'] += $item['cout'];
	 		}
	 	
	 	}
	 	
	 	$html = "<div class='modal-header'>
	 	<button type='button' class='close' data-dismiss='modal' aria-hidden='true'>
	 	×
	 	</button>
	 	<h4'>Bạn có {$_SESSION['cart']['info']['qty']} sản phẩm trong giỏ hàng.</h4>
	 	</div>
	 	<div class='modal-body'>
	 	<table class='table' style='width:100%;'>
	 	<thead>
	 	<tr>
	 	<th></th>
	 	<th>Tên sản phẩm</th>
	 	<th>Số lượng</th>
	 	<th>Giá tiền</th>
	 	<th></th>
	 	</tr>
	 	</thead>
	 	<tbody>";
	 	
	 	foreach ($_SESSION['cart']['list'] as $value) {
	 	$html .= "<tr class='line-item ng-scope' ng-repeat='item in OrderDetails'>
	 	<td class='item-image'>
	 	<img class='img-responsive' style='max-height:60px;' src='/public/img/{$value['image']}'>
	 	</td>
	 	<td class='item-title'>
	 	<a href='/san-pham/{$value['alias']}-{$value['id']}.html' class='ng-binding' style='color: #000;'>
	 	{$value['name']}<br>
	 	</a>
	 	</td>
	 	<td class='item-quantity'>
	 	<input type='number' data-id={$value['id']} value={$value['qty']}>
	 	</td>
	 	<td class='item-price'>".number_format($value['new_price'])."₫</td>
	 	<td class='item-delete'><a href='javascript:void(0);' data-id={$value['id']}>Xóa</a></td>
	 	</tr>";
	 	}
	 	 
	 	$html .=" </tbody>
	 	</table>
	 	</div>
	 	<div class='modal-footer'>
	 	<div class='row'>
	 	<div class='col-sm-12'>
	 	<div class='total-price-modal'>
	 	Tổng cộng : <span class='item-total ng-binding'>".number_format($_SESSION['cart']['info']['total'])."₫</span>
	 	</div>
	 	</div>
	 	</div>
	 	<div class='row margin-top-10'>
	 	<div class='col-lg-6'>
	 	 
	 	</div>
	 	<div class='col-lg-6 text-right'>
	 	<div class='buttons btn-modal-cart'>
	 	<a class='btn btn-default' href='/thanh-toan.html' style='color: #000;'>
	 	Đặt hàng
	 	</a>
	 	</div>
	 	</div>
	 	</div>
	 	</div>";
	 	
	 	echo $html;
	 }

	 public function remove_item($id){
	 	unset($_SESSION['cart']['list'][$id]);
	 	if (count($_SESSION['cart']['list']) == 0){
	 		unset($_SESSION['cart']);
	 	}else{
	 		foreach ($_SESSION['cart']['list'] as $k => $item) {
	 			 
	 			$item['cout'] = $item['new_price']*$item['qty'];
	 			$_SESSION['cart']['list'][$k]['cout'] = $item['cout'];
	 			$_SESSION['cart']['info']['qty'] += $item['qty'];
	 			$_SESSION['cart']['info']['total'] += $item['cout'];
	 		}
	 	}
	 	header('Location: ' . $_SERVER['HTTP_REFERER']);
	 }

}