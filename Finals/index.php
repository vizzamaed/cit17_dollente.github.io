<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Form</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <style>
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f8f9fa;
            padding: 20px;
        }
        .container {
            margin-top: 20px;
        }
        .heading {
            margin-bottom: 20px;
        }
        .btn-margin {
            margin-bottom: 10px;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        h1 {
            margin-bottom: 20px;
            font-weight: bold;
            color: #007bff;
        }
    </style>
</head>
<body>
    <div class="container my-5">
        <h1>Student</h1>
            <a class="btn btn-primary btn-margin" href="/cit17_dollente.github.io/cit17_dollente.github.io/Finals/create.php" role="button">Student Registration</a>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>StudentID</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>DateOfBirth</th>
                        <th>email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "Dollente";
                    
                    $connection = new mysqli($servername, $username, $password, $database);
                    
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }
                    
                    $sql = "SELECT * FROM Student";
                    $result = $connection->query($sql);
                    
                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }

                    while($row=$result->fetch_assoc()){
                        echo"
                        <tr>
                        <td>$row[StudentID]</td>
                        <td>$row[FirstName]</td>
                        <td>$row[LastName]</td>
                        <td>$row[DateOfBirth]</td>
                        <td>$row[email]</td>
                        <td>$row[Phone]</td>
                        <td>
                            <a class='btn btn-primary btn-sm' href='/cit17_dollente.github.io/cit17_dollente.github.io/Finals/update.php?StudentID=$row[StudentID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/cit17_dollente.github.io/cit17_dollente.github.io/Finals/delete.php?StudentID=$row[StudentID]'>Delete</a>
                        </td>
                    </tr>
                        ";
                    }
                    ?>
                   
                </tbody>
            </table>
           
    </div>

   
    <div class="container my-5">
        <h1>Course</h1>
            <a class="btn btn-primary btn-margin" href="/cit17_dollente.github.io/cit17_dollente.github.io/Finals/create_course.php" role="button">Add Course</a>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>CourseID</th>
                        <th>CourseName</th>
                        <th>Credits</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "Dollente";
                    
                    $connection = new mysqli($servername, $username, $password, $database);
                    
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }
                    
                    $sql = "SELECT * FROM Course";
                    $result = $connection->query($sql);
                    
                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }
                    
                    while($row=$result->fetch_assoc()){
                        echo"
                        <tr>
                        <td>$row[CourseID]</td>
                        <td>$row[CourseName]</td>
                        <td>$row[Credits]</td>
            
                        <td>
                            <a class='btn btn-primary btn-sm' href='/cit17_dollente.github.io/cit17_dollente.github.io/Finals/update_course.php?CourseID=$row[CourseID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/cit17_dollente.github.io/cit17_dollente.github.io/Finals/delete_course.php?CourseID=$row[CourseID]'>Delete</a>
                        </td>
                    </tr>
                        ";
                    }
                    ?>
                   
                </tbody>
            </table>
           
    </div>
    
    <div class="container my-5">
        <h1>Instructor</h1>
            <a class="btn btn-primary btn-margin" href="/cit17_dollente.github.io/cit17_dollente.github.io/Finals/create_instructor.php" role="button">Register Instructor</a>
            <br>
            <table class="table table-bordered table-striped">
                <thead>
                    <tr>
                        <th>InstructorID</th>
                        <th>FirstName</th>
                        <th>LastName</th>
                        <th>email</th>
                        <th>Phone</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $servername = "localhost";
                    $username = "root";
                    $password = "";
                    $database = "Dollente";
                    
                    $connection = new mysqli($servername, $username, $password, $database);
                    
                    if ($connection->connect_error) {
                        die("Connection failed: " . $connection->connect_error);
                    }
                    
                    $sql = "SELECT * FROM Instructor";
                    $result = $connection->query($sql);
                    
                    if (!$result) {
                        die("Invalid query: " . $connection->error);
                    }
                    
                    while($row=$result->fetch_assoc()){
                        echo"
                        <tr>
                        <td>$row[InstructorID]</td>
                        <td>$row[FirstName]</td>
                        <td>$row[LastName]</td>
                        <td>$row[email]</td>
                        <td>$row[Phone]</td>
            
                        <td>
                            <a class='btn btn-primary btn-sm' href='/cit17_dollente.github.io/cit17_dollente.github.io/Finals/update_instructor.php?InstructorID=$row[InstructorID]'>Edit</a>
                            <a class='btn btn-danger btn-sm' href='/cit17_dollente.github.io/cit17_dollente.github.io/Finals/delete_instructor.php?InstructorID=$row[InstructorID]'>Delete</a>
                        </td>
                    </tr>
                        ";
                    }
                    ?>
                   
                </tbody>
            </table>
           
    </div>
</body>
</html>
