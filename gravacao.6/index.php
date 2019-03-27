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

$_SESSION["modulo"] = "MODULO6";  
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
'../../grupos/grupo6/1.mp4',
'../../grupos/grupo6/2.mp4',
'../../grupos/grupo6/3.mp4',
'../../grupos/grupo6/4.mp4',
'../../grupos/grupo6/5.mp4',
'../../grupos/grupo6/6.mp4',
'../../grupos/grupo6/7.mp4',
'../../grupos/grupo6/8.mp4',
'../../grupos/grupo6/9.mp4',
'../../grupos/grupo6/10.mp4',
'../../grupos/grupo6/11.mp4',
'../../grupos/grupo6/12.mp4',
'../../grupos/grupo6/13.mp4',
'../../grupos/grupo6/14.mp4',
'../../grupos/grupo6/15.mp4',
'../../grupos/grupo6/16.mp4',
'../../grupos/grupo6/17.mp4',
'../../grupos/grupo6/18.mp4',
'../../grupos/grupo6/19.mp4',
'../../grupos/grupo6/20.mp4',
'../../grupos/grupo6/21.mp4',
'../../grupos/grupo6/22.mp4',
'../../grupos/grupo6/23.mp4',
'../../grupos/grupo6/24.mp4',
'../../grupos/grupo6/25.mp4',
'../../grupos/grupo6/26.mp4',
'../../grupos/grupo6/27.mp4',
'../../grupos/grupo6/28.mp4',
'../../grupos/grupo6/29.mp4',
'../../grupos/grupo6/30.mp4',
'../../grupos/grupo6/31.mp4',
'../../grupos/grupo6/32.mp4',
'../../grupos/grupo6/33.mp4',
'../../grupos/grupo6/34.mp4',
'../../grupos/grupo6/35.mp4',
'../../grupos/grupo6/36.mp4',
'../../grupos/grupo6/37.mp4',
'../../grupos/grupo6/38.mp4',
'../../grupos/grupo6/39.mp4',
'../../grupos/grupo6/40.mp4',
'../../grupos/grupo6/41.mp4',
'../../grupos/grupo6/42.mp4',
'../../grupos/grupo6/43.mp4',
'../../grupos/grupo6/44.mp4',
'../../grupos/grupo6/45.mp4',
'../../grupos/grupo6/46.mp4',
'../../grupos/grupo6/47.mp4',
'../../grupos/grupo6/48.mp4',
'../../grupos/grupo6/49.mp4',
'../../grupos/grupo6/50.mp4',
'../../grupos/grupo6/51.mp4',
'../../grupos/grupo6/52.mp4',
'../../grupos/grupo6/53.mp4',
'../../grupos/grupo6/54.mp4',
'../../grupos/grupo6/55.mp4',
'../../grupos/grupo6/56.mp4',
'../../grupos/grupo6/57.mp4',
'../../grupos/grupo6/58.mp4',
'../../grupos/grupo6/59.mp4',
'../../grupos/grupo6/60.mp4',
'../../grupos/grupo6/61.mp4',
'../../grupos/grupo6/62.mp4',
'../../grupos/grupo6/63.mp4',
'../../grupos/grupo6/64.mp4',
'../../grupos/grupo6/65.mp4',
'../../grupos/grupo6/66.mp4',
'../../grupos/grupo6/67.mp4',
'../../grupos/grupo6/68.mp4',
'../../grupos/grupo6/69.mp4',
'../../grupos/grupo6/70.mp4',
'../../grupos/grupo6/71.mp4',
'../../grupos/grupo6/72.mp4',
'../../grupos/grupo6/73.mp4',
'../../grupos/grupo6/74.mp4',
'../../grupos/grupo6/75.mp4',
'../../grupos/grupo6/76.mp4',
'../../grupos/grupo6/77.mp4',
'../../grupos/grupo6/78.mp4',
'../../grupos/grupo6/79.mp4',
'../../grupos/grupo6/80.mp4',
'../../grupos/grupo6/81.mp4',
'../../grupos/grupo6/82.mp4',
'../../grupos/grupo6/83.mp4',
'../../grupos/grupo6/84.mp4',
'../../grupos/grupo6/85.mp4',
'../../grupos/grupo6/86.mp4',
'../../grupos/grupo6/87.mp4',
'../../grupos/grupo6/88.mp4',
'../../grupos/grupo6/89.mp4',
'../../grupos/grupo6/90.mp4',
'../../grupos/grupo6/91.mp4',
'../../grupos/grupo6/92.mp4',
'../../grupos/grupo6/93.mp4',
'../../grupos/grupo6/94.mp4',
'../../grupos/grupo6/95.mp4',
'../../grupos/grupo6/96.mp4',
'../../grupos/grupo6/97.mp4',
'../../grupos/grupo6/98.mp4',
'../../grupos/grupo6/99.mp4',
'../../grupos/grupo6/100.mp4',
'../../grupos/grupo6/101.mp4',
'../../grupos/grupo6/102.mp4',
'../../grupos/grupo6/103.mp4',
'../../grupos/grupo6/104.mp4',
'../../grupos/grupo6/105.mp4',
'../../grupos/grupo6/106.mp4',
'../../grupos/grupo6/107.mp4',
'../../grupos/grupo6/108.mp4',
'../../grupos/grupo6/109.mp4',
'../../grupos/grupo6/110.mp4',
'../../grupos/grupo6/111.mp4',
'../../grupos/grupo6/112.mp4',
'../../grupos/grupo6/113.mp4',
'../../grupos/grupo6/114.mp4',
'../../grupos/grupo6/115.mp4',
'../../grupos/grupo6/116.mp4',
'../../grupos/grupo6/117.mp4',
'../../grupos/grupo6/118.mp4',

];
    var legends = [
'../legendas/grupo6/1.vtt',
'../legendas/grupo6/2.vtt',
'../legendas/grupo6/3.vtt',
'../legendas/grupo6/4.vtt',
'../legendas/grupo6/5.vtt',
'../legendas/grupo6/6.vtt',
'../legendas/grupo6/7.vtt',
'../legendas/grupo6/8.vtt',
'../legendas/grupo6/9.vtt',
'../legendas/grupo6/10.vtt',
'../legendas/grupo6/11.vtt',
'../legendas/grupo6/12.vtt',
'../legendas/grupo6/13.vtt',
'../legendas/grupo6/14.vtt',
'../legendas/grupo6/15.vtt',
'../legendas/grupo6/16.vtt',
'../legendas/grupo6/17.vtt',
'../legendas/grupo6/18.vtt',
'../legendas/grupo6/19.vtt',
'../legendas/grupo6/20.vtt',
'../legendas/grupo6/21.vtt',
'../legendas/grupo6/22.vtt',
'../legendas/grupo6/23.vtt',
'../legendas/grupo6/24.vtt',
'../legendas/grupo6/25.vtt',
'../legendas/grupo6/26.vtt',
'../legendas/grupo6/27.vtt',
'../legendas/grupo6/28.vtt',
'../legendas/grupo6/29.vtt',
'../legendas/grupo6/30.vtt',
'../legendas/grupo6/31.vtt',
'../legendas/grupo6/32.vtt',
'../legendas/grupo6/33.vtt',
'../legendas/grupo6/34.vtt',
'../legendas/grupo6/35.vtt',
'../legendas/grupo6/36.vtt',
'../legendas/grupo6/37.vtt',
'../legendas/grupo6/38.vtt',
'../legendas/grupo6/39.vtt',
'../legendas/grupo6/40.vtt',
'../legendas/grupo6/41.vtt',
'../legendas/grupo6/42.vtt',
'../legendas/grupo6/43.vtt',
'../legendas/grupo6/44.vtt',
'../legendas/grupo6/45.vtt',
'../legendas/grupo6/46.vtt',
'../legendas/grupo6/47.vtt',
'../legendas/grupo6/48.vtt',
'../legendas/grupo6/49.vtt',
'../legendas/grupo6/50.vtt',
'../legendas/grupo6/51.vtt',
'../legendas/grupo6/52.vtt',
'../legendas/grupo6/53.vtt',
'../legendas/grupo6/54.vtt',
'../legendas/grupo6/55.vtt',
'../legendas/grupo6/56.vtt',
'../legendas/grupo6/57.vtt',
'../legendas/grupo6/58.vtt',
'../legendas/grupo6/59.vtt',
'../legendas/grupo6/60.vtt',
'../legendas/grupo6/61.vtt',
'../legendas/grupo6/62.vtt',
'../legendas/grupo6/63.vtt',
'../legendas/grupo6/64.vtt',
'../legendas/grupo6/65.vtt',
'../legendas/grupo6/66.vtt',
'../legendas/grupo6/67.vtt',
'../legendas/grupo6/68.vtt',
'../legendas/grupo6/69.vtt',
'../legendas/grupo6/70.vtt',
'../legendas/grupo6/71.vtt',
'../legendas/grupo6/72.vtt',
'../legendas/grupo6/73.vtt',
'../legendas/grupo6/74.vtt',
'../legendas/grupo6/75.vtt',
'../legendas/grupo6/76.vtt',
'../legendas/grupo6/77.vtt',
'../legendas/grupo6/78.vtt',
'../legendas/grupo6/79.vtt',
'../legendas/grupo6/80.vtt',
'../legendas/grupo6/81.vtt',
'../legendas/grupo6/82.vtt',
'../legendas/grupo6/83.vtt',
'../legendas/grupo6/84.vtt',
'../legendas/grupo6/85.vtt',
'../legendas/grupo6/86.vtt',
'../legendas/grupo6/87.vtt',
'../legendas/grupo6/88.vtt',
'../legendas/grupo6/89.vtt',
'../legendas/grupo6/90.vtt',
'../legendas/grupo6/91.vtt',
'../legendas/grupo6/92.vtt',
'../legendas/grupo6/93.vtt',
'../legendas/grupo6/94.vtt',
'../legendas/grupo6/95.vtt',
'../legendas/grupo6/96.vtt',
'../legendas/grupo6/97.vtt',
'../legendas/grupo6/98.vtt',
'../legendas/grupo6/99.vtt',
'../legendas/grupo6/100.vtt',
'../legendas/grupo6/101.vtt',
'../legendas/grupo6/102.vtt',
'../legendas/grupo6/103.vtt',
'../legendas/grupo6/104.vtt',
'../legendas/grupo6/105.vtt',
'../legendas/grupo6/106.vtt',
'../legendas/grupo6/107.vtt',
'../legendas/grupo6/108.vtt',
'../legendas/grupo6/109.vtt',
'../legendas/grupo6/110.vtt',
'../legendas/grupo6/111.vtt',
'../legendas/grupo6/112.vtt',
'../legendas/grupo6/113.vtt',
'../legendas/grupo6/114.vtt',
'../legendas/grupo6/115.vtt',
'../legendas/grupo6/116.vtt',
'../legendas/grupo6/117.vtt',
'../legendas/grupo6/118.vtt',
];


