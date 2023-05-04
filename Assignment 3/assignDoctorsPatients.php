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
        <?php include 'showDoctorsPatients.php';?>
        <br>
        <input type="submit" name="assign_table" value="Assign Doctor to Patient">
    </form>
    <?php
        $doctorChoice = $_POST["doctor_choice"];
        $patientChoice = $_POST["patient_choice"];
        if (!empty($doctorChoice) AND !empty($patientChoice)){
            if(isset($_POST['assign_table'])){
                include 'assignDoctorsPatientsTable.php';
            }
        }
    ?>
</body>
</html>
