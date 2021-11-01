<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$ime = $kratica = $letnik = "";
$ime_err = $kratica_err = $letink_err = "";
 
// Processing form data when form is submitted
if(isset($_POST["id"]) && !empty($_POST["id"])){
    // Get hidden input value
    $id = $_POST["id"];
    
    // Validate ime
    $input_ime = trim($_POST["ime"]);
    if(empty($input_ime)){
        $ime_err = "Please enter a ime.";
    }else{
        $ime = $input_ime;
    }
    
    // Validate kratica kratica
    $input_kratica = trim($_POST["kratica"]);
    if(empty($input_kratica)){
        $kratica_err = "Please enter a kratica.";
    }else if(strlen($input_kratica) !== 3){
        $kratica_err = "kratica mora biti dolga 3 crke.";
    }else{
        $kratica = $input_kratica;
    }
    
    // Validate letnik
    $inpiut_letnik = trim($_POST["letnik"]);
    if(empty($inpiut_letnik)){
        $letink_err = "Please enter the letnik amount.";     
    }else{
        $letnik = $inpiut_letnik;
    }
    
    // Check input errors before inserting in database
    if(empty($ime_err) && empty($kratica_err) && empty($letink_err)){
        // Prepare an update statement
        $sql = "UPDATE predmeti SET ime_predmeta=?, kratica=?, letnik=? WHERE id_predmet=?";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssii", $param_ime, $par_kratica, $par_letnik, $param_id);
            
            // Set parameters
            $param_ime = $ime;
            $par_kratica = $kratica;
            $par_letnik = $letnik;
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records updated successfully. Redirect to landing page
                header("location: predmeti.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
         
        // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
} else{
    // Check existence of id parameter before processing further
    if(isset($_GET["id"]) && !empty(trim($_GET["id"]))){
        // Get URL parameter
        $id =  trim($_GET["id"]);
        
        // Prepare a select statement
        $sql = "SELECT * FROM predmeti WHERE id_predmet = ?";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // Set parameters
            $param_id = $id;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
    
                if(mysqli_num_rows($result) == 1){
                    /* Fetch result row as an associative array. Since the result set
                    contains only one row, we don't need to use while loop */
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                    
                    // Retrieve individual field value
                    $ime = $row["ime_predmeta"];
                    $kratica = $row["kratica"];
                    $letnik = $row["letnik"];
                } else{
                    // URL doesn't contain valid id. Redirect to error page
                    header("location: error-predmeti.php");
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
    }  else{
        // URL doesn't contain id parameter. Redirect to error page
        header("location: error-predmeti.php");
        exit();
    }
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Posodobi učitelja</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        .btn-primary{
            background: #fa941d !important;
            border: none;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Posodobi predmet</h2>
                    <!-- <p>Please edit the input values and submit to update the employee record.</p> -->
                    <form action="<?php echo htmlspecialchars(basename($_SERVER['REQUEST_URI'])); ?>" method="post">
                        <div class="form-group">
                            <label>Ime predmeta</label>
                            <input type="text" name="ime" class="form-control <?php echo (!empty($ime_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ime; ?>">
                            <span class="invalid-feedback"><?php echo $ime_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Kratica</label>
                            <input type="text" name="kratica" class="form-control <?php echo (!empty($kratica_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $kratica; ?>"></input>
                            <span class="invalid-feedback"><?php echo $kratica_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Letnik</label>
                            <input type="number" min="1" max="4" name="letnik" class="form-control <?php echo (!empty($letink_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $letnik; ?>">
                            <span class="invalid-feedback"><?php echo $letink_err;?></span>
                        </div>
                        <input type="hidden" name="id" value="<?php echo $id; ?>"/>
                        <input type="submit" class="btn btn-primary" value="Potrdi">
                        <a href="predmeti.php" class="btn btn-secondary ml-2">Prekliči</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>