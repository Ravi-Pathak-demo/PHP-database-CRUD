<?php
include('db.php');
if(isset($_POST['update']))
{
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $email_id = $_POST['email_id'];
    $id = $_POST['id'];
    $updateQuery ="UPDATE records SET first_name='$first_name',last_name='$last_name',email_id='$email_id' WHERE id=$id";
    $updateRun = mysqli_query($db,$updateQuery);
    if($updateRun)
    {
        echo "<script>window.location.href='index.php';</script>";
    }
    else
    {
        echo "database not updated !";
    }
}
?>