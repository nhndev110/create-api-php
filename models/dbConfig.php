<?php

namespace App\Models;

class dbConfig
{
  protected string $hostname;
  protected string $username;
  protected string $password;
  protected string $database;

  public function __construct()
  {
    $this->hostname = "localhost";
    $this->username = "root";
    $this->password = "1";
    $this->database = "create-api-php";
  }
}
