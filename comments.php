<?php
session_start();
$sname = "localhost";
$unmae = "root";
$password = "";

$db_name = "web";

$conn = mysqli_connect($sname, $unmae, $password, $db_name);

if (!$conn) {
    echo "Connection failed!";
}


if (isset($_POST['name']) && isset($_POST['email'])
    && isset($_POST['subject']) && isset($_POST['msg'])
) {
    function validate($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

//        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

    $name = validate($_POST['name']);
    $email = validate($_POST['email']);

    $subject = validate($_POST['subject']);
    $msg = validate($_POST['msg']);

    $user_data = 'name=' . $name . '&email=' . $email;

    if (empty($name)) {
        header("Location: signup.php?error=User Name is required&$user_data");
        exit();
    } else if (empty($email)) {
        header("Location: signup.php?error=Email is required&$user_data");
        exit();
    } else if (empty($subject)) {
        header("Location: signup.php?error=Subject is required&$user_data");
        exit();
    } else if (empty($msg)) {
        header("Location: signup.php?error=Message is required&$user_data");
        exit();
    } else {

        $sql2 = "INSERT INTO comments(name,email, subject,message) VALUES('$name', '$email','$subject', '$msg')";
        $result2 = mysqli_query($conn, $sql2);
        if ($result2) {
            header("Location: contact.php?success=Your message has been added successfully thanks for your visit :) ");
            exit();
        } else {
            header("Location: contact.php?error=Invalid message&$user_data");
            exit();
        }
    }
//        }
} else {
    header("Location: contact.php");
    exit();
}
        
    