var i = "<?php echo $msg;?>";
var atual = "<?php echo $modatual;?>";

if(atual != 6)
{
    window.location.href = "http://labvirtual.ileel.ufu.br/labileel/escolherModulos/mudarNovamenteModulo.php?id=6";
}

function sair() {
    window.location.href = "http://labvirtual.ileel.ufu.br/labileel/sair/sair.php/";
}

function next() {
    download();
if (i >= (vids.length-1)) {
    var r=confirm('Você concluiu todos os videos do módulo!');
if (r==true)
  {
    window.location.href = "http://labvirtual.ileel.ufu.br/labileel/escolherModulos/mudarNovamenteModulo.php?id=6";//Mude aqui
  }
else{}
}
else{
i++;
document.getElementById("myvideo").src=vids[i];
document.getElementById("legenda").src=legends[i];
document.getElementById("myvideo").textTracks[0].mode = 'showing';
document.getElementById("teste").innerHTML="Vídeo N°"+(i+1);

request = new XMLHttpRequest();
request.open("GET", "https://labvirtual.ileel.ufu.br/labileel/escolherModulos/ampliarVideo.php?id=6", true);

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
       <div class="col-md-4">
        
       </div>
       <div class="col-md-4">
        <video id="myvideo" width="426" height="290"  id="leftVideo" controls>
                                    <!-- NB CORS: https://bugzilla.mozilla.org/show_bug.cgi?id=1177793 -->
                                    <source src= "../grupos/grupo10/1.mp4" type="video/webm" />
                                    <source src= "../grupos/grupo10/1.mp4" type="video/mp4" />
                                    <track id="legenda" label="English" kind="subtitles" srclang="en" src="../legendas/grupo10/1.vtt" default>                                    
				    <script type="text/javascript">
                                    var j = i;
                                    j++;
                                        document.getElementById("myvideo").src=vids[i];
					document.getElementById("legenda").src=legends[i];
                                        document.getElementById("teste").innerHTML="Vídeo N°" + (j);
                                        
                                        </script>
                                    <p>This browser does not support the video element.</p>
            </video>
       </div>
       <div class="col-md-4 marcador">
        
        </div>
     </div>

    
     <div class="row marcador">
<div class="col-md-4">
        
       </div>        
        <div class="col-md-4">
            <video width="426" height="240" id="gum" autoplay muted ></video>
        </div>
	<div class="col-md-1">
        
       </div>
	<div class="row">
      	<div class="col-md-1 ">
       <video width="255" height="144" id="recorded" controls></video>
       </div>
	</div>
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
