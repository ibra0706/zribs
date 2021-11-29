<?php 
    if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $idnaloge = $_GET['idnalog'];
    $idpredmet = $_GET['idpred'];
    $ime = $_GET['ime'];
    $id_ucitelj = $_GET['iduci'];
    $id=$_GET['id'];

    $file_pointer = '../uploads/'.strval($idpredmet).'/'.strval($idnaloge).'/gradivo/'.strval($id_ucitelj).'/'.$ime; 
   
    if (!unlink($file_pointer)) { 
        echo ("$file_pointer cannot be deleted due to an error"); 
    } 
    else { 
        echo ("$file_pointer has been deleted"); 
    } 
  
    require_once 'config.php';

    $sql = "DELETE FROM odanoGradivo WHERE id_di_gra = $id";
    
    if($stmt = mysqli_prepare($link, $sql)){
        // mysqli_stmt_bind_param($stmt, "i", $param_id);
        
        // $param_id = trim($_POST["id"]);
        
        if(mysqli_stmt_execute($stmt)){
            header('location: nalogaInfo.php?idnalog='.$idnaloge.'&idpred='.$idpredmet);
            exit();
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
    }
?>