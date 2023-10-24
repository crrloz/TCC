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
</style>
<body class="animsition" style="background-color: rgb(250, 238, 221);">
    <?php if(isset($_GET['loggedin']) && !isset($_SESSION['popupappeared'])){ ?>
        <!-- POP-UP: Cadastro realizado -->
        <aside class="section-overlay-welcome shadow1">
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
                    O Coletivo Artístico Humanos é um grupo de dança situado em Arraial do Cabo, dedicado a representar e celebrar a rica cultura afro-brasileira por meio da expressão corporal. Criado e dirigido por seu talentoso fundador, LUAN, o Coletivo tem como objetivo proporcionar um espaço inclusivo e acolhedor onde a arte negra possa florescer e se manifestar de forma poderosa. <br>
                    <span><a href="about.php" class="hov_underline">Descobrir mais</a></span>
                </div>
                <div class="col-md-6 m-t-0-40">
                    Nosso Coletivo acredita no poder transformador da dança como uma forma de expressão artística e como uma ferramenta para promover a consciência, o diálogo e a igualdade. Nossos artistas, habilmente treinados pelo próprio criador, trazem para o palco uma fusão de estilos contemporâneos e tradicionais, em coreografias que evocam histórias, emoções e a força da identidade negra.
                </div>
            </div>
        </div>
    </section>


    <!-- Divisor -->
    <section class="section-divider">
        <div class="item-divider p-t-150 p-b-150" style="background-image: url(images/dança2.jpg);">
            <div class="container">
                <div class="row t-center">
                    <div class="col-md-4">aaaa</div>
                    <div class="col-md-4">aaaaa</div>
                    <div class="col-md-4">aaaaaa</div>
                </div>
            </div>
        </div>
    </section>


    <!-- Notícias/Novidades -->
    <section class="section-news">
        <div class="container">
            <!-- Texto -->
            <div class="wrap-text-news p-t-30">
                <span class="f-glitten fs-60 color6">NOTÍCIAS</span>
            </div>

            <!-- Notícias -->
            <div class="row p-t-30 p-b-30">
                <?php
                $sql = "SELECT * FROM news ORDER BY newsId DESC LIMIT 5;";
                $result = mysqli_query($conn, $sql);
                $count = 1;

                if ($result && mysqli_num_rows($result) > 0) {
                    while ($row = mysqli_fetch_assoc($result)) {
                        $title = "FUNÇÃO INDISPONÍVEL";
                        // $row['newsName'];
                        $image = "images/manutencao.jpg";
                        // "data:image/jpeg;base64," . base64_encode($row['newsPic']);
                        $url = $row['newsUrl'];
                        
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
                        $count++;
                    }
                } ?>

            </div>
        </div>
    </section>


    <?php if(isset($_SESSION["useruid"])){ ?>
    <!-- Agenda -->
    <section class="section-schedule-home" style="overflow: hidden; background-color: #d39ff8;">
        <div class="row">
            <div class="col-lg-6 p-b-30 p-t-30">
                <div class="wrap-pic-schedule bo-rad-10 hov-img-zoom m-l-r-auto" style="max-width: 390px;">
                    <img src="https://static.vecteezy.com/ti/vetor-gratis/p3/10881861-padrao-sem-costura-em-maravilhosas-cores-violetas-e-roxas-aconchegantes-para-xadrez-tecido-textil-roupas-toalha-de-mesa-e-outras-coisas-imagemial-2-vetor.jpg" alt="IMG">
                </div>
            </div>

            <div class="col-lg-6 p-b-60 color6 p-r-70 p-l-50">
                <div class="wrap-welcome-title fs-90 p-t-70" style="line-height: 0.8;">
                    <span class="f-glitten">Bem-vindo, </span><?php echo $_SESSION['useruid'] ?>!
                </div>
                
                <div class="wrap-description-text p-t-30">
                    <span>Aproveite para conferir nossa página de agenda, repleta de eventos imperdíveis. Não perca essa oportunidade única de estar por dentro de tudo o que está acontecendo. Faça parte desse momento especial e descubra experiências incríveis. Acesse agora mesmo e garanta seu lugar.</span>
                </div>

                <div class="wrap-sched-button p-t-15">
                    <!-- Botão -->
                    <button onclick="location.href='schedule.php'" class="btn4 color6 bo-color-0">
                        Conferir
                    </button>
                </div>
            </div>
        </div>
    </section>
    

    <?php } else { ?>
    <!-- Cadastro -->
    <section class="section-signup p-t-60 bg2" style="overflow: hidden;">
        <div class="row">
            <div class="col-lg-6 p-b-30 p-l-100 p-t-100">
                <div class="wrap-text-signup" style="line-height: 0.8;">
                    <span class="t-center fs-60">
                        <b class="color7">MANTENHA-SE</b>
                    </span>

                    <h3 class="m-b-35 m-t-2">
                        <i class="f-glitten t-center fs-60 color7">atualizado</i>
                    </h3>
                </div>

                <form class="wrap-form-signup" method="get" action="signup.php">
                    <div class="row p-l-15 p-r-100">
                        <div class="wrap-input size12 m-t-3 m-b-23">
                            <input class="p-b-10 p-r-150 color7" type="text" name="email_home" placeholder="Digite seu e-mail...">
                            <!-- Botão -->
                            <button type="submit" name="submit_home" class="btn4 color7 bo-color-1">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 p-b-60">
                <img src="images/icons/fullstar.png" alt="IMG-STAR" class="full-star">
                <div class="wrap-pic-signup bo-rad-10 hov-img-zoom m-l-r-auto" style="max-width: 390px;">
                    <img src="images/rosto.jpg" alt="IMG">
                </div>
            </div>
        </div>
    </section>
    <?php }; ?>


    <!-- Footer -->
    <?php include_once 'footer.php' ?>
    <script>
        (function ($) {
            "use strict";

            /*[ESCONDER POPUP]
            ===========================================================*/
            var btnHidePopup = $('.btn-hide-popup');
            var btnClosePopup = $('btn-close-popup');
            var popup = $('.section-overlay-welcome');

            $(btnHidePopup).on('click', function(){
                $(popup).css('display','none');
            });

            $(btnClose).on('click', function(){
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
        })(jQuery);
    </script>
</body>
</html>