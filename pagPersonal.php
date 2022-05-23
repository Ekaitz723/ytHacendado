<?php
        session_start();
?>
<!DOCTYPE html>
<html>
        <head>
                <title><?php echo $_SESSION['info']['username']; ?></title>
                <style>
                        body {
                                background-color:black;
                                color:whitesmoke;
                        }
                        h1 {
                                text-align: center;
                        }
                </style>
                <meta charset="utf-8">
                <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

                <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
        </head>
        <body>

                <h1><?php
                        echo $_SESSION['info']['username'];
                        /*foreach ($_SESSION['info'] as $info) {
                                echo "$info <br>";
                        }*/
                        //include 'goto.php';
                        
                        //echo $_SESSION['name'];
                        //echo $_REQUEST['name'];
                        //echo $_POST['name'];
                ?></h1>
                
                <form action="gestionVideos.php">
                        <button type="submit" class="btn btn-secondary">Buscar Videos</button>
                </form>
                <div class="container">
                        <div class="row">
                                <div class="col-sm">
                                        <iframe src="<?php echo 'uploadVideo.php?username='.$_SESSION['info']['username'] ?>" height="258" scrolling="yes" style="overflow:hidden; margin-top:-4px; margin-left:-4px; border:none;"></iframe>
                                </div>
                                <div class="col-sm">
                                        <iframe src="<?php echo 'gestionVideos.php?username='.$_SESSION['info']['username'] ?>" height="258" scrolling="yes" style="overflow:hidden; margin-top:-4px; margin-left:-4px; border:none;"></iframe>
                                </div>
                                <div class="col-sm">
                                        <iframe src="<?php echo 'borrarVideos.php?username='.$_SESSION['info']['username'] ?>" height="258" scrolling="yes" style="overflow:hidden; margin-top:-4px; margin-left:-4px; border:none;"></iframe>
                                </div>
                        </div>
                </div>
                

                <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
                <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
                <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        </body> 
</html>