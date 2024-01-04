<?php require_once 'header.php'; ?>

<?php

use App\Classes\Produto;
use \App\Model\ProdutoDao;  ?>

<?php require_once 'vendor/autoload.php'; ?>


<?php

$sessao = new Produto();

$sessao->produtoSessao();

$limite = 5;

if (isset($_GET['pagina']) && (int)$_GET['pagina'] >= 0) {
  $pagina = (int)$_GET['pagina'];
} else {
  $pagina = 0;
}

// Calcula o offset
$offset = $limite * $pagina;

$produtoDao = new ProdutoDao();

$produtos  = $produtoDao->page($limite, $offset);

//pega a quantidade total de produto no banco de dados
//$produtoTotal = 0;
$total = 0;
$produtoTotal =  $produtoDao->select();
if ($produtoTotal > 0) {

  $total = count($produtoTotal);
}

//definir o numero de paginas 
$numPage = ceil($total / $limite);

?>

<div class="container" id="tabela">
  <div class="row">

    <div class="col-6">
      <a id="btn-novo" type="button" class="btn btn-primary" href="cadastrar.php">Cadastrar</a>

    </div>
    <div class="col-6">
      <form class="form-inline">

        <div class="form-group mx-sm-3 mb-2">
          <label for="inputPassword2" class="sr-only">Buscar Produto</label>
          <input type="text" class="form-control" placeholder="Buscar Produto">
        </div>
        <button type="submit" class="btn btn-primary mb-2">Buscar</button>
      </form>
    </div>
  </div>





  <table class="table table-striped">

    <thead class="thead-dark">

      <tr>
        <th scope="col">Nome</th>
        <th scope="col">Descrição</th>
        <th scope="col">Preço</th>
        <th scope="col">Cor</th>
        <th>Opções</th>
      </tr>
    </thead>
    <tbody>
      <?php if ($produtos == "") { ?>
        <tr>
          <td><?php echo "-"; ?></td>
          <td><?php echo "-"; ?></td>
          <td><?php echo "-"; ?></td>
          <td><?php echo "-"; ?></td>

          <td>
          <?php } else { ?>
            <?php foreach ($produtos as $produto) :
            ?>
        <tr>
          <td><?php echo $produto['nome']; ?></td>
          <td><?php echo $produto['descricao']; ?></td>
          <td><?php echo $produto['preco']; ?></td>
          <td><?php echo $produto['cor']; ?></td>
          <td>

            <a class="btn btn-info" href="editar.php?id=<?php echo $produto['id']; ?>" role="button"> <i class="material-icons">edit</i></a>
            <a class="btn btn-danger" data-target="#visualizar" role="button" data-toggle="modal"> <i class="material-icons">delete</i></a>



          </td>
        </tr>
    <?php endforeach;
          } ?>

    </tbody>
  </table>


  <?php require_once 'paginacao.php' ?>


</div>
<?php require_once 'modal.php' ?>
<?php require_once 'footer.php'; ?>