<?php

if(isset($_POST["id"]) && !empty($_POST["id"])){

    require_once "config.php";

    //uciteljPredmet
    $sql_ucitelj = "DELETE FROM uciteljPredmet WHERE id_predmet = ?";
    
    if($stmt = mysqli_prepare($link, $sql_ucitelj)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);
        if(mysqli_stmt_execute($stmt)){
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    //dijakPredmet
    $sql_dijak = "DELETE FROM dijakPredmet WHERE id_predmet = ?";
    
    if($stmt = mysqli_prepare($link, $sql_dijak)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = trim($_POST["id"]);
        if(mysqli_stmt_execute($stmt)){
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }

    
    mysqli_stmt_close($stmt);
    
    mysqli_close($link);
    
    $param_id = trim($_POST["id"]);
    header("location: izbrisiPredmet.php?idpred=".$param_id);
    exit();
} else{
    if(empty(trim($_GET["id"]))){
        header("location: error-predmeti.php");
        exit();
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Delete Record</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
    </style>
</head>
<body>
<?php include('header.php') ?>

    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <h2 class="mt-5 mb-3">Izbriši predmet</h2>
                    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
                        <div class="alert alert-danger">
                            <input type="hidden" name="id" value="<?php echo trim($_GET["id"]); ?>"/>
                            <p>Ali ste prepričani, da želite izbrisati ta predmet?</p>
                            <p>
                                <input type="submit" value="Da" class="btn btn-danger">
                                <a href="predmeti.php" class="btn btn-secondary">Ne</a>
                            </p>
                        </div>
                    </form>
                </div>
            </div>        
        </div>
    </div>
</body>
</html>