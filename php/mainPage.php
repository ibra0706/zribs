<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/mainPage.css" />
    <title>Document</title>
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

// Attempt select query execution
$sql = "SELECT * FROM predmeti";
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
    echo "Oops! Something went wrong. Please try again later.";
}

// Close connection
mysqli_close($link);
?>
            </div>
    </div>
        <div class="vsiPredmeti">
        <h2>Vsi predmeti</h2>
        <div class="predmeti">
        <p>Lorem ipsum dolor sit amet.</p>
        <p>Lorem ipsum dolor sit amet.</p>
        <p>Lorem ipsum dolor sit amet.</p>
        <p>Lorem ipsum dolor sit amet.</p>
        <p>Lorem ipsum dolor sit amet.</p>
        <p>Lorem ipsum dolor sit amet.</p>
        </div>
        </div>
    </div>
    <div class="main2">
        <div class="urediPredmete">
            <h2>Uredi predmete</h2>
            <div class="predmeti">
            <iframe src="urediPredmete.php" width="100%" height="100%" frameborder="0"></iframe>
            </div>
        </div>
    </div>
    </div>
</body>
</html>
