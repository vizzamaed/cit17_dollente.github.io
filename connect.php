<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "StudentRecord";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";

// Example query
$sql = "SELECT * FROM StudentRecord";
$result = $conn->query($sql);

// Check if the query was successful
if ($result) {
    // Process the results
    while ($row = $result->fetch_assoc()) {
        echo "Student ID: " . $row["StudentID"]."<br>"
                ."Last Name: " . $row["LastName"]."<br>"
                ."First Name: " . $row["FirstName"]."<br>"
                ."Birthdate: " . $row["DateOfBirth"]."<br>"
                ."email: " . $row["email"]."<br>"
                ."Phone: " . $row["Phone"]."<br>";
    }
} 

else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

?>
