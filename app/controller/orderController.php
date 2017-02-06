<?php
/**
* 
*/
class OrderController extends Controller
{
	public function add(){
		ob_start();
		$this->view('thanh-toan');

		$this->model('order');
		$order = new Order;

	if (isset($_POST['submit'])) {

			$data = array(
					"name"=>$_POST['txtname'],
					"phone"=>$_POST['phone'],
					"email"=>$_POST['email'],
					"address"=>$_POST['address'],
					"desc"=>$_POST['desc'],
					"detail"=>json_encode($_SESSION['cart']['list'])
				);

		$order->save($data);
		unset($_SESSION['cart']);
		header('location: /');
		}	
	}
}