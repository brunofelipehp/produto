<?php

require_once 'vendor/autoload.php';

use \App\Classes\Produto;
 use \App\Model\ProdutoDao; 


 


$produtos = new Produto();
 $produtos->setId($_GET['id']);



 $produtoDao = new ProdutoDao();

 $produto = $produtoDao->selectOne($produtos);

 return $produto;