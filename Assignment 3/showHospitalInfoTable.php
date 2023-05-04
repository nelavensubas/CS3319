<?php
$result = mysqli_query($connection, "SELECT * FROM hospital WHERE hoscode='" . $hospitalChoice . "';");

if (!$result) {
    die("databases query failed.");
}

echo "<table style=\"margin-top:1em;\"><thead><tr>";
echo "<th>Hospital Name</th>";
echo "<th>City</th>";
echo "<th>Province</th>";
echo "<th>Number of Beds</th>";
echo "<th>Head Doctor</th>";
echo "<th>All Doctors</th>";
echo "</tr></thead>";

echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["hosname"] . "</td>";
    echo "<td>" . $row["city"] . "</td>";
    echo "<td>" . $row["prov"] . "</td>";
    echo "<td>" . $row["numofbed"] . "</td>";
    $headDocName = mysqli_query($connection, "SELECT firstname, lastname FROM doctor WHERE licensenum='" . $row["headdoc"] . "';");
    while ($r1 = mysqli_fetch_assoc($headDocName)) {
        echo "<td>" . $r1["firstname"] . " " . $r1["lastname"] . "</td>";
    }
    mysqli_free_result($headDocName);
    $allDoctors = mysqli_query($connection, "SELECT firstname, lastname FROM doctor WHERE hosworksat='" . $row["hoscode"] . "';");
    $listOfDoctors = "";
    while ($r2 = mysqli_fetch_assoc($allDoctors)) {
        $listOfDoctors .= $r2["firstname"] . " " . $r2["lastname"] . ", ";
    }
    echo "<td>" . substr($listOfDoctors, 0, -2) . "</td>";
    mysqli_free_result($allDoctors);
    echo "</tr>";
}
echo "</tbody></table>";

mysqli_free_result($result);

?>
