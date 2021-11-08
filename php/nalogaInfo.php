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
            height: 50%;
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
        iframe{
            border: none;
            height: 15%;
            width: 100%;
            overflow: hidden;
        }
        .flex{
            display: flex;
            justify-content: space-between;
        }
        .red{
            color: red;
            cursor: pointer;
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
} else {
  $id = $_SESSION['idnalog'];
}

$sql = "SELECT * FROM naloge WHERE id_naloge = $id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                    echo '<div class="naloga">';
                    echo '<div class="flex">'.'<h1>'.$row['naziv'].'</h1>' . '<h3 class="red" onClick="goBack()">X</h3>'.'</div>'. '<br>';
                    echo '<h2>'.$row['navodila'].'</h2>'. '<br>';
                    echo '<h3>Oddane datoteke:</h3>';
                    echo ;
                    echo '<h3>'. 'Rok oddaje: '.$row['datum_rok'].'</h3>' . '<br>';
                    echo '<p>Datoteka mora biti shranjena kot <i>Ime Priimek - Ime naloge</i></p>';
                    echo include 'nalozi.php';
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
<script>
function goBack() {
  window.history.back();
}
</script>

</body>
</html>