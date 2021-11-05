<?php
require_once "config.php";
if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
    session_start();
}
 $id = $_SESSION['id'];

 
if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST['lang'])) {    
            foreach($_POST['lang'] as $value){

                $sql = "DELETE FROM dijakPredmet WHERE id_di_pre_povezava = ?";
    
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "i", $param_id);
                    
                    $param_id = $value;
                    
                    if(mysqli_stmt_execute($stmt)){

                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
        }     
        mysqli_stmt_close($stmt);
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
</head>
<body>
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<?php
    require_once "config.php";
    $id = $_SESSION['id'];
    $stPred = 0;
    $sql = "SELECT p.*, d.* FROM dijakPredmet d, predmeti p  where id_dijaki = $id AND  p.id_predmet = d.id_predmet;";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        $stPred++;
                        echo '<div class="predmetDodaj">';
                        echo $row['ime_predmeta'];
                        echo '<input type="checkbox" name="lang[]" value="'.$row['id_di_pre_povezava'].'"></div>';
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
    ?>
    <input type="submit" value="Briši">
</body>
</html>