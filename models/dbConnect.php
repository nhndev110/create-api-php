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
	
	public function findId($table, $id = "")
	{
		$sql = "SELECT * FROM {$table}
		WHERE id = {$id}";
		$res = mysqli_query($this->initConnect(), $sql);
		$result = mysqli_fetch_array($res);

		return $result;
	}
	
	public function store($table, $cols)
	{
		// $cols chứa những col hợp lệ
		$arr_len = count($cols);
		$idx = 1;
		$sql = "INSERT INTO {$table} ( ";
		$values = "VALUES ( ";

		foreach ($cols as $key => $value) {
			$sql .= "$key";
			$values .= "'{$value}'";

			$values .=  ($idx < $arr_len) ? ", " : " );";
			$sql .= ($idx < $arr_len) ? ", " : " )\n";

			$idx++;
		}
		
		$sql .= $values;
		
		$conn = $this->initConnect();
		mysqli_query($conn, $sql);
		$cols['id'] = mysqli_insert_id($conn);
		return $cols;
	}

	public function updateId($table, $cols)
	{
		$arr_len = count($cols);
		$idx = 1;
		$subsql = "";

		foreach ($cols as $key => $value) {
			$subsql .= "$key=$value";

			$sql .= ($idx < $arr_len) ? ",\n" : "";

			$idx++;
		}

		$sql = "UPDATE {$table}
		SET
			$subsql
		WHERE id = '$id'";

		die($sql);

		$conn = $this->initConnect();
		mysqli_query($conn, $sql);
		$cols['id'] = mysqli_insert_id($conn);
		return $cols;
	}

	public function deleteId($table, $id)
	{
		$sql = "DELETE FROM $table WHERE id = {$id}";
		mysqli_query($this->initConnect(), $sql);
	}
}
