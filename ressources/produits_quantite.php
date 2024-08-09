<?php
require_once('./config/db.php');

class ProduitsQuantites extends db
{

    private $id;

    private $quantite;

    private $tailleId;

    public function setId($id)
    {
        $this->id = $id;
    }

    public function getId()
    {
        return $this->id;
    }

    public function setQuantite($quantite)
    {
        $this->quantite = $quantite;
    }

    public function getQuantite(): int
    {
        return $this->quantite;
    }


    public function getAllQuantite()
    {
        $sql = "SELECT * FROM produits_quantite";
        $done = $this->connecte()->query($sql);
        return $done->fetchAll(PDO::FETCH_ASSOC);
    }

    public function addQuantite()
    {
        $id = $this->getId();
        $quantite = $this->getQuantite();

        $sql3 = $this->connecte()->prepare("SELECT * FROM produits_quantite WHERE produits_id = :produits_id");
        $sql3->bindParam(":produits_id", $id);
        $sql3->execute();
        $data = $sql3->fetch();

        if (!$data) {
            $sql = $this->connecte()->prepare("INSERT INTO produits_quantite (produits_id, quantites) VALUES (:produits_id, :quantites)");
        } else {
            $sql = $this->connecte()->prepare("UPDATE produits_quantite SET quantites = :quantites WHERE produits_id = :produits_id");
        }

        $sql->bindParam(":produits_id", $id);
        $sql->bindParam(":quantites", $quantite);
        $sql->execute();
    }

    public function decremequantite($param=[])
    {
        $quantites=$param['quant'];
        $id=$param['id'];
        $sql = $this->connecte()->prepare("UPDATE produits_quantite SET quantites = quantites - :quantites WHERE produits_id = :id");
        $sql->bindParam(':quantites',$quantites);
        $sql->bindParam(':id', $id);
        $sql->execute();
    }

}

