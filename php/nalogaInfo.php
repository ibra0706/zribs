<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="../css/nalogaInfo.css">
    <title>Document</title>
</head>
<body>
    <?php include "header.php" ?>

    <div class="posebej">
<?php
require_once "config.php";

if ($_SERVER["REQUEST_METHOD"] == "GET") {
  $id = $_GET['idnalog'];
  $_SESSION["idnalog"] = $id;
  $id_dijak = $_SESSION['id'];
  $id_predmet = $_GET['idpred'];
  $_SESSION["idpred"] = $id_predmet;
} else {
  $id = $_SESSION['idnalog'];
  $id_dijak = $_SESSION['id'];
  $id_predmet = $_SESSION['idpred'];
}
$chinug = './predmetInfo.php?id='. $id_predmet; 
$sql = "SELECT * FROM naloge WHERE id_naloge = $id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                    echo '<div class="naloga">';
                    echo '<div class="flex">'.'<h1>'.$row['naziv'].'</h1>'.'<a href="'.$chinug.'" class="red chinug" >X</a>'.'</div>';
                    $status = $_SESSION['status'];
                    echo '<div class="vse">';
                    echo '<div class="naDva">';
                    echo '<h2 class="navodila">Navodila: ';
                    if($status === 'u'){
                        echo '<a href="izbrisiNalogo.php?idpred='.$id_predmet.'&idnalog='.$id.'">Izbriši</a> </div>';
                    }
                    echo '<br/></h2>'.'<h3>'.$row['navodila']. '</h3><br>';
                    echo '<br/>';
                    echo '<h3 class="rok">'. 'Rok oddaje: '.$row['datum_rok'].'</h3>' . '<br>';
                   
                    echo '<br/>';
                    
                    echo '<h3 id="nekineki">Oddane datoteke:</h3>';
                    echo '<br/>';
                    echo '<div class="datoteke">';
                  //naloge
                  if($_SESSION['status']=='d'){
                  $sql_oddana = "SELECT * FROM odaneNaloge WHERE id_dijaki=$id_dijak and id_predmet=$id_predmet and id_naloge=$id";
                  if($result_oddana = mysqli_query($link, $sql_oddana)){
                      if(mysqli_num_rows($result_oddana) > 0){
                              while($row_oddana = mysqli_fetch_array($result_oddana)){
                                  echo '<div class="datoteka">';
                                  echo '<h3 class="red bdw"><a href="izbrisiDatoteko.php?idpred='.$id_predmet.'&idnalog='.$id.'&ime='.$row_oddana['ime_datoteke'].'&id='.$row_oddana['id_di_nal'].'">X</a></h3>';
                                  echo $row_oddana['ime_datoteke'] . ' '; 
                                   
                                  echo '</div>'; 
                              }

                          mysqli_free_result($result_oddana);
                      } else{
                          echo '<div class="alert alert-danger"><em>ni oddane naloge</em></div>';
                      }
                  } else{
                      echo "Oops! Something went wrong. Please try again later.";
                  }
                  
                }else{
                    $sql_oddana = "SELECT * FROM odaneNaloge WHERE id_predmet=$id_predmet and id_naloge=$id";
                    if($result_oddana = mysqli_query($link, $sql_oddana)){
                        if(mysqli_num_rows($result_oddana) > 0){
                                while($row_oddana = mysqli_fetch_array($result_oddana)){
                                    echo '<a href="../uploads/'.$row_oddana['id_predmet'].'/'.$row_oddana['id_naloge'].'/'.$row_oddana['id_dijaki'].'/'.$row_oddana['ime_datoteke'].'" download="'.$row_oddana['ime_datoteke'].'">'.$row_oddana['ime_datoteke'] .'</a>'.'</br>';
                                }
  
                            mysqli_free_result($result_oddana);
                        } else{
                            echo '<div class="alert alert-danger"><em>ni oddane naloge</em></div>';
                        }
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                  }
                  echo '</div>';
//naloge
                    if ($_SESSION['status'] === 'd') {
                        echo '<br/>';
                      echo '<p>Datoteka mora biti shranjena kot <i>Ime Priimek - Ime naloge</i></p>';
                    echo '<br/>';
                    include 'nalozi.php';
                    echo '</div>';
                    }
                    
                    
                    echo '</div>';
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
<script src="../js/nalogaInfo.js"></script>
</div>
</body>
</html>