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

$_SESSION["modulo"] = "MODULO11";  
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
'../../grupos/grupo11/1.mp4',
'../../grupos/grupo11/2.mp4',
'../../grupos/grupo11/3.mp4',
'../../grupos/grupo11/4.mp4',
'../../grupos/grupo11/5.mp4',
'../../grupos/grupo11/6.mp4',
'../../grupos/grupo11/7.mp4',
'../../grupos/grupo11/8.mp4',
'../../grupos/grupo11/9.mp4',
'../../grupos/grupo11/10.mp4',
'../../grupos/grupo11/11.mp4',
'../../grupos/grupo11/12.mp4',
'../../grupos/grupo11/13.mp4',
'../../grupos/grupo11/14.mp4',
'../../grupos/grupo11/15.mp4',
'../../grupos/grupo11/16.mp4',
'../../grupos/grupo11/17.mp4',
'../../grupos/grupo11/18.mp4',
'../../grupos/grupo11/19.mp4',
'../../grupos/grupo11/20.mp4',
'../../grupos/grupo11/21.mp4',
'../../grupos/grupo11/22.mp4',
'../../grupos/grupo11/23.mp4',
'../../grupos/grupo11/24.mp4',
'../../grupos/grupo11/25.mp4',
'../../grupos/grupo11/26.mp4',
'../../grupos/grupo11/27.mp4',
'../../grupos/grupo11/28.mp4',
'../../grupos/grupo11/29.mp4',
'../../grupos/grupo11/30.mp4',
'../../grupos/grupo11/31.mp4',
'../../grupos/grupo11/32.mp4',
'../../grupos/grupo11/33.mp4',
'../../grupos/grupo11/34.mp4',
'../../grupos/grupo11/35.mp4',
'../../grupos/grupo11/36.mp4',
'../../grupos/grupo11/37.mp4',
'../../grupos/grupo11/38.mp4',
'../../grupos/grupo11/39.mp4',
'../../grupos/grupo11/40.mp4',
'../../grupos/grupo11/41.mp4',
'../../grupos/grupo11/42.mp4',
'../../grupos/grupo11/43.mp4',
'../../grupos/grupo11/44.mp4',
'../../grupos/grupo11/45.mp4',
'../../grupos/grupo11/46.mp4',
'../../grupos/grupo11/47.mp4',
'../../grupos/grupo11/48.mp4',
'../../grupos/grupo11/49.mp4',
'../../grupos/grupo11/50.mp4',
'../../grupos/grupo11/51.mp4',
'../../grupos/grupo11/52.mp4',
'../../grupos/grupo11/53.mp4',
'../../grupos/grupo11/54.mp4',
'../../grupos/grupo11/55.mp4',
'../../grupos/grupo11/56.mp4',
'../../grupos/grupo11/57.mp4',
'../../grupos/grupo11/58.mp4',
'../../grupos/grupo11/59.mp4',
'../../grupos/grupo11/60.mp4',
'../../grupos/grupo11/61.mp4',
'../../grupos/grupo11/62.mp4',
'../../grupos/grupo11/63.mp4',
'../../grupos/grupo11/64.mp4',
'../../grupos/grupo11/65.mp4',
'../../grupos/grupo11/66.mp4',
'../../grupos/grupo11/67.mp4',
'../../grupos/grupo11/68.mp4',
'../../grupos/grupo11/69.mp4',
'../../grupos/grupo11/70.mp4',
'../../grupos/grupo11/71.mp4',
'../../grupos/grupo11/72.mp4',
'../../grupos/grupo11/73.mp4',
'../../grupos/grupo11/74.mp4',
'../../grupos/grupo11/75.mp4',
'../../grupos/grupo11/76.mp4',
'../../grupos/grupo11/77.mp4',
'../../grupos/grupo11/78.mp4',
'../../grupos/grupo11/79.mp4',
'../../grupos/grupo11/80.mp4',
'../../grupos/grupo11/81.mp4',
'../../grupos/grupo11/82.mp4',
'../../grupos/grupo11/83.mp4',
'../../grupos/grupo11/84.mp4',
'../../grupos/grupo11/85.mp4',
'../../grupos/grupo11/86.mp4',
'../../grupos/grupo11/87.mp4',
'../../grupos/grupo11/88.mp4',
'../../grupos/grupo11/89.mp4',
'../../grupos/grupo11/90.mp4',
'../../grupos/grupo11/91.mp4',
'../../grupos/grupo11/92.mp4',
'../../grupos/grupo11/93.mp4',
'../../grupos/grupo11/94.mp4',
'../../grupos/grupo11/95.mp4',
'../../grupos/grupo11/96.mp4',
'../../grupos/grupo11/97.mp4',
'../../grupos/grupo11/98.mp4',
'../../grupos/grupo11/99.mp4',
'../../grupos/grupo11/100.mp4',
'../../grupos/grupo11/101.mp4',
'../../grupos/grupo11/102.mp4',
'../../grupos/grupo11/103.mp4',
'../../grupos/grupo11/104.mp4',
'../../grupos/grupo11/105.mp4',
'../../grupos/grupo11/106.mp4',
'../../grupos/grupo11/107.mp4',
'../../grupos/grupo11/108.mp4',
'../../grupos/grupo11/109.mp4',
'../../grupos/grupo11/110.mp4',
'../../grupos/grupo11/111.mp4',
'../../grupos/grupo11/112.mp4',
'../../grupos/grupo11/113.mp4',
'../../grupos/grupo11/114.mp4',
'../../grupos/grupo11/115.mp4',
'../../grupos/grupo11/116.mp4',
];

