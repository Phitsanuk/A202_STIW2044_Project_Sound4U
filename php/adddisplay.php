<?php
include_once("dbconnect.php");

$email = $_POST['email'];
$id = $_POST['id'];
$items = $_POST['items'];
$size = $_POST['size'];
$numspeaker = $_POST['numspeaker'];
$dj = $_POST['dj'];

$sqlcheck = "SELECT * FROM tbl_display WHERE id = '$id' AND email = '$email'";
$resultcheck = $conn->query($sqlcheck);

if ($resultcheck->num_rows == 0) 
    {echo $sqladdcart = "INSERT INTO tbl_display (email, id, items, size, numspeaker, dj) VALUES 
    ('$email','$id','$items','$size','$numspeaker','$dj')";
     if ($conn->query($sqladdcart) === TRUE) 
        {echo "success";
        }
     else 
        {echo "failed";
        }
    }

?>