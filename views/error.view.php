<?php ob_start() ?>
<h2><?= $msg ?></h2>
<?php
$content = ob_get_clean();
$title = "ERREUR !!! ";
require_once("views/template.php");
?>
