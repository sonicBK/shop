<?php
require 'libs/libs.php';

class CategoryController extends Controller
{
	public function add(){

		ob_start();

		$this->model('category');

		$category = new Category;

		$cates = $category->fetchAll();

		$data['cates'] = $cates;

		$this->view('add-cate', $data);

		$lib = new Libs;

		if (isset($_POST['submit'])) {
			
			$data = array(
					'name'=>$_POST['txtName'],
					'parent_id'=>$_POST['parent_id'],
					'desc'=>$_POST['txtDesc']
				);
			$data['alias']=$lib->alias($_POST['txtName']);

			$category->save($data);

			header("location: ?u=categoryController/show");
		}
	}

	public function show(){

		$this->model('category');

		$category = new Category;

		$listCate = $category->fetchAll();
		
		$data = array("listCate"=>$listCate);
		
		$this->view('list-cate', $data);
	}

	public function edit(){

		ob_start();

		$id = func_get_arg(0);

		$this->model('category');

		$category = new Category;

		$cate = $category->fetchRow($id);

		$listCate = $category->fetchAll();

		$data = array('cate'=>$cate,
						'listCate'=>$listCate);

		$this->view('edit-cate', $data);

		if (isset($_POST['submit'])) {
			$data = array('id'=>$id,
						'name'=>$_POST['txtName'],
						'parent_id'=>$_POST['parent_id'],
						'desc'=>$_POST['txtDesc']
						);

			$category->save($data);
			header("location: ?u=categoryController/show");
		}

		if (isset($_POST['cancel'])) {
			header('location: ?u=categoryController/show');
		}
	}

	public function delete(){

		$id = func_get_arg(0);

		$this->model('category');

		$category = new Category;

		$category->delete($id);

		header("Location: ?u=categoryController/show");
	}

}