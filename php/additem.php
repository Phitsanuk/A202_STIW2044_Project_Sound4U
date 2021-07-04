<?php
include_once("dbconnect.php");

$email = $_POST['email'];
$id = $_POST['id'];
$items = $_POST['items'];
$size = $_POST['size'];
$numspeaker = $_POST['numspeaker'];
$dj = $_POST['dj'];
$price = $_POST['price'];

$sqlcheck = "SELECT * FROM tbl_booking WHERE id = '$id' AND email = '$email'";
$resultcheck = $conn->query($sqlcheck);

if ($resultcheck->num_rows == 0) 
    {echo $sqladdcart = "INSERT INTO tbl_booking (email, id, items, size, numspeaker, dj, hour, price) VALUES 
    ('$email','$id','$items','$size','$numspeaker','$dj','1','$price')";
     if ($conn->query($sqladdcart) === TRUE) 
        {echo "success";
        }
     else 
        {echo "failed";
        }
    }
else
    {echo $sqlupdatecart = "UPDATE tbl_booking SET hour= hour+1 WHERE id = '$id' AND email = '$email'";
     if ($conn->query($sqlupdatecart) === TRUE) 
        {echo "success";
        }
     else 
        {echo "failed";
        }
    }
?>