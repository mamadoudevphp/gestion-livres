<?php
require_once("models/BookManager.class.php");
require_once("controllers/Book.class.php");
class BookController{
    private $book_manager;
    public function __construct(){
        $this->book_manager = new BookManager();
        $this->book_manager->LoadBooks();
    }
    public function showBooks(){
       $books = $this->book_manager->getBooks();
        require_once("views/livres.php");
    }
}