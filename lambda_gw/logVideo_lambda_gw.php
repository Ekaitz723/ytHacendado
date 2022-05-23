<?php
    session_start();
    // $responseLambda <- dict
    // notese ligero odio al s3 y lambda por funcionar como el... lo del triggereo de lambda con s3. Prefiero hacerlo a mano la vd.
    $lambda_func = "subirVideo";
    $payload='{"username":"'.$_SESSION['usernameVideoUpload'].'","etiquetas":"'.$_POST['x-amz-meta-etiquetas'].'","ruta":"https://ythacendado.s3.amazonaws.com/'.$_POST['key'].'"}';

    include 'consulta_lambda.php';
    
    echo "pasa";
?>