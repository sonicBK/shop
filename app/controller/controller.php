<?php
class Controller
{
	public function model($model)
	{
		$file = 'app/model/'. $model .'.php';
		if (file_exists($file)) {
			require_once $file;
		}
	}
	public function view($view,$a=null, $data=array())
	{
		extract($data);
		require 'app/view/layout/header.php';

		if (isset($a)) {
			require 'app/view/layout/slider.php';
		}

		$file = 'app/view/'. $view .'.php';
		if (file_exists($file)) {
			require $file;
		}

		require 'app/view/layout/footer.php';
	}

	public function Pagination($current,$totalRecord, $limit =5)
	{
		$listPage = '';

		$totalPages = ceil($totalRecord/$limit);

		if ($totalPages > 1) {
			
			if ($current > 1) {
				
				$prev = $current -1;

				$listPage .= "<li><a href='/san-pham-{$prev}' aria-label='Previous'>
                			<span aria-hidden='true'>&laquo;</span></a></li>";
			}else{
				$listPage .= "<li><a class='disable' aria-label='Previous'>
                			<span aria-hidden='true'>&laquo;</span></a></li>";
			}

			for($i = 1; $i <= $totalPages; $i++){
				if ($i == $current) {
					$listPage .= "<li><a class='current'>{$i}</a></li>";
				}else{
					$listPage .= "<li><a href='/san-pham-{$i}'>{$i}</a></li>";
				}
			}

			if ($current < $totalPages) {
				$next = $current + 1;
				$listPage .= "<li>
              <a href='san-pham-{$next}' aria-label='Next'>
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