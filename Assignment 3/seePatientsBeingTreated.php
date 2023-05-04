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
        <?php include 'showDoctors.php';?>
        <br>
        <input type="submit" name="treat_table" value="See Patients Being Treated">
    </form>
    <?php
        $doctorChoice = $_POST["doctor_choice"];
        if (!empty($doctorChoice)){
            if(isset($_POST['treat_table'])){
                include 'seePatientsBeingTreatedTable.php';
            }
        }
    ?>
</body>
</html>
