<?php
if(isset($_GET["StudentID"])){
    $StudentID=$_GET["StudentID"];

    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Dollente";

    $connection = new mysqli($servername, $username, $password, $database);

    $sql="DELETE FROM Student WHERE StudentID=$StudentID";
    $connection->query($sql);
}

header("location:/cit17_dollente.github.io/cit17_dollente.github.io/Finals/index.php");
exit;
?>