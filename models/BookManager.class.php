<?php
require_once("models/Connection.model.php");
require_once("controllers/Book.class.php");
class BookManager extends Connection{
    private $books;

    public function addBook($book){
        $this->books[] = $book;
    }
    public function getBooks(){
        return $this->books;
    }

    public function LoadBooks(){
        $req = "SELECT * FROM books";
        $pdo = $this->getDatabase()->prepare($req);
        $pdo->execute();
        $books_database = $pdo->fetchAll(PDO::FETCH_ASSOC);
        $pdo->closeCursor();
        foreach($books_database as $book_database){
            $book_database = new Book($book_database['id'],$book_database['image'],$book_database['title'],$book_database['nb_pages']);
            $this->addBook($book_database);
        }
    }
}