
    <nav  class=" Page" aria-label="Page navigation ">
      <ul class="pagination justify-content-center">
        <li class="page-item">
          <a class="page-link" href="index.php?pagina=0" aria-label="Previous">
            <span aria-hidden="true">&laquo;</span>
          </a>
        </li>

        <?php
        for ($i = 0; $i < $numPage; $i++) { ?>
        <?php
        $selecao = "";
        if($pagina ==  $i)
         $selecao = "class=\"page-item active\"";
        ?>
          <li <?php echo $selecao ?>  ><a class="page-link" href="index.php?pagina=<?php echo $i ?>">
              <?php echo $i + 1; ?></a></li>
        <?php   } ?>
        <li class="page-item">
          <a class="page-link" href="index.php?pagina=<?php echo $numPage - 1; ?>" aria-label="Next">
            <span aria-hidden="true">&raquo;</span>
          </a>
        </li>
      </ul>
    </nav>