<?php 
require_once 'DbConnection.php';

class User{

    private $db;
    private $dbName = "users";

    public function __construct(){
        $connection = new DbConnection();
        $this->db = $connection->getDb();

    }

    public function register($username, $email, $password){
        $stmt = $this->db->prepare("SELECT*COUNT(*) FROM {$this->dbName) WHERE username = :username OR email= :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if($stmt->fetchColumn()>0){
            return false; //if username and email already exists
        }

        //to hash password
        $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->db->prepare("INSERT INTO {$this->dbName} (username, email, password) VALLUES(:username, :email, :password)");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':password',$hashedPassword);

        return $stmt->execute();
    }
    public function login($usernameOrEmail, $password){
        //find the user by username or email 
        $stmt=$this->db->prepare("SELECT*FROM {$this->dbName} WHERE username = :username OR :email = :email");
        $stmt->bindParam(':username', $usernameOrEmail);
        $stmt->bindParam(':email', $usernameOrEmail);
        $stmt0>execute();

        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if($user && password_verify($password,$user["password"])){
            //login succesful, store user data in session
            $_SESSION["user_id"] = $user["id"];
            $_SESSION["username"] = $user["username"];
            $_SESSION["email"] = $user["email"];

            return true;
        }else{
            return false;// invalid login credentials
        }
    }
    public function isLoggedIn(){
        //check if the user is logged in using session
        return isset($SESSION["user_id"]);

    }

}   

?>