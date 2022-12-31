<?php
require_once("Book.class.php");
require_once("BookManager.class.php");


$book_manager = new BookManager();
$book_manager->LoadBooks();

ob_start() ?>
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
    <?php for($i = 0; $i< count($book_manager->getBooks()); $i++) : ?>
        <tr class="table-info">
            <td class="align-middle"><img src="./public/assets/images/<?= $book_manager->getBooks()[$i]->getImage() ?>" width="100px" height="auto" /></td>
            <td class="align-middle"><?= $book_manager->getBooks()[$i]->getTitle() ?></td>
            <td class="align-middle"><?= $book_manager->getBooks()[$i]->getNbPages() ?></td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="" class="btn btn-primary" >Supprimer</a></td>
        </tr>
    <?php endfor ?>
  </tbody>
</table>
<div class="d-grid gap-2">
  <button class="btn btn-lg btn-success" type="button">Ajouter un livre</button>
</div>

<?php
$content = ob_get_clean();
$title = "Livres de la bibliothèque Cheikh Anta DIOP";
require_once("template.php");
?>