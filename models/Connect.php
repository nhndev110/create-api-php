<?php

namespace App\Model;

class Connect
{
  private string $hostname = "localhost";
  private string $username = "root";
  private string $password = "1";
  private string $database = "create-api-php";
  private $connect;

  public function __contruct()
  {
    $this->connect = mysqli_connect($this->hostname, $this->username, $this->password, $this->database);
    mysqli_set_charset($this->connect, 'utf8');
  }

  public function query($sql)
  {
    mysqli_query($this->connect, $sql);
  }

  public function query_result($sql)
  {
    $result = mysqli_query($this->connect, $sql);
    return $result;
  }


  public function __destruct()
  {
    mysqli_close($this->connect);
  }
}
