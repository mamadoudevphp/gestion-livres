<?php ob_start() ?>
<form method="POST" action="<?= URL ?>livres/add_validation" enctype="multipart/form-data">
    <div class="form-group">
      <label for="title" class="form-label mt-4">Titre du livre</label>
      <input type="text" class="form-control" id="title" name="title" placeholder="Entrez le titre du livre">
    </div>
    <div class="form-group">
      <label for="nb_pages" class="form-label mt-4">Nombre de Pages</label>
      <input type="number" class="form-control" id="nb_pages" name="nb_pages" placeholder="Entrez le nombre de pages">
    </div>
    <div class="form-group">
      <label for="image" class="form-label mt-4">Image du livre</label>
      <input class="form-control" type="file" id="image" name="image">
    </div>
    <div class="form-group mt-4">
    <button type="submit" class="btn btn-primary">Soumettre l'ajout du nouveau livre</button>
    </div>
</form>
<?php
$content = ob_get_clean();
$title = "Formulaire d'ajout de livre";
require_once("views/template.php");
?>
