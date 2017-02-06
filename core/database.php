<?php 
	class database
	{
		protected $host = 'localhost';
		protected $user = 'root';
		protected $pass = '';
		protected $db 	= 'shop';

		// protected $host = 'localhost';
		// protected $user = 'sonic123_hao';
		// protected $pass = 'sonic20120355';
		// protected $db 	= 'sonic123_smarthome';

		function __construct()
		{
			$conn = mysql_connect($this->host, $this->user, $this->pass) or die('not connect to host'. mysql_error());
			if ($conn) {
				mysql_select_db($this->db) or die('error');
			}
			mysql_query("SET NAMES 'utf8';"); 
			// mysql_query("SET CHARACTER SET 'utf8';"); 
		}
	}
?>