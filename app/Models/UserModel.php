<?php

class UserModel{
private $nom;
private $email;
private $password;
private Connexion $conn;

public function __construct()
{
    $conn = new Connexion();
}

public function creatAcount()
{
    $sql = "INSERT INTO `users`(`nom`, `email`, `password`, `id_role`) VALUES (?,?,?,?,?)";
    $conn = $this->connect->getConnection();

    try {
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(1, $this->nom, PDO::PARAM_STR);
        $stmt->bindParam(3, $this->email, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->password, PDO::PARAM_STR);
        $stmt->bindParam(4, $this->id_role, PDO::PARAM_STR);
        $stmt->execute();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    } finally {
        $stmt->closeCursor();
        $conn = null;
    }
}
    public function findAcount(){
        $sql = "SELECT * from users where email=?";
        $conn = $this->connect->getConnection();
        try {
          $stmt = $conn->prepare($sql);
          $stmt->bindParam(1, $this->email, PDO::PARAM_STR);
          $stmt->execute();
          $user = $stmt->fetch(PDO::FETCH_ASSOC);
          if($user && password_verify($password, $user['password'])){
            header('location:../index/login');
            exit();
          }else{
            echo"sqdfghbjn,k;";
          }
        }catch (PDOException $e) {
          echo "Error: " . $e->getMessage();
      } finally {
          $stmt->closeCursor();
          $conn = null;
      }
}
}




