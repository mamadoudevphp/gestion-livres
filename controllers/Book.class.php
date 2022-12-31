<?php
class Book{
    private $_id;
    private $_image;
    private $_title;
    private $_nb_pages;
    
    public function __construct($id,$image,$title,$nb_pages){
        $this->_id = $id;
        $this->_image = $image;
        $this->_title = $title;
        $this->_nb_pages = $nb_pages;
    }
    public function getId(){ return $this->_id ;}
    public function setId($id){ $this->_id = $id;}
    public function getImage(){ return $this->_image ;}
    public function setImage($image){ $this->_image = $image;}
    public function getTitle(){ return $this->_title ;}
    public function setTitle($title){ $this->_title = $title;}
    public function getNbPages(){ return $this->_nb_pages ;}
    public function setNbPages($nb_pages){ $this->_nb_pages = $nb_pages;}

    
}