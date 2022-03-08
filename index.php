<?php
include('db.php');
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="main.css" type="text/css">
    <title>PHP Database</title>
</head>

<body>
    <div class="main">
        <!-- FORM AREA STARTS HERE -->
        <div class="form">
            <?php
            if(isset($_GET['update'])){
                $id=$_GET['update'];
                $q = "SELECT * FROM records WHERE id=$id";
                $r = mysqli_query($db,$q);
                $d = mysqli_fetch_array($r);
                ?>
                <form method="post" action="update.php">
                <input type="hidden" name='id' value="<?=$d['id']?>">
                <input type="text" name='first_name' value="<?=$d['first_name']?>" class="input" placeholder="First name...">
                <input type="text" name='last_name' value="<?=$d['last_name']?>" class="input" placeholder="Last name...">
                <input type="email" name='email_id' value="<?=$d['email_id']?>" class="input long-input" placeholder="Email id...">
                <input type="submit" name="update" class="long-input add-button" value="UPDATE RECORD">
                </form>
                <?php
            }else{
                ?>
                <form method="POST" action="add.php">
                <input type="text" name='first_name' class="input" placeholder="First name...">
                <input type="text" name='last_name' class="input" placeholder="Last name...">
                <input type="email" name='email_id' class="input long-input" placeholder="Email id...">
                <input type="submit" name="add" class="long-input add-button" value="ADD TO DATABASE">
                </form>
                <?php
            }
            ?>
        </div>
        <!-- FORM AREA ENDS HERE -->

        <!-- DATABASE RECORDS AREA STARTS HERE -->
        <div class="record">
            <?php
            $read = "SELECT * FROM records ORDER BY id DESC";
            $output = mysqli_query($db, $read);
            while ($data = mysqli_fetch_array($output)) {

            ?>
                <div class="record-item">
                    <h1><?= $data['first_name'] ?> <?= $data['last_name'] ?></h1>
                    <p><?= $data['email_id'] ?></p>

                    <a href="index.php?update=<?=$data['id']?>">
                        <button class="menu-btn edit-btn">Edit</button>
                    </a>

                    <a href="delete.php?delete=<?=$data['id']?>">
                        <button class="menu-btn delete-btn">Delete</button>
                    </a>
                </div>
            <?php
            }
            ?>

        </div>
        <!-- DATABASE RECORDS AREA ENDS HERE -->

    </div>
</body>

</html>