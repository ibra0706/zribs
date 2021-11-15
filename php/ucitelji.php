<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Dashboard</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <style>
        .wrapper{
            width: 600px;
            margin: 0 auto;
        }
        table tr td:last-child{
            width: 120px;
        }
        .btn{
            background: #fa941d;
            border: 1px #fa941d solid;
        }
        .btn:hover,
        .btn:link,
        .btn:focus,
        .btn:active,
        .btn:focus-visible{
            background: #E34D10 !important;
            border: 1px solid #E34D10 !important;
            box-shadow: none;
        }
        .btn:focus{
            outline: 2px #fa941d solid !important;
            
        }
        .alert{
            background: #fa941daa;
        }
        .retard{
            border: none;
            background: #fa941d;
            font-family: Lato;
            font-size: 1.5rem;
            color: white;
            padding-left:3rem;
        }

        .retard:hover{
            background: #ffa31d;
        }
        i.fa-undo{
            font-size: 2rem;
        }
    </style>
    <script>
        $(document).ready(function(){
            $('[data-toggle="tooltip"]').tooltip();   
        });
    </script>
</head>
<body>
<?php include "header.php" ?>
    <button onclick="goBack()" class="retard">Nazaj</button>
    <div class="wrapper">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="mt-5 mb-3 clearfix">
                        <h2 class="pull-left">Učitelji</h2>
                        <a href="dodaj-ucitelj.php" class="btn btn-success pull-right"><i class="fa fa-plus"></i> Dodaj učitelja</a>
                    </div>
                    <?php
                    // Include config file
                    require_once "config.php";
                    
                    // Attempt select query execution
                    $sql = "SELECT * FROM ucitelji";
                    if($result = mysqli_query($link, $sql)){
                        if(mysqli_num_rows($result) > 0){
                            echo '<table class="table table-bordered table-striped">';
                                echo "<thead>";
                                    echo "<tr>";
                                        echo "<th>#</th>";
                                        echo "<th>Ime</th>";
                                        echo "<th>Priimek</th>";
                                        echo "<th>Mail</th>";
                                        echo "<th>Geslo</th>";
                                        echo "<th>Možnosti</th>";
                                    echo "</tr>";
                                echo "</thead>";
                                echo "<tbody>";
                                while($row = mysqli_fetch_array($result)){
                                    echo "<tr>";
                                        echo "<td>" . $row['id_ucitlja'] . "</td>";
                                        echo "<td>" . $row['ime'] . "</td>";
                                        echo "<td>" . $row['priimek'] . "</td>";
                                        echo "<td>" . $row['mail'] . "</td>";
                                        echo "<td>" . $row['geslo_vidno'] . "</td>";
                                        echo "<td>";
                                            echo '<a href="beri-ucitelj.php?id='. $row['id_ucitlja'] .'" class="mr-3" title="Poglej" data-toggle="tooltip"><span class="fa fa-eye"></span></a>';
                                            echo '<a href="posodobi-ucitelj.php?id='. $row['id_ucitlja'] .'" class="mr-3" title="Posodobi" data-toggle="tooltip"><span class="fa fa-pencil"></span></a>';
                                            echo '<a href="izbrisi-ucitelj.php?id='. $row['id_ucitlja'] .'" title="Izbriši" data-toggle="tooltip"><span class="fa fa-trash"></span></a>';
                                            echo '<a href="uciteljPredmetiDodaj.php?id='. $row['id_ucitlja'] .'" title="Dodaj predmete" data-toggle="tooltip"><span><i class="far fa-plus-square"></i></span></a>';
                                            echo '<a href="uciteljPredmetiOdstrani.php?id='. $row['id_ucitlja'] .'" title="Odstrani predmete" data-toggle="tooltip"><i class="far fa-minus-square"></i></a>';
                                        echo "</td>";
                                    echo "</tr>";
                                }
                                echo "</tbody>";                            
                            echo "</table>";
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
        </div>
    </div>
    <script>
function goBack() {
    window.history.back();
}
</script>
</body>
</html>