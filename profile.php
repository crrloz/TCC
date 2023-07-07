<?php
    include_once 'head.php';
    include_once 'includes/dbh.inc.php';
    include_once 'includes/functions.inc.php';

    if(!isset($_SESSION['userid'])){
        header("location: login.php?error=notlogged");
        exit();
    }
?>
    <title>Seu Perfil | COLETIVO HUMANOS</title>
</head>
<?php require_once "css/style.php" ?>
<style>
    .h-half {
        height: 50vh;
    }

    .user-photo > img {
        height: 300px;
        width: 300px;
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
        <div class="bg3-pattern h-half pos-relative">
            <button class="btn2 pos-absolute" style="bottom: 1%; left: 1%;" onclick="window.location.href = '?changeimg'">MODIFICAR IMAGEM</button>
        </div>
        

        <?php $imageSrc = $_SESSION['imagesrc']?>
        <div class="wrap-cir-pic user-photo ab-c-m m-l-r-auto">
			<img src="<?php echo $imageSrc; ?>" alt="IMG-USER" class="bo-rad-10" >
		</div>
    </section>

    <form action="includes/delete.inc.php" method="post">
        <input type="submit" value="DELETAR" name="delete_user">
    </form>


    <!-- Divisor -->
    <section class="section-divider">
        <div class="item-divider h-half">
            <div class="user-info p-l-7">
                <?php echo "@".$_SESSION['useruid']." • <span class='tt-up'>".$_SESSION['username']."</span>"?>
            </div>
        </div>
    </section>


    <!-- Compras -->
    <section class="section-sales">
        <div class="sumthing">
            <?php
            $id = $_SESSION['userid'];
            $purchases = showPurchases($conn, $id);

            foreach ($purchases as $purchase): ?>
                <tr>
                    <td><?php echo $purchase['eventsId']; ?></td>
                    <td><?php echo $purchase['usersId']; ?></td>
                    <td><?php echo $purchase['eventsId']; ?></td>
                    <td><?php echo $purchase['salesQnt']; ?></td>
                    <td><?php echo $purchase['salesDate']; ?></td>
                </tr>
            <?php endforeach; ?>
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
</body>
</html>