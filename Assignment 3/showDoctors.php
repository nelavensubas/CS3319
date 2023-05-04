<?php
$doctors_result = mysqli_query($connection, "SELECT * FROM doctor;");

if (!$doctors_result) {
    die("databases query failed.");
}

echo "<p style=\"margin-bottom:0px;\">Doctor:</p>";
while ($row = mysqli_fetch_assoc($doctors_result)) {
    echo "<input type=\"radio\" name=\"doctor_choice\" id=\"" . $row["licensenum"] . "\" value=\"" . $row["licensenum"] . "\">" . $row["firstname"] . " " . $row["lastname"] . "<br>";
}

mysqli_free_result($doctors_result);
?>
