<?php

require_once("./config/db.php");

class Users extends db{


private $name;
private $email;
private $password;
private $statut;


public function getName()
{
return $this->name;
}

public function setName($name)
{
$this->name= $name;

return $this;
}

public function getEmail()
{
return $this->email;
}


public function setEmail($email)
{
$this->email = $email;

return $this;
}


public function getPassword()
{
return $this->password;
}


public function setPassword($password)
{
$this->password = $password;

return $this;
}

public function getStatut()
{
return $this->statut;
}


public function setStatut($statut)
{
$this->statut = $statut;

return $this;
}

public function getAllUsers()
{
    $sql = "SELECT * FROM users";
    $done = $this->connecte()->query($sql);
    return $done->fetchAll(PDO::FETCH_ASSOC);
}
public function addUsers()
{
    $email = $this->getEmail();
    $name = $this->getName();
    $password = $this->getPassword();
    $sql = $this->connecte()->prepare("INSERT INTO users (statut,email,`name`,password) VALUES ('utilisateur',:email,:name,:password ) ");
    $sql->bindParam(":email", $email);
    $sql->bindParam(":name", $name);
    $sql->bindParam(":password", $password);
    $sql->execute();
}
public function userConnect($tab = [])
{
    $user = $this->getAllUsers();
    foreach ($user as $users) {
        if (($tab['name'] == $users['name'] || $tab['name'] == $users['email']) && password_verify($tab['password'], $users['password'])) {
            return $users;
        }
    }
       }

}