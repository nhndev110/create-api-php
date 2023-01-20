<?php

namespace App\Model;

class dbConnect
{
	private string $hostname;
	private string $username;
	private string $password;
	private string $database;

	public function __construct()
	{
	  $this->hostname = "localhost";
	  $this->username = "root";
	  $this->password = "1";
	  $this->database = "create-api-php";
	}

	public function initConnect()
	{
		$connect = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
		mysqli_set_charset($connect, 'utf8');

		return $connect;
	}

	public function selectAll($table)
	{
		$sql = "SELECT * FROM {$table}";
		$res = mysqli_query($this->initConnect(), $sql);
		
		return $res;
	}

	public function findId($table, $id)
	{
		$sql = "SELECT * FROM {$table}
		WHERE id = {$id}";
		$res = mysqli_query($this->initConnect(), $sql);
		$result = mysqli_fetch_array($res);

		return $result;
	}

	public function deleteId($table, $id)
	{
		$sql = "DELETE FROM $table WHERE id = {$id}";
		mysqli_query($this->initConnect(), $sql);
	}
}
