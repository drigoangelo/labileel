<?php
// Conexão
require_once '../db/db_connect.php';

// Sessão
session_start();

//Atualiza o modAtual para 13, indicando que o usuário já terminou todos os módulos
$sql = "SELECT videoAtual FROM dataset.tb_usuario WHERE cpf='" . $_SESSION['cpf'] . "';";

if($resultado = mysqli_query($conn, $sql)){ //Verifica se a coneção deu certo
    $data = mysqli_fetch_array($resultado); //Salva a quantidade de videos
    $msg = $data[0];
}else{
    $msg = 0; //Adicione aqui uma mensagem de erro
}

$sql0 = "SELECT modAtual FROM dataset.tb_usuario WHERE cpf='" . $_SESSION['cpf'] . "';";

if($resultado0 = mysqli_query($conn, $sql0)){
    $atual = mysqli_fetch_array($resultado0);
} else {
    echo 'Erro ao conectar com o banco de dados! /n';
}

$modatual = $atual[0];

mysqli_close($conn);

$_SESSION["modulo"] = "MODULO1";
?>
<!doctype html>
<html lang="pt-br">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="WebRTC code samples">
    <meta name="viewport" content="width=device-width, user-scalable=yes, initial-scale=1, maximum-scale=1">
    <meta itemprop="description" content="Client-side WebRTC code samples">
    <meta itemprop="name" content="WebRTC code samples">
    <meta name="mobile-web-app-capable" content="yes">
    <meta id="theme-color" name="theme-color" content="#ffffff">

    <base target="_blank">

    <!-- Bootstrap CSS -->
    <link  rel="stylesheet" href="../css/bootstrap.css">
    <link  rel="stylesheet" href="../css/styles.css">
    <link  rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css">
    <!--<link rel="stylesheet" href="../css/css2.css">  As vezes vou ter que tirar esse -->
    <link rel="stylesheet" href="../css/main.css"> <!-- Esse eu tenho certeza que vai, pois é em relação ao vídeo -->
    <!-- <link href="//fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet" type="text/css">
    Essa aqui tinha mas eu nao sabia se era necessária ou não -->

    <title>LabVirtual - ILEEL</title>
    <script type="text/javascript">
     var vids = [
'../../grupos/grupo1/1.mp4',
'../../grupos/grupo1/2.mp4',
'../../grupos/grupo1/3.mp4',
'../../grupos/grupo1/4.mp4',
'../../grupos/grupo1/5.mp4',
'../../grupos/grupo1/6.mp4',
'../../grupos/grupo1/7.mp4',
'../../grupos/grupo1/8.mp4',
'../../grupos/grupo1/9.mp4',
'../../grupos/grupo1/10.mp4',
'../../grupos/grupo1/11.mp4',
'../../grupos/grupo1/12.mp4',
'../../grupos/grupo1/13.mp4',
'../../grupos/grupo1/14.mp4',
'../../grupos/grupo1/15.mp4',
'../../grupos/grupo1/16.mp4',
'../../grupos/grupo1/17.mp4',
'../../grupos/grupo1/18.mp4',
'../../grupos/grupo1/19.mp4',
'../../grupos/grupo1/20.mp4',
'../../grupos/grupo1/21.mp4',
'../../grupos/grupo1/22.mp4',
'../../grupos/grupo1/23.mp4',
'../../grupos/grupo1/24.mp4',
'../../grupos/grupo1/25.mp4',
'../../grupos/grupo1/26.mp4',
'../../grupos/grupo1/27.mp4',
'../../grupos/grupo1/28.mp4',
'../../grupos/grupo1/29.mp4',
'../../grupos/grupo1/30.mp4',
'../../grupos/grupo1/31.mp4',
'../../grupos/grupo1/32.mp4',
'../../grupos/grupo1/33.mp4',
'../../grupos/grupo1/34.mp4',
'../../grupos/grupo1/35.mp4',
'../../grupos/grupo1/36.mp4',
'../../grupos/grupo1/37.mp4',
'../../grupos/grupo1/38.mp4',
'../../grupos/grupo1/39.mp4',
'../../grupos/grupo1/40.mp4',
'../../grupos/grupo1/41.mp4',
'../../grupos/grupo1/42.mp4',
'../../grupos/grupo1/43.mp4',
'../../grupos/grupo1/44.mp4',
'../../grupos/grupo1/45.mp4',
'../../grupos/grupo1/46.mp4',
'../../grupos/grupo1/47.mp4',
'../../grupos/grupo1/48.mp4',
'../../grupos/grupo1/49.mp4',
'../../grupos/grupo1/50.mp4',
'../../grupos/grupo1/51.mp4',
'../../grupos/grupo1/52.mp4',
'../../grupos/grupo1/53.mp4',
'../../grupos/grupo1/54.mp4',
'../../grupos/grupo1/55.mp4',
'../../grupos/grupo1/56.mp4',
'../../grupos/grupo1/57.mp4',
'../../grupos/grupo1/58.mp4',
'../../grupos/grupo1/59.mp4',
'../../grupos/grupo1/60.mp4',
'../../grupos/grupo1/61.mp4',
'../../grupos/grupo1/62.mp4',
'../../grupos/grupo1/63.mp4',
'../../grupos/grupo1/64.mp4',
'../../grupos/grupo1/65.mp4',
'../../grupos/grupo1/66.mp4',
'../../grupos/grupo1/67.mp4',
'../../grupos/grupo1/68.mp4',
'../../grupos/grupo1/69.mp4',
'../../grupos/grupo1/70.mp4',
'../../grupos/grupo1/71.mp4',
'../../grupos/grupo1/72.mp4',
'../../grupos/grupo1/73.mp4',
'../../grupos/grupo1/74.mp4',
'../../grupos/grupo1/75.mp4',
'../../grupos/grupo1/76.mp4',
'../../grupos/grupo1/77.mp4',
'../../grupos/grupo1/78.mp4',
'../../grupos/grupo1/79.mp4',
'../../grupos/grupo1/80.mp4',
'../../grupos/grupo1/81.mp4',
'../../grupos/grupo1/82.mp4',
'../../grupos/grupo1/83.mp4',
'../../grupos/grupo1/84.mp4',
'../../grupos/grupo1/85.mp4',
'../../grupos/grupo1/86.mp4',
'../../grupos/grupo1/87.mp4',
'../../grupos/grupo1/88.mp4',
'../../grupos/grupo1/89.mp4',
'../../grupos/grupo1/90.mp4',
'../../grupos/grupo1/91.mp4',
'../../grupos/grupo1/92.mp4',
'../../grupos/grupo1/93.mp4',
'../../grupos/grupo1/94.mp4',
'../../grupos/grupo1/95.mp4',
'../../grupos/grupo1/96.mp4',
'../../grupos/grupo1/97.mp4',
'../../grupos/grupo1/98.mp4',
'../../grupos/grupo1/99.mp4',
'../../grupos/grupo1/100.mp4',
'../../grupos/grupo1/101.mp4',
'../../grupos/grupo1/102.mp4',
'../../grupos/grupo1/103.mp4',
'../../grupos/grupo1/104.mp4',
'../../grupos/grupo1/105.mp4',
'../../grupos/grupo1/106.mp4',
'../../grupos/grupo1/107.mp4',
'../../grupos/grupo1/108.mp4',
'../../grupos/grupo1/109.mp4',
'../../grupos/grupo1/110.mp4',
'../../grupos/grupo1/111.mp4',
'../../grupos/grupo1/112.mp4',
'../../grupos/grupo1/113.mp4',
'../../grupos/grupo1/114.mp4',
'../../grupos/grupo1/115.mp4',
'../../grupos/grupo1/116.mp4',
'../../grupos/grupo1/117.mp4',
'../../grupos/grupo1/118.mp4',
];

	var legends = [
'../legendas/grupo1/1.vtt',
'../legendas/grupo1/2.vtt',
'../legendas/grupo1/3.vtt',
'../legendas/grupo1/4.vtt',
'../legendas/grupo1/5.vtt',
'../legendas/grupo1/6.vtt',
'../legendas/grupo1/7.vtt',
'../legendas/grupo1/8.vtt',
'../legendas/grupo1/9.vtt',
'../legendas/grupo1/10.vtt',
'../legendas/grupo1/11.vtt',
'../legendas/grupo1/12.vtt',
'../legendas/grupo1/13.vtt',
'../legendas/grupo1/14.vtt',
'../legendas/grupo1/15.vtt',
'../legendas/grupo1/16.vtt',
'../legendas/grupo1/17.vtt',
'../legendas/grupo1/18.vtt',
'../legendas/grupo1/19.vtt',
'../legendas/grupo1/20.vtt',
'../legendas/grupo1/21.vtt',
'../legendas/grupo1/22.vtt',
'../legendas/grupo1/23.vtt',
'../legendas/grupo1/24.vtt',
'../legendas/grupo1/25.vtt',
'../legendas/grupo1/26.vtt',
'../legendas/grupo1/27.vtt',
'../legendas/grupo1/28.vtt',
'../legendas/grupo1/29.vtt',
'../legendas/grupo1/30.vtt',
'../legendas/grupo1/31.vtt',
'../legendas/grupo1/32.vtt',
'../legendas/grupo1/33.vtt',
'../legendas/grupo1/34.vtt',
'../legendas/grupo1/35.vtt',
'../legendas/grupo1/36.vtt',
'../legendas/grupo1/37.vtt',
'../legendas/grupo1/38.vtt',
'../legendas/grupo1/39.vtt',
'../legendas/grupo1/40.vtt',
'../legendas/grupo1/41.vtt',
'../legendas/grupo1/42.vtt',
'../legendas/grupo1/43.vtt',
'../legendas/grupo1/44.vtt',
'../legendas/grupo1/45.vtt',
'../legendas/grupo1/46.vtt',
'../legendas/grupo1/47.vtt',
'../legendas/grupo1/48.vtt',
'../legendas/grupo1/49.vtt',
'../legendas/grupo1/50.vtt',
'../legendas/grupo1/51.vtt',
'../legendas/grupo1/52.vtt',
'../legendas/grupo1/53.vtt',
'../legendas/grupo1/54.vtt',
'../legendas/grupo1/55.vtt',
'../legendas/grupo1/56.vtt',
'../legendas/grupo1/57.vtt',
'../legendas/grupo1/58.vtt',
'../legendas/grupo1/59.vtt',
'../legendas/grupo1/60.vtt',
'../legendas/grupo1/61.vtt',
'../legendas/grupo1/62.vtt',
'../legendas/grupo1/63.vtt',
'../legendas/grupo1/64.vtt',
'../legendas/grupo1/65.vtt',
'../legendas/grupo1/66.vtt',
'../legendas/grupo1/67.vtt',
'../legendas/grupo1/68.vtt',
'../legendas/grupo1/69.vtt',
'../legendas/grupo1/70.vtt',
'../legendas/grupo1/71.vtt',
'../legendas/grupo1/72.vtt',
'../legendas/grupo1/73.vtt',
'../legendas/grupo1/74.vtt',
'../legendas/grupo1/75.vtt',
'../legendas/grupo1/76.vtt',
'../legendas/grupo1/77.vtt',
'../legendas/grupo1/78.vtt',
'../legendas/grupo1/79.vtt',
'../legendas/grupo1/80.vtt',
'../legendas/grupo1/81.vtt',
'../legendas/grupo1/82.vtt',
'../legendas/grupo1/83.vtt',
'../legendas/grupo1/84.vtt',
'../legendas/grupo1/85.vtt',
'../legendas/grupo1/86.vtt',
'../legendas/grupo1/87.vtt',
'../legendas/grupo1/88.vtt',
'../legendas/grupo1/89.vtt',
'../legendas/grupo1/90.vtt',
'../legendas/grupo1/91.vtt',
'../legendas/grupo1/92.vtt',
'../legendas/grupo1/93.vtt',
'../legendas/grupo1/94.vtt',
'../legendas/grupo1/95.vtt',
'../legendas/grupo1/96.vtt',
'../legendas/grupo1/97.vtt',
'../legendas/grupo1/98.vtt',
'../legendas/grupo1/99.vtt',
'../legendas/grupo1/100.vtt',
'../legendas/grupo1/101.vtt',
'../legendas/grupo1/102.vtt',
'../legendas/grupo1/103.vtt',
'../legendas/grupo1/104.vtt',
'../legendas/grupo1/105.vtt',
'../legendas/grupo1/106.vtt',
'../legendas/grupo1/107.vtt',
'../legendas/grupo1/108.vtt',
'../legendas/grupo1/109.vtt',
'../legendas/grupo1/110.vtt',
'../legendas/grupo1/111.vtt',
'../legendas/grupo1/112.vtt',
'../legendas/grupo1/113.vtt',
'../legendas/grupo1/114.vtt',
'../legendas/grupo1/115.vtt',
'../legendas/grupo1/116.vtt',
'../legendas/grupo1/117.vtt',
'../legendas/grupo1/118.vtt',
];

