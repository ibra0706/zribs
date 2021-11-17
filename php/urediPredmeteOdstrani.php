<?php
require_once "config.php";
if(isset($_GET['id'])){
    $id = $_GET['id'];
}else {
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $id = $_SESSION["id"];
}


 
if($_SERVER["REQUEST_METHOD"] == "POST"){
    $vhod=$_POST['vhod'];

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
    if($vhod == "dijak"){
        header("location: mainPage.php");
    } else{
        header("location: dijaki.php");
    }
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
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION["id"];
    }
    
    $sql = "SELECT p.*, d.* FROM dijakPredmet d, predmeti p  where id_dijaki = $id AND  p.id_predmet = d.id_predmet;";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        echo '<div class="predmetForm">';
                        echo $row['ime_predmeta'];
                        echo '<input type="checkbox" class="checkMark" name="lang[]" value="'.$row['id_di_pre_povezava'].'"></div>';
                }
            mysqli_free_result($result);
        } else{
            echo '<div class="alert alert-danger"><em>Dijak nima izbranih predmetov.</em></div>';
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
    mysqli_close($link);
    echo '<input type="submit" class="predmetUredi" value="Briši">';

    if(isset($_GET['id'])){
        echo '<a href="dijaki.php" class="predmetUredi">Nazaj</a>
                <input type="text" name="vhod" hidden value="admin">
                <input type="number" name="getId" hidden value="'.$_GET['id'].'">';
    } else{
        echo '<a href="mainPage.php" class="predmetUredi">Nazaj</a>
                <input type="text" name="vhod" hidden value="dijak">';
    }
    ?>
    </form>
    </div>
</body>
</html>