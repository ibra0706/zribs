<?php
// Include config file
require_once "config.php";

// Attempt select query execution
$sql = "SELECT * FROM predmeti WHERE letnik = $id";
if($result = mysqli_query($link, $sql)){
    if(mysqli_num_rows($result) > 0){
            while($row = mysqli_fetch_array($result)){
               
                    echo '<div class="predmet">';
                    echo $row['kratica'];
                    echo '<div class="skatla">';
                    echo '<input type="checkbox"  id=" '. $row['kratica'] . '">
                        </div>
                    </div>';
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