<?php
$speciality_result = mysqli_query($connection, "SELECT DISTINCT speciality FROM doctor;");

if (!$speciality_result) {
    die("databases query failed.");
}

echo "<p style=\"margin-bottom:0px;\">Select Specialty:</p>";
while ($row = mysqli_fetch_assoc($speciality_result)) {
    echo "<input type=\"radio\" name=\"specialty_choice\" id=\"" . $row["speciality"] . "\" value=\"" . $row["speciality"] . "\">" . $row["speciality"] . "<br>";
}

mysqli_free_result($speciality_result);
?>
