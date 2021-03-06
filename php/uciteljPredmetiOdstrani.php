<?php
require_once "config.php";
$id = $_GET['id'];
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
        if(!empty($_POST['lang'])) {    
            foreach($_POST['lang'] as $value){

                $sql = "DELETE FROM uciteljPredmet WHERE id_uc_pre_povezava = ?";
    
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
    header("location: ucitelji.php");
    exit();
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
    <?php include "header.php" ?>
    <div class="mainUredi">
<form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
<?php
    require_once "config.php";
    $id = $_GET['id'];

    $sql = "SELECT p.*, d.* FROM uciteljPredmet d, predmeti p  where id_ucitlja = $id AND  p.id_predmet = d.id_predmet;";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        echo '<div class="predmetForm">';
                        echo $row['ime_predmeta'];
                        echo '<input type="checkbox" class="checkMark" name="lang[]" value="'.$row['id_uc_pre_povezava'].'"></div>';
                }
            mysqli_free_result($result);
        } else{
            echo '<div class="alert alert-danger"><em>Ucitelj nima izbranih predmetov.</em></div>';
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
    mysqli_close($link);
    ?>
    <input type="submit" class="predmetUredi" value="Bri??i">
    <a href="ucitelji.php" class="predmetUredi">Nazaj</a>
    </form>
    </div>
</body>
</html>