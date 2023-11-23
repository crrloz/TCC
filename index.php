<?php
    include_once 'head.php';
    include_once 'includes/dbh.inc.php';
    include_once 'includes/functions.inc.php';
?>
    <title>CAH | Coletivo Artístico Humanos</title>
</head>
<?php require_once "css/style.php" ?>
<style>
    @media (max-width: 767px) { .m-t-0-40 {margin-top: 40px;}}

    ::-webkit-input-placeholder {
        color: #9D6EBE;
    }

    .section-overlay-welcome {
        position: fixed;
        z-index: 1001;
        width: 100%;
        bottom: 0;
        background-color: rgb(250, 238, 221);
        text-align: center;
    }

    .content {
        padding: 0 20%;
    }

    .t-shadow_divisor {
        text-shadow: 4px 4px 13px rgba(0,0,0,0.6);
    }
</style>
<body class="animsition" style="background-color: rgb(250, 238, 221);">
    <?php if(isset($_GET['loggedin']) && !isset($_SESSION['popupappeared'])){ ?>
    <!-- POP-UP: Cadastro realizado -->
    <aside class="section-overlay section-overlay-welcome shadow1">
        <!-- Pop-up -->
        <div class="popup" style="display: block;">
            <!-- Botão Esconder Popup -->
            <button class="btn-hide-popup ti-close color7-hov trans-0-4"></button>

            <!-- Conteúdo -->
            <div class="popup-content">
                <div class="img-box m-b-15 m-t-15">
                    <img src="images/logo/favicon.png" alt="IMG-LOGO">
                </div>

                <div class="content">
                    <h3 class="f-glitten m-b-10">Bem vindo ao CAH!</h3>
                    <p>Olá, <?php echo $_SESSION['useruid'] ?>. Ao cadastrar e logar-se em nosso site, você desbloqueia funcionabilidades de compra de ingresso e mensagem. Descubra nosso coletivo!</p>
                    <button class="btn-close-popup btn3 m-b-40 m-t-20">Entendi</button>
                </div>
            </div>
        </div>
    </aside>
    <?php $_SESSION['popupappeared'] = 1; } ?>


    <!-- Header -->
    <?php include_once 'header.php' ?>


	<!-- Entrada -->
    <section class="section-entry bg2" style="background-image: url(images/dança.jpg); overflow: hidden;">
        <div class="row">
            <div class="col-lg-6">
            </div>

            <div class="col-lg-6">
                <div class="item-title-page">
                    <div class="wrap-content">
                        <span class="f-glitten">
                            COLETIVO
                        </span>

                        <h2 class="fs-100">
                            <i class="f-glitten">Artístico</i>
                        </h2>

                        <span class="f-glitten">
                            HUMANOS
                        </span>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Sobre -->
    <section class="section-about bg2-pattern">
        <div class="container">
            <div class="wrap-text-about pos-absolute p-t-30">
                <span><i class="f-glitten fs-60 color6">Quem </i></span>
                <span class="f-glitten fs-60 color6">SOMOS?</span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    O Coletivo Artístico Humanos é um grupo de dança situado em Arraial do Cabo, dedicado a representar e celebrar a rica cultura afro-brasileira por meio da expressão corporal. Criado e dirigido por seu talentoso fundador, LUAN, o Coletivo tem como objetivo proporcionar um espaço inclusivo e acolhedor onde a arte negra possa florescer e se manifestar de forma poderosa.
                </div>
                <div class="col-md-6 m-t-0-40">
                    Nosso Coletivo acredita no poder transformador da dança como uma forma de expressão artística e como uma ferramenta para promover a consciência, o diálogo e a igualdade. Nossos artistas, habilmente treinados pelo próprio criador, trazem para o palco uma fusão de estilos contemporâneos e tradicionais, em coreografias que evocam histórias, emoções e a força da identidade negra.
                </div>
                <span><a href="about.php" class="hov_underline m-l-15">Descobrir mais</a></span>
            </div>
        </div>
    </section>


    <!-- Divisor -->
    <section class="section-divider">
        <div class="item-divider p-t-100 p-b-100" style="background-image: url(images/dança2.jpg);">
            <div class="container">
                <div class="row t-center">
                    <?php
                    $sql = "SELECT elementsNumber FROM site_element WHERE elementsName = 'ja_assistiram';";
                    $result = mysqli_query($conn, $sql);

                    if ($result) {
                        $row = mysqli_fetch_assoc($result);
                        $watched = $row['elementsNumber'];
                    } else {
                        $watched = "Erro na consulta SQL";
                    }
                    ?>
                    <div class="col-md-6 f-glitten fs-50 color0 t-shadow_divisor flex-c-m">Mais de <span class="count-number f-glitten p-l-10 p-r-10"><?php echo $watched;?></span> presenças</div>
                    <div class="col-md-6 f-glitten fs-45 color0 t-shadow_divisor" id="countdown"></div>
                </div>
            </div>
        </div>
    </section>


    <!-- Notícias/Novidades -->
    <section class="section-news">
        <div class="container">
            <!-- Texto -->
            <div class="wrap-text-news p-t-30">
                <span class="f-glitten fs-60 color6">NOVIDADES</span>
            </div>

            <!-- Novidades -->
            <div class="row p-b-60">
                <?php
                $sql = "SELECT * FROM news ORDER BY newsId DESC LIMIT 5;";
                $result = mysqli_query($conn, $sql);
                $count = 1;

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = $row['newsName'];
                        $image = "data:image/jpeg;base64," . base64_encode($row['newsPic']);
                        $url = $row['newsUrl'];

                        if(mysqli_num_rows($result) == 1){ ?>
                            <div class="col-md-12 p-t-250 sizefull" style="background-image: url(<?php echo $image ?>);">
                                <a href="<?php echo $url?>" target="_blank"><?php echo $title ?></a>
                            </div>
                        <?php } else if(mysqli_num_rows($result) == 2){ ?>
                            <div class="col-md-6 p-t-250 sizefull" style="background-image: url(<?php echo $image ?>);">
                                <a href="<?php echo $url?>" target="_blank"><?php echo $title ?></a>
                            </div>
                        <?php } else if(mysqli_num_rows($result) == 3){
                            if($count == 1){ ?>
                                <div class="col-md-6 p-t-250 sizefull" style="background-image: url(<?php echo $image ?>);">
                                    <a href="<?php echo $url?>" target="_blank"><?php echo $title ?></a>
                                </div>
                            <?php } else if($count == 2){ ?>
                                <div class="col-md-6">
                                        <div class="col-md-6 p-t-125 sizefull" style="padding-right: 0; padding-left: 0; background-image: url(<?php echo $image ?>);">
                                            <a href="<?php echo $url?>" target="_blank"><?php echo $title ?></a>
                                        </div>
                        <?php } else if($count == 3){ ?>
                                        <div class="col-md-6 p-t-125 sizefull" style="width: 100%;padding-right: 0; padding-left: 0; background-image: url(<?php echo $image ?>);">
                                            <a href="<?php echo $url?>" target="_blank"><?php echo $title ?></a>
                                        </div>
                                </div>
                        <?php }
                        } else if(mysqli_num_rows($result) == 4){

                        } else if(mysqli_num_rows($result) == 5){
                            if($count == 1){ ?>
                                <div class="col-md-6 p-t-250 sizefull" style="background-image: url(<?php echo $image ?>);">
                                    <a href="<?php echo $url?>" target="_blank"><?php echo $title ?></a>
                                </div>
                            <?php } else if($count == 2){ ?>
                                <div class="col-md-6">
                                    <div class="row">
                                        <div class="col-md-6 p-t-125 sizefull" style="background-image: url(<?php echo $image ?>);">
                                            <a href="<?php echo $url?>" target="_blank"><?php echo $title ?></a>
                                        </div>
                            <?php } else if($count == 3){ ?>
                                        <div class="col-md-6 p-t-125 sizefull" style="background-image: url(<?php echo $image ?>);">
                                            <a href="<?php echo $url?>" target="_blank"><?php echo $title ?></a>
                                        </div>
                                    </div>
                            <?php } else if($count == 4){ ?>
                                    <div class="row">
                                        <div class="col-md-6 p-t-125 sizefull" style="background-image: url(<?php echo $image ?>);">
                                        <a href="<?php echo $url?>" target="_blank"><?php echo $title ?></a>
                                        </div>
                            <?php } else if($count == 5){ ?>
                                        <div class="col-md-6 p-t-125 sizefull" style="background-image: url(<?php echo $image ?>);">
                                            <a href="<?php echo $url?>" target="_blank"><?php echo $title ?></a>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } $count++;
                    }
                } 
                
                if(isset($_SESSION['isadmin'])){ ?>
                <button class="btn4 bo-color-2 m-t-20">
                    <a class="color9" href="news.php">CADASTRAR &rarr;</a>
                </button>
                <?php } ?>
            </div>
        </div>
    </section>


    <?php if(isset($_SESSION['userid'])){ ?>
    <!-- Agenda -->
    <section class="section-schedule-home bg4-pattern" style="overflow: hidden;">
        <div class="row">
            <div class="col-lg-6 p-b-30 p-t-30">
                <div onclick="location.href='schedule.php'" class="wrap-pic-schedule bo-rad-10 hov-img-zoom m-l-r-auto pointer" style="max-width: 390px;">
                    <img src="images/calendar.jpg" alt="IMG">
                </div>
            </div>

            <div class="col-lg-6 p-b-60 color0 p-r-70 p-l-50">
                <div class="wrap-welcome-title fs-90 p-t-70 color9" style="line-height: 0.8;">
                    <span class="f-glitten color0">Bem-vindo, </span><?php echo $_SESSION['useruid'] ?>!
                </div>
                
                <div class="wrap-description-text p-t-15">
                    <span>
                        Aproveite para conferir nossa página de agenda, repleta de eventos imperdíveis. <br><br>
                        
                        Não perca essa oportunidade e descubra experiências incríveis garantindo o seu lugar!
                    </span>
                </div>

                <div class="wrap-sched-button p-t-15">
                    <!-- Botão -->
                    <button onclick="location.href='schedule.php'" class="btn4 color9 bo-color-2">
                        Conferir
                    </button>
                </div>
            </div>
        </div>
    </section>
    

    <?php } else { ?> 
    <!-- Cadastro -->
    <section class="section-signup p-t-60 bg4-pattern" style="overflow: hidden;">
        <div class="row">
            <div class="col-lg-6 p-b-30 p-l-100 p-t-75">
                <div class="wrap-text-signup" style="line-height: 0.8;">
                    <span class="fs-90 f-glitten color0">
                        Mantenha-se
                    </span>

                    <h3 class="fs-80 color9 m-b-5 m-t-2">
                        atualizado
                    </h3>

                    <p class="fs-12 color0 m-b-25">
                        Preencha abaixo com o seu e-mail e crie um cadastro em nosso site!
                    </p>
                </div>

                <form class="wrap-form-signup" method="get" action="signup.php">
                    <div class="row p-l-15 p-r-100">
                        <div class="wrap-input size12 m-t-3 m-b-23">
                            <input class="p-b-10 p-r-150 color9" type="text" name="email" placeholder="Digite seu e-mail...">
                            <!-- Botão -->
                            <button type="submit" name="submit_home" class="btn4 color9 bo-color-2">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 p-b-60">
                <div class="wrap-pic-signup bo-rad-10 hov-img-zoom m-l-r-auto" style="max-width: 390px;">
                    <img src="images/rosto.jpg" alt="IMG">
                </div>
            </div>
        </div>
    </section>
    <?php } ?>


    <!-- Footer -->
    <?php include_once 'footer.php' ?>
    <script>
        (function ($) {
            "use strict";
            $.ajax({
                url: 'includes/dates.inc.php',
                dataType: 'json',
                success: function (data) {
                console.log(data); 

                var nextEvent = data.nextEvent;

                if (nextEvent.hasOwnProperty('proximaDataHoraEvento')) {
                    var proximaDataHoraEvento = new Date(nextEvent.proximaDataHoraEvento).getTime();
                    console.log(proximaDataHoraEvento);

                    function atualizarContagemRegressiva() {
                        var agora = new Date().getTime();
                        var tempoRestante = proximaDataHoraEvento - agora;

                        if (tempoRestante > 0) {
                            var dias = Math.floor(tempoRestante / (1000 * 60 * 60 * 24));
                            var horas = Math.floor((tempoRestante % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
                            var minutos = Math.floor((tempoRestante % (1000 * 60 * 60)) / (1000 * 60));
                            var segundos = Math.floor((tempoRestante % (1000 * 60)) / 1000);

                            document.getElementById("countdown").innerHTML = dias + "d " + horas + "h " + minutos + "m " + segundos + "s<br>para o próx. evento!";
                        } else {
                            document.getElementById("countdown").innerHTML = "...";
                        }
                    }

                    atualizarContagemRegressiva();
                    setInterval(atualizarContagemRegressiva, 1000);
                }
            }
        });

            /*[ESCONDER POPUP]
            ===========================================================*/
            var btnHidePopup = $('.btn-hide-popup');
            var btnClosePopup = $('.btn-close-popup');
            var popup = $('.section-overlay-welcome');

            $(btnHidePopup).on('click', function(){
                $(popup).css('display','none');
            });

            $(btnClosePopup).on('click', function(){
                $(popup).css('display','none');
            });

            /*[DIRECIONAR PARA PÁGINA]
            ===========================================================*/
            $(document).ready(function() {
                $('.btn-profile').on('click', function() {
                    var url = $(this).data('url');
                    window.location.href = url;
                });
            });


            /*[CONTAGEM]
            ===========================================================*/
            $(document).ready(function () {
                let startCount = 0;
                let endCount = <?php echo $watched; ?>;

                let animationDuration = 0.0000000006;

                animateCount('.count-number', startCount, endCount, animationDuration);

                function animateCount(element, start, end, duration) {
                    let range = end - start;
                    let current = start;
                    let increment = end > start ? 1 : -1;
                    let stepTime = Math.abs(Math.floor(duration / range));
                    let obj = $(element);

                    let timer = setInterval(function () {
                        current += increment;
                        obj.text(current);

                        if (current == end) {
                            clearInterval(timer);
                        }
                    }, stepTime);
                }
            });
        })(jQuery);
    </script>
</body>
</html>