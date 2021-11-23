<?php
require_once "config.php";
$ime = $priimek = $mail = $geslo = $potrdi_geslo = "";
$ime_err = $priimek_err = $geslo_err = $mail_err  = $potrdi_geslo_err = "";
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty(trim($_POST["ime"]))){
        $ime_err = "Vpiši ime.";
    } else{
        $ime = trim($_POST["ime"]);

    }

    if(empty(trim($_POST["priimek"]))){
        $priimek_err = "Vpiši priimek.";
    } else{
        $priimek = trim($_POST["ime"]);
    }

    if(empty(trim($_POST["mail"]))){
        $mail_err = "Vpiši mail.";
    } else{
        $mail = trim($_POST["mail"]);
        $sql = "SELECT id_dijaki FROM dijaki WHERE mail = ?";
        
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "s", $par_ime);
            
            $par_ime = trim($_POST["mail"]);
            
            if(mysqli_stmt_execute($stmt)){
                mysqli_stmt_store_result($stmt);
                
                if(mysqli_stmt_num_rows($stmt) == 1){
                    $mail_err = "Ta mail naslov že obstaja.";
                } 
                else{ $mail = trim($_POST["mail"]);
                }
               
            }else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            mysqli_stmt_close($stmt);
        }
            
        

    
    
    if(empty(trim($_POST["geslo"]))){
        $geslo_err  = "Vpiši geslo.";     
    } else{
        $geslo = trim($_POST["geslo"]);
    }
    
    if(empty(trim($_POST["potrdi_geslo"]))){
        $potrdi_geslo_err = "Potrdi geslo geslo.";     
    } else{
        $potrdi_geslo = trim($_POST["potrdi_geslo"]);
        if(empty($geslo_err) && ($geslo != $potrdi_geslo)){
            $potrdi_geslo_err = "Gesli se nista ujemali.";
        }
    }
    
    if(empty($ime_err)  && empty($priimek_err )  && empty($mail_err) && empty($geslo_err ) && empty($potrdi_geslo_err)){
        
        $sql = "INSERT INTO dijaki(ime, priimek, mail, geslo) VALUES (?, ?, ?, ?)";
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "ssss", $par_ime, $par_priimek, $par_mail, $par_geslo);
            $par_ime =$ime;
            $par_priimek =$priimek;
            $par_mail = $mail;
            $par_geslo = password_hash($geslo, PASSWORD_DEFAULT); // Creates a geslo hash
            
            if(mysqli_stmt_execute($stmt)){
                header("location: login.php");
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }

            mysqli_stmt_close($stmt);
        }
    
    }
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
                    <div class="napaka"><?php echo $ime_err; ?></div>
                </div>

                <div>
                    <input type="text" name="priimek" placeholder="Priimek" class="form-control<?php echo (!empty($priimek_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $priimek; ?>">
                    <div class="napaka"><?php echo $priimek_err; ?></div>
                </div> 
            </div>
            <div>
                <input type="text" name="mail" placeholder="Mail" pattern="[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,4}$"  class="form-control<?php echo (!empty($mail_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $mail; ?>">
                <div class="napaka"><?php echo $mail_err; ?></div>
            </div>
            <div>
                <input type="password" name="geslo" placeholder="Geslo"  class="form-control<?php echo (!empty($geslo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $geslo; ?>">
                <div class="napaka"><?php echo $geslo_err; ?></div>
            </div>
            <div>
                <input type="password" name="potrdi_geslo" placeholder="Potrdi geslo" class="form-control <?php echo (!empty($potrdi_geslo_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $potrdi_geslo; ?>">
                <div class="napaka"><?php echo $potrdi_geslo_err; ?></div>
            </div>
            <div >
                <input type="submit"class="chinug" value="Registriraj se">
            </div>
            <p class="napis">Že imaš račun? <a href="login.php">Prijavi se</a>.</p>
        </form>
</main>
</body>
</html>