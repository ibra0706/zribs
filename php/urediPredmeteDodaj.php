<?php
require_once "config.php";
 session_start();
 $id = $_SESSION['id'];

 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $st = trim($_POST['stevilo']);
    // for($i =0; $i<=$st;$i++){

        if(!empty($_POST['lang'])) {    
            foreach($_POST['lang'] as $value){
                echo "value : ".$value.'<br/>';

                $sql = "INSERT INTO dijakPredmet (id_dijaki, id_predmet) VALUES (?, ?)";
         
                if($stmt = mysqli_prepare($link, $sql)){
                    mysqli_stmt_bind_param($stmt, "ii", $par_dijak, $par_predmet);
                    
                    $par_dijak = $id;
                    $par_predmet = $value;
                    echo '<script> console.log('.$value.')</script>';
                    if(mysqli_stmt_execute($stmt)){
                        header("location: urediPredmete.php");
                        exit();
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
        }

        // if(isset($_POST['predmet'.strval($i)])){

            
        // }
         
        mysqli_stmt_close($stmt);
    }
        }
        // mysqli_close($link);
    // } 
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
    $sql = "SELECT * FROM predmeti p LEFT JOIN dijakPredmet d ON id_dijaki = 3 AND not p.id_predmet = d.id_predmet;";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        $stPred++;
                        echo '<div class="predmetDodaj">';
                        echo $row['ime_predmeta'];
                        echo '<input type="checkbox" name="lang[]" value="'.strval($row['id_predmet']).'"></div>';
                        echo '<script> console.log('.$row['id_predmet'].')</script>';
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