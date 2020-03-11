<?php 

namespace App\Model;

class Conexao {

 public static $conn;

  public static function getConn(){

    
    if (!isset(self::$conn)) {
           
     self::$conn = new \PDO('mysql:host=localhost;dbname=produto;charset=utf8','bruno', '2508');

        }

        return self::$conn;

    }

   
} 

