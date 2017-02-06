<?php
class NewsController extends Controller
{
	public $name;
	public $img;
	public $desc;
	public $detail;

	public function getNews()
	{
		$this->model('news');
		$m_news = new News;

		require 'libs/simple_html_dom.php';
		$url = "http://eva.vn/";
		$html = file_get_html($url. 'lam-dep-moi-ngay-c291.html');

		foreach( $html->find('.boxDoi-sub-Item-trangtrong') as $item){
			
			$link_img = $item->find('span', 0)->find('img',0)->src;

			$this->img = "public/img/img/". basename($link_img);

			$this->name = $item->find('span', 0)->find('a',0)->title;
			$link = $item->find('span',0)->find('a',0)->href;

		$content = file_get_html($url . $link);

		$this->desc = $content->find('.baiviet-sapo',0)->innertext;
		foreach ($content->find('#baiviet-container p') as $p) {
			$this->detail .= $p;
		}

		$data = array('name'=>$this->name,
						'img'=>$this->img,
						'desc'=>$this->desc,
						'detail'=>$this->detail);
		
		file_put_contents($this->img, file_get_contents($link_img));

		$m_news->save($data);
		}
	}

	public function show()
	{

	}

	public function detail($id)
	{
		$this->model('news');
		$news = new News;

		$cur = $news->fetchRow($id);
		echo $cur['detail'];
	}
}