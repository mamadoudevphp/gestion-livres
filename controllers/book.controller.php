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
        unset($_SESSION['alert']);
    }
    public function showBook($id){
        $book = $this->book_manager->getBookById($id);
        require_once("./views/livre.php");
    }
    public function addBook(){
        require_once("./views/addBook.php");
    }
    public function addImage($file,$dir){
        try{
        if(!empty($_FILES['image'])){
            $file_name = $_FILES['image']['name'];
            $size = $_FILES['image']['size'];
            $tmp_name = $_FILES['image']['tmp_name'];
            $error = $_FILES['image']['error'];
            $type= $_FILES['image']['type'];

            $extensions = ['png','jpg','jpeg','pdf','gif'];
            $extension = explode('.',$file_name);
            $type_file = ['image/jpg','image/jpeg','image/pdf', 'image/gif', 'image/png'];
            $max_size = 200000;
            $random = rand(0,99999);
            $target_file = $dir.$random."_".$_FILES['image']['name'];
            if(in_array($type,$type_file)){
                if(count($extension)<=2 && in_array(strtolower(end($extension)),$extensions)){
                    if($size <= $max_size && $error === 0){
                        if(move_uploaded_file($tmp_name,$target_file)){
                            $image_name = $random."_".$_FILES['image']['name'];
                            return $image_name;
                        } } else{
                            throw new Exception("Erreur durant le téléchargement de l'image");
                        }
                    } else{
                        throw new Exception("Taille d'image supérieure au maxim autorisé");
                    }
                } else{
                    throw new Exception("Veuillez rentrer un fichier image avec une extension valide");
                }

            } else{
                throw new Exception("Veuillez rentrer une image valide");
            }

        } catch( Exception $e){
    echo $e->getMessage(); } 
        } 
public function addBookValidation(){
    $file = $_FILES['image'];
    $directory = "public/assets/images/";
    $image = $this->addImage($file,$directory);
    $this->book_manager->addBookDatabase($_POST['title'],$_POST['nb_pages'],$image);
    $_SESSION["alert"] = ['type'=>'success','msg'=>'Ajout effectué avec succès'];
    header('Location: '. URL .'livres');
}
public function DeleteBook($id){
    $image_name = $this->book_manager->getBookById($id)->getImage();
    unlink("public/assets/images/".$image_name);
    $this->book_manager->DeleteBookDatabase($id);
    $_SESSION["alert"] = ['type'=>'success','msg'=>'Suppresion effectuée avec succès'];
    header('Location: '. URL .'livres');

}
public function updateBook($id){
$book_update = $this->book_manager->getBookById($id);
require_once("./views/updateBook.view.php");
}
public function updateBookValidation(){
    $current_image = $this->book_manager->getBookById((int)$_POST['login'])->getImage();
    $file = $_FILES['image'];
    $directory = "public/assets/images/";
    if($file['size'] > 0){
        unlink("public/assets/images/".$current_image);
        $modified_image = $this->addImage($file,$directory);
    } else{
        $modified_image = $current_image;
    }
    $this->book_manager->updateBookDatabase($_POST['login'],$_POST['title'],$_POST['nb_pages'],$modified_image);
    $_SESSION["alert"] = ['type'=>'success','msg'=>'Mise à jour effectuée avec succès'];
    header('Location: '. URL .'livres');

}
}
