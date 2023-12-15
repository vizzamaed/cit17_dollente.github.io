<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Dollente";
    
    $connection = new mysqli($servername, $username, $password, $database);
    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    $StudentID="";
    $FirstName="";
    $LastName="";
    $DateOfBirth="";
    $email="";
    $Phone="";
    
    

    $errorMessage="";
    $successMessage="";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $StudentID=$_POST["StudentID"];
        $FirstName=$_POST["FirstName"];
        $LastName=$_POST["LastName"];
        $DateOfBirth=$_POST["DateOfBirth"];
        $email=$_POST["email"];
        $Phone=$_POST["Phone"];
        
        

        do{
            if(empty($StudentID)||empty($FirstName)||empty($LastName)||empty($DateOfBirth)||empty($email)||empty($Phone)){
                $errorMessage="All the fields are required";
                break;
            }
           
            $sql="INSERT INTO Student(StudentID,FirstName,LastName,DateOfBirth,email,Phone)".
            "VALUES ('$StudentID','$FirstName','$LastName','$DateOfBirth','$email','$Phone')";
            $result=$connection->query($sql);

            if(!$result){
                $errorMessage="Invalid query:".$connection->error;
                break;
            }

            $StudentID="";
            $FirstName="";
            $LastName="";
            $DateOfBirth="";
            $email="";
            $Phone="";

            $successMessage ="Student added successfully";

            header("location:/cit17_dollente.github.io/cit17_dollente.github.io/Finals/index.php");
            exit;

        }while (false);

    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Student Registration</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>
    <style>
        body {
            background-color: #f8f9fa;
        }
        .card {
            margin-top: 50px;
        }
    </style>


</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-body">
                        <h2 class="text-center mb-4">New Student Account</h2>
                        <?php
                        if(!empty($errorMessage)){
                            echo "
                            <div class='alert alert-warning alert-dismissible fade show' role='alert'>
                                <strong>$errorMessage</strong>
                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                            </div>
                            ";
                        }
                        ?>

                            <form method="post">
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Student ID</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="StudentID" value="<?php echo $StudentID; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">First Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="FirstName" value="<?php echo $FirstName; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Last Name</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="LastName" value="<?php echo $LastName; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Birthdate</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="DateOfBirth" value="<?php echo $DateOfBirth; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Email</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="email" value="<?php echo $email; ?>">  
                                    </div>
                                </div>
                                <div class="row mb-3">
                                    <label class="col-sm-3 col-form-label">Phone</label>
                                    <div class="col-sm-6">
                                        <input type="text" class="form-control" name="Phone" value="<?php echo $Phone; ?>">  
                                    </div>
                                </div>

                                <?php
                                if(!empty($successMessage)){
                                    echo "
                                    <div class='row mb-3'>
                                        <div class='offset-sm-3 col-sm-6'>
                                            <div class='alert alert-success alert-dismissible fade show' role='alert'>
                                                <strong>$successMessage</strong>
                                                <button type='button' class='btn-close' data-bs-dismiss='alert' aria-label='Close'></button>
                                            </div>
                                        </div>
                                    </div>
                                    ";
                                }
                                ?>




                
                                <div class="row mb-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary w-100">Submit</button>
                                </div>
                                <div class="col">
                                    <a class="btn btn-outline-secondary w-100" href="/cit17_dollente.github.io/cit17_dollente.github.io/Finals/index.php" role="button">Cancel</a>
                                </div>
                            </div>
                            </form>
                    </div>
                </div>
            </div>
        </div>
    </div>


</body>
</html>