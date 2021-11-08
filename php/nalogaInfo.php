<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">
    <title>Document</title>

    <style>
        *{
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }
        body{
            background: white;
            height: 100vh;
            width: 100vw;
            font-family: Lato;
        }
        .naloga{
            width: 60%;

            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border: 2px solid #fa941d;
            padding: 1rem;
            max-height: 100%;
        }
        h2{
            width: 100%;
            min-height: 50%;
            max-height: 70%;
            border: 1px solid #fa941d;
            padding: 1rem;
        }
        .flex{
            display: flex;
            justify-content: space-between;
        }
        .red{
            color: red;
            cursor: pointer;
            text-decoration: none;
        }
        .datoteka{
          margin: 0;
          border: 1px solid #fa941d;
          padding: 1rem;
          width: 15%;
        }
        .datoteke{
          width: 100%;
          display: flex;
          flex-wrap: wrap;
          gap: 1rem;
        }
        .bdw{
          border-bottom: 1px solid #fa941d;
        }
    </style>
</head>
<body>
    <?php include "header.php" ?>
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
                    echo '<div class="flex">'.'<h1>'.$row['naziv'].'</h1>' . '<a href="'.$chinug.'" class="red chinug" >X</a>'.'</div>'. '<br>';
                    echo '<h2>'.$row['navodila'].'</h2>'. '<br>';
                    echo '<br/>';
                    echo '<h3>'. 'Rok oddaje: '.$row['datum_rok'].'</h3>' . '<br>';
                   
                    echo '<br/>';
                    
                    echo '<h3>Oddane datoteke:</h3>';
                    echo '<br/>';
                    echo '<div class="datoteke">';
                  //naloge
                  if($_SESSION['status']=='d'){
                  $sql_oddana = "SELECT * FROM odaneNaloge WHERE id_dijaki=$id_dijak and id_predmet=$id_predmet and id_naloge=$id";
                  if($result_oddana = mysqli_query($link, $sql_oddana)){
                      if(mysqli_num_rows($result_oddana) > 0){
                              while($row_oddana = mysqli_fetch_array($result_oddana)){
                                  echo '<div class="datoteka">';
                                  echo '<h3 class="red bdw">X</h3>';
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
                      echo '<p>Datoteka mora biti shranjena kot <i>Ime Priimek - Ime naloge</i></p>';
                    echo '<br/>';
                    echo include 'nalozi.php';
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

</body>
</html>