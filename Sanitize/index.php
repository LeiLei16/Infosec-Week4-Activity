<?php
// Function to sanitize input


function sanitizeInput($data) {
    $data = trim($data); // Remove unnecessary spaces before and after
    $data = stripslashes($data); // Remove backslashes
    $data = htmlspecialchars($data, ENT_QUOTES, 'UTF-8'); // Converts special characters to prevent XSS
    return $data;
}


$sanitized_name = $sanitized_email = ""; // Default empty values


if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $sanitized_name = sanitizeInput($_POST['name']);
    $sanitized_email = sanitizeInput($_POST['email']);
    $sanitized_Contact = sanitizeInput($_POST['Contact']);
    $sanitized_Message = sanitizeInput($_POST['Message']);

}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
    <style>
        body {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    width: 100vw;
    margin: 0;
}

.pink {
    width: 670px;
    height: 400px;
    margin-bottom: 10px;
    border: 3px solid black;
    border-radius: 5px;
    padding: 10px;
    background-color: pink;
}

input[type="text"],[type="email"],[type="Contact"],[type="Message"], textarea {
    padding: 12px;
    margin-bottom: 12px;
    border-radius: 4px;
    border: 2px solid black;
    width: 100%;
    box-sizing: border-box;
    font-size: 16px;
    line-height: 1.5;
}

button {
    display: block;
    margin: 15px auto;
    background-color: #ffeb3b;
    padding: 12px 20px;
    font-size: 16px;
    border: 2px solid black;
    border-radius: 8px;
    cursor: pointer;
    width: auto;
}
    </style>
</head>
<body>
    <div class = "pink">
        <form method = POST action "">
            <label for = "name">Name</label>
            <input type = "text" name = "name" id = "name" required>
            <label for = "email"> Email </label>
            <input type = "email" name = "email" id = "email" required>
            <label for = "Contact">Contact # </label>
            <input type = "Contact" name = "Contact" id = "Contact" required>
            <label for = "Message">Message </label>
            <input type = "Message" name = "Message" id = "Message" required>
            <button type = "submit"> Submit </button>
        </form>
    </div>
</body>
<?php if (!empty($sanitized_name) && !empty($sanitized_email)): ?>
       
       <div class="output">
               <h3>Sanitized Output:</h3>
   
               <p>Name: <?php echo htmlspecialchars($sanitized_name, ENT_QUOTES, 'UTF-8'); ?></p>
               <p>Email: <?php echo htmlspecialchars($sanitized_email, ENT_QUOTES, 'UTF-8'); ?></p>
               <p>Contact: <?php echo htmlspecialchars($sanitized_Contact, ENT_QUOTES, 'UTF-8'); ?></p>
               <p>Message: <?php echo htmlspecialchars($sanitized_Message, ENT_QUOTES, 'UTF-8'); ?></p>
      
           </div>
       <?php endif; ?>
</html>