var legends = [
'../legendas/grupo11/1.vtt',
'../legendas/grupo11/2.vtt',
'../legendas/grupo11/3.vtt',
'../legendas/grupo11/4.vtt',
'../legendas/grupo11/5.vtt',
'../legendas/grupo11/6.vtt',
'../legendas/grupo11/7.vtt',
'../legendas/grupo11/8.vtt',
'../legendas/grupo11/9.vtt',
'../legendas/grupo11/10.vtt',
'../legendas/grupo11/11.vtt',
'../legendas/grupo11/12.vtt',
'../legendas/grupo11/13.vtt',
'../legendas/grupo11/14.vtt',
'../legendas/grupo11/15.vtt',
'../legendas/grupo11/16.vtt',
'../legendas/grupo11/17.vtt',
'../legendas/grupo11/18.vtt',
'../legendas/grupo11/19.vtt',
'../legendas/grupo11/20.vtt',
'../legendas/grupo11/21.vtt',
'../legendas/grupo11/22.vtt',
'../legendas/grupo11/23.vtt',
'../legendas/grupo11/24.vtt',
'../legendas/grupo11/25.vtt',
'../legendas/grupo11/26.vtt',
'../legendas/grupo11/27.vtt',
'../legendas/grupo11/28.vtt',
'../legendas/grupo11/29.vtt',
'../legendas/grupo11/30.vtt',
'../legendas/grupo11/31.vtt',
'../legendas/grupo11/32.vtt',
'../legendas/grupo11/33.vtt',
'../legendas/grupo11/34.vtt',
'../legendas/grupo11/35.vtt',
'../legendas/grupo11/36.vtt',
'../legendas/grupo11/37.vtt',
'../legendas/grupo11/38.vtt',
'../legendas/grupo11/39.vtt',
'../legendas/grupo11/40.vtt',
'../legendas/grupo11/41.vtt',
'../legendas/grupo11/42.vtt',
'../legendas/grupo11/43.vtt',
'../legendas/grupo11/44.vtt',
'../legendas/grupo11/45.vtt',
'../legendas/grupo11/46.vtt',
'../legendas/grupo11/47.vtt',
'../legendas/grupo11/48.vtt',
'../legendas/grupo11/49.vtt',
'../legendas/grupo11/50.vtt',
'../legendas/grupo11/51.vtt',
'../legendas/grupo11/52.vtt',
'../legendas/grupo11/53.vtt',
'../legendas/grupo11/54.vtt',
'../legendas/grupo11/55.vtt',
'../legendas/grupo11/56.vtt',
'../legendas/grupo11/57.vtt',
'../legendas/grupo11/58.vtt',
'../legendas/grupo11/59.vtt',
'../legendas/grupo11/60.vtt',
'../legendas/grupo11/61.vtt',
'../legendas/grupo11/62.vtt',
'../legendas/grupo11/63.vtt',
'../legendas/grupo11/64.vtt',
'../legendas/grupo11/65.vtt',
'../legendas/grupo11/66.vtt',
'../legendas/grupo11/67.vtt',
'../legendas/grupo11/68.vtt',
'../legendas/grupo11/69.vtt',
'../legendas/grupo11/70.vtt',
'../legendas/grupo11/71.vtt',
'../legendas/grupo11/72.vtt',
'../legendas/grupo11/73.vtt',
'../legendas/grupo11/74.vtt',
'../legendas/grupo11/75.vtt',
'../legendas/grupo11/76.vtt',
'../legendas/grupo11/77.vtt',
'../legendas/grupo11/78.vtt',
'../legendas/grupo11/79.vtt',
'../legendas/grupo11/80.vtt',
'../legendas/grupo11/81.vtt',
'../legendas/grupo11/82.vtt',
'../legendas/grupo11/83.vtt',
'../legendas/grupo11/84.vtt',
'../legendas/grupo11/85.vtt',
'../legendas/grupo11/86.vtt',
'../legendas/grupo11/87.vtt',
'../legendas/grupo11/88.vtt',
'../legendas/grupo11/89.vtt',
'../legendas/grupo11/90.vtt',
'../legendas/grupo11/91.vtt',
'../legendas/grupo11/92.vtt',
'../legendas/grupo11/93.vtt',
'../legendas/grupo11/94.vtt',
'../legendas/grupo11/95.vtt',
'../legendas/grupo11/96.vtt',
'../legendas/grupo11/97.vtt',
'../legendas/grupo11/98.vtt',
'../legendas/grupo11/99.vtt',
'../legendas/grupo11/100.vtt',
'../legendas/grupo11/101.vtt',
'../legendas/grupo11/102.vtt',
'../legendas/grupo11/103.vtt',
'../legendas/grupo11/104.vtt',
'../legendas/grupo11/105.vtt',
'../legendas/grupo11/106.vtt',
'../legendas/grupo11/107.vtt',
'../legendas/grupo11/108.vtt',
'../legendas/grupo11/109.vtt',
'../legendas/grupo11/110.vtt',
'../legendas/grupo11/111.vtt',
'../legendas/grupo11/112.vtt',
'../legendas/grupo11/113.vtt',
'../legendas/grupo11/114.vtt',
'../legendas/grupo11/115.vtt',
'../legendas/grupo11/116.vtt',
];
var i = "<?php echo $msg;?>";
var atual = "<?php echo $modatual;?>";

if(atual != 11)
{
    window.location.href = "http://labvirtual.ileel.ufu.br/labileel/escolherModulos/mudarNovamenteModulo.php?id=11";
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
    window.location.href = "http://labvirtual.ileel.ufu.br/labileel/escolherModulos/mudarNovamenteModulo.php?id=11";//Mude aqui
  }
else{}
}
else{
i++;
document.getElementById("myvideo").src=vids[i];
document.getElementById("legenda").src=legends[i];
document.getElementById("myvideo").textTracks[0].mode = 'showing';
document.getElementById("teste").innerHTML="Vídeo N°"+(i+1);

//document.getElementById("myvideo").src=vids[i];
//document.getElementById("teste").innerHTML="Vídeo N°"+(i+1);

request = new XMLHttpRequest();
request.open("GET", "https://labvirtual.ileel.ufu.br/labileel/escolherModulos/ampliarVideo.php?id=11", true);

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
