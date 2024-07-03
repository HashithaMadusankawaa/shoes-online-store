<?php
$conn = include "conection.php";

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch search query
$query = $_POST['query'];

// Perform SQL query
$sql = "SELECT * FROM `product` WHERE `title` LIKE '%$query%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<p>" . $row['column'] . "</p>";
    }
} else {
    echo "<p>No results found</p>";
}

$conn->close();
?>
