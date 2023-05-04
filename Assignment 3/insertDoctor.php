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
        <br>
        Licensenum: <input type="text" name="licensenum" minlength="4" maxlength="4">
        <br><br>
        First Name: <input type="text" name="firstname" minlength="1">
        <br><br>
        Last Name: <input type="text" name="lastname" minlength="1">
        <br><br>
        License Date: <input type="date" name="licensedate"/>
        <br><br>
        Birthday: <input type="date" name="birthdate"/>
        <br>
        <?php include 'showHospitals.php';?>
        <br>
        Speciality: <input type="text" name="speciality" minlength="1">
        <br><br>
        <input type="submit" name="insert_table" value="Insert Doctor">
    </form>
    <?php
        $licensenum = strtoupper(clean_input($_POST['licensenum']));
        $firstname = ucfirst(clean_input($_POST['firstname']));
        $lastname = ucfirst(clean_input($_POST['lastname']));
        $speciality = ucfirst(clean_input($_POST['speciality']));
        if($licensenum != "" AND $firstname != "" AND $lastname != "" AND $speciality != "" AND strlen($_POST['licensedate'])==10 AND strlen($_POST['birthdate'])==10 AND !empty($_POST["hospital_choice"])){
            $query = "INSERT INTO doctor VALUES ('" . $licensenum . "', '" . $firstname . "', '" . $lastname . "', '" . $_POST["licensedate"] . "', '" . $_POST["birthdate"] . "', '" . $_POST["hospital_choice"] . "', '" . $speciality . "');";
            if(isset($_POST['insert_table'])){
                include 'insertDoctorTable.php';
            }
        }
        
        function clean_input($data){
            $data = trim($data);
            $data = stripslashes($data);
            $data = htmlspecialchars($data);
            return $data;
        }
    ?>
</body>
</html>
