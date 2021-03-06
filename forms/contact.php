<?php
  $servername = "localhost";
  $username = "root";
  $password = "toor";
  $dbname = "portfolio_db";
  $contact = "contact_msgs";

  $conn = new mysqli($servername, $username, $password, $dbname);
  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }

    if($_POST['name'] && $_POST['email'] && $_POST['subject'] && $_POST['message']) {
        $sql = "INSERT INTO $contact (
            name,
            email,
            subject,
            message
            )

            VALUES (
                '".$_POST['name']."',
                '".$_POST['email']."', 
                '".$_POST['subject']."', 
                '".$_POST['message']."'
            )
        ";

        if ($conn->query($sql) === TRUE) {
            echo "Query Successful!";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
                    
    }

  exit();
?>
