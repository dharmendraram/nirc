<?php
// Error reporting for debugging
ini_set('display_startup_errors', 1);
ini_set('display_errors', 1);
error_reporting(-1);

// Check if the form is submitted
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Debugging: Check if form data is received correctly
    file_put_contents("debug_log.txt", print_r($_POST, true)); // Log form data for debugging

    // Validate and sanitize inputs
    $name = isset($_POST['name']) ? trim(htmlspecialchars($_POST['name'])) : '';
    $email = isset($_POST['email']) ? trim(htmlspecialchars($_POST['email'])) : '';
    $mobile = isset($_POST['mobile']) ? trim(htmlspecialchars($_POST['mobile'])) : ''; // FIXED!
    $subject = isset($_POST['subject']) ? trim(htmlspecialchars($_POST['subject'])) : '';
    $message = isset($_POST['message']) ? nl2br(trim(htmlspecialchars($_POST['message']))) : '';

    // Check if email is valid
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo json_encode(['status' => 'error', 'message' => 'Invalid email address.']);
        exit();
    }

    // Check if any required field is empty
    if (empty($name) || empty($email) || empty($mobile) || empty($subject) || empty($message)) {
        echo json_encode(['status' => 'error', 'message' => 'All fields are required.']);
        exit();
    }

    // Sender's email address
    $from = $email;

    // Recipient's email address
    $to = "hr@nirc.com.np";

    // Email subject
    $email_subject = "New message from: $name";

    // Email body
    $email_body = "
        <html>
        <head>
            <title>$email_subject</title>
        </head>
        <body>
            <p><strong>Name:</strong> $name</p>
            <p><strong>Email:</strong> $email</p>
            <p><strong>Mobile:</strong> $mobile</p> <!-- FIXED! -->
            <p><strong>Subject:</strong> $subject</p>
            <p><strong>Message:</strong><br>$message</p>
        </body>
        </html>
    ";

    // Headers
    $headers = "From: $from\r\n";
    $headers .= "Reply-To: $from\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    // Send email
    if (mail($to, $email_subject, $email_body, $headers)) {
        echo json_encode(['status' => 'success', 'message' => 'Your message has been sent. Thank you!']);
    } else {
        echo json_encode(['status' => 'error', 'message' => 'Failed to send your message. Please try again later.']);
    }
}
?>
