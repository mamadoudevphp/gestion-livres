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
    public function getBookById($id){
        for($i = 0; $i < count($this->books); $i++){
            if($this->books[$i]->getId() === $id){
                return $this->books[$i];
            }
        }
    }
    public function addBookDatabase($title,$nb_pages,$image){
        $req = "INSERT INTO books (title, nb_pages, image)
                values(:title, :nb_pages, :image)
                ";
        $stmt = $this->getDatabase()->prepare($req);
        $stmt->bindValue(":title",$title,PDO::PARAM_STR);
        $stmt->bindValue(":nb_pages",$nb_pages,PDO::PARAM_INT);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $result = $stmt->execute();
        $stmt->closeCursor();
        if($result > 0){
        $add_book_database = new Book($this->getDatabase()->lastInsertId(),$image,$title,$nb_pages);
        $this->addBook($add_book_database);
        }
    }
    public function DeleteBookDatabase($id){
        $req = "DELETE FROM books WHERE id = :id ";
        $stmt = $this->getDatabase()->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $result = $stmt->execute();
        $stmt->closeCursor();
        if($result > 0){
            $book_delete = $this->getBookById($id);
            unset($book_delete);
        }
    }
    public function updateBookDatabase(int $id, string $title,int $nb_pages, string $image){
        $req = "UPDATE books  set title = :title, nb_pages = :nb_pages, image = :image
                WHERE id = :id ";
        $stmt = $this->getDatabase()->prepare($req);
        $stmt->bindValue(":id",$id,PDO::PARAM_INT);
        $stmt->bindValue(":title",$title,PDO::PARAM_STR);
        $stmt->bindValue(":nb_pages",$nb_pages,PDO::PARAM_INT);
        $stmt->bindValue(":image",$image,PDO::PARAM_STR);
        $result = $stmt->execute();
        if($result > 0){
            $this->getBookById($id)->setTitle($title);
            $this->getBookById($id)->setNbPages($nb_pages);
            $this->getBookById($id)->setImage($image);

        }


    }
}