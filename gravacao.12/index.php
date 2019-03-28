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

$_SESSION["modulo"] = "MODULO12";  
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
'../../grupos/grupo12/1.mp4',
'../../grupos/grupo12/2.mp4',
'../../grupos/grupo12/3.mp4',
'../../grupos/grupo12/4.mp4',
'../../grupos/grupo12/5.mp4',
'../../grupos/grupo12/6.mp4',
'../../grupos/grupo12/7.mp4',
'../../grupos/grupo12/8.mp4',
'../../grupos/grupo12/9.mp4',
'../../grupos/grupo12/10.mp4',
'../../grupos/grupo12/11.mp4',
'../../grupos/grupo12/12.mp4',
'../../grupos/grupo12/13.mp4',
'../../grupos/grupo12/14.mp4',
'../../grupos/grupo12/15.mp4',
'../../grupos/grupo12/16.mp4',
'../../grupos/grupo12/17.mp4',
'../../grupos/grupo12/18.mp4',
'../../grupos/grupo12/19.mp4',
'../../grupos/grupo12/20.mp4',
'../../grupos/grupo12/21.mp4',
'../../grupos/grupo12/22.mp4',
'../../grupos/grupo12/23.mp4',
'../../grupos/grupo12/24.mp4',
'../../grupos/grupo12/25.mp4',
'../../grupos/grupo12/26.mp4',
'../../grupos/grupo12/27.mp4',
'../../grupos/grupo12/28.mp4',
'../../grupos/grupo12/29.mp4',
'../../grupos/grupo12/30.mp4',
'../../grupos/grupo12/31.mp4',
'../../grupos/grupo12/32.mp4',
'../../grupos/grupo12/33.mp4',
'../../grupos/grupo12/34.mp4',
'../../grupos/grupo12/35.mp4',
'../../grupos/grupo12/36.mp4',
'../../grupos/grupo12/37.mp4',
'../../grupos/grupo12/38.mp4',
'../../grupos/grupo12/39.mp4',
'../../grupos/grupo12/40.mp4',
'../../grupos/grupo12/41.mp4',
'../../grupos/grupo12/42.mp4',
'../../grupos/grupo12/43.mp4',
'../../grupos/grupo12/44.mp4',
'../../grupos/grupo12/45.mp4',
'../../grupos/grupo12/46.mp4',
'../../grupos/grupo12/47.mp4',
'../../grupos/grupo12/48.mp4',
'../../grupos/grupo12/49.mp4',
'../../grupos/grupo12/50.mp4',
'../../grupos/grupo12/51.mp4',
'../../grupos/grupo12/52.mp4',
'../../grupos/grupo12/53.mp4',
'../../grupos/grupo12/54.mp4',
'../../grupos/grupo12/55.mp4',
'../../grupos/grupo12/56.mp4',
'../../grupos/grupo12/57.mp4',
'../../grupos/grupo12/58.mp4',
'../../grupos/grupo12/59.mp4',
'../../grupos/grupo12/60.mp4',
'../../grupos/grupo12/61.mp4',
'../../grupos/grupo12/62.mp4',
'../../grupos/grupo12/63.mp4',
'../../grupos/grupo12/64.mp4',
'../../grupos/grupo12/65.mp4',
'../../grupos/grupo12/66.mp4',
'../../grupos/grupo12/67.mp4',
'../../grupos/grupo12/68.mp4',
'../../grupos/grupo12/69.mp4',
'../../grupos/grupo12/70.mp4',
'../../grupos/grupo12/71.mp4',
'../../grupos/grupo12/72.mp4',
'../../grupos/grupo12/73.mp4',
'../../grupos/grupo12/74.mp4',
'../../grupos/grupo12/75.mp4',
'../../grupos/grupo12/76.mp4',
'../../grupos/grupo12/77.mp4',
'../../grupos/grupo12/78.mp4',
'../../grupos/grupo12/79.mp4',
'../../grupos/grupo12/80.mp4',
'../../grupos/grupo12/81.mp4',
'../../grupos/grupo12/82.mp4',
'../../grupos/grupo12/83.mp4',
'../../grupos/grupo12/84.mp4',
'../../grupos/grupo12/85.mp4',
'../../grupos/grupo12/86.mp4',
'../../grupos/grupo12/87.mp4',
'../../grupos/grupo12/88.mp4',
'../../grupos/grupo12/89.mp4',
'../../grupos/grupo12/90.mp4',
'../../grupos/grupo12/91.mp4',
'../../grupos/grupo12/92.mp4',
'../../grupos/grupo12/93.mp4',
'../../grupos/grupo12/94.mp4',
'../../grupos/grupo12/95.mp4',
'../../grupos/grupo12/96.mp4',
'../../grupos/grupo12/97.mp4',
'../../grupos/grupo12/98.mp4',
'../../grupos/grupo12/99.mp4',
'../../grupos/grupo12/100.mp4',
'../../grupos/grupo12/101.mp4',
'../../grupos/grupo12/102.mp4',
'../../grupos/grupo12/103.mp4',
'../../grupos/grupo12/104.mp4',
'../../grupos/grupo12/105.mp4',
'../../grupos/grupo12/106.mp4',
'../../grupos/grupo12/107.mp4',
'../../grupos/grupo12/108.mp4',
'../../grupos/grupo12/109.mp4',
'../../grupos/grupo12/110.mp4',
'../../grupos/grupo12/111.mp4',
'../../grupos/grupo12/112.mp4',
'../../grupos/grupo12/113.mp4',
'../../grupos/grupo12/114.mp4',
'../../grupos/grupo12/115.mp4',
'../../grupos/grupo12/116.mp4',
'../../grupos/grupo12/117.mp4',
'../../grupos/grupo12/118.mp4',
];

	var legends = [
'../legendas/grupo12/1.vtt',
'../legendas/grupo12/2.vtt',
'../legendas/grupo12/3.vtt',
'../legendas/grupo12/4.vtt',
'../legendas/grupo12/5.vtt',
'../legendas/grupo12/6.vtt',
'../legendas/grupo12/7.vtt',
'../legendas/grupo12/8.vtt',
'../legendas/grupo12/9.vtt',
'../legendas/grupo12/10.vtt',
'../legendas/grupo12/11.vtt',
'../legendas/grupo12/12.vtt',
'../legendas/grupo12/13.vtt',
'../legendas/grupo12/14.vtt',
'../legendas/grupo12/15.vtt',
'../legendas/grupo12/16.vtt',
'../legendas/grupo12/17.vtt',
'../legendas/grupo12/18.vtt',
'../legendas/grupo12/19.vtt',
'../legendas/grupo12/20.vtt',
'../legendas/grupo12/21.vtt',
'../legendas/grupo12/22.vtt',
'../legendas/grupo12/23.vtt',
'../legendas/grupo12/24.vtt',
'../legendas/grupo12/25.vtt',
'../legendas/grupo12/26.vtt',
'../legendas/grupo12/27.vtt',
'../legendas/grupo12/28.vtt',
'../legendas/grupo12/29.vtt',
'../legendas/grupo12/30.vtt',
'../legendas/grupo12/31.vtt',
'../legendas/grupo12/32.vtt',
'../legendas/grupo12/33.vtt',
'../legendas/grupo12/34.vtt',
'../legendas/grupo12/35.vtt',
'../legendas/grupo12/36.vtt',
'../legendas/grupo12/37.vtt',
'../legendas/grupo12/38.vtt',
'../legendas/grupo12/39.vtt',
'../legendas/grupo12/40.vtt',
'../legendas/grupo12/41.vtt',
'../legendas/grupo12/42.vtt',
'../legendas/grupo12/43.vtt',
'../legendas/grupo12/44.vtt',
'../legendas/grupo12/45.vtt',
'../legendas/grupo12/46.vtt',
'../legendas/grupo12/47.vtt',
'../legendas/grupo12/48.vtt',
'../legendas/grupo12/49.vtt',
'../legendas/grupo12/50.vtt',
'../legendas/grupo12/51.vtt',
'../legendas/grupo12/52.vtt',
'../legendas/grupo12/53.vtt',
'../legendas/grupo12/54.vtt',
'../legendas/grupo12/55.vtt',
'../legendas/grupo12/56.vtt',
'../legendas/grupo12/57.vtt',
'../legendas/grupo12/58.vtt',
'../legendas/grupo12/59.vtt',
'../legendas/grupo12/60.vtt',
'../legendas/grupo12/61.vtt',
'../legendas/grupo12/62.vtt',
'../legendas/grupo12/63.vtt',
'../legendas/grupo12/64.vtt',
'../legendas/grupo12/65.vtt',
'../legendas/grupo12/66.vtt',
'../legendas/grupo12/67.vtt',
'../legendas/grupo12/68.vtt',
'../legendas/grupo12/69.vtt',
'../legendas/grupo12/70.vtt',
'../legendas/grupo12/71.vtt',
'../legendas/grupo12/72.vtt',
'../legendas/grupo12/73.vtt',
'../legendas/grupo12/74.vtt',
'../legendas/grupo12/75.vtt',
'../legendas/grupo12/76.vtt',
'../legendas/grupo12/77.vtt',
'../legendas/grupo12/78.vtt',
'../legendas/grupo12/79.vtt',
'../legendas/grupo12/80.vtt',
'../legendas/grupo12/81.vtt',
'../legendas/grupo12/82.vtt',
'../legendas/grupo12/83.vtt',
'../legendas/grupo12/84.vtt',
'../legendas/grupo12/85.vtt',
'../legendas/grupo12/86.vtt',
'../legendas/grupo12/87.vtt',
'../legendas/grupo12/88.vtt',
'../legendas/grupo12/89.vtt',
'../legendas/grupo12/90.vtt',
'../legendas/grupo12/91.vtt',
'../legendas/grupo12/92.vtt',
'../legendas/grupo12/93.vtt',
'../legendas/grupo12/94.vtt',
'../legendas/grupo12/95.vtt',
'../legendas/grupo12/96.vtt',
'../legendas/grupo12/97.vtt',
'../legendas/grupo12/98.vtt',
'../legendas/grupo12/99.vtt',
'../legendas/grupo12/100.vtt',
'../legendas/grupo12/101.vtt',
'../legendas/grupo12/102.vtt',
'../legendas/grupo12/103.vtt',
'../legendas/grupo12/104.vtt',
'../legendas/grupo12/105.vtt',
'../legendas/grupo12/106.vtt',
'../legendas/grupo12/107.vtt',
'../legendas/grupo12/108.vtt',
'../legendas/grupo12/109.vtt',
'../legendas/grupo12/110.vtt',
'../legendas/grupo12/111.vtt',
'../legendas/grupo12/112.vtt',
'../legendas/grupo12/113.vtt',
'../legendas/grupo12/114.vtt',
'../legendas/grupo12/115.vtt',
'../legendas/grupo12/116.vtt',
'../legendas/grupo12/117.vtt',
'../legendas/grupo12/118.vtt',
];

