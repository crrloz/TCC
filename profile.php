<?php
    include_once 'head.php';
    include_once 'includes/dbh.inc.php';
    include_once 'includes/functions.inc.php';

    if(!isset($_SESSION['userid'])){
        header("location: login.php?error=notlogged");
        exit();
    }

    $userColor = sscanf($_SESSION['usercolor'], "rgb(%d, %d, %d)");

    function darkenColor($rgb, $percentage) {
        $r = round($rgb[0] * (1 - $percentage/100));
        $g = round($rgb[1] * (1 - $percentage/100));
        $b = round($rgb[2] * (1 - $percentage/100));
        return [$r, $g, $b];
    }

    $darkenedColor = darkenColor($userColor, 20);
    $darkenedUserColor = sprintf("#%02x%02x%02x", $darkenedColor[0], $darkenedColor[1], $darkenedColor[2]);
?>
    <title>Seu Perfil | COLETIVO HUMANOS</title>
</head>
<?php require_once "css/style.php" ?>
<style>
    th, td, tr {
        border: 0 !important;
        outline: none;
    }
    .h-half {
        height: 50vh;
    }

    .user-photo {
        height: 300px;
        width: 300px;
    }

    .user-banner, .bg-user {
        background-color: <?php echo $darkenedUserColor;?>;
    }

    .color-user {
        color: <?php echo $darkenedUserColor;?>;
    }

    .bo-color-user {
        border-color: <?php echo $darkenedUserColor;?>;
    }
</style>
<body class="animsition" style="background-color: rgb(250, 238, 221);">
    <?php
    if(isset($_GET['changeimg'])){ ?>
        <!-- POP-UP: Mudar imagem -->
        <aside class="section-overlay">
            <div class="overlay" style="display: block;">
            </div>

            <!-- Pop-up -->
            <div class="popup-file" style="display: block;">
                <!-- Botão Esconder Popup -->
                <button class="btn-hide-popup ti-close color7-hov trans-0-4"></button>

                <!-- Conteúdo -->
                <div class="popup-file-content">
                    <form action="includes/change-image-request.inc.php" method="post" enctype="multipart/form-data">
                        <h3 class="m-b-10">Selecione um arquivo</h3><br>
                        <input type="file" name="imageFile"><br><br>

                        <input type="submit" value="Upload" name="submit_img" class="btn3">
                        <button type="submit" class="hov_underline m-l-10 tt-up">Cancelar</button>
                    </form>
                </div>
            </div>
        </aside>
    <?php } ?>


    <!-- Header -->
    <?php include_once 'header.php' ?>


    <!-- Seção Usuário -->
    <section class="section-user">
        <!-- Banner -->
        <div class="user-banner h-half"></div>

        <div class="container">
            <div class="row">
                <!-- Dados e Comandos -->
                <div class="col-md-4 col-lg-3">
                    <!-- Foto de Perfil -->
                    <?php $imageSrc = $_SESSION['imagesrc']?>

                    <div class="wrap-profile pos-relative">
                        <div class="wrap-cir-pic user-photo sizefull m-l-r-auto ab-c-m" style="background-image: url(<?php echo $imageSrc; ?>);"></div>
                        <button class="btn-edit" onclick="window.location.href = '?changeimg'"><i class="fa fa-edit symbol-btn-edit"></i></button>
                    </div>
                    
                    <!-- Comandos e Botões -->
                    <div class="wrap-user-commands m-t-180 t-center">
                        <?php echo "@".$_SESSION['useruid']." • <span class='tt-up'>".$_SESSION['username']."</span>"?>
                        
                        <form action="includes/delete.inc.php" method="post">
                            <input type="submit" value="DELETAR" name="delete_user" class="btn4 color-user bo-color-user m-t-15">
                        </form>
                    </div>
                </div>
                <div class="col-md-8 col-lg-9">
                    <!-- Compras do Usuário -->
                    <div class="wrap-purchases">
                        <div class="wrap-text-purchases p-t-30">
                            <div class="wrap-text-about p-t-30">
                                <span><i class="f-glitten fs-60 color-user">Suas </i></span>
                                <span class="f-glitten fs-60 color-user">COMPRAS</span>
                            </div>
                        </div>

                        <hr>

                        <div class="table-responsive">
                            <table class="table m-0">
                            <?php
                                $id = $_SESSION['userid'];
                                $purchases = showPurchases($conn, $id); ?>

                                <thead>
                                    <tr>
                                        <th scope="col">ID do Evento</th>
                                        <th scope="col">ID do User</th>
                                        <th scope="col">ID da Compra</th>
                                        <th scope="col">Quantidade</th>
                                        <th scope="col">Data</th>
                                    </tr>
                                </thead>

                                <tbody>
                                    <?php foreach ($purchases as $purchase): ?>
                                    <tr>
                                        <th scope="row"><?php echo $purchase['eventsId']; ?></th>
                                        <td><?php echo $purchase['usersId']; ?></td>
                                        <td><?php echo $purchase['eventsId']; ?></td>
                                        <td><?php echo $purchase['salesQnt']." ingressos"; ?></td>
                                        <td><?php echo $purchase['salesDate']; ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php include_once 'footer.php' ?>
    <script>
        (function ($) {
            "use strict";

            /*[MOSTRAR/ESCONDER POPUP]
            ===========================================================*/
            var btnHidePopup = $('.btn-hide-popup');
            var popup = $('.section-overlay');
            var overlay = $('.overlay');

            $(btnHidePopup).on('click', function(){
                $(popup).css('display','none');
                $(overlay).css('display','none');
            })

            $(overlay).on('click', function(){
                $(popup).css('display','none');
                $(overlay).css('display','none');
            })

            /*[DIRECIONAR PARA PÁGINA]
            ===========================================================*/
            $(document).ready(function() {
                $('.btn-profile').on('click', function() {
                    var url = $(this).data('url');
                    window.location.href = url;
                });

                $('.btn-cancel').on('click', function() {
                    var url = $(this).data('url');
                    window.location.href = url;
                });
            })
        })(jQuery);
    </script>
    <script>
        function darkenColor(color, percentage) {
            const r = Math.round(color[0] * (1 - percentage/100));
            const g = Math.round(color[1] * (1 - percentage/100));
            const b = Math.round(color[2] * (1 - percentage/100));
            return [r, g, b];
        }

		const colorThief = new ColorThief();
        const img = new Image();

        function updateBannerColor(color) {
            const userBanner = document.querySelector('.user-banner');
            userBanner.style.backgroundColor = color;
        }

        const userImage = "<?php echo $imageSrc; ?>";

        img.src = userImage;

        img.addEventListener('load', function() {
            const dominantColor = colorThief.getColor(img);
            const colorString = `rgb(${dominantColor[0]}, ${dominantColor[1]}, ${dominantColor[2]})`;
            const darkenedColor = darkenColor(dominantColor, 20);
            const darkenedColorString = `rgb(${darkenedColor[0]}, ${darkenedColor[1]}, ${darkenedColor[2]})`;

            updateBannerColor(darkenedColorString);

            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'includes/color.inc.php');
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
            xhr.send(`color=${colorString}`);
        });

        document.querySelector('form[action="includes/change-image-request.inc.php"]').addEventListener('submit', function() {
                const xhr = new XMLHttpRequest();
                xhr.open('POST', 'includes/color.inc.php');
                xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded');
                xhr.onload = function() {
                    if (xhr.status === 200) {
                        const response = JSON.parse(xhr.responseText);
                        if (response.success) {
                            updateBannerColor(response.color);
                        }
                    }
                };
                xhr.send();
            });
    </script>
</body>
</html>