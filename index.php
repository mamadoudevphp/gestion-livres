<?php
require_once("controllers/book.controller.php");
$book_controller = new BookController();

if(empty($_GET['page'])){
    require_once("views/home.php");
} else{
    switch($_GET['page']){
        case "accueil": require_once("views/home.php");
        break;
        case "livres": $book_controller->showBooks();
    }
}