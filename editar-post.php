<?php



use App\Classes\Produto;
use App\Model\ProdutoDao;

require_once 'vendor/autoload.php';

try {

    $produto = new Produto();
    $produto->setNome($_POST['nome']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setPreco($_POST['preco']);
    $produto->setCor($_POST['cor']);
    $produto->setId($_POST['id']);

    $produtoDao = new ProdutoDao();

    $produtoDao->update($produto);

    session_start();

$_SESSION['msg'] = " <div class='container'> <div class='alert alert-success' role='alert'>
Produto alterado com sucesso!!!!
</div> </div>";

    header("Location: index.php");
   
} catch (Exception $e) {
    
    $_SESSION['msg'] = '<div class="alert alert-danger" role="alert">
   Erro ao excluir o sucesso!
  </div>';
    
}