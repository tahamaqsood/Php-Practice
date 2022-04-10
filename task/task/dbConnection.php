<?php
$con = mysqli_connect('localhost','root','','TAHA');
if($con!=true)
{
    echo "<script>alert('Database not connected')</script>";
}
?>