var i = "<?php echo $msg;?>";
var atual = "<?php echo $modatual;?>";

if(atual != 12)
{
    window.location.href = "http://labvirtual.ileel.ufu.br/labileel/escolherModulos/mudarNovamenteModulo.php?id=12";
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
    window.location.href = "http://labvirtual.ileel.ufu.br/labileel/escolherModulos/mudarNovamenteModulo.php?id=12";//Mude aqui
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
request.open("GET", "https://labvirtual.ileel.ufu.br/labileel/escolherModulos/ampliarVideo.php?id=12", true);

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
            <div id="teste">
                <h4></h4>
            </div>
        </div>
    </div>

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
	<div class="row">
      	<div class="col-md-4">
            <div class="col-md-2"> 
                <video width="255" height="144" id="recorded" controls></video>
            </div>
            <div class="col-md-1">
                <div class="btn-group btn-group-justified">
                    <button id="play"class="btn btn-primary" type="submit">Checar Gravação</button>
                    <div class="col-md-1"></div>
                    <button onclick="next()"class="btn btn-primary" type="submit">Enviar</button>
                    <button id="download" class="btn btn-outline-primary" type="submit" disabled>
                        <script type="text/javascript">
                            document.getElementById("download").style.visibility = "hidden"; 
                        </script>
                    </button>
                </div>
            </div>
       </div>
	</div>
    <div class="row">
    </div>
        <div class="col-md-4">
        </div>
        <div class="col-md-2">
        </div>
        <div class="col-md-4">
            <button id="record"class="btn btn-primary" style="border-radius: 20px; width:40px; height:40px; background-color: red;" type="submit"></button>
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
