<?php
$servername = "localhost";
$username = "root";
$password = "";

// Create connection
$connection = new mysqli($servername, $username, $password);

// Check connection
if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

// Create database
$sql = "CREATE DATABASE IF NOT EXISTS Dollente";
if ($connection->query($sql) === TRUE) {
    echo "Database created successfully<br>";
} else {
    echo "Error creating database: " . $connection->error . "<br>";
}

// Select database
$connection->select_db("Dollente");

// Create Student table
$sql = "CREATE TABLE IF NOT EXISTS Student (
    StudentID INT NOT NULL,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    DateOfBirth VARCHAR(255),
    email VARCHAR(255),
    Phone INT,
    PRIMARY KEY(StudentID)
)";
if ($connection->query($sql) === TRUE) {
    echo "Student table created successfully<br>";
} else {
    echo "Error creating Student table: " . $connection->error . "<br>";
}

// Create Course table
$sql = "CREATE TABLE IF NOT EXISTS Course (
    CourseID INT NOT NULL,
    CourseName VARCHAR(255),
    Credits INT,
    PRIMARY KEY(CourseID)
)";
if ($connection->query($sql) === TRUE) {
    echo "Course table created successfully<br>";
} else {
    echo "Error creating Course table: " . $connection->error . "<br>";
}

// Create Instructor table
$sql = "CREATE TABLE IF NOT EXISTS Instructor (
    InstructorID INT NOT NULL,
    FirstName VARCHAR(255),
    LastName VARCHAR(255),
    email VARCHAR(255),
    Phone INT,
    PRIMARY KEY(InstructorID)
)";
if ($connection->query($sql) === TRUE) {
    echo "Instructor table created successfully<br>";
} else {
    echo "Error creating Instructor table: " . $connection->error . "<br>";
}

// Close connection
$connection->close();
?>
