<?php
if(!isset($_POST['submit']))
{
    echo "Error! No information submitted! No direct access allowed.";
}
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$location = $_POST['location'];
$guests = $_POST['guests'];
$date = $_POST['date'];
$eventType = $_POST['eventType'];
$setup = $_POST['setup'];
$notes = $_POST['notes'];

if(empty($name)||empty($email)||empty($phone)) 
{
    echo "Name, email, and phone fields are required!";
    exit;
}

if(IsInjected($email))
{
    echo "Bad email value!";
    exit;
}

// $email_from = '';
// $email_subject = "New Event Inquiry";
// $email_body = "You have received a new message from $name.\n".
//     "Here is the message:\n $message".
    
// $to = "tom@amazing-designs.com";//<== update the email address
// $headers = "From: $email_from \r\n";
// $headers .= "Reply-To: $visitor_email \r\n";

//Send the email!

// mail($to,$email_subject,$email_body,$headers);

//redirects after form submission completes successfully.
header('Location: thankyou.html');

function IsInjected($str)
{
$injections = array('(\n+)',
                    '(\r+)',
                    '(\t+)',
                    '(%0A+)',
                    '(%0D+)',
                    '(%08+)',
                    '(%09+)'
                    );
$inject = join('|', $injections);
$inject = "/$inject/i";
if(preg_match($inject,$str))
    {
    return true;
    }
else
    {
    return false;
    }
}
?>
