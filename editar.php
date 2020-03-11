<?php require_once 'header.php'; ?>
<?php
use App\Classes\Produto;
use \App\Model\ProdutoDao; 
?>

<?php require_once 'vendor/autoload.php'; ?>
 
<?php
     $produtos = new Produto();
      $produtos->setId($_GET['id']);

      $produtoDao = new ProdutoDao();

      $produto = $produtoDao->selectOne($produtos);
 ?>

<div class="container">
<h1>Editar Produtos</h1>

<form action="editar-post.php" method="POST">

  <input type="hidden" name="id" value="<?php echo $produto['id']; ?>">
  <div class="form-group">
    <label for="Nome">Nome</label>
    <input type="text" class="form-control" name="nome" placeholder="Nome" value="<?php echo $produto['nome']; ?>">
  </div>

  <div class="form-group">
    <label for="Descrição">Descrição</label>
    <input type="text" class="form-control" name="descricao" placeholder="Descrição" value="<?php echo $produto['descricao']; ?>">
  </div>

  <div class="row">
    <div class="col">
    <label for="Preço">Preço</label>
      <input type="number" name="preco" class="form-control" placeholder="Preço" value="<?php echo $produto['preco']; ?>">
    </div>
    <div class="col">
    <label for="Cor">Cor</label>
      <input name="cor" type="text" class="form-control" placeholder="Cor"  value="<?php echo $produto['cor']; ?>">
    </div>
  </div>

  

  <button  type="submit" class="btn btn-success" id="btn-cadastar"> Cadastrar</button>

  
</form>


</div>




<?php require_once 'footer.php'; ?>