var i = "<?php echo $msg;?>";
var atual = "<?php echo $modatual;?>";

if(atual != 1)
{
    window.location.href = "http://labvirtual.ileel.ufu.br/labileel/escolherModulos/mudarNovamenteModulo.php?id=1";
}

function sair() {
    window.location.href = "http://labvirtual.ileel.ufu.br/labileel/sair/sair.php/";
}

function next() {
    
if (i >= (vids.length-1)) {
    var r=confirm('Você concluiu todos os videos do módulo!');
if (r==true)
  {
    download();
    window.location.href = "http://labvirtual.ileel.ufu.br/labileel/escolherModulos/mudarNovamenteModulo.php?id=1";//Mude aqui
  }
else{}
}
else{
    download();
i++;
document.getElementById("myvideo").src=vids[i];
document.getElementById("legenda").src=legends[i];
document.getElementById("myvideo").textTracks[0].mode = 'showing';
//document.getElementById("teste").innerHTML="Vídeo N°"+(i+1);
//document.getElementById("teste").innerHTML="Legenda: "+ vids[i];
					stringExemplo = vids[i];
					//resultado = stringExemplo.substring(19, 40);
					resultado = stringExemplo.substring(stringExemplo.indexOf("(")+1,stringExemplo.indexOf(")"));
					document.getElementById("teste").innerHTML="Legenda: " + resultado;
					//str.indexOf(" ")

request = new XMLHttpRequest();
request.open("GET", "https://labvirtual.ileel.ufu.br/labileel/escolherModulos/ampliarVideo.php?id=1", true);

request.send(null);
}
}
    </script>

</head>

<body onload="chamadadevideo()">

<div class="container-fluid">

        <nav class="navbar navbar-expand-lg navbar-dark bg-primary" class="card-panel teal lighten-2">

                <a class="navbar-brand" href="login.html">LabVirtual - ILEEL(Parte1)&emsp;&emsp;&emsp;&emsp;  </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSite">
                    <span class="navbar-toggler-icon"></span>
                </button>


                <div class="collapse navbar-collapse" id="navbarSite">

                    <ul class="navbar-nav ml-auto">

                        <li class="nav-item">
                            <a class="nav-link">Contato</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="../sair/sair.php" target="_self">Sair</a>
                        </li>

                    </ul>

                </div>

            </nav>
<br>
<div class="container marcador2">
                    <div class="row">
                        <div class="col-md-4">

                        </div>
                        <div>
                        
                          <button id="download" class="btn btn-outline-primary" type="submit" disabled>
                            <script type="text/javascript">
                                document.getElementById("download").style.visibility = "hidden"; 
                            </script>
                          </button>
                          <button id="espaco" class="btn btn-primary" type="submit" disabled>
                            <script type="text/javascript">
                                document.getElementById("espaco").style.visibility = "hidden"; 
                            </script>
                          </button>
                          <button id="record"class="btn btn-primary" type="submit">Começar a gravar</button>
                          <button id="play"class="btn btn-primary" type="submit">Play</button>
                          <button onclick="next()"class="btn btn-primary" type="submit">Enviar</button>
                          <br />
                          <br />
                          <div id="teste">
                            <h4></h4>
                          </div>

                        </div>

                        </div>
                        <br>

     <div class="row marcador">
       <div class="col-md-3">

       </div>
       <div class="col-md-4">
        <video id="myvideo" width="600" height="200"  id="leftVideo" controls>
                                    <!-- NB CORS: https://bugzilla.mozilla.org/show_bug.cgi?id=1177793 -->
                                    <source src= "../grupos/grupo1/1(BEGINS).mp4" type="video/webm" />
                                    <source src= "../grupos/grupo1/1(BEGINS).mp4" type="video/mp4" />
                                    <track id="legenda" label="English" kind="subtitles" srclang="en" src="../legendas/grupo1/1.vtt" default>
                                    <script type="text/javascript">
                                    var j = i;
                                    j++;
                                        document.getElementById("myvideo").src=vids[i];
                                        document.getElementById("legenda").src=legends[i];
                                        //document.getElementById("teste").innerHTML="Vídeo N°" + (j);
					stringExemplo = vids[i];
					//resultado = stringExemplo.substring(19, 40);
					resultado = stringExemplo.substring(stringExemplo.indexOf("(")+1,stringExemplo.indexOf(")"));
					document.getElementById("teste").innerHTML="Legenda: " + resultado;
					//str.indexOf(" ")

                                        </script>
                                    <p>This browser does not support the video element.</p>
            </video>
       </div>
       <div class="col-md-4 marcador">

        </div>
     </div>


     <div class="row">
        <div class="col-md-3">

        </div>
        <div class="col-md-4 marcador">
            <video width="600" height="400" id="gum" autoplay muted ></video>
        </div>

     </div>
     <div class="row">
       <div class="col-md-3">

       </div>

       <div class="col-md-3 marcador">
       <video id="recorded" controls></video>
       </div>

   </div>

            <!--
            <div class="container">
                    <div class="row">
                                            <div class="card-body text-center" style="color:#2D1E2F">

                            <video id="leftVideo" controls muted>
                                 NB CORS: https://bugzilla.mozilla.org/show_bug.cgi?id=1177793
                                <source src="./chrome.webm" type="video/webm" />
                                <source src="./chrome.mp4" type="video/mp4" />
                                <p>This browser does not support the video element.</p>
                            </video>



                            <video id="gum" autoplay muted></video>
                        <video id="recorded" loop controls></video>

                        <div>
                          <button id="record"class="btn btn-primary" type="submit">Start Recording</button>
                          <button id="play"class="btn btn-primary" type="submit">Play</button>
                          <button id="download"class="btn btn-primary" type="submit">Enviar</button>
                        </div>



                    </div>
                </div>
                </div> -->
<!-- Optional JavaScript -->
<!-- jQuery first, then Popper.js, then Bootstrap JS -->
<script src="../js/jquery.min.js"></script>
<script src="../js/node_modules/popper.js/dist/popper.min.js"></script>
<script src="../js/bootstrap.min.js"></script>
<!-- <script src="../js/main.js"></script> -->
<script src="../js/main2.js"></script>
<script src="../js/auxiliar.js"></script>
<script src="https://webrtc.github.io/adapter/adapter-latest.j"></script>
                       <!-- <div>
                            <button id="record" disabled>Start Recording</button>
                            <button id="play" disabled>Play</button>
                            <button id="download" disabled>Enviar</button>
                        </div> </script>

    <script type="text/javascript">
    function chamadadevideo() {
        window.open('gravacao.html','video',' menubar=no, resizable=0,dependent=0,status=0,width=500,height=400,left=425,top=150')
    }
</script> -->

</div>
</body>
</html>
