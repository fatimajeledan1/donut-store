<?php
// Check if form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Retrieve form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = $_POST["message"];

    // Validate email
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Redirect user back to the contact page with error status
        header("Location: contactus.html?status=error");
        exit();
    }

    // Example: Store data in a text file
    $file = 'contact_data.txt';
    $current_data = file_get_contents($file);
    $current_data .= "Name: $name\nEmail: $email\nMessage: $message\n\n";
    file_put_contents($file, $current_data);

    // Redirect user back to the contact page with success status
    header("Location: contactus.html?status=success&name=" . urlencode($name));
    exit();
} else {
    // If the form is not submitted, redirect the user back to the contact page
    header("Location: contactus.html");
    exit();
}
?>
