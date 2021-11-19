<?php 
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $idnaloge = $_GET['idnalog'];
    $idpredmet = $_GET['idpred'];
    // $ime = $_GET['ime'];
    // $iddijak = $_SESSION['id'];
    // $id=$_GET['id'];
    
    require_once 'config.php';

    $sql_oddana = "SELECT * FROM odaneNaloge WHERE id_predmet=$idpredmet and id_naloge=$idnaloge";
    if($result_oddana = mysqli_query($link, $sql_oddana)){
        if(mysqli_num_rows($result_oddana) > 0){
                while($row_oddana = mysqli_fetch_array($result_oddana)){
                    // echo '<div class="datoteka">';
                    // echo '<h3 class="red bdw"><a href="izbrisiDatoteko.php?idpred='.$id_predmet.'&idnalog='.$id.'&ime='.$row_oddana['ime_datoteke'].'&id='.$row_oddana['id_di_nal'].'">X</a></h3>';
                    $ime=$row_oddana['ime_datoteke'];
                    $iddijak =$row_oddana['id_dijaki'];

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
        } else{
            echo '<div class="alert alert-danger"><em>ni oddane naloge</em></div>';
        }
        
        
        $sql_oo = "DELETE FROM odaneNaloge WHERE id_naloge = $idnaloge";
        
        if($stmt = mysqli_prepare($link, $sql_oo)){
            // mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // $param_id = trim($_POST["id"]);
            
            if(mysqli_stmt_execute($stmt)){
                
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        
        $sql_on = "DELETE FROM naloge WHERE id_naloge = $idnaloge";
        
        if($stmt = mysqli_prepare($link, $sql_on)){
            // mysqli_stmt_bind_param($stmt, "i", $param_id);
            
            // $param_id = trim($_POST["id"]);
            
            if(mysqli_stmt_execute($stmt)){
                header('location: predmetInfo.php?id='.$idpredmet);
                exit();
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
        }
    }
}


?>