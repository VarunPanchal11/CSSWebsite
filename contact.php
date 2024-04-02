
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    // Get the form fields and remove whitespace
    $name = strip_tags(trim($_POST["name"]));
    $name = str_replace(array("\r","\n"),array(" "," "),$name);
    $email = filter_var(trim($_POST["email"]), FILTER_SANITIZE_EMAIL);
    $message = trim($_POST["message"]);

    // Check that data was sent to the mailer
    if ( empty($name) OR empty($message) OR !filter_var($email, FILTER_VALIDATE_EMAIL)) {
        // Set a 400 response code and display an error message
        http_response_code(400);
        echo "Please fill in all fields and submit the form again.";
        exit;
    }

    // Set the recipient email address
    $recipient = "department@gmail.com"; 

    // Set the email subject
    $subject = "New contact from $name";

    // Create the email content
    $email_content = "Name: $name\n";
    $email_content .= "Email: $email\n\n";
    $email_content .= "Message:\n$message\n";

    // Create the email headers
    $email_headers = "From: $name <$email>";

    // Send the email
    if (mail($recipient, $subject, $email_content, $email_headers)) {

        // Set a 200 response code
        http_response_code(200);
        echo "Thank You! Your message has been sent.";

    } 

    else {

        // Set a 500 response code
        http_response_code(500);
        echo "Something went wrong and we couldn't send your message.";

    }

} 

else {

    // Not a POST request so set a 403 response code
    http_response_code(403);
    echo "There was a problem with your submission, please try again.";

}

?>