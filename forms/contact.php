<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Get form data
    $name = $_POST["name"];
    $email = $_POST["email"];
    $subject = $_POST["subject"];
    $message = $_POST["message"];

    // Set recipient email address
    $to = $"support@grandeurnet.com"; // Change this to your actual recipient email address

    // $from_email = "support@grandeurnet.com";

    // Set headers
    $headers = "From: $email\r\n";
    $headers .= "Reply-To: $email\r\n";
    $headers .= "Content-type: text/html\r\n";

    // Compose the email message
    $email_message = "
        <html>
        <head>
            <title>$subject</title>
        </head>
        <body>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong> $message</p>
        </body>
        </html>
    ";

    // Send the email
    $mail_success = mail($to, $subject, $email_message, $headers);

    if ($mail_success) {
        // If the email is sent successfully, you can redirect or display a success message
        echo "Your message has been. Thank you!";
    } else {
        // If there is an error in sending the email
        echo "Error sending the message. Please try again.";
    }
} else {
    // If the form is not submitted
    echo "Form not submitted.";
}
?>
