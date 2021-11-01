<?php
if($_SERVER["REQUEST_METHOD"] == "POST"){
$predmet;
$dijak;
$target_dir = "../uploads/".$predmet."/".$dijak."/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "File is an image - " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "File is not an image.";
    $uploadOk = 0;
    // Adrian was here
  }
}

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
        <style>
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
  <label for="fileToUpload" class="btn">Select Image</label>
  <input type="file" name="fileToUpload" id="fileToUpload" style="visibility:hidden;">
  <input type="submit" value="Naloži" name="submit" class="btn">
</form>

</body>
</html>