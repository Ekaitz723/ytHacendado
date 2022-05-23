<!DOCTYPE html>
<html>
<head>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
    <script>
        function setKeyFilename() {
            document.getElementById("key").value = document.getElementById("file").value.substring(document.getElementById("file").value.lastIndexOf('\\')+1);	
            /*if(document.getElementById("x-amz-meta-titulo").value == ""){
                document.getElementById("x-amz-meta-titulo").value = document.getElementById("key").value;
            }*/
        }

        function upload() {
            valores = <?php echo json_encode($_POST) ?>;
            //data:valores
            $.ajax({
                type:"POST",
                url:"https://ythacendado.s3.amazonaws.com/",
                data:{ "x-amz-meta-usuario":document.getElementById("x-amz-meta-usuario").value,
                    "x-amz-meta-titulo":document.getElementById("x-amz-meta-titulo").value,
                    "x-amz-meta-etiquetas":document.getElementById("x-amz-meta-etiquetas").value,
                    "X-Amz-Credential":document.getElementById("X-Amz-Credential").value,
                    "X-Amz-Date":document.getElementById("X-Amz-Date").value,
                    "Policy":document.getElementById("Policy").value,
                    "X-Amz-Signature":document.getElementById("X-Amz-Signature").value,
                    "key":document.getElementById("key").value,
                    "acl":document.getElementById("acl").value,
                    "X-Amz-Algorithm":document.getElementById("X-Amz-Algorithm").value,
                    "X-Amz-Security-Token":document.getElementById("X-Amz-Security-Token").value,
                    "file":document.getElementById("file").value
                }
            }).done(function() {
                alert( "Se subio" );
            })
            .fail(function() {
                alert( "No se subio" );
            })
        }
    </script>
</head>
<body onload="upload()">
    <?php
        session_start();
        include 'lambda_gw/xamz_lambda_gw.php';
        if(isset($_POST['key'])){
            echo "Video Subido";
            $lambda_func = "subirVideo";
            $payload='{"username":"'.$_GET['username'].'","etiquetas":"'.$_POST['x-amz-meta-etiquetas'].'","ruta":"https://ythacendado.s3.amazonaws.com/'.$_POST['key'].'"}';
            //$payload='{"username":"'.$_SESSION['usernameNombre'].'","etiquetas":"'.$_SESSION['x-amz-meta-etiquetas'].'","ruta":"https://ythacendado.s3.amazonaws.com/'.$_SESSION['key'].'"}';
            echo $payload;
            include 'lambda_gw/consulta_lambda.php';
        }
        else {
            echo "borrarAAA";
        }
    ?>
    <!-- action="https://ythacendado.s3.amazonaws.com/" -->
    <form action="" onsubmit="setKeyFilename()" method="post" enctype="multipart/form-data">
        <input type="hidden" name="x-amz-meta-usuario" value="<?php echo $_GET['username']; ?>" />
        <label >Titulo</label>
        <input type="text" name="x-amz-meta-titulo" value="" />
        <br><label >Etiquetas</label>
        <input type="text" name="x-amz-meta-etiquetas" value="" />

    <input type="hidden"  id="X-Amz-Credential" name="X-Amz-Credential" value="<?php echo $responseLambda['body']['xAmzCredential']; ?>" />
    <input type="hidden"  id="X-Amz-Date" name="X-Amz-Date" value="<?php echo $responseLambda['body']['amzDate']; ?>" />
    <input type="hidden"  id="Policy" name="Policy" value="<?php echo $responseLambda['body']['stringToSign']; ?>" />
    <input type="hidden"   id="X-Amz-Signature" name="X-Amz-Signature" value="<?php echo $responseLambda['body']['stringSigned']; ?>" />
    
        <input type="hidden" id="key" name="key" value="fichero.sln" /><br />
        <input type="hidden" name="acl" value="public-read" />
        <!-- <input type="hidden" name="success_action_redirect" value="login.php" />
        <input type="hidden" name="Content-Type" value="binary/octet-stream"> -->
        <input type="hidden"   name="X-Amz-Algorithm" value="AWS4-HMAC-SHA256" />
        <input type="hidden" id="X-Amz-Security-Token" name="X-Amz-Security-Token" value="<?php echo $responseLambda['body']['securityToken']; ?>"/>
    Select video to upload:
        <input type="file" name="file" id="file">
        <input type="submit" value="Upload Video" name="submit" >
    </form>

</body>
</html>

