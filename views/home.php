<?php ob_start() ?>
contenu initial
<?php
$content = ob_get_clean();
$title = "Bibilothèque Cheikh Anta DIOP";
require_once("views/template.php");
?>
