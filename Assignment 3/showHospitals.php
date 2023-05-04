<?php
$hospitals_result = mysqli_query($connection, "SELECT * FROM hospital;");

if (!$hospitals_result) {
    die("databases query failed.");
}

echo "<p style=\"margin-bottom:0px;\">Hospital:</p>";
while ($row = mysqli_fetch_assoc($hospitals_result)) {
    echo "<input type=\"radio\" name=\"hospital_choice\" id=\"" . $row["hoscode"] . "\" value=\"" . $row["hoscode"] . "\">" . $row["hosname"] . ", " . $row["city"] . " " . $row["prov"] . "<br>";
}

mysqli_free_result($hospitals_result);
?>
