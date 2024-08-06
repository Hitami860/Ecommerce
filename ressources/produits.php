<?php 
require_once('./config/db.php');

class Produits extends db {

    private $name;
    
    private $description;

    private $image;

    private $prix;

    public function setName($name){
        $this->name = $name;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setDescription($description){
        $this->description = $description;
    }

    public function getDescription(): string
    {
        return $this->description;
    }

    public function setImage($image){
        $this->image = $image;
    }

    public function getImage()
    {
        return $this->image;
    }

    public function setPrix($prix){
        $this->prix = $prix;
    }

    public function getPrix(): string
    {
        return $this->prix;
    }

    public function getAllProduits()
    {
        $sql = "SELECT * FROM produits";
        $done = $this->connecte()->query($sql);
        return $done->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addProduit()
    {
        $name = $this->getName();
        $description = $this->getDescription();
        $image = $this->getImage();
        $prix = $this->getPrix();

        $sql = $this->connecte()->prepare("INSERT INTO produits (name, description, image, prix) VALUES (:name, :description, :image, :prix)");
        $sql->bindParam(":name", $name);
        $sql->bindParam(":description", $description);
        $sql->bindParam(":image", $image);
        $sql->bindParam(":prix", $prix);
        $sql->execute();
    }

    public function modifProduit($param = [])
    {
        $sql =$this->connecte()->prepare("UPDATE produits SET name = :name, description = :description, image = :image, prix = :prix WHERE id = :id");
        $sql->bindParam(":name", $param["name"]);
        $sql->bindParam(":description", $param["description"]);
        $sql->bindParam(":image", $param["image"]);
        $sql->bindParam(":prix", $param["prix"]);
        $sql->bindParam(":id", $param["id"]);
        $sql->execute();
        
    }

    public function deleteProduit($id)
    {
            $sql = $this->connecte()->prepare("DELETE FROM produits WHERE id = :id");
    
            $sql->bindParam(":id", $id);
            $sql->execute();
        
    }

    public function lastProduits()
    {
        $sql = "SELECT * FROM produits ORDER BY id DESC LIMIT 3";
        $done = $this->connecte()->query($sql);
        return $done->fetchAll(PDO::FETCH_ASSOC);
    }
}