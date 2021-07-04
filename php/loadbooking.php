<?php
include_once("dbconnect.php");

$email = $_POST['email'];

$sqlloadcart = "SELECT * FROM tbl_booking INNER JOIN tbl_item ON tbl_booking.id = tbl_item.id WHERE tbl_booking.email = '$email'";

$result = $conn->query($sqlloadcart);

if ($result->num_rows > 0) 
    {$response["cart"] = array();
     while ($row = $result->fetch_assoc()) 
        {$itemList[id] = $row['id'];
         $itemList[items] = $row['items'];
         $itemList[size] = $row['size'];
         $itemList[numspeaker] = $row['numspeaker'];
        $itemList[dj] = $row['dj'];
         $itemList[hour] = $row['hour'];
         $itemList[price] = $row['price'];
         
         array_push($response["cart"], $itemList);
        }
     echo json_encode($response);
    } 
else 
    {echo "failed";
    }
?>

