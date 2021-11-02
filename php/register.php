<?php
require_once "config.php";
$ime = $priimek = $mail = $geslo = $potrdi_geslo = "";
$ime_err = $priimek_err = $geslo_err = $mail_err  = $potrdi_geslo_err = "";
 
// Processing form data when form is submitted
if($_SERVER["REQUEST_METHOD"] == "POST"){
    echo "<script> console.log(1) </script>";
    if(empty(trim($_POST["ime"]))){
        $ime_err = "Vpisi ime.";
        echo "<script> console.log('ime') </script>";
    } else{
        $ime = trim($_POST["ime"]);

    }

    if(empty(trim($_POST["priimek"]))){
        $priimek_err = "Vpisi priimek.";
    } else{
        $priimek = trim($_POST["ime"]);
        // Adrian was here
    }

    if(empty(trim($_POST["mail"]))){
        echo "<script> console.log(3) </script>";
        $ime_err = "Vpisi mail.";
    } else{
        $mail = trim($_POST["mail"]);
        // Prepare a select statement
        $sql = "SELECT id_dijaki FROM dijaki WHERE mail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "s", $par_ime);
            
            // Set parameters
            $par_ime = trim($_POST["mail"]);
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                /* store result */
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $ime_err = "This mail is already taken.";
                } 
                else{ $mail = trim($_POST["mail"]);
                }
               
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            // Close statement
            mysqli_stmt_close($stmt);
        }
            
        

    
    
    // Validate geslo
    if(empty(trim($_POST["geslo"]))){
        echo "<script> console.log(4) </script>";
        $geslo_err  = "Please enter a geslo.";     
    } else{
        $geslo = trim($_POST["geslo"]);
        echo "<script> console.log(5) </script>";
    }
    
    // Validate confirm geslo
    if(empty(trim($_POST["potrdi_geslo"]))){
        $potrdi_geslo_err = "Please confirm geslo.";     
    } else{
        $potrdi_geslo = trim($_POST["potrdi_geslo"]);
        if(empty($geslo_err) && ($geslo != $potrdi_geslo)){
            $potrdi_geslo_err = "Password did not match.";
        }
    }
    
    // Check input errors before inserting in database
    if(empty($ime_err)  && empty($priimek_err )  && empty($mail_err) && empty($geslo_err ) && empty($potrdi_geslo_err)){
        
        // Prepare an insert statement
        $sql = "INSERT INTO dijaki(ime, priimek, mail, geslo) VALUES (?, ?, ?, ?)";
        echo "<script> console.log(15) </script>";
        if($stmt = mysqli_prepare($link, $sql)){
            // Bind variables to the prepared statement as parameters
            mysqli_stmt_bind_param($stmt, "ssss", $par_ime, $par_priimek, $par_mail, $par_geslo);
            echo "<script> console.log(16) </script>";
            // Set parameters
            $par_ime =$ime;
            $par_priimek =$priimek;
            $par_mail = $mail;
            $par_geslo = password_hash($geslo, PASSWORD_DEFAULT); // Creates a geslo hash
            
            // Attempt to execute the prepared statement
            if(mysqli_stmt_execute($stmt)){
                // Redirect to login page
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            // Close statement
            mysqli_stmt_close($stmt);
        }
    
    }
    // Close connection
    mysqli_close($link);
    
    }
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/prijava.css">
</head>
<body>
    <main>
        <h1>Registracija</h1>
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                <div class="naDva"> 
                <div>
                    <input type="text" name="ime" placeholder="Ime" class="form-control<?php echo (!empty($ime_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ime; ?>">
                    <span class="invalid-feedback"><?php echo $ime_err; ?></span>
                </div>

                <div>
                    <input type="text" name="priimek" placeholder="Priimek" class="form-control<?php echo (!empty($priimek_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $priimek; ?>">
                    <span class="invalid-feedback"><?php echo $priimek_err; ?></span>
                </div> 
            </div>
            <div>
                <input type="text" name="mail" placeholder="Mail"  class="form-control<?php echo (!empty($mail_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mail; ?>">
                <span class="invalid-feedback"><?php echo $mail_err; ?></span>
            </div>
            <div>
                <input type="password" name="geslo" placeholder="Geslo"  class="form-control<?php echo (!empty($geslo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $geslo; ?>">
                <span class="invalid-feedback"><?php echo $geslo_err; ?></span>
            </div>
            <div>
                <input type="password" name="potrdi_geslo" placeholder="Potrdi geslo" class="form-control <?php echo (!empty($potrdi_geslo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $potrdi_geslo; ?>">
                <span class="invalid-feedback"><?php echo $potrdi_geslo_err; ?></span>
            </div>
            <div >
                <input type="submit"class="chinug" value="Registriraj se">
            </div>
            <p class="napis">Že imaš račun? <a href="login.php">Prijavi se</a>.</p>
        </form>
</main>
</body>
</html>