<?php
$licenseNumCheck = mysqli_query($connection, "SELECT * FROM doctor WHERE licensenum='" . $licensenum . "';");
if (mysqli_num_rows($licenseNumCheck) > 0){
    $treatingPatientCheck = mysqli_query($connection, "SELECT * FROM looksafter WHERE licensenum='" . $licensenum . "';");
    if (mysqli_num_rows($treatingPatientCheck) == 0){
        $result = mysqli_query($connection, $query);
        if (!$result) {
            die("databases query failed.");
        } else {
            echo "Successfully deleted doctor!";
        }
    } else {
        echo "Cannot delete doctor that is treating patient(s).";
    }
} else {
    echo "Licensenum/doctor doesn't exist.";
}
?>
