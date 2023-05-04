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
        <input type="submit" name="delete_table" value="Delete Doctor" onclick="return confirm('Are you sure you want to delete this doctor?')">
    </form>
    <?php
        $licensenum = strtoupper(clean_input($_POST['licensenum']));
        if($licensenum != ""){
            $query = "DELETE FROM doctor WHERE licensenum=\"" . $licensenum . "\";";
            if(isset($_POST['delete_table'])){
                include 'deleteDoctorTable.php';
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
