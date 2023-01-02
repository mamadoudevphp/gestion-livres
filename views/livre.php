<?php ob_start() ?>
<div class="row">
    <div class="col-6"><img src="<?= URL ?>/public/assets/images/<?= $book->getImage()?>"></div>
    <div class="col-6">
        <p>
          <h2>Titre : <?= $book->getTitle() ?></h2>  
        </p>
        <p>
            <h2>Nombre de pages : <?= $book->getNbPages() ?></h2>
        </p>
    </div>
</div>
<?php
$content = ob_get_clean();
$title = $book->getTitle();
require_once("views/template.php");
?>