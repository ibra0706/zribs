<?php
// Include config file
require_once "config.php";
$id = $_GET['id'];
echo '<script>console.log(' . $id . ')</script>';
// Attempt select query execution
$sql = "SELECT * FROM naloge WHERE id_predmet = $id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){              
                    echo '<div class="naloga">';
                    echo '<a href="nalogaInfo.php?idnalog='.$row['id_naloge'] . ' ">' . $row['naziv'] .'</a>';
                    // Adrian was here
                    echo '</div>';
            }
        mysqli_free_result($result);
    } else{
        echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
    }
} else{
    echo "Oops! Something went wrong. Please try again later.";
}

// Close connection
mysqli_close($link);
echo '<a href="novaNaloga.php?idpred='. $id .'">Dodaj nalogo(samo ucitelji)</a>';
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
</body>
</html>