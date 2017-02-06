<?php
class Model extends database
{
	function query($sql)
	{
		$result = mysql_query($sql);
		return $result;
	}
	
	function free_query()
	{
		mysql_free_result($this->query());
	}

	function fetchRow($id, $select = '*')
	{
		$id = intval($id);
		$sql = "SELECT $select FROM `{$this->table}` WHERE id=$id";
		$result = mysql_fetch_assoc($this->query($sql));
		return $result;
	}

	function fetchAll($options = array())
	{
	    $select = isset($options['select']) ? $options['select'] : '*';
	    $where = isset($options['where']) ? 'WHERE ' . $options['where'] : '';
	    $orderBy = isset($options['orderBy']) ? 'ORDER BY ' . $options['orderBy'] : 'ORDER BY id DESC';
	    
	    if (isset($options['limit'])) {
	    	if (isset($options['offset'])) {
	    		$limit = 'LIMIT ' . $options['offset'] . ',' . $options['limit'];
	    	}
	    	else{
	    		$limit = 'LIMIT ' . $options['limit'];
	    	}
	    }
	    else{
	    	$limit = '';
	    }

	    $sql = "SELECT $select FROM `{$this->table}` $where $orderBy $limit";
	    $result = $this->query($sql);
	    $data=array();

	    if (mysql_num_rows($result) > 0) {
	        while ($row = mysql_fetch_assoc($result)) {
	            $data[] = $row;
	        }
	        mysql_free_result($result);
	    }

	    return $data;
	}

	function save($data = array()) 
	{
	    $values = array();
	    foreach ($data as $key => $value) {
	        $value = mysql_real_escape_string($value);
	        if ($key == "id") {
	        	# code...
	        }else{
	        	$values[] = "`$key`='$value'";
	        }
	    }

	    if (isset($data['id'])) {
	        $sql = "UPDATE `{$this->table}` SET " . implode(',', $values) . " WHERE id={$data['id']}";
	    } else {
	        $sql = "INSERT INTO `{$this->table}` SET " . implode(',', $values);
	    }
	    $this->query($sql);

	    $id = (isset($data['id'])) ? $data['id'] : mysql_insert_id();
	    return $id;
	}

	function delete($id)
	{
		$id = intval($id);
    	$sql = "DELETE FROM `{$this->table}` WHERE id=$id";
    	$this->query($sql);
	}

	function getNum($where = null)
	{
		if (!isset($where)) {
			$sql = "SELECT * FROM `{$this->table}`";
		} else {
			$sql = "SELECT * FROM `{$this->table}` WHERE $where";
		}
		$result = $this->query($sql);
		return mysql_num_rows($result);
	}
}