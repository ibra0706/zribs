<?php
require_once "config.php";
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}
 $id = $_SESSION['id'];

 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $st = trim($_POST['stevilo']);
        if(!empty($_POST['lang'])) {    
            foreach($_POST['lang'] as $value){


                $sql = "INSERT INTO dijakPredmet (id_dijaki, id_predmet) VALUES (?, ?)";
         
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "ii", $par_dijak, $par_predmet);
                    
                    $par_dijak = $id;
                    $par_predmet = $value;
                    if(mysqli_stmt_execute($stmt)){
                        
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
                mysqli_stmt_close($stmt);
            }
            // header("location: urediPredmete.php");
            // exit();

    }
}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/urediPredmete.css">
</head>
<body>
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <?php
    require_once "config.php";
    $id = $_SESSION["id"];
    $stPred = 0;
    $sql = "SELECT DISTINCT p.*
            FROM dijakPredmet d
            RIGHT JOIN predmeti p
            ON d.id_predmet = p.id_predmet AND id_dijaki = $id
            WHERE d.id_predmet IS NULL;";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        echo '<div class="predmetDodaj">';
                        echo $row['ime_predmeta'];
                        echo '<input type="checkbox" name="lang[]" value="'.$row['id_predmet'].'"></div>';
                        echo '<script> console.log("'.$row['id_predmet'].'")</script>';
                }
            mysqli_free_result($result);
        } else{
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
    mysqli_close($link);
    echo '<input type="number" name="stevilo" hidden value="'.$stPred.'">';
    ?>
    <input type="submit" value="Dodaj">
    </form>
</body>
</html>