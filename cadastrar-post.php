<?php

use \App\Classes\Produto;
use \App\Model\ProdutoDao;

require_once 'vendor/autoload.php';

try {


    $produto = new Produto();
    $produto->setNome($_POST['nome']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setPreco($_POST['preco']);
    $produto->setCor($_POST['cor']);

    ProdutoDao::beginTransaction();

    // Criar instância do ProdutoDao
    $produtoDao = new ProdutoDao();

    // Inserir o produto no banco de dados
    $produtoDao->create($produto);

    // Commit da transação
    ProdutoDao::commit();

    session_start();

    $_SESSION['msg'] = " <div class='container'> <div class='alert alert-success' role='alert'>
Produto cadastrado com sucesso!
</div> </div>";

    header("Location: cadastrar.php");
} catch (Exception $e) {

    $_SESSION['msg'] = "<div class='container'><div class='alert alert-danger' role='alert'>
   Error ao cadastrar o Produto!
  </div> </div>";

    header("Location: cadastrar.php");
}
