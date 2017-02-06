<?php
require 'libs/libs.php';

class ProductController extends Controller
{
	public function add(){

		ob_start();

		$this->model('category');
		$cate = new Category;
		$listCate = $cate->fetchAll();
		$data['listCate'] = $listCate;

		$this->model('product');
		$product = new Product;

		$this->view('add-product', $data);

		if ($_SERVER['REQUEST_METHOD'] == 'POST') {

			$lib = new Libs;

			$uploadImage = $lib->UploadFile('fImage', $_POST['txtname']);

			$data = array(
						'name'=>$_POST['txtname'],
						'new_price'=>$_POST['new-price'],
						'old_price'=>$_POST['old-price'],
						'cate_id'=>$_POST['cate'],
						'image'=>$uploadImage,
						'desc'=>$_POST['txtDesc'],
						'detail'=>$_POST['txtDetail'],
						'status'=>$_POST['status'],
						'keywords'=>$_POST['keywords']
				);

			$data['alias'] = $lib->alias($_POST['txtname']);

			$product->save($data);

			if (isset($_POST['submit'])) {
				header('location: ?u=productController/show');
			}

			if (isset($_POST['continue'])) {
				header("refresh: 0");
			}
		}
	}

	public function edit($id){

		ob_start();

		$this->model('product');
		$product = new Product;
		$current = $product->fetchRow($id);

		$this->model('category');
		$category = new Category;
		$listCate = $category->fetchAll();

		$data['product'] = $current;
		$data['listCate'] = $listCate;

		$this->view('edit-product', $data);

		if (isset($_POST['submit'])) {

			$lib = new Libs;

			$uploadImage = $lib->UploadFile('fImage', $_POST['txtname']);
			
			$data = array(
						'id'=>$id,
						'name'=>$_POST['txtname'],
						'new_price'=>$_POST['new-price'],
						'old_price'=>$_POST['old-price'],
						'cate_id'=>$_POST['cate'],
						'image'=>$uploadImage,
						'desc'=>$_POST['txtDesc'],
						'detail'=>$_POST['txtDetail'],
						'status'=>$_POST['status'],
						'keywords'=>$_POST['keywords']
				);

			$data['alias'] = $lib->alias($_POST['txtname']);

			$product->save($data);
			header('location: ?u=productController/show');
		}

		if (isset($_POST['cancel'])) {
			header('location: ?u=productController/show');
		}
	}

	public function delete($id){

		$this->model('product');
		$product = new Product;

		$current = $product->fetchRow($id);

		$fImage = "public/img/".$current['image'];
		if(file_exists($fImage)){
			unlink($fImage);
		}

		$product->delete($id);

		header('location: ?u=productController/show');
	}

	public function show(){

		$this->model('category');
		$category = new Category;
		$listCate = $category->fetchAll();

		$this->model('product');
		$product = new Product;

		if (func_num_args() > 0) {
			$page = func_get_arg(0);
		}else{
			$page = 1;
		}

		$option['limit'] = 5;
		$option['offset'] = ($page-1)*$option['limit'];
		$listProduct = $product->fetchAll($option);

		$listPages = $this->Pagination($page, $product->getNum(), $option['limit']);

		foreach ($listProduct as $k1 => $pro) {
			foreach ($listCate as $k2 => $cat) {
				if ($pro['cate_id'] == $cat['id']) {
					$listProduct[$k1]['cate'] = $cat['name'];
					break;
				}
			}
		}
		$data['listProduct'] = $listProduct;
		$data['listPages'] = $listPages;

//var_dump($listProduct);
	$this->view('list-product', $data);

	}

	public function update_status()
	{
		$id = $_GET['id'];
		if (isset($_GET['status'])) {
			switch ($_GET['status']) {
				case 1:
					$status = 0;
					$html_icon = '<i class="fa fa-toggle-off"></i>';
					break;
				
				case 0:
					$status = 1;
					$html_icon = '<i class="fa fa-toggle-on"></i>';
					break;
			}
		}
		$data = array('id'=>$id, 'status'=>$status);

		$this->model('product');
		$product = new Product;
		$product->save($data);

		$result = array('status'=>$status, 'icon'=>$html_icon);
		echo json_encode($result);
	}

}