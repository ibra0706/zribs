<?php
// Check existence of id parameter before processing further
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}
    // Include config file
    require_once "config.php";
    
    // Prepare a select statement
    $sql = "SELECT * FROM dijaki WHERE id_dijaki = ?";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // Bind variables to the prepared statement as parameters
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // Set parameters
        $param_id = $_SESSION['id'];
        
        // Attempt to execute the prepared statement
        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
    
            if(mysqli_num_rows($result) == 1){
                /* Fetch result row as an associative array. Since the result set
                contains only one row, we don't need to use while loop */
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                
                // Retrieve individual field value
                $name = $row["ime"];
                $address = $row["Priimek"];
                $salary = $row["mail"];
            } else{
                // URL doesn't contain valid id parameter. Redirect to error page
                header("location: error-dijaki.php");
                exit();
            }
            
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    mysqli_stmt_close($stmt);
    
    // Close connection
    mysqli_close($link);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>View Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        .btn{
            background: #fa941d !important;
            border: none;
        }
    </style>
    <link rel="stylesheet" href="../css/profil.css">
</head>

<?php include('header.php'); ?>
<body>

    <div class="wrapper">
        <div class="okvir">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h1 class="mt-5 mb-3">Moj profil</h1>
                    <div class="form-group">
                        <label>Ime</label>
                        <p><b><?php echo $row["ime"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Priimek</label>
                        <p><b><?php echo $row["Priimek"]; ?></b></p>
                    </div>
                    <div class="form-group">
                        <label>Mail</label>
                        <p><b><?php echo $row["mail"]; ?></b></p>
                    </div>
                    <p><a href="uredi-profil.php" class="btn btn-primary">Uredi</a></p>
                </div>
            </div>        
        </div>
    </div>
    </div>
</body>
</html>