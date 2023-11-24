<?php
class Login
{
    private $db;

    public function __construct($host, $login, $username, $password)
    {
        try {
            $this->db = new PDO("mysql:host=$host;dbname=$login", $username, $password);
            $this->db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        } catch (PDOException $e) {
            echo "Connection failed: " . $e->getMessage();
        }
    }

    public function authenticate($username, $password)
    {
        $sql = "SELECT * FROM users WHERE username = :username";
        $stmt = $this->db->prepare($sql);
        $stmt->execute([':username' => $username]);
        
        $user = $stmt->fetch(PDO::FETCH_ASSOC);
        

        if ($user) {
        
            if ($password == $user['password']) {
                return true;
            }
        }

        return false; 
    }
}


