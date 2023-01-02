<?php
require_once("controllers/Book.class.php");
require_once("models/BookManager.class.php");
ob_start();
 if(!empty($_SESSION['alert'])) : ?>
  <div class="alert alert-dismissible alert-<?= $_SESSION['alert']['type'] ?>" >
  <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
  <strong><?= $_SESSION['alert']['msg'] ?></strong> 
</div>
<?php  endif ?>

<table class="table table-hover">
  <thead>
    <tr>
      <th scope="col">Image</th>
      <th scope="col">Titre</th>
      <th scope="col">Nombre de Pages</th>
      <th scope="col" colspan="2">Actions</th>
    </tr>
  </thead>
  <tbody>
    <?php for($i = 0; $i< count($books); $i++) : ?>
        <tr class="table-info">
            <td class="align-middle"><img src="./public/assets/images/<?= $books[$i]->getImage() ?>" width="100px" height="auto" /></td>
            <td class="align-middle"><a href="<?= URL ?>/livres/b/<?= $books[$i]->getId() ?>"><?= $books[$i]->getTitle() ?></a></td>
            <td class="align-middle"><?= $books[$i]->getNbPages() ?></td>
            <td class="align-middle">
              <form method="POST" action="<?=URL ?>livres/update/<?= $books[$i]->getId() ?>">
              <button type="submit" class="btn btn-warning">Modifier</button>
              </form>
            </td>
            <td class="align-middle">
              <form method="POST" action="<?=URL ?>livres/delete/<?= $books[$i]->getId() ?>" onsubmit="return confirm('Voulez-vous vraiment supprimer le livre ?');">
              <button type="submit" class="btn btn-primary">Supprimer</button>
              </form>
            </td>
        </tr>
    <?php endfor ?>
  </tbody>
</table>
<div class="d-grid gap-2">
  <a class="btn btn-lg btn-success" href="<?= URL ?>livres/add"><button class="btn btn-lg btn-success" type="button">Ajouter un livre</button></a>
</div>

<?php
$content = ob_get_clean();
$title = "Livres de la bibliothèque Cheikh Anta DIOP";
require_once("views/template.php");
?>