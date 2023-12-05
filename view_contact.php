<?php
// Include contact class
require_once 'Class/Contact.php';

// Check if the contact ID is provided in the URL
if (isset($_GET['id']) && !empty($_GET['id'])) {
    $contact_id = $_GET['id'];

    // Create a new Contact object
   $contact = new Contact();

    // Retrieve contact details from the database
    $contact_details = $contact->getContactById($contact_id);

    
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Contact Details</title>

    <link rel="stylesheet" href="css/view_contact.css">
</head>
<body>
    <header>
        <h1>Contact Management System</h1>
    </header>

    <div class="container">
    <?=$contact_details['name']?>
        <?php if (isset($contact_details)) : ?>
            <h2>Contact Details</h2>
            <p>Name : <?=$contact_details['name']?></p>
            <p>Phone : <?=$contact_details['phone']?></p>
            <p> Email : <?=$contact_details['email']?></p>
            <p> Notes : <?=$contact_details['notes']?></p>
            
        <?php else : ?>
            <p>Contact not found.</p>
        <?php endif ?>
        <a class="back-link" href="index.php">Back to Contact List</a>
        <a class="back-link" href= <?php echo "edit.php?id={$contact_details['id']}"?>>Edit Contact</a><!--dari tadi gak bisa di edit file muncul sesuai input karena .. jadi project ceud ini itu selalu rely on get id . id nya muncul di link berati ke connect-->
        <a class="back-link" href= <?php echo "delete.php?id={$contact_details['id']}"?>> Delete Contact </a>    
    </div>
</body>
</html>
