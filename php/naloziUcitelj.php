<?php
if($_SERVER["REQUEST_METHOD"] == "GET") {$id_naloge = $_GET['idnalog'];}
if($_SERVER["REQUEST_METHOD"] == "GET") {$id_predmet = $_GET['idpred'];}

if(session_id() == '' || !isset($_SESSION) || session_status() === PHP_SESSION_NONE) {
  session_start();
}

if($_SERVER["REQUEST_METHOD"] == "POST"){

  $id_predmet = trim($_POST["id_predmet"]);
  $id_naloge = trim($_POST["id_naloge"]);
  $id_ucitlja = $_SESSION['id'];

if (!file_exists('../uploads/'.strval($id_predmet).'/'.strval($id_naloge).'/gradivo/'.strval($id_ucitlja))) {
  mkdir('../uploads/'.strval($id_predmet).'/'.strval($id_naloge).'/gradivo/'.strval($id_ucitlja), 0777, true);
}
$target_dir = '../uploads/'.strval($id_predmet).'/'.strval($id_naloge).'/gradivo/'.strval($id_ucitlja).'/';
$ime_datoteke = $_FILES["fileToUpload"]["name"];
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$overwrite = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

if (file_exists($target_file)) {
  echo "Ta datoteka je bila povozena";
  $overwrite = 0;
}

if ($_FILES["fileToUpload"]["size"] > 10000000) {
  echo "Sorry, your file is too large.";
  echo '<br/>';
  $uploadOk = 0;
}

if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
  echo '<br/>';
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    if($overwrite==1){
        require_once "config.php";
    
        $sql = "INSERT INTO odanoGradivo (id_predmet, id_naloge, id_ucitlja, ime_gradiva) VALUES (?, ?, ?, ?)";
         
        if($stmt = mysqli_prepare($link, $sql)){
            mysqli_stmt_bind_param($stmt, "iiis", $par_id_naloge, $par_id_predmet, $par_id_ucitlja, $par_ime_datoteke);
            
            $par_id_naloge = $id_naloge;
            $par_id_predmet = $id_predmet;
            $par_id_ucitlja = $id_ucitlja;
            $par_ime_datoteke =  $ime_datoteke;
          

            if(mysqli_stmt_execute($stmt)){
            } else{
                echo "neki je slo narobe.";
                echo '<br/>';
            }
        }
    }
    header ("location: nalogaInfo.php?idnalog=".$id_naloge.'&idpred='.$id_predmet);
    echo '<div class="show">'."The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.". '</div>';
    echo '<br/>';
    mysqli_stmt_close($stmt);
  } else {
    echo "Sorry, there was an error uploading your file.";
    echo '<br/>';
  }
}
}
?>

<!DOCTYPE html>
<html>
    <head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
<link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
<link href="https://fonts.googleapis.com/css2?family=Lato&display=swap" rel="stylesheet">

        <style>
          body{
            font-family: Lato
          }
            .btn{
                background: #fa941d;
                color: #fff;
                padding: 0.5rem;
                border: none;
                border-radius: 5px;
            }
            .show{
              display: block;
            }
            .hide{
              display: none;
            }
        </style>
    </head>
<body>
  <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data" onsubmit="clickHandler()">
    <input type="number" hidden name="id_predmet" value="<?php echo $id_predmet; ?>">
    <input type="number" hidden name="id_naloge" value="<?php echo $id_naloge; ?>">
    Izberi datoteko, ki jo boš naložil:
    <label for="fileToUpload" class="btn">Izberi datoteko</label>
    <input type="file" name="fileToUpload" id="fileToUpload" style="visibility:hidden;">
    <input type="submit" value="Naloži" name="submit" class="btn">
  </form>
</body>
</html>