<?php 
require_once 'Class/Contact.php'; 

if($_SERVER["REQUEST_METHOD"] === "POST"){
    $id = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $notes = $_POST['notes'];
}

$contact = new Contact();

 $contact->editContact($id, $name, $phone, $email, $notes);


header('Location:index.php');
exit;

?>