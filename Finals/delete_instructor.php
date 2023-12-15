<?php
if(isset($_GET["InstructorID"])){
    $InstructorID=$_GET["InstructorID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Dollente";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM Instructor WHERE InstructorID=$InstructorID";
    $connection->query($sql);
}

header("location:/cit17_dollente.github.io/cit17_dollente.github.io/Finals/index.php");
exit;
?>