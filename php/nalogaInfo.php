

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
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
                    echo $row['naziv'] . '<br>';
                    echo $row['navodila'] . '<br>';
                    echo $row['datum_rok'] . '<br>';
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