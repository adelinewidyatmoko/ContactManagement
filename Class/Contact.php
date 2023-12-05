<?php
class Contact
{
    private $db;
    private $dbName   = "contact_management";
    private $username = "root";
    private $password = "";

    public function __construct()
    {
        $this->db = new PDO("mysql:host=localhost;dbname={$this->dbName}", $this->username, $this->password);
    }

    public function getAllContacts()
    {
        $query = "SELECT*FROM contacts ORDER BY phone  ;"; # kalau menggabung 2 SQL commands dalam var tanpa
        $stmt = $this->db->query($query);
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getContactById($id)
    {
        $query = "SELECT * FROM contacts WHERE id = :id";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }
    public function addContact($name, $phone, $email, $notes)
    {
        $query = "INSERT INTO contacts (name, phone, email, notes) VALUES (:name, :phone, :email, :notes);";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':notes', $notes);
        $stmt->execute();
    }

    public function editContact($id, $name, $phone, $email, $notes)
    {
        $query = "UPDATE contacts SET name=:name, phone=:phone, email=:email, notes=:notes WHERE id=:id"; /*so aku dr tadi gak bisa submit gitu dan ke update kerena gak ada WHERE ID sama execute dibawahnya*/
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->bindParam(':name', $name);
        $stmt->bindParam(':phone', $phone);
        $stmt->bindParam(':email', $email);
        $stmt->bindParam(':notes', $notes);
        $stmt->execute();
    }

    public function delContact($id)
    {
        $query = "DELETE FROM contacts WHERE id=:id ";
        $stmt = $this->db->prepare($query);
        $stmt->bindParam(':id', $id);
        $stmt->execute();
        
        
       
    }

}
