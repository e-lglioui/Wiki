<?php
namespace App\Models;

use App\database\Connexion;
use App\entities\User;
use PDO;
use PDOException;

class UserModel
{
    private Connexion $conn;

    public function __construct(Connexion $conn)
    {
        $this->conn = $conn;
    }

    public function createAccount(User $user)
    {
        $sql = "INSERT INTO `users`(`nom`, `email`, `password`, `id_role`) VALUES (?, ?, ?, ?)";
        $conn = $this->conn->getConnection();
    
        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindValue(1, $user->getNom(), PDO::PARAM_STR);
            $stmt->bindValue(2, $user->getEmail(), PDO::PARAM_STR);
            $stmt->bindValue(3, $user->getPassword(), PDO::PARAM_STR);
            $stmt->bindValue(4, $user->getIdRole(), PDO::PARAM_INT);
            $stmt->execute();
        } catch (PDOException $e) {
            throw new \Exception("Error creating user: " . $e->getMessage());
        } finally {
            $stmt->closeCursor();
            $conn = null;
        }
    }
    

    public function findAccount($email, $password)
    {
        $sql = "SELECT * FROM users WHERE email=?";
        $conn = $this->conn->getConnection();

        try {
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(1, $email, PDO::PARAM_STR);
            $stmt->execute();
            $user = $stmt->fetch(PDO::FETCH_ASSOC);

            if ($user && password_verify($password, $user['password'])) {
                return $user; // or return true; depending on your needs
            } else {
                return false;
            }
        } catch (PDOException $e) {
            throw new \Exception("Error finding user: " . $e->getMessage());
        } finally {
            $stmt->closeCursor();
            $conn = null;
        }
    }
}
