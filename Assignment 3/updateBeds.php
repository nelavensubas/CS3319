<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Assignment 3</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <?php include 'connectdb.php';?>
    <h1>Assignment 3</h1>
    <?php
        echo '<form method="POST" action="index.php"><input type="submit" value="Home Page"/></form>';
    ?>
    <form method="post" action="">
        <?php include 'showHospitals.php';?>
        <br>
        Beds: <input type="number" name="beds" min="0" oninput="validity.valid||(value='');">
        <br><br>
        <input type="submit" name="beds_table" value="Update Beds">
    </form>
    <?php
        $hospitalChoice = $_POST["hospital_choice"];
        $numBeds = $_POST['beds'];
        if (!empty($hospitalChoice) AND !empty($numBeds)){
            if(isset($_POST['beds_table'])){
                include 'updateBedsTable.php';
            }
        }
    ?>
</body>
</html>
