<?php
$result = mysqli_query($connection, "SELECT * FROM patient INNER JOIN looksafter ON looksafter.ohipnum=patient.ohipnum WHERE looksafter.licensenum='" . $doctorChoice . "';");

if (!$result) {
    die("databases query failed.");
}

echo "<table style=\"margin-top:1em;\"><thead><tr>";
echo "<th>firstname</th>";
echo "<th>lastname</th>";
echo "<th>ohipnum</th>";
echo "</tr></thead>";

echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["firstname"] . "</td>";
    echo "<td>" . $row["lastname"] . "</td>";
    echo "<td>" . $row["ohipnum"] . "</td>";
    echo "</tr>";
}
echo "</tbody></table>";

mysqli_free_result($result);

?>
