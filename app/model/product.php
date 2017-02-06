<?php
class Product extends Model
{
	protected $table = "products";

	public function count_views($id)
	{
		$row = $this->fetchRow($id);
		$views = $row['views'] + 1;

		$data = array(
			'id'=>$id,
			'views'=>$views);
		$this->save($data);
	}
}