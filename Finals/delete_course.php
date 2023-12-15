<?php
if(isset($_GET["CourseID"])){
    $CourseID=$_GET["CourseID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Dollente";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM Course WHERE CourseID=$CourseID";
    $connection->query($sql);
}

header("location:/cit17_dollente.github.io/cit17_dollente.github.io/Finals/index.php");
exit;
?>