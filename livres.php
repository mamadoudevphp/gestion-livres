<?php ob_start() ?>
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
        <tr class="table-info">
            <td class="align-middle"><img src="./public/assets/images/algo.png" width="100px" height="auto" /></td>
            <td class="align-middle">L'algorithmique selon H2PROG</td>
            <td class="align-middle">300</td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="" class="btn btn-primary" >Supprimer</a></td>
        </tr>
        <tr class="table-info">
            <td class="align-middle"><img src="./public/assets/images/virus.png" width="100px" height="auto" /></td>
            <td class="align-middle">Le virus d'Asie</td>
            <td class="align-middle">200</td>
            <td class="align-middle"><a href="" class="btn btn-warning">Modifier</a></td>
            <td class="align-middle"><a href="" class="btn btn-primary" >Supprimer</a></td>
        </tr>
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