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
        echo '<form method="POST" action="sortDoctors.php"><input type="submit" value="Sort Doctors Table"/></form>';
        echo '<form method="POST" action="selectSpecialtyDoctor.php"><input type="submit" value="Select Doctor Specialty"/></form>';
        echo '<form method="POST" action="insertDoctor.php"><input type="submit" value="Insert Doctor"/></form>';
        echo '<form method="POST" action="deleteDoctor.php"><input type="submit" value="Delete Doctor"/></form>';
        echo '<form method="POST" action="assignDoctorsPatients.php"><input type="submit" value="Assign Doctor to Patient"/></form>';
        echo '<form method="POST" action="seePatientsBeingTreated.php"><input type="submit" value="See Patients Being Treated"/></form>';
        echo '<form method="POST" action="showHospitalInfo.php"><input type="submit" value="Show Hospital Info"/></form>';
        echo '<form method="POST" action="updateBeds.php"><input type="submit" value="Update Number of Beds"/></form>';
    ?>
</body>
</html>
