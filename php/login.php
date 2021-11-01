<?php
session_start();
 
if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] === true){
    header("location: ../html/izberiRazred.html");
    exit;
}
 
require_once "config.php";
 
$mail = $geslo = "";
$mail_err = $geslo_err = $login_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
 
    if(empty(trim($_POST["mail"]))){
        $mail_err = "Please enter mail.";
    } else{
        $mail = trim($_POST["mail"]);
        // Adrian was here
    }
    
    if(empty(trim($_POST["geslo"]))){
        $geslo_err = "Please enter your geslo.";
    } else{
        $geslo = trim($_POST["geslo"]);
    }
    
    if(empty($mail_err) && empty($geslo_err)){
        $sql = "SELECT id_dijaki, mail, geslo FROM dijaki WHERE mail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $param_mail);
            
            $param_mail = $mail;
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){                    
                    mysqli_stmt_bind_result($stmt, $id, $mail, $hashed_password);
                    if(mysqli_stmt_fetch($stmt)){
                        if(password_verify($geslo, $hashed_password)){
                            session_start();
                            
                            $_SESSION["loggedin"] = true;
                            $_SESSION["id"] = $id;
                            $_SESSION["status"] = 'd';
                            $_SESSION["mail"] = $mail;                            
                            
                            header("location: ../html/izberiRazred.html");
                        } else{
                            $login_err = "Invalid mail or geslo.";
                        }
                    }
                } else{
                    mysqli_stmt_close($stmt);
                    $sql = "SELECT id_ucitlja, mail, geslo FROM ucitelji WHERE mail = ?";
        
                    if($stmt = mysqli_prepare($link, $sql)){
                        mysqli_stmt_bind_param($stmt, "s", $param_mail);
                        
                        $param_mail = $mail;
                        
                        if(mysqli_stmt_execute($stmt)){
                            mysqli_stmt_store_result($stmt);
                            
                            if(mysqli_stmt_num_rows($stmt) == 1){                    
                                mysqli_stmt_bind_result($stmt, $id, $mail, $hashed_password);
                                if(mysqli_stmt_fetch($stmt)){
                                    if(password_verify($geslo, $hashed_password)){
                                        session_start();
                                        
                                        $_SESSION["loggedin"] = true;
                                        $_SESSION["status"] = 'u';
                                        $_SESSION["id"] = $id;
                                        $_SESSION["mail"] = $mail;                            
                                        
                                        header("location: welcome.php");
                                    } else{
                                        $login_err = "Invalid mail or geslo.";
                                    }
                                }
                            } else{
                                $login_err = "Invalid mail or geslo.";
                            }
                        } else{
                            echo "Oops! Something went wrong. Please try again later.";
                        }

                        mysqli_stmt_close($stmt);
                    } else {
                        mysqli_stmt_close($stmt);
                        $sql = "SELECT id_admin, mail, geslo FROM admin WHERE mail = ?";
            
                        if($stmt = mysqli_prepare($link, $sql)){
                            mysqli_stmt_bind_param($stmt, "s", $param_mail);
                            
                            $param_mail = $mail;
                            
                            if(mysqli_stmt_execute($stmt)){
                                mysqli_stmt_store_result($stmt);
                                
                                if(mysqli_stmt_num_rows($stmt) == 1){                    
                                    mysqli_stmt_bind_result($stmt, $id, $mail, $hashed_password);
                                    if(mysqli_stmt_fetch($stmt)){
                                        if(password_verify($geslo, $hashed_password)){
                                            session_start();
                                            
                                            $_SESSION["loggedin"] = true;
                                            $_SESSION["id"] = $id;
                                            $_SESSION["status"] = 'a';
                                            $_SESSION["mail"] = $mail;                            
                                            
                                            header("location: welcome.php");
                                        } else{
                                            $login_err = "Invalid mail or geslo.";
                                        }
                                    }
                                } else{
                                    $login_err = "Invalid mail or geslo.";
                                }
                            } else{
                                echo "Oops! Something went wrong. Please try again later.";
                            }

                            mysqli_stmt_close($stmt);
                        }
                    }
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    }
    
    mysqli_close($link);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/prijava.css">
    <title>Document</title>
</head>
<body>
<main>   
    <h1>Prijava</h1>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <div>
                <input type="text" name="mail" placeholder="mail" <?php echo (!empty($mail_err)) ? 'is-invalid' : ''; ?> 
                value="<?php echo $mail; ?>">
                <span class="invalid-feedback"><?php echo $mail_err; ?></span>
            </div>    
            <div>
                <input type="password" placeholder="Geslo" name="geslo" <?php echo (!empty($geslo_err)) ? 'is-invalid' : ''; ?>>
                <span class="invalid-feedback"><?php echo $geslo_err; ?></span>
            </div>
            <div>
                <input type="submit"class="chinug" value="Prijava">
            </div>
            <p class="napis">Don't have an account? <a href="register.php">Sign up now</a>.</p>
        </form>
</main>
</body>
</html>