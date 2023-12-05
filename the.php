<?php 
require_once 'Class/Contact.php';


$contact = new Contact();

$contacts = $contact->getAllContacts();



?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ul class="contact-list">
            <?php foreach($contacts as $contact):?>
                <li><a href =<?php echo "view_contact.php?id={$contact['id']}"?>><?=$contact['name']?></a> </li>
                    
            
            <?php endforeach;?>
            <!-- Display each contact in the list -->
            
        </ul>
</body>
</html>