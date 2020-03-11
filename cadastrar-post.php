<?php

require_once 'vendor/autoload.php';

use \App\Classes\Produto;
use \App\Model\Conexao;
use \App\Model\ProdutoDao;


try {
    
      
    $produto = new Produto();
    $produto->setNome($_POST['nome']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setPreco($_POST['preco']);
    $produto->setCor($_POST['cor']);

    $produtoDao = new ProdutoDao();

    $produtoDao->create($produto);
    


session_start();

$_SESSION['msg'] = " <div class='container'> <div class='alert alert-success' role='alert'>
Produto cadastrado com sucesso!
</div> </div>";

    header("Location: cadastrar.php");
   
} catch (Exception $e) {
    
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
   Produto cadastrado com sucesso!
  </div>';
    
}