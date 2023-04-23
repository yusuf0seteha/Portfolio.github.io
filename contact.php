<?php

// connect to the database
$servername = "loclhost"; // update with your database server name
$username = "yusufseteha"; // update with your database username
$password = ""; // leave empty
$dbname = "my_yusufseteha"; // update with your database name
$conn = mysqli_connect($servername, $username, $password, $dbname);


// check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// get the form data
$name = $_POST['name'];
$email = $_POST['email'];
$message = $_POST['message'];

// insert the form data into the database
$sql = "INSERT INTO `database`(`name`, `email`, `message`) VALUES ('[$name]','[$email]','[$message]');"; 


$sql = "SELECT * FROM `database`;";

if (mysqli_query($conn, $sql)) {
    // send email with new data
    $to = 'yusuf.seteha@hotmail.com'; // update with your email address
    $subject = 'New Feedback Form Submission';
    $body = "Name: $name\nEmail: $email\nMessage: $message";
    mail($to, $subject, $body);
    
    echo "Feedback inserted successfully.";
} else {
    echo "Error: " . $sql . "<br>" . mysqli_error($conn);
}

// close the database connection
mysqli_close($conn);

?>
