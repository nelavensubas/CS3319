<?php
$result = mysqli_query($connection, $query);

if (!$result) {
    die("databases query failed.");
}

echo "<table style=\"margin-top:1em;\"><thead><tr>";
echo "<th>licensenum</th>";
echo "<th>firstname</th>";
echo "<th>lastname</th>";
echo "<th>licensedate</th>";
echo "<th>birthdate</th>";
echo "<th>hosworksat</th>";
echo "<th>speciality</th>";
echo "</tr></thead>";

echo "<tbody>";
while ($row = mysqli_fetch_assoc($result)) {
    echo "<tr>";
    echo "<td>" . $row["licensenum"] . "</td>";
    echo "<td>" . $row["firstname"] . "</td>";
    echo "<td>" . $row["lastname"] . "</td>";
    echo "<td>" . $row["licensedate"] . "</td>";
    echo "<td>" . $row["birthdate"] . "</td>";
    echo "<td>" . $row["hosworksat"] . "</td>";
    echo "<td>" . $row["speciality"] . "</td>";
    echo "</tr>";
}
echo "</tbody></table>";

mysqli_free_result($result);
?>
