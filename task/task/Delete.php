<?php
// Including Database Connection
include('dbConnection.php');


// Storing query string value in php variable
$DeleteID = $_GET['id']??""; 


// Query for fetching all data
$query1 = "select * from empolyees where ID='$DeleteID'";
$result = mysqli_query($con,$query1);


// Converting fetch data into Associative array
$data = mysqli_fetch_assoc($result);


// Storing Image path in $img variable with the help of associative array
$img = $data['IMAGE_PATH'];


// Query for deleting record
$query2 = "delete from empolyees where ID='$DeleteID'";
$exec = mysqli_query($con,$query2);


if($exec==true)
{
    // For Redirecting to Retrieval page
    echo "<script>window.location.href='Retrieval.php'</script>";

    // For deleting an image from folder
    unlink($img);
}
else
{
    echo "<script>alert('Data not deleted')</script>";
}
?>