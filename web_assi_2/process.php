<?php
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $firstname = htmlspecialchars($_POST['firstname']);
    $lastname = htmlspecialchars($_POST['lastname']);
    $email = htmlspecialchars($_POST['email']);
    $password = htmlspecialchars($_POST['password']);
    $gender = htmlspecialchars($_POST['gender']);
    $dob = htmlspecialchars($_POST['dob']);
    $hobbies = isset($_POST['hobbies']) ? implode(", ", $_POST['hobbies']) : "None";

    // Directory to save the file
    $directory = "data"; // Ensure this folder exists and is writable
    if (!is_dir($directory)) {
        mkdir($directory, 0777, true); // Create the directory if it doesn't exist
    }

    // File path
    $filePath = $directory . "/registration_data.txt";

    // Data to save
    $fileContent = "Registration Details:\n";
    $fileContent .= "First Name: $firstname\n";
    $fileContent .= "Last Name: $lastname\n";
    $fileContent .= "Email: $email\n";
    $fileContent .= "Password: $password\n";
    $fileContent .= "Gender: $gender\n";
    $fileContent .= "Date of Birth: $dob\n";
    $fileContent .= "Hobbies: $hobbies\n";
    $fileContent .= "-----------------------------------------\n";

    // Save the data to the file
    file_put_contents($filePath, $fileContent, FILE_APPEND);

    // Display success message
    echo "<!DOCTYPE html>
    <html lang='en'>
    <head>
        <meta charset='UTF-8'>
        <meta name='viewport' content='width=device-width, initial-scale=1.0'>
        <title>Submission Success</title>
        <link rel='stylesheet' href='style.css'>
    </head>
    <body>
        <div class='container'>
            <h2>Submission Successful</h2>
            <p>Your data has been saved successfully to the server.</p>
            <p><strong>First Name:</strong> $firstname</p>
            <p><strong>Last Name:</strong> $lastname</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Password:</strong> $password</p>
            <p><strong>Gender:</strong> $gender</p>
            <p><strong>Date of Birth:</strong> $dob</p>
            <p><strong>Hobbies:</strong> $hobbies</p>
        </div>
    </body>
    </html>";
}
?>
