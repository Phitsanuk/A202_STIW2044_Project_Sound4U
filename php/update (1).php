<?php
include_once("dbconnect.php");

$email = $_POST['email'];
$id = $_POST['id'];
$op = $_POST['op'];

if ($op == "add")
    {$sqlupdate = "UPDATE tbl_booking SET hour = hour+1 WHERE id = '$id' AND email = '$email'";
    if ($conn->query($sqlupdate) === TRUE) 
        {echo "success";
        }
    else
        {echo "failed";
        }
    }
    
if ($op == "remove") 
    {if ($quantity == 1) 
        {echo "failed";
        } 
     else 
        {$sqlupdate = "UPDATE tbl_booking SET hour = hour-1 WHERE id = '$id' AND email = '$email'";
        if ($conn->query($sqlupdate) === TRUE)
            {echo "success";
            } 
        else
            {echo "failed";
            }
        }
    }
?>