<?php
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    $conn = new mysqli('localhost','u243392255_finalexam','CC204@finalexam','u243392255_windows_final');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    } else {
        $stmt = $conn->prepare("INSERT INTO tb_registration (firstName, lastName, gender, email, password, number) VALUES (?, ?, ?, ?, ?, ?)");
        $hashed_password = password_hash($password, PASSWORD_DEFAULT);
        $stmt->bind_param("ssssss", $firstName, $lastName, $gender, $email, $hashed_password, $number);
        $stmt->execute();
        echo "Registration successful";
        $stmt->close();
        $conn->close();
    }
?>