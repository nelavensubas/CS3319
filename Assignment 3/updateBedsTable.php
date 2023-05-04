<?php
$result = mysqli_query($connection, "UPDATE hospital SET numofbed=" . $numBeds . " WHERE hoscode='" . $hospitalChoice . "';");

if (!$result) {
    die("databases query failed.");
} else {
    echo "Successfully updated number of beds!";
}

?>
