<?php
class UserController extends Controller
{
	function add(){
		$this->view('add-user');

		$this->model('user');
		$user = new User;

		if (isset($_POST['submit'])) {
			
			$data = array(
					'name'=>$_POST['name'],
					'password'=>md5($_POST['pass']),
					'email'=>$_POST['email'],
					'level'=>$_POST['level']
				);

			$user->save($data);

			//header("location: ?u=categoryController/show");
		}
	}

	public function edit()
	{

	}

	public function show()
	{
		$this->model("user");
		$user = new User;
		
		$listUser = $user->fetchAll();
		$this->view('list-user');
	} 
	
	public function delete()
	{

	}

	public function login()
	{
		// ob_start();
		// $this->view('login', array(), null);

		// if (isset($_POST['submit'])) {
			
		// 	$this->model('user');
		// 	$user = new User;

		// 	$username = $_POST['username'];
		// 	$pass = md5($_POST['password']);
		// 	$option['where'] = "name='{$username}' and password='{$pass}'";

		// 	$acc = $user->fetchAll($option);

		// 	if (count($acc) > 0) {
			    
		// 	    $_SESSION['login'] = $acc[0];
		// 	    header('location: admin.php');
  //           }             
		// }
	}

	public function logout()
	{
		unset($_SESSION['login']);
		header('location: admin.php');
	}
}