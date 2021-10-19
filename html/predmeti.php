<?php 



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/predmeti.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Document</title>
</head>
<body>
    <div class="overlay">
        <div class="box">
            <div class="header">
                <h2>Seznam predmetov</h2>
            </div>
            <div class="predmeti">
                <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
                    <div class="predmet">
                        MUT
                        <div class="skatla">
                            <input type="radio" value="MUT" name="mut" id="mut1">
                            <label for="mut1"><i class="fas fa-check checked"></i></label>
                            <input type="radio" value="MUT" name="mut" id="mut2">
                            <label for="mut2"><i class="fas fa-times"></i></label>
                        </div>
                    </div>
                    <div class="predmet">
                        TČNJ 
                        <div class="skatla">
                            <input type="radio" value="MUT" name="tcnj" id="tcnj1">
                            <label for="tcnj1"><i class="fas fa-check checked"></i></label>
                            <input type="radio" value="MUT" name="tcnj" id="tcnj2">
                            <label for="tcnj2"><i class="fas fa-times"></i></label>
                        </div>
                    </div>
                    <div class="predmet">
                        ŠUM 
                        <div class="skatla">
                            <input type="radio" value="MUT" name="sum" id="sum1">
                            <label for="sum1"><i class="fas fa-check checked"></i></label>
                            <input type="radio" value="MUT" name="sum" id="sum2">
                            <label for="sum2"><i class="fas fa-times"></i></label>
                        </div>
                    </div>
                    <div class="predmet">
                        ČOK 
                        <div class="skatla">
                            <input type="radio" value="MUT" name="cok" id="cok1">
                            <label for="cok1"><i class="fas fa-check checked"></i></label>
                            <input type="radio" value="MUT" name="cok" id="cok2">
                            <label for="cok2"><i class="fas fa-times"></i></label>
                        </div>
                    </div>
                    <div class="predmet">
                        POF 
                        <div class="skatla">
                            <input type="radio" value="MUT" name="pof" id="pof1">
                            <label for="pof1"><i class="fas fa-check checked"></i></label>
                            <input type="radio" value="MUT" name="pof" id="pof2">
                            <label for="pof2"><i class="fas fa-times"></i></label>
                        </div>
                    </div>
                </form>
                
            </div>
        </div>
    </div>

    <div class="naslov">
        <h1>Zribs</h1>
    </div>

    <div class="gumba">
        <a href="./izbiraPredmetov.html">Izberi predmet</a>
        <a href="" class="uredi">Uredi predmete</a>
    </div>

    <script src="../js/main.js"></script>
</body>
</html>