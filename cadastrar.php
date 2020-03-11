<?php

use App\Classes\Produto;

require_once 'header.php';
require_once 'vendor/autoload.php';
?>

<?php

$sessao = new Produto();

$sessao->produtoSessao();

?>

<div class="container">
  <h1>Cadastar Produtos</h1>
  <form action="cadastrar-post.php" method="POST">
    <div class="form-group">
      <label for="Nome">Nome</label>
      <input type="text" class="form-control" name="nome" placeholder="Nome">
    </div>

    <div class="form-group">
      <label for="Descrição">Descrição</label>
      <input type="text" class="form-control" name="descricao" placeholder="Descrição">
    </div>

    <div class="row">
      <div class="col">
        <label for="Preço">Preço</label>
        <input type="number" name="preco" class="form-control" placeholder="Preço">
      </div>
      <div class="col">
        <label for="Cor">Cor</label>
        <input name="cor" type="text" class="form-control" placeholder="Cor">
      </div>
    </div>

    <button type="submit" class="btn btn-primary" id="btn-cadastar"> Cadastrar</button>


  </form>


</div>




<?php require_once 'footer.php'; ?>