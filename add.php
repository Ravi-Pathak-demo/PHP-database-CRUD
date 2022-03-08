<?php

include('db.php');
if(isset($_POST['add']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_id = $_POST['email_id'];
    $createQuery = "INSERT INTO records (first_name,last_name,email_id) "; 
    $createQuery.= "VALUES('$first_name','$last_name','$email_id')";
    $createRun = mysqli_query($db,$createQuery);
    if($createRun)
    {
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        echo "database not added !";
    }
}
?>