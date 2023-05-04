<?php
$licenseNumCheck = mysqli_query($connection, "SELECT * FROM doctor WHERE licensenum='" . $licensenum . "';");
if (mysqli_num_rows($licenseNumCheck) == 0){
    $result = mysqli_query($connection, $query);
    if (!$result) {
        die("databases query failed.");
    } else {
        echo "Successfully added new doctor!";
    }
} else {
    echo "Licensenum already exists.";
}
?>
