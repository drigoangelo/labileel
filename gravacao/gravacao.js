$(function() {

    let next = function next() {
        upload();
        carregarVideo();
    };

    let carregarVideo = function carregarVideo() {
        $.ajax("../servico/next_video.php")
            .done(function(data) {
                $("#video_modelo")[0].src = data.caminho_video;
                $("#legenda")[0].src = data.caminho_legenda;
                $("#video_modelo")[0].textTracks[0].mode = 'showing';
                $("#lbl_video").innerHTML = "Vídeo N°" + (i + 1);
            })
            .fail(function(jqXHR, textStatus, errorThrown) {
                console.error("Error loading ajax", textStatus, errorThrown);
            });
    };

    (function init() {
        $("#btn_enviar").click(next);

        carregarVideo();

    })();
});

