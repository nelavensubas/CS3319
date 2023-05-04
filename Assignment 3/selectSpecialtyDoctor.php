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
        <?php include 'showSpecialities.php';?>
        <br>
        <input type="submit" name="specialities_table" value="Select Specialty">
    </form>
    <?php
        if (!empty($_POST["specialty_choice"])){
            $query = "SELECT * FROM doctor WHERE speciality=\"" . $_POST["specialty_choice"] . "\";";
            if(isset($_POST['specialities_table'])){
                include 'selectSpecialtyDoctorTable.php';
            }
        } else {
            $query = "SELECT * FROM doctor;";
            include 'selectSpecialtyDoctorTable.php';
        }
    ?>
</body>
</html>
