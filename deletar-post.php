<?php

require_once 'vendor/autoload.php';

use \App\Classes\Produto;
use \App\Model\ProdutoDao;

try {
    

$produto = new Produto();
    
    $produto->setId($_GET['id']);

    $produtoDao = new ProdutoDao();

    $produtoDao->delete($produto);


    session_start();

    $_SESSION['msg'] = " <div class='container'> <div class='alert alert-success' role='alert'>
    Produto excluido com sucesso!
    </div> </div>";
    
        header("Location: index.php");
       
    } catch (Exception $e) {
        
        $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
       Erro ao excluir o Produto!
      </div>';
        
    }