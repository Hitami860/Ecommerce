<?php
require_once('./config/db.php');
class Avis extends db
{

    private $note;

    private $contenu;

    private $produit_id;

    private $users_id;

    public function setNote($note)
    {
        $this->note = $note;
    }

    public function getNote() : int
    {
        return $this->note;
    }

    public function setContenu($contenu)
    {
        $this->contenu = $contenu;
    }

    public function getContenu()
    {
        return $this->contenu;
    }

    public function setProduitId($produit_id)
    {
        $this->produit_id = $produit_id;
    }

    public function getProduitId()
    {
        return $this->produit_id;
    }
    public function setUsersId($users_id)
    {
        $this->users_id = $users_id;
    }
    public function getUsersId()
    {
        return $this->users_id;
    }

    public function addAvis()
    {
        $note = $this->getNote();
        $contenu = $this->getContenu();
        $produit_id = $this->getProduitId();
        $users_id = $this->getUsersId();
        $sql = $this->connecte()->prepare('INSERT INTO avis (note, produits_id, contenu, users_id) VALUES (:note, :produit_id, :contenu, :users_id)');
        $sql->bindParam(':note', $note);
        $sql->bindParam(':produit_id', $produit_id);
        $sql->bindParam(':contenu', $contenu);
        $sql->bindParam(':users_id', $users_id);
        $sql->execute();
    }

    public function addAvisUsers($param = [])
    {
        $users_id = $param['users_id'];
        $produit_id = $param['produit_id'];
        $vote = true;
        $sql = $this->connecte()->prepare('INSERT INTO avis_users (users_id, produit_id, vote) VALUES (:users_id, :produit_id, :vote)');
        $sql->bindParam(':users_id', $users_id);
        $sql->bindParam(':produit_id', $produit_id);
        $sql->bindParam(':vote', $vote);
        $sql->execute();
    }
  
    public function getAvisUser($id, $pId)
    {
        $sql = $this->connecte()->prepare("SELECT * FROM avis_users WHERE users_id = :id AND produit_id = :pId");
        $sql->bindParam(":id", $id);
        $sql->bindParam(":pId", $pId);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }

    public function getAvisId($id) 
    {
        $sql = $this->connecte()->prepare('SELECT * FROM avis WHERE produits_id = :id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetchAll(PDO::FETCH_ASSOC);
    }
    public function getAllNotes($id)
    {
        $sql = $this->connecte()->prepare('SELECT AVG(note) FROM avis WHERE produits_id = :id');
        $sql->bindParam(':id', $id);
        $sql->execute();
        return $sql->fetch(PDO::FETCH_ASSOC);
    }
}
