<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mainPage.css" />
    <link rel="stylesheet" href="../css/urediPredmete.css">

    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">   
    <title>Document</title>
    <style>
        *{
            font-family: Lato;
        }
    </style>
</head>
<body>
    <?php include "header.php" ?>
    <div class="outer-main">
    <div class="main">
        <div class="mojiPredmeti">
            <h2>Moji predmeti</h2>
            <div class="predmeti">
                
            <?php
        // Include config file
        require_once "config.php";
        if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $id = $_SESSION['id'];
        if($_SESSION['status'] == 'u'){
            $table = "uciteljPredmet";
            $idtable = "id_ucitlja";
        } else{
            $table ="dijakPredmet";
            $idtable = "id_dijaki";
        }
        $sql = "SELECT p.*, d.* FROM $table d, predmeti p  where $idtable = $id AND  p.id_predmet = d.id_predmet;";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                    while($row = mysqli_fetch_array($result)){

                            echo '<a href="predmetInfo.php?id='. $row['id_predmet'] .'">';
                            echo $row['ime_predmeta'];
                            echo '</a> <br>';
                    }
                // Free result set
                mysqli_free_result($result);
            } else{
                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
            }
        } else{
            echo "Oops! Please try again later.";
        }

        // Close connection
        // mysqli_close($link);
        ?>
            </div>
    </div>

    <div class="urediBox">
        <h2>Uredi predmete</h2>
            <a class="predmetUredi" href="urediPredmeteDodaj.php">Dodaj predmet</a>
            <a class="predmetUredi" href="urediPredmeteOdstrani.php">Odstrani predmete</a>
    </div>
        <div class="vsiPredmeti">
        <h2>Vsi ucitelji</h2>
        <div class="predmeti">
        <?php
    // Include config file
    require_once "config.php";

    // Attempt select query execution
    $sql = "SELECT * FROM ucitelji";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        echo '<h3 href="predmetInfo.php?id='. $row['id_ucitlja'] .'">';
                        echo $row['ime'] .'   ' . $row['priimek'];
                        echo '</h3> <br>';
                }
            // Free result set
            mysqli_free_result($result);
        } else{
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }

    // Close connection
    mysqli_close($link);
    ?>
        </div>
        </div>
    </div>
    
</body>
</html>
