<?php
require_once("./config/db.php");
class panier extends db
{

    private $produits_id;

    private $total;

    private $rowguid;

    private $reduction_id;

    public $db;

    private $panier;

    private $calculetotal;

    private $taille;


    public function __construct()
    {
        $this->db = $this->connecte();
    }

    public function setProduitsid($produits_id)

    {

        $this->produits_id = $produits_id;
    }

    public function getProduitsid()

    {

        return $this->produits_id;
    }

    public function setTotal($total)

    {

        $this->total = $total;
    }

    public function getTotal()

    {

        return $this->total;
    }
    public function setRowguid($rowguid)

    {

        $this->rowguid = $rowguid;
    }

    public function getRowguid()

    {

        return $this->rowguid;
    }

    public function setReductionid($reduction_id)

    {

        $this->reduction_id = $reduction_id;
    }

    public function getReductionid()

    {

        return $this->reduction_id;
    }

    public function setTaille($taille)
    {
        $this->taille = $taille;
    }

    public function getTaille()
    {
        return $this->taille;
    }



    public function getArticle($id)
    {
        $sql = $this->db->prepare("SELECT * FROM produits WHERE id = :id");
        $sql->bindParam(":id", $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }




    public function addPanier()
    {


        $produits_id = $this->getProduitsid();
        $total = $this->getTotal();
        $reduction_id = $this->getReductionid();
        $rowguid = $this->getRowguid();
        $taille = $this->getTaille();

        $sql2 = $this->db->prepare("SELECT * FROM panier WHERE rowguid = :rowguid AND produits_id = :produits_id AND taille_id = :taille_id");
        $sql2->bindParam(":produits_id", $produits_id);
        $sql2->bindParam(':rowguid', $rowguid);
        $sql2->bindParam(':taille_id', $taille);
        $sql2->execute();
        $exist = $sql2->fetch(PDO::FETCH_ASSOC);

        if ($exist) {
            $sql = $this->db->prepare("UPDATE panier SET total = :total WHERE rowguid = :rowguid AND produits_id = :produits_id");
            $sql->bindParam(':produits_id', $exist["produits_id"]);
            $sql->bindParam(':rowguid', $rowguid);
            $sql->bindParam(':total', $total);

        } else {
            $sql = $this->db->prepare("INSERT INTO panier (produits_id, total, reduction_id, rowguid, taille_id) VALUES (:produits_id, :total, :reduction_id, :rowguid, :taille_id)");
            $sql->bindParam(':produits_id', $produits_id);
            $sql->bindParam(':rowguid', $rowguid);
            $sql->bindParam(':total', $total);
            $sql->bindParam(':reduction_id', $reduction_id);
            $sql->bindParam(':taille_id', $taille);
        }


        $sql->execute();
    }

    public function deletePanier($id)
    {
        $sql = $this->db->prepare("DELETE FROM panier WHERE produits_id = :id");
        $sql->bindParam(':id', $id);
        $sql->execute();
    }

    public function tailleAffiche($id)
    {
        $sql= $this->db->prepare('SELECT taille.taille, produits_quantite.produits_id FROM taille 
                                                        JOIN produits_quantite ON taille.id = produits_quantite.taille_id
                                                        WHERE produits_quantite.produits_id = :id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        
    }
}
