<?php
// Include config file
require_once "config.php";
session_start();
$ime_naloge = $navodila = $datum_rok = "";
$ime_naloge_err = $navodila_err = $datum_rok_err = "";
$id_ucitelj = $_SESSION['id'];
if($_SERVER["REQUEST_METHOD"] == "GET") {$id_predmet = $_GET['idpred'];}
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $id_predmet = trim($_POST["id_predmet"]);


    $input_ime_naloge = trim($_POST["ime_naloge"]);
    if(empty($input_ime_naloge)){
        $ime_naloge_err = "Please enter a ime_naloge.";
    }else{
        $ime_naloge = $input_ime_naloge;
    }

    $input_navodila = trim($_POST["navodila"]);
    if(empty($input_navodila)){
        $navodila_err = "Please enter a navodila.";
    }else{
        $navodila = $input_navodila;
    }
    
    $input_datum_rok = trim($_POST["datum_rok"]);
    if(empty($input_datum_rok)){
        $datum_rok_err = "Please enter an datum_rok.";     
    } else{
        $datum_rok = $input_datum_rok;
    }
    
    if(empty($ime_naloge_err) && empty($navodila_err) && empty($datum_rok_err)){
        $sql = "INSERT INTO naloge (navodila, naziv, datum_oddaje, datum_rok, id_predmet, id_ucitlja) VALUES (?, ?, ?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){

            mysqli_stmt_bind_param($stmt, "ssssii", $par_navodila, $ime_naloge, $par_datum_oddaje, $par_datum_rok, $par_id_predmet, $par_id_ucitelj);
            

            $par_navodila = $navodila;
            $ime_naloge = $ime_naloge;
            $par_datum_oddaje = date('Y-m-d');
            $par_datum_rok = $datum_rok;
            $par_id_predmet = $id_predmet;
            $par_id_ucitelj = $id_ucitelj;

            if(mysqli_stmt_execute($stmt)){

                header("location: predmetInfo.php?id=" . $id_predmet);
                exit();
            } else{

                echo "Oops! Something went wrong. Please try again later.";
            }
        }
        

        mysqli_stmt_close($stmt);
    }
    

    mysqli_close($link);
}
?>
 
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Ustvari nalogo</title>
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
    <?php include "header.php" ?>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5">Ustvari nalogo</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="form-group">
                            <label>Ime naloge</label>
                            <input type="text" name="ime_naloge" autocomplete="false" class="form-control <?php echo (!empty($ime_naloge_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $ime_naloge; ?>">
                            <span class="invalid-feedback"><?php echo $ime_naloge_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Navodila</label>
                            <textarea type="text" name="navodila" class="form-control <?php echo (!empty($navodila_err)) ? 'is-invalid' : ''; ?>"><?php echo $navodila; ?></textarea>
                            <span class="invalid-feedback"><?php echo $navodila_err;?></span>
                        </div>
                        <div class="form-group">
                            <label>Datum</label>
                            <input type="date" name="datum_rok" class="form-control <?php echo (!empty($datum_rok_err)) ? 'is-invalid' : ''; ?>" value="<?php echo $datum_rok; ?>">
                            <span class="invalid-feedback"><?php echo $datum_rok_err;?></span>
                        </div>
                        <input type="number" hidden name="id_predmet" value="<?php echo $id_predmet; ?>">
                        <input type="submit" class="btn btn-primary" value="Dodaj">
                        <a href="predmetInfo.php?id=<?php echo $id_predmet; ?>" class="btn btn-secondary ml-2">Prekliči</a>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>