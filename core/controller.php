<?php
class Controller
{
	public function model($model)
	{
		$file = 'admin/model/'. $model .'.php';
		if (file_exists($file)) {
			require $file;
		}
	}
	public function view($view, $data=array(), $a=1)
	{
		extract($data);
		if (isset($a)) {
			require 'admin/view/layout/master.php';
		}

		$file = 'admin/view/'. $view .'.php';
		if (file_exists($file)) {
			require $file;
		}
	}

	public function Pagination($current,$totalRecord, $limit =5)
	{
		$listPage = '';

		$totalPages = ceil($totalRecord/$limit);

		if ($totalPages > 1) {
			
			if ($current > 1) {
				
				$prev = $current -1;

				$listPage .= "<li><a href='?u=productController/show/{$prev}' aria-label='Previous'>
                			<span aria-hidden='true'>&laquo;</span></a></li>";
			}else{
				$listPage .= "<li><a class='disable' aria-label='Previous'>
                			<span aria-hidden='true'>&laquo;</span></a></li>";
			}

			for($i = 1; $i <= $totalPages; $i++){
				if ($i == $current) {
					$listPage .= "<li><a class='current'>{$i}</a></li>";
				}else{
					$listPage .= "<li><a href='?u=productController/show/{$i}'>{$i}</a></li>";
				}
			}

			if ($current < $totalPages) {
				$next = $current + 1;
				$listPage .= "<li>
              <a href='?u=productController/show/{$next}' aria-label='Next'>
                <span aria-hidden='true'>&raquo;</span>
              </a>
            </li>";
			}else{
				$listPage .= "<li>
              <a class='disable' aria-label='Next'>
                <span aria-hidden='true'>&raquo;</span>
              </a>
            </li>";
			}
		}
		  return $listPage;
	}

}