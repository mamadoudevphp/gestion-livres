<?php
session_start();
define("URL", str_replace("index.php","",(isset($_SERVER['HTTPS']) ? "https" : "http").
"://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));require_once("controllers/book.controller.php");
$book_controller = new BookController();
$book_manager = new BookManager();

try{
if(empty($_GET['page'])){
    require_once("views/home.php");
} else{
    $url = explode("/", filter_var($_GET['page']),FILTER_SANITIZE_URL);
    switch($url[0]){
        case "accueil": require_once("views/home.php");
        break;
        case "livres":
            if(empty($url[1])){ 
            $book_controller->showBooks();
        }
            elseif($url[1]==="b"){
                echo $book_controller->showBook((int)$url[2]);
            }elseif($url[1]==="add"){
                $book_controller->addBook();
            }
            elseif($url[1]==="add_validation"){
            $book_controller->addBookValidation();
        }  elseif($url[1]==="delete"){
            $book_controller->DeleteBook((int)$url[2]);
        }elseif($url[1]==="update"){
            $book_controller->UpdateBook((int)$url[2]);
        }elseif($url[1]==="update_validation"){
            $book_controller->UpdateBookValidation();
        } else{
                throw new Exception("Cette page n'existe pas");
            }
        break;
        default: throw new Exception("Cette page n'existe pas");
    }
}
} catch(Exception $e){
    $msg = $e->getMessage();
    require_once("./views/error.view.php");
}