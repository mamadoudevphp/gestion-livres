<?php ob_start() ?>
<form method="POST" action="<?= URL ?>livres/update_validation" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title" class="form-label mt-4">Titre du livre</label>
      <input type="text" class="form-control" id="title" name="title" value="<?= $book_update->getTitle() ?>">
    </div>
    <div class="form-group">
      <label for="nb_pages" class="form-label mt-4">Nombre de Pages</label>
      <input type="number" class="form-control" id="nb_pages" name="nb_pages" value="<?= $book_update->getNbPages() ?>">
    </div>
    <div>
        <h3>Image actuelle du livre</h3>
        <img src="<?= URL ?>public/assets/images/<?= $book_update->getImage() ?>" />
    </div>
    <div class="form-group">
      <label for="image" class="form-label mt-4">Image du livre</label>
      <input class="form-control" type="file" id="image" name="image">
    </div>
    <div class="form-group mt-4">
    <button type="submit" class="btn btn-primary">Valider la modification du livre</button>
    <input type="hidden" name="login" value="<?= $book_update->getId() ?>" >
    </div>
</form>
<?php
$content = ob_get_clean();
$title = "Formulaire de modification du livre : ". $book_update->getTitle();
require_once("views/template.php");
?>
