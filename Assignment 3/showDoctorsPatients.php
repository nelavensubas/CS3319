<?php
$doctors_result = mysqli_query($connection, "SELECT * FROM doctor;");
$patients_result = mysqli_query($connection, "SELECT * FROM patient;");

if (!$doctors_result OR !$patients_result) {
    die("databases query failed.");
}

echo "<p style=\"margin-bottom:0px;\">Doctor:</p>";
while ($row = mysqli_fetch_assoc($doctors_result)) {
    echo "<input type=\"radio\" name=\"doctor_choice\" id=\"" . $row["licensenum"] . "\" value=\"" . $row["licensenum"] . "\">" . $row["firstname"] . " " . $row["lastname"] . "<br>";
}

echo "<p style=\"margin-bottom:0px;\">Patient:</p>";
while ($row = mysqli_fetch_assoc($patients_result)) {
    echo "<input type=\"radio\" name=\"patient_choice\" id=\"" . $row["ohipnum"] . "\" value=\"" . $row["ohipnum"] . "\">" . $row["firstname"] . " " . $row["lastname"] . "<br>";
}

mysqli_free_result($doctors_result);
mysqli_free_result($patients_result);
?>
