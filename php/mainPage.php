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
