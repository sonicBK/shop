<?php
class OrderController extends Controller
{
	public function show()
	{
		$this->model('order');
		$order = new Order;
		
		$list_order = $order->fetchAll();
		
		$data = array(
					"list_order"=>$list_order
				);
		 
		$this->view('list-order', $data);
	}
}