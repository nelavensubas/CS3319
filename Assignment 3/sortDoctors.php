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
        <p style="margin-bottom:0px;">Column to Order By:</p>
        <input type="radio" id="lastname" name="doctor_column_choice" value="lastname">Lastname
        <input type="radio" id="birthdate" name="doctor_column_choice" value="birthdate">Birthdate
        <p style="margin-bottom:0px;">Sort By:</p>
        <input type="radio" id="ascending" name="doctor_order_choice" value="ASC">Ascending
        <input type="radio" id="descending" name="doctor_order_choice" value="DESC">Descending
        <br><br>
        <input type="submit" name="sort_doctors_table" value="Sort Doctors Table">
    </form>
    <?php
        if (!empty($_POST["doctor_column_choice"]) AND !empty($_POST["doctor_order_choice"])){
            $query = "SELECT * FROM doctor ORDER BY " . $_POST["doctor_column_choice"] . " " . $_POST["doctor_order_choice"] . ";";
            if(isset($_POST['sort_doctors_table'])){
                include 'sortDoctorsTable.php';
            }
        } else {
            $query = "SELECT * FROM doctor;";
            include 'sortDoctorsTable.php';
        }
    ?>
</body>
</html>
