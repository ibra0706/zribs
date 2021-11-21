<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$ime_predmeta = $kratica = $letnik = "";
$ime_predmeta_err = $kratica_err = $letnik_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate ime_predmeta
    $input_ime_predmeta = trim($_POST["ime_predmeta"]);
    if(empty($input_ime_predmeta)){
        $ime_predmeta_err = "Please enter a ime_predmeta.";
    }else{
        $ime_predmeta = $input_ime_predmeta;
    }

    $input_kratica = trim($_POST["kratica"]);
    if(empty($input_kratica)){
        $kratica_err = "Please enter a kratica.";
    }else if(strlen($input_kratica) !== 3){
        $kratica_err = "kratica mora biti dolga 3 crke.";
    }else{
        $kratica = $input_kratica;
    }
    
    // Validate letnik
    $input_letnik = trim($_POST["letnik"]);
    if(empty($input_letnik)){
        $letnik_err = "Please enter an letnik.";     // Adrian was heres
    } else{
        $letnik = $input_letnik;
    }
    
    // Check input errors before inserting in database
    if(empty($ime_predmeta_err) && empty($kratica_err) && empty($letnik_err) && empty($geslo_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO predmeti (ime_predmeta, kratica, letnik) VALUES (?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssi", $par_ime_predmeta, $par_kratica, $par_letnik);
            
            // Set parameters
            $par_ime_predmeta = $ime_predmeta;
            $par_kratica = $kratica;
            $par_letnik = $letnik;
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: predmeti.php");
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        
        // // Close statement
        mysqli_stmt_close($stmt);
    }
    
    // Close connection
    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ustvari predmet</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        .btn-primary{
            background: #fa941d;
            border: 1px #fa941d solid;
        }
        .btn-primary:hover,
        .btn-primary:link,
        .btn-primary:focus,
        .btn-primary:active,
        .btn-primary:focus-visible{
            background: #E34D10 !important;
            border: 1px solid #E34D10 !important;
            box-shadow: none;
        }
        .btn-primary:focus{
            outline: 2px #fa941d solid !important;
            
        }
    </style>
</head>
<body>
<?php include('header.php') ?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Ustvari predmet</h2>
                    <!-- <p>Please fill this form and submit to add employee record to the database.</p> -->
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Ime predmeta</label>
                            <input type="text" name="ime_predmeta" autocomplete="false" class="form-control <?php echo (!empty($ime_predmeta_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ime_predmeta; ?>">
                            <span class="invalid-feedback"><?php echo $ime_predmeta_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Kratica</label>
                            <input type="text" name="kratica" class="form-control <?php echo (!empty($kratica_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $kratica; ?>">
                            <span class="invalid-feedback"><?php echo $kratica_err;?></span>
                        </div>
                        <div class="form-group">
                            <input hidden type="number" value="1" name="letnik" class="form-control <?php //echo (!empty($letnik_err)) ? 'is-invalid' : ''; ?>">
                            <span class="invalid-feedback"><?php echo $letnik_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Dodaj">
                        <a href="predmeti.php" class="btn btn-secondary ml-2">Prekliči</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>