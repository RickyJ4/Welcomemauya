<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $to = "magenga56@gmail.com";
    $subject = "New Housing Application Form Submission";

    $firstName = $_POST["first-name"];
    $lastName = $_POST["last-name"];
    $message = $_POST["about-yourself"];
    $userEmail = $_POST["user-email"];

    // Check if the user provided a valid email address
    if (filter_var($userEmail, FILTER_VALIDATE_EMAIL)) {
        $headers = "From: $userEmail";
    } else {
        // If the email is not valid, use a default "From" address
        $headers = "From: webmaster@example.com";
    }

    // Construct the email message
    $emailMessage = "First Name: $firstName\n";
    $emailMessage .= "Last Name: $lastName\n";
    $emailMessage .= "About Yourself: $message\n";

    // Send the email
    if (mail($to, $subject, $emailMessage, $headers)) {
        // Redirect to a thank you page or display a success message
        header("Location: thank_you_page.html");
        exit();
    } else {
        // Display an error message or log the error
        echo "Error sending email.";
    }
    exit();
}
?>