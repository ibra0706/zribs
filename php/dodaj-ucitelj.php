<?php
// Include config file
require_once "config.php";
 
// Define variables and initialize with empty values
$ime = $priimek = $mail = $geslo = "";
$ime_err = $priimek_err = $mail_err = $geslo_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    // Validate ime
    $input_ime = trim($_POST["ime"]);
    if(empty($input_ime)){
        $ime_err = "Please enter a ime.";
    }else{
        $ime = $input_ime;
    }

    $input_priimek = trim($_POST["priimek"]);
    if(empty($input_priimek)){
        $priimek_err = "Please enter a priimek.";
    }else{
        $priimek = $input_priimek;
    }
    
    // Validate mail
    $input_mail = trim($_POST["mail"]);
    if(empty($input_mail)){
        $mail_err = "Please enter an mail.";     
    } else{
        $mail = $input_mail;
    }
    
    // Validate geslo
    $input_geslo = trim($_POST["geslo"]);
    if(empty($input_geslo)){
        $geslo_err = "Please enter the geslo amount.";     
    }else{
        $geslo = $input_geslo;
    }
    
    // Check input errors before inserting in database
    if(empty($ime_err) && empty($priimek_err) && empty($mail_err) && empty($geslo_err)){
        // Prepare an insert statement
        $sql = "INSERT INTO ucitelji (ime, priimek, mail, geslo) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $par_ime, $par_priimek, $par_mail, $par_geslo);
            
            // Set parameters
            $par_ime = $ime;
            $par_priimek = $priimek;
            $par_mail = $mail;
            $par_geslo =  password_hash($geslo, PASSWORD_DEFAULT);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Records created successfully. Redirect to landing page
                header("location: ucitelji.php");
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
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Create Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Create Record</h2>
                    <p>Please fill this form and submit to add employee record to the database.</p>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="ime" class="form-control <?php echo (!empty($ime_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ime; ?>">
                            <span class="invalid-feedback"><?php echo $ime_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Name</label>
                            <input type="text" name="priimek" class="form-control <?php echo (!empty($priimek_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $priimek; ?>">
                            <span class="invalid-feedback"><?php echo $priimek_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Address</label>
                            <input type="text" name="mail" class="form-control <?php echo (!empty($mail_err)) ? 'is-invalid' : ''; ?>"><?php echo $mail; ?>
                            <span class="invalid-feedback"><?php echo $mail_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Salary</label>
                            <input type="password" name="geslo" class="form-control <?php echo (!empty($geslo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $geslo; ?>">
                            <span class="invalid-feedback"><?php echo $geslo_err;?></span>
                        </div>
                        <input type="submit" class="btn btn-primary" value="Submit">
                        <a href="index.php" class="btn btn-secondary ml-2">Cancel</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>