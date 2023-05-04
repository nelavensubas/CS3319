<?php
$assignCheck = mysqli_query($connection, "SELECT * FROM looksafter WHERE licensenum='" . $doctorChoice . "' AND ohipnum='" . $patientChoice . "';");
if (mysqli_num_rows($assignCheck) == 0){
    $result = mysqli_query($connection, "INSERT INTO looksafter VALUES ('" . $doctorChoice . "', '" . $patientChoice . "');");
    if (!$result) {
        die("databases query failed.");
    } else {
        echo "Successfully assigned doctor to patient!";
    }
} else {
    echo "Patient already assigned to this doctor.";
}
?>
