<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
// require_once "config.php";
// $id = $_SESSION['idnalog'];
if($_SERVER["REQUEST_METHOD"] == "GET") {$id_predmet = $_GET['idpred'];}

// $target_dir = "../uploads/".$predmet."/".$dijak."/";
$target_dir = "../uploads/" . strval($id_predmet) . "/";
// $target_dir = "../uploads/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// // Check if image file is a actual image or fake image
// if(isset($_POST["submit"])) {
//   $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
//   if($check !== false) {
//     echo "File is an image - " . $check["mime"] . ".";
//     $uploadOk = 1;
//   } else {
//     echo "File is not an image.";
//     $uploadOk = 0;
//     
//   }
// }

// Check if file already exists
if (file_exists($target_file)) {
  echo "Ta datoteka že obstaja";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 10000000) {
  echo "Sorry, your file is too large.";
  $uploadOk = 0;
}

// Allow certain file formats
// if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
// && $imageFileType != "gif" ) {
//   echo "Sorry, only JPG, JPEG, PNG & GIF files are allowed.";
//   $uploadOk = 0;
// }

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Sorry, your file was not uploaded.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "The file ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " has been uploaded.";
  } else {
    echo "Sorry, there was an error uploading your file.";
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
        </style>
    </head>
<body>

<form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post" enctype="multipart/form-data">
  Izberi datoteko, ki jo boš naložil:
  <label for="fileToUpload" class="btn">Izberi datoteko</label>
  <input type="file" name="fileToUpload" id="fileToUpload" style="visibility:hidden;">
  <input type="number" hidden name="id_predmet" value="<?php echo $id_predmet; ?>">
  <input type="submit" value="Naloži" name="submit" class="btn">
</form>

</body>
</html>