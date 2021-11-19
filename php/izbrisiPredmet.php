<?php 
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    // $idnaloge = $_GET['idnalog'];
    $idpredmet = $_GET['idpred'];
    // $ime = $_GET['ime'];
    // $iddijak = $_SESSION['id'];
    // $id=$_GET['id'];
    
    require_once 'config.php';
    $sql_oddana = "SELECT * FROM odaneNaloge WHERE id_predmet=$idpredmet";
    if($result_oddana = mysqli_query($link, $sql_oddana)){
        if(mysqli_num_rows($result_oddana) > 0){
                while($row_oddana = mysqli_fetch_array($result_oddana)){
                    $ime=$row_oddana['ime_datoteke'];
                    $iddijak =$row_oddana['id_dijaki'];
                    $idnaloge= $row_oddana['id_naloge'];
                    $file_pointer = '../uploads/'.strval($idpredmet).'/'.strval($idnaloge).'/'.strval($iddijak).'/'.$ime; 

                    if (!unlink($file_pointer)) { 
                        echo ("$file_pointer cannot be deleted due to an error"); 
                    } 
                    else { 
                        echo ("$file_pointer has been deleted"); 
                    } 
                    // echo '</div>'; 
                }

            mysqli_free_result($result_oddana);
            //oddana naloga
            $sql_oo = "DELETE FROM odaneNaloge WHERE id_naloge = $idnaloge";
        
            if($stmt = mysqli_prepare($link, $sql_oo)){
                    if(mysqli_stmt_execute($stmt)){
                        
                } else{
                    echo "Oops! Something went wrong. Please try again later.";
                }
                //naloga
                $sql_on = "DELETE FROM naloge WHERE id_naloge = $idnaloge";
                
                if($stmt = mysqli_prepare($link, $sql_on)){
                    if(mysqli_stmt_execute($stmt)){
                    } else{
                        echo "Oops! Something went wrong. Please try again later.";
                    }
                }
        
        
        }
        
    }
}
//predmet
$sql = "DELETE FROM predmeti WHERE id_predmet = $idpredmet";
        
if($stmt = mysqli_prepare($link, $sql)){
    
    if(mysqli_stmt_execute($stmt)){
        header('location: predmeti.php');
        exit();
    } else{
        echo "Oops! Something went wrong. Please try again later.";
    }
}


?>