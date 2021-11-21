<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/predmetInfo.css">
</head>
<body>
    <?php include "header.php" ?>
    <main>
        
            <?php
            echo '<div class="predmet-naslov">';
            require_once "config.php";
            $id = $_GET['id'];
            $sql = "SELECT * FROM predmeti WHERE id_predmet = $id";
            if($result = mysqli_query($link, $sql)){
                if(mysqli_num_rows($result) > 0){
                    $row = mysqli_fetch_array($result);            
                    echo '<h1>'.$row['kratica'].'</h1>'.'<br/>'.'<h2>'. $row['ime_predmeta'].'</h2>';
                    mysqli_free_result($result);
                } else{
                    echo '<div class="alert alert-danger"><em>Ni še nalog.</em></div>';
                }
            } else{
                echo "Oops! Something went wrong. Please try again later.";
            }
            
            echo '</div>';
        
    
        $status = $_SESSION['status'];
        if($status === 'u'){
            echo '<a class="neVemVec" href="novaNaloga.php?idpred=' . $id . '">Dodaj nalogo</a>';
        }
        ?>
        <?php
        require_once "config.php";
        $id = $_GET['id'];
        $sql = "SELECT * FROM naloge WHERE id_predmet = $id";
        if($result = mysqli_query($link, $sql)){
            if(mysqli_num_rows($result) > 0){
                $stevilka=1;
                    while($row = mysqli_fetch_array($result)){              
                            echo '<div class="naloga">';
                            echo '<div class="a"><div class="stevilka">'.$stevilka.'</div><a href="nalogaInfo.php?idnalog='.$row['id_naloge'] . '&idpred='.$id.' ">' . $row['naziv'] .'</a>
                            </div>';
                            echo '</div>';
                            $stevilka++;
                    }
                mysqli_free_result($result);
            } else{
                echo '<div class="alert alert-danger"><em>Ni še nalog.</em></div>';
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        // echo '<a href="novaNaloga.php?idpred='. $id .'">Dodaj nalogo(samo ucitelji)</a>';
        ?>
    </main>
</body>
</html>