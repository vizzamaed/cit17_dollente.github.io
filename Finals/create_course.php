<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $database = "Dollente";
    
    $connection = new mysqli($servername, $username, $password, $database);
    
    if ($connection->connect_error) {
        die("Connection failed: " . $connection->connect_error);
    }


    $CourseID="";
    $CourseName="";
    $Credits="";

    $errorMessage="";
    $successMessage="";

    if($_SERVER['REQUEST_METHOD']=='POST'){
        $CourseID=$_POST["CourseID"];
        $CourseName=$_POST["CourseName"];
        $Credits=$_POST["Credits"];
        
        

        do{
            if(empty($CourseID)||empty($CourseName)||empty($Credits)){
                $errorMessage="All the fields are required";
                break;
            }
           
            $sql="INSERT INTO Course(CourseID,CourseName,Credits)".
            "VALUES ('$CourseID','$CourseName','$Credits')";
            $result=$connection->query($sql);

            if(!$result){
                $errorMessage="Invalid query:".$connection->error;
                break;
            }

            $CourseID="";
            $CourseName="";
            $Credits="";
            

            $successMessage ="Course added successfully";

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
    <title>Add Course</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js"></script>


</head>
<body>
    <div class="create">
        <h2>New Course</h2>
        
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
                    <label class="col-sm-3 col-form-label">Course ID</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="CourseID" value="<?php echo $CourseID; ?>">  
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Course Name</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="CourseName" value="<?php echo $CourseName; ?>">  
                    </div>
                </div>
                <div class="row mb-3">
                    <label class="col-sm-3 col-form-label">Credits</label>
                    <div class="col-sm-6">
                        <input type="text" class="form-control" name="Credits" value="<?php echo $Credits; ?>">  
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



                </div class="row mb-3">
                    <div class="offset-sm-3 col-sm-3 d-grid">
                        <button type="submit" class="btn btn-primary">Submit</button>
                    </div>
                    <div class="col-sm-3 d-grid">
                        <a class="btn btn-outline-primary" href="/cit17_dollente.github.io/cit17_dollente.github.io/Finals/index.php" role="button">Cancel</button>
                    </div>
                </div>
            </form>
    </div>


</body>
</html>