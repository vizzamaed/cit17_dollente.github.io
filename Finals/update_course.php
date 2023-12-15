<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Dollente";

$connection = new mysqli($servername, $username, $password, $database);


$CourseID="";
$CourseName="";
$Credits="";

$errorMessage="";
$successMessage="";

if($_SERVER['REQUEST_METHOD']=='GET'){
    if(!isset($_GET["CourseID"])){
        header("location:/cit17_dollente.github.io/cit17_dollente.github.io/Finals/index.php");
        exit;
    }

    $CourseID=$_GET["CourseID"];

    $sql="SELECT * FROM Course WHERE CourseID=$CourseID";
    $result=$connection->query($sql);
    $row=$result->fetch_assoc();

    if (!$row){
        header("location:/cit17_dollente.github.io/cit17_dollente.github.io/Finals/index.php");
        exit;
    }
    $CourseName=$row["CourseName"];
    $Credits=$row["Credits"];

}
else{

    $CourseID=$_POST["CourseID"];
    $CourseName=$_POST["CourseName"];
    $Credits=$_POST["Credits"];

    do{
        if(empty($CourseID)||empty($CourseName)||empty($Credits)){
            $errorMessage="All the fields are required";
            break;
        }

        $sql = "UPDATE Course " . 
    "SET CourseName='$CourseName', Credits='$Credits'".
    "WHERE CourseID=$CourseID";

        
        $result=$connection->query($sql);

        if(!$result){
            $errorMessage="Invalid query:".$connection->error;
            break;
         }

         $successMessage="Course updated successfully";
         header("location:/cit17_dollente.github.io/cit17_dollente.github.io/Finals/index.php");
        exit;

    }while(false);

}

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Course</title>
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
    <div class="container">
            <div class="row justify-content-center">
                <div class="col-md-6">
                    <div class="card">
                        <div class="card-header bg-primary text-white">
                            <h2 class="text-center">Update Course</h2>
                        </div>
                        <div class="card-body">
                            <?php if(!empty($errorMessage)): ?>
                                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                    <strong><?php echo $errorMessage; ?></strong>
                                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                </div>
                            <?php endif; ?>

                            <form method="post">
                                
                                <input type="hidden" name="CourseID" value="<?php echo $CourseID; ?>">

                                <div class="row mb-3">
                                <label for="CourseName" class="form-label">Course Name</label>
                                <input type="text" class="form-control" id="CourseName" name="CourseName" value="<?php echo $CourseName; ?>">
                                </div>

                                <div class="row mb-3">
                                <label for="Credits" class="form-label">Credits</label>
                                <input type="text" class="form-control" id="Credits" name="Credits" value="<?php echo $Credits; ?>">
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

                                    
                                <?php if(!empty($successMessage)): ?>
                                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                                        <strong><?php echo $successMessage; ?></strong>
                                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                                    </div>
                                <?php endif; ?>

                            <div class="row mb-3">
                                <div class="col">
                                    <button type="submit" class="btn btn-primary w-100">Update</button>
                                </div>
                                <div class="col">
                                    <a class="btn btn-outline-secondary w-100" href="/cit17_dollente.github.io/cit17_dollente.github.io/Finals/index.php" role="button">Cancel</a>
                                </div>
                            </div>
                    </form>
            </div>


</body>
</html>