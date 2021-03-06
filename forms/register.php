<?php 
    $servername = "localhost";
    $username = "root";
    $password = "toor";
    $dbname = "portfolio_db";
    $user = "users";

    $conn = new mysqli($servername, $username, $password, $dbname);
    if ($conn->connect_error) {
      die("Connection failed: " . $conn->connect_error);
    }

    if(isset($_POST['btn-save'])) {
        $user_name = $_POST['username'];
        $user_email = $_POST['email'];
        $user_password = $_POST['password'];	
        $sql = "SELECT email FROM users WHERE email='$user_email'";
        $resultset = $conn->query($sql) or die("database error:". mysqli_error($conn));	
        $row = $resultset->fetch_assoc();
            
        $sql = "INSERT INTO users(
            `username`, `password`, `email`
            )
            VALUES (
                '$user_name', 
                '$user_password', 
                '$user_email'
            )";
        $conn->query($sql) or die("database error:". mysqli_error($conn)." ".$sql);			
        echo "registered succesfully";
        header('Location: ../index.html');
        exit();
    }
?>