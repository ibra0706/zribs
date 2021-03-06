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
            require_once "config.php";
            if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
                session_start();
            }

            if($_SESSION['status']==='a'){ header('location: admin.php');}

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
                                echo $row['kratica'] .' - '. $row['ime_predmeta'];
                                echo '</a> <br>';
                        }
    
                    mysqli_free_result($result);
                } else{
                    if($_SESSION['status'] === 'd'){
                    header("location: urediPredmeteDodaj.php");
                    }
                }
            } else{
                echo "Oops! Please try again later.";
            }
    
            ?>
            </div>
    </div>
    <?php
    $status = $_SESSION['status'];
        if($status === 'd'){
            echo '<div class="urediBox">
                <h2>Uredi predmete</h2>
                    <div class="linki">
                        <a class="predmetUredi" href="urediPredmeteDodaj.php">Dodaj predmet</a>
                        <a class="predmetUredi" href="urediPredmeteOdstrani.php">Odstrani predmete</a>
                    </div>
                </div>';
        }
            
    ?>
        <div class="vsiPredmeti">
        <h2>Vsi ucitelji</h2>
        <div class="predmeti">
        <?php
    require_once "config.php";

    $sql = "SELECT * FROM ucitelji";
    if($result = mysqli_query($link, $sql)){
        if(mysqli_num_rows($result) > 0){
                while($row = mysqli_fetch_array($result)){
                        $idUcit = $row['id_ucitlja'];
                        echo '<h3 href="predmetInfo.php?id='. $row['id_ucitlja'] .'">';
                        echo $row['ime'] .'   ' . $row['priimek'];
                            
                        echo '<span class="predKrat">';

                        $sql_ucitelj = "SELECT p.*, d.* FROM uciteljPredmet d, predmeti p  where id_ucitlja = $idUcit AND  p.id_predmet = d.id_predmet;";
                            if($resultUcit = mysqli_query($link, $sql_ucitelj)){
                                if(mysqli_num_rows($resultUcit) > 0){
                                        while($rowUcit = mysqli_fetch_array($resultUcit)){
                                                echo "<span> ". $rowUcit['kratica']. " </span>";                                                
                                        }
                    
                                    mysqli_free_result($resultUcit);
                                } else{
                                    echo '<div class="alert alert-danger"><em>U??itelj ne u??i nobenga predmeta.</em></div>';
                                }
                            } else{
                                echo "Oops! Please try again later.";
                            }
                        echo '</span>';
                        echo '</h3> <br>';
                }
            mysqli_free_result($result);
        } else{
            echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
        }
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
    // mysqli_stmt_close($stmt);

    // Close connection
    mysqli_close($link);
    ?>
        </div>
        </div>
    </div>
    
</body>
</html>
