<?php
/**
* 
*/
class ProductController extends Controller
{
	public function index()
	{
		// require 'app/controller/newsController.php';
		// $news = new NewsController;
		// $news->getNews();

		$this->model('news');
		$m_news = new News;

		$dk['select'] = '`id`, `name`, `desc`, `img`, `create_at`';
		$dk['limit'] = 9;
		$listNews = $m_news->fetchAll($dk);

		$this->model('product');
		$product = new Product;

		$options['limit'] = 12;
		$options['offset'] = 0;
		$options['where'] = 'status=1';
		$listProducts = $product->fetchAll($options);

		$special['limit'] = 3;
		$special['orderBy'] = 'views desc';
		$special['where'] = 'status = 1';

		$listSpecials = $product->fetchAll($special);

		$data = array('listProducts'=>$listProducts,
						'listSpecials'=>$listSpecials,
						'listNews'=>$listNews,
						'title'=>"shop mỹ phẩm giá rẻ bất chấp");

		$this->view('index', 1, $data);
		
	}

	public function show_list($current=1)
	{
		$this->model('product');
		$product = new Product;

		$options['limit'] = 12;
		$options['offset'] = ($current- 1)*$options['limit'];
		$options['where'] = 'status=1';

		$listProducts = $product->fetchAll($options);

		$where = 'status=1';
		$totalRecord = $product->getNum($where);

		$listPages = $this->Pagination($current, $totalRecord, $options['limit']);

		$data['listProducts'] = $listProducts;
		$data['listPages'] = $listPages;
		$data['title'] = "danh muc sản phẩm";
		
		$this->view('product',null,$data);
	}

	public function detail()
	{
		$id = func_get_arg(0);
		$this->model('product');
		$product = new Product;

		$pro = $product->fetchRow($id);

		$options['orderBy'] = 'views desc';
		$options['limit'] = 4;

		$listSpecials = $product->fetchAll($options);

		$dk['orderBy'] = 'RAND()';
		$dk['limit'] = 6;
		$dk['where'] = 'id <> '. $id;

		$relative = $product->fetchAll($dk);

		$data = array('product'=>$pro,
						'listSpecials'=>$listSpecials,
						'relative'=>$relative,
						'title'=>$pro['name']);

		if (!isset($_SESSION['count'][$id])) {
			$_SESSION['count'][$id] = 1;
			$product->count_views($id);
		}

		$this->view('detail', null, $data);
	}
}