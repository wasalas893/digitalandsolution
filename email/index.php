<?php
    header("Access-Control-Allow-Origin: *");

    if (!$_POST) {
        echo json_encode(['status'=>'error', 'message'=>'invalid request']); die();
    }

    if (empty($_POST["name"]) or empty($_POST["phone"]) or empty($_POST["email"])) {
        echo json_encode(['status'=>'error', 'message'=>'Please fill the required fields']); die();
    }

    $subject = $_POST["subject"];
    $name = $_POST["name"];
    $email = $_POST["email"];
    $message = !empty($_POST["message"]) ? $_POST["message"] : '';
   
 
    $to = "wasalas893@gmail.com";
    $from = $email;
    $subject = 'Inquiry - Digital & Solution';

    $headers =  "From: " . strip_tags($from) . "\r\n";
    $headers .= "MIME-Version: 1.0\r\n";
    $headers .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

    $body = '<html><body>';
    $body .= '<p> <lable><strong>Subject:</strong></lable> '.$subject.'</p>';
    $body .= '<p> <lable><strong>Full Name:</strong></lable> '.$name.'</p>';
    $body .= '<p> <lable><strong>Email:</strong></lable> '.$email.'</p>';
    $body .= '<p> <lable><strong>Message:</strong></lable> '.$message.'</p>';
    $body .= '</body></html>';

    if (mail($to, $subject, $body, $headers)) {

        $subject_client = 'Inquiry - Digital & Solution';

        $headers_client =  "From: " . strip_tags('digitalcontactsolutions@gmail.com') . "\r\n";
        $headers_client .= "BCC: digitalcontactsolutions@gmail.com\r\n";
        $headers_client .= "MIME-Version: 1.0\r\n";
        $headers_client .= "Content-Type: text/html; charset=ISO-8859-1\r\n";

        $body_client = '<html><body>';
        $body_client .= '<p>Thank you for reaching us,<br>One of our customer service representatives will get back to your enquiry very soon.</p>';
        $body_client .= '</body></html>';
        mail($from, $subject_client, $body_client, $headers_client);

        echo json_encode(['status'=>'success', 'message'=>'Email sent successfully! ']); die();
    }
    else {
        echo json_encode(['status'=>'error', 'message'=>'Sending failed! Please contact the system administrator']); die();
    }
    
?>