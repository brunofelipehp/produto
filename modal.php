   
      <!-- Modal -->
    <div class="modal fade" id="visualizar" tabindex="-1" role="dialog" aria-labelledby="visul" aria-hidden="true">
   <div class="modal-dialog modal-lg modal-dialog-scrollable modal-dialog-centered" role="document">
    <div class="modal-content">
    <?php require_once 'vendor/autoload.php'; ?>
    
      <div class="modal-header">
        <h5 class="modal-title" id="visul">Produto</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">

    <h4>Deseja excluir o Produto?</h4>

      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
        <a href="deletar-post.php?id=<?php echo $produto['id']; ?>" class="btn btn-primary">Sim</a>
      </div>
    </div>
  </div>
</div>