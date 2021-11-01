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
            background: #fa941d;
            height: 100vh;
            width: 100vw;
            font-family: Lato;
        }
        .naloga{
            background: #fff;
            width: 60%;
            height: 50%;
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%,-50%);
            border-radius: 10px;
            padding: 1rem;
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
    </style>
</head>
<body>
<?php
// Include config file
require_once "config.php";
$id = $_GET['idnalog'];
// Attempt select query execution
$sql = "SELECT * FROM naloge WHERE id_naloge = $id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
                    echo '<div class="naloga">';
                    echo '<h1>'.$row['naziv'].'</h1>' . '<br>';
                    echo '<h2>'.$row['navodila'].'</h2>'. '<br>';
                    echo '<h3>'. 'Rok oddaje: '.$row['datum_rok'].'</h3>' . '<br>';
                    echo '<iframe src="./nalozi.php" title="nalozi nalogo"></iframe>';
                    echo '</div>';
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
</body>
</html>