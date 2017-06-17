<?php
/**
* 
*/
class Connection
{
	private $hostname = "localhost";
	private $database = "tcc";
	private $username = "root";
	private $password = "";

	private $connection;

	function __construct()
	{
		$this->connection = mysqli_connect($this->hostname, $this->username, $this->password, $this->database) or die ("Error " . mysqli_error($this->connection));
	}

	public function getConnection()
	{
		return $this->connection;
	}

	public function disconnect()
	{
    	mysqli_close($this->connection);
	}
}
?>