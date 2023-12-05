<?php
// Include contact class
require_once 'Class/Contact.php';

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    // Sanitize user inputs
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $notes = $_POST['notes'];
    

    // Create a new Contact object
    $contact = new Contact();

    if(empty($_POST['name']) && empty($_POST['phone']) && empty($_POST['email'] && empty($_POST['notes']))){
        echo '<script> alert("Cannot")</script>'; 
    }
    else{
        $contact->addContact($name,$phone,$email,$notes);
        header('Location: index.php');
        exit;
    }
    
    
    // Add the new contact to the database
    


    // Redirect back to the contact list page
   
}

?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Contact</title>

    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <header>
        <h1>Contact Management System</h1>
    </header>

    <div class="container">
        <h2>Add New Contact</h2>
        <form action="add_contact.php" method="post">
            <div class="form-group">
                <label for="name">Name:</label>
                <input type="text" name="name" >
            </div>

            <div class="form-group">
                <label for="phone">Phone Number:</label>
                <input type="tel" name="phone" >
            </div>

            <div class="form-group">
                <label for="email">Email Address:</label>
                <input type="email" name="email" >
            </div>

            <div class="form-group">
                <label for="notes">Notes:</label>
                <textarea name="notes"></textarea>
            </div>

            <input type="submit" value="Add Contact">
        </form>
    </div>
</body>
</html>
