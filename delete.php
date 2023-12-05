<?php
require_once 'Class/Contact.php';
// delete process start by get the id by post method and remove from database
if(isset($_GET['id'])){

 // Sanitize user inputs
 $id = $_GET['id'];

 // Create a new Contact object
  $contact = new Contact();

// Delete the contact from the database
  $contact->delContact($id);
  
// Redirect back to the contact list page

header('Location:index.php'); 
exit;
}
   


