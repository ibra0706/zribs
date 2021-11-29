<?php
require_once "config.php";

if(isset($_GET['id'])){
    $id = $_GET['id'];
    $vhod = "admin";
}else {
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $id = $_SESSION["id"];
    $vhod = "dijak";
}
 
if($_SERVER["REQUEST_METHOD"] == "POST"){
        $vhod = trim($_POST['vhod']);
        if(!empty($_POST['getId'])){
            $id = $_POST['getId'];
        }

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
            if($vhod == "dijak"){
                header("location: mainPage.php");
            } else{
                header("location: dijaki.php");
            }
            exit();

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
<?php include "header.php" ?>
    <div class="mainUredi">
    <form action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>" method="POST">
    <?php
    require_once "config.php";
    if(isset($_GET['id'])){
        $id = $_GET['id'];
    }else {
        $id = $_SESSION["id"];
    }
    
    $sql = "SELECT DISTINCT p.*
            FROM dijakPredmet d
            RIGHT JOIN predmeti p
            ON d.id_predmet = p.id_predmet AND id_dijaki = $id
            WHERE d.id_predmet IS NULL;";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        echo '<div class="predmetForm">';
                        echo $row['ime_predmeta'];
                        echo '<input type="checkbox" class="checkMark" name="lang[]" value="'.$row['id_predmet'].'"></div>';
                }
            mysqli_free_result($result);
        } else{
            echo '<div class="alert alert-danger"><em>Čestitam izbral si vse predmete.</em></div>';
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
    mysqli_close($link);
    
    echo '<input type="submit" class="predmetUredi" value="Dodaj">';

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