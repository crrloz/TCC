<?php
    include_once 'head.php';
    include_once 'includes/dbh.inc.php';
    include_once 'includes/functions.inc.php';

    if(!isset($_SESSION['userid'])){
        header("location: login.php?error=notlogged");
        exit();
    } ?>
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

    .checkmark {
        position: absolute;
        bottom: 70%;
        left: 0;
        height: 15px;
        width: 15px;
        background-color: gray;
        border-radius: 2px;
    }

    .checkbox-container {
        display: block;
        position: relative;
    }

    .checkbox-container > input {
        opacity: 0;
        width: 0px;
        height: 0px;
    }

    .checkbox-container:hover input ~ .checkmark, .checkbox-container input:checked ~ .checkmark {
        background-color: gray;
    }

    .checkbox-container .checkmark:after {
        content: "";
        position: absolute;
        display: none;
        left: 5px;
        top: 1px;
        width: 6px;
        height: 10px;
        border: solid white;
        border-width: 0 3px 3px 0;
        -webkit-transform: rotate(45deg);
        -ms-transform: rotate(45deg);
        transform: rotate(45deg);
    }

    .checkbox-container input:checked ~ .checkmark:after {
        display: block;
    }

    .input-field-subject {
        border: 0;
        background-color: transparent;
        border-bottom: 0.5px solid; 
        font: inherit;
        font-size: 1.125rem;
        padding: .25rem 0;
        width: 100%;
    }

    .input-field-subject:focus, .input-field-subject:valid {
        outline: 0;
        border-bottom: 1px solid;
    }
</style>
<body class="animsition" style="background-color: rgb(250, 238, 221);">
    <!-- POP-UP: Mudar imagem -->
    <aside class="section-overlay-file">
        <div class="overlay-file" style="display: block;">
        </div>

        <!-- Pop-up -->
        <div class="popup-file" style="display: block;">
            <!-- Botão Esconder Popup -->
            <button class="btn-hide-popup ti-close color7-hov trans-0-4"></button>

            <!-- Conteúdo -->
            <div class="popup-file-content">
                <form action="includes/change-image-request.inc.php" method="post" enctype="multipart/form-data">
                    <h3 class="m-b-10">Selecione um arquivo</h3><br>
                    <input type="file" name="imageFile" id="imageFileInput"><br><br>

                    <img id="imagePreview" src="#" alt="Preview" style="display: none; max-width: 100%; max-height: 200px;"><br><br>

                    <input type="submit" value="Upload" name="submit_img" class="btn3">
                    <button type="submit" class="hov_underline m-l-10 tt-up">Cancelar</button>
                </form>
            </div>
        </div>
    </aside>

    <!-- POP-UP: Deletar usuário -->
    <aside class="section-overlay-delete">
        <div class="overlay-delete" style="display: block;">
        </div>

        <!-- Pop-up -->
        <div class="popup-delete" style="display: block;">
            <!-- Conteúdo -->
            <div class="popup-delete-content">
                <div class="wrap-trash-icon flex-c-m">
                    <i class="fa fa-trash fs-100 color-user"></i>
                </div>

                <div class="delete-content flex-c-m">
                    <div class="wrap-text-delete t-left">
                        <div class="wrap-title-delete m-b-20" style="line-height: 1;">
                            <span><i class="f-glitten fs-60 color-user">Deletar </i></span>
                            <span class="f-glitten fs-60 color-user">CONTA?</span>
                        </div>

                        <div class="wrap-text-delete p-r-15">
                            Tem certeza de que deseja excluir sua conta? Isso removerá seus dados de nosso Banco de Dados, impossibilitando o envio de promoções e outros e-mails.
                        </div>

                        <div class="wrap-delete-buttons m-t-20">
                            <button class="btn4 bo-color-user color-user btn-url-direct" data-url="includes/delete.inc.php?delete_user">Excluir</button>
                            <button class="btn-close-popup btn4 bg-user color0">Cancelar</button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </aside>


    <!-- Header -->
    <?php include_once 'header.php' ?>


    <!-- Seção Usuário -->
    <section class="section-user">
        <!-- Banner -->
        <div class="user-banner h-half bg-user"></div>

        <!--  -->
        <div class="container">
            <div class="row">
                <!-- Dados e Comandos -->
                <div class="col-md-4 col-lg-3">
                    <!-- Foto de Perfil -->
                    <?php $imageSrc = $_SESSION['imagesrc']?>

                    <div class="wrap-profile pos-relative">
                        <div class="wrap-cir-pic user-photo sizefull m-l-r-auto ab-c-m" style="background-image: url(<?php echo $imageSrc; ?>);"></div>
                        <button class="btn-edit bg-user"><i class="fa fa-edit symbol-btn-edit"></i></button>
                    </div>
                    
                    <!-- Comandos e Botões -->
                    <div class="wrap-user-commands m-t-180 t-center">
                        <?php echo "@".$_SESSION['useruid']." • <span class='tt-up'>".$_SESSION['username']."</span>"?>
                        
                        <div>
                            <button type="button" id="btn-delete-user" class="btn4 color-user bo-color-user m-t-15">Deletar</button>
                        </div>
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
                                
                                <tbody>
                                    <thead>
                                        <tr>
                                            <th scope="col"># Compra</th>
                                            <th scope="col"># Evento</th>
                                            <th scope="col">Nome do Evento</th>
                                            <th scope="col">Quantidade</th>
                                            <th scope="col">Data da Compra</th>
                                            <th scope="col">Data do Evento</th>
                                        </tr>
                                    </thead> <?php 
                                    if(!empty($purchases)){
                                    foreach ($purchases as $purchase): ?>
                                    <tr>
                                        <th scope="row"><?php echo $purchase['salesId']; ?></th>
                                        <td><?php echo $purchase['eventsId']; ?></td>

                                        <?php $sql = "SELECT eventsName FROM events WHERE eventsId = ?;";
                                        $stmt = mysqli_stmt_init($conn);
                                        
                                        if (mysqli_stmt_prepare($stmt, $sql)) {
                                            mysqli_stmt_bind_param($stmt, "i", $purchase['eventsId']);
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);
                                            $eventsName = mysqli_fetch_assoc($result)['eventsName'];
                                        } ?>

                                        <td><?php echo $eventsName; ?></td>
                                        <td><?php 
                                        if($purchase['salesQnt'] > 1){$ticketWord = " ingressos";} else {$ticketWord = " ingresso";}
                                        echo $purchase['salesQnt'].$ticketWord; ?></td>
                                        <td><?php 
                                        $dateComponents = explode('-', $purchase['salesDate']);
                                        $salesDate = $dateComponents[2] . '/' . $dateComponents[1] . '/' . $dateComponents[0];
                                        
                                        echo $salesDate; ?></td>

                                        <?php $sql = "SELECT eventsDate FROM events WHERE eventsId = ?;";
                                        if (mysqli_stmt_prepare($stmt, $sql)) {
                                            mysqli_stmt_bind_param($stmt, "i", $purchase['eventsId']);
                                            mysqli_stmt_execute($stmt);
                                            $result = mysqli_stmt_get_result($stmt);
                                            $row = mysqli_fetch_assoc($result);
                                            $eventsDate = $row['eventsDate'];
                                            $dateComponents = explode('-', $eventsDate);
                                            $eventsDate = $dateComponents[2] . '/' . $dateComponents[1] . '/' . $dateComponents[0];
                                        } ?>

                                        <td><?php echo $eventsDate; ?></td>
                                    </tr>
                                    <?php endforeach; } else { echo "<p>Você não realizou nenhuma compra! Verifique nossa <a href='schedule.php' class='color-user'>Agenda</a> caso esteja interessado.</p>";} ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Seção de Administração -->
    <?php if(isset($_SESSION['isadmin'])){ ?>
    <!-- Seção de Administração de Usuários -->
    <section class="section-signed-users m-r-45 m-l-45 p-b-20">
        <div class="wrap-text-purchases p-t-30">
            <div class="wrap-text-about p-t-30">
                <span><i class="f-glitten fs-60 color-user">Usuários </i></span>
                <span class="f-glitten fs-60 color-user">CADASTRADOS</span>
            </div>
        </div>

        <hr>

        <!-- Usuários Cadastrados -->
        <div class="table-responsive">
            <form action="includes/email.inc.php" method="post">
                <table class="table m-0">
                <?php
                    $users = showAllUsers($conn, 0); ?>
                    
                    <tbody>
                        <thead>
                            <tr>
                                <th scope="col"># Usuário</th>
                                <th scope="col">User</th>
                                <th scope="col">Nome</th>
                                <th scope="col">E-mail</th>
                                <th scope="col">Foto</th>
                            </tr>
                        </thead> <?php 
                        if(!empty($users)){
                        foreach ($users as $user): ?>
                        <tr>
                            <th scope="row"><?php echo $user['usersId']; ?></th>
                            <td><?php echo "@".$user['usersUid']; ?></td>
                            <td><?php echo $user['usersName']; ?></td>
                            <td><?php echo $user['usersEmail']; ?></td>
                            <td><?php
                            if($user['usersPic'] !== null){
                                echo "<div class='wrap-cir-pic sizefull' style='background-image: url(data:image/jpeg;base64,".base64_encode($user['usersPic'])."); width: 30px; height: 30px;'></div>";
                            } ?>
                            <label class="checkbox-container">
                                <input type="checkbox" class="checkbox-email" name="email[]" value="<?php echo $user['usersEmail']; ?>">
                                <span class="checkmark"></span>
                            </label>
                            </td>
                        </tr>
                        <?php endforeach;
                        echo "<p><b>Total de usuários:</b> ".count($users)."</p>";
                    } else {
                        echo "<p>Parece que não há nenhum usuário não administrador cadastrado no site...";
                    }?>
                    </tbody>
                </table>
                <div class="wrap-admin-commands p-t-15">
                    <!-- POP-UP: Enviar E-mail -->
                    <aside class="section-overlay-email">
                        <div class="overlay-email" style="display: block;">
                        </div>

                        <!-- Pop-up -->
                        <div class="popup-email" style="display: block;">
                            <!-- Botão Esconder Popup -->
                            <button class="btn-hide-popup ti-close color7-hov trans-0-4"></button>

                            <!-- Conteúdo -->
                            <div class="popup-email-content">
                                <span>
                                    Assunto
                                </span><br>
                                <input type="text" name="subject" class="input-field-subject color-user  m-b-15">

                                <span>
                                    Mensagem (corpo do E-mail)
                                </span>
                                <textarea name="message" class="textarea-contact bo-rad-10 size35 bo-color-user color-user p-r-10 p-l-10 p-t-5 m-t-10 bg4"></textarea><br><br>

                                <div id="selected-input">
                                    <input type="submit" name="email_selected" class="btn4 color-user bo-color-user" value="Enviar">
                                </div>

                                <div id="all-input">
                                    <input type="submit" name="email_all" class="btn4 color-user bo-color-user" value="Enviar">
                                </div>
                            </div>
                        </div>
                    </aside>
                
                    <button type="button" class="btn4 color0 bg-user bo-color-user m-r-10" id="btn-send-all">
                        Enviar E-mail<span class="fs-7"> (todos)</span>
                    </button>
                    
                    <button type="button" class="btn4 color-user bo-color-user m-r-10" id="btn-send-selected">
                        Enviar E-mail<span class="fs-7"> (selecionados)</span>
                    </button>

                    <button class="btn-delete-users btn4 color-user bo-color-user m-r-10" type="submit" name="delete_users">
                        Deletar Usuários<span class="fs-7"> (selecionados)</span>
                    </button>
                </div>
            </form>
        </div>
    </section>
    <?php } ?>

    <!-- Footer -->
    <hr class="m-r-45 m-l-45">
    
    <?php include_once 'footer.php' ?>
    <script>
        (function ($) {
            "use strict";

            /*[MOSTRAR/ESCONDER POPUP]
            ===========================================================*/
            var btnHidePopup = $('.btn-hide-popup');
            var btnClosePopup = $('.btn-close-popup');
            var btnEdit = $('.btn-edit');
            var btnDelete = $('#btn-delete-user');
            var btnSendAll = $('#btn-send-all');
            var btnSendSelected = $('#btn-send-selected');

            var popupFile = $('.section-overlay-file');
            var popupDelete = $('.section-overlay-delete');
            var popupEmail = $('.section-overlay-email');

            var overlayFile = $('.overlay-file');
            var overlayDelete = $('.overlay-delete');
            var overlayEmail = $('.overlay-email');


            $(btnHidePopup).on('click', function(){
                $(popupFile).css('display','none');
                $(popupEmail).css('display','none');
                $(popupDelete).css('display','none');
            });

            $(btnClosePopup).on('click', function(){
                $(popupFile).css('display','none');
                $(popupEmail).css('display','none');
                $(popupDelete).css('display','none');
            });

            $(btnEdit).on('click', function(){
                $(popupFile).css('display','block');
            });

            $(btnDelete).on('click', function(){
                $(popupDelete).css('display','block');
            });

            $(btnSendAll).on('click', function(e){
                e.preventDefault();

                $(popupEmail).css('display','block');
                $('#all-input').css('display','block');
                $('#selected-input').css('display','none');
            });

            $(btnSendSelected).on('click', function(e){
                e.preventDefault();

                $(popupEmail).css('display','block');
                $('#all-input').css('display','none');
                $('#selected-input').css('display','block');
            });


            $(overlayFile).on('click', function(){
                $(popupFile).css('display','none');
                $(popupEmail).css('display','none');
            });

            $(overlayEmail).on('click', function(){
                $(popupEmail).css('display','none');
            });
            
            $(overlayDelete).on('click', function(){
                $(popupDelete).css('display','none');
            });

            /*[DIRECIONAR PARA PÁGINA]
            ===========================================================*/
            var btnUrl = $('.btn-url-direct');

            $(btnUrl).on('click', function() {
                var url = $(this).data('url');
                window.location.href = url;
            });

            /*[PREVIEW DA FOTO DE PERFIL]
            ===========================================================*/
            function previewImage() {
                var input = $('#imageFileInput')[0];
                var preview = $('#imagePreview');
                var file = input.files[0];
                var reader = new FileReader();

                reader.onload = function(e) {
                    preview.attr('src', e.target.result).show();
                };

                if (file) {
                    reader.readAsDataURL(file);
                }
            }

            $('#imageFileInput').change(previewImage);
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

        function updateColor(color, darkenedColor) {
            const userColor = document.querySelectorAll('.color-user');
            userColor.forEach(element => {
                element.style.color = darkenedColor;
            });

            const bg_user = document.querySelectorAll('.bg-user');
            bg_user.forEach(element => {
                element.style.backgroundColor = darkenedColor;
                element.style.borderColor = darkenedColor;
            });

            const bo_user = document.querySelectorAll('.bo-color-user');
            bo_user.forEach(element => {
                element.style.borderColor = darkenedColor;
            });
        }

        const userImage = "<?php echo $imageSrc; ?>";

        img.src = userImage;

        img.addEventListener('load', function() {
            const dominantColor = colorThief.getColor(img);
            const colorString = `rgb(${dominantColor[0]}, ${dominantColor[1]}, ${dominantColor[2]})`;
            const darkenedColor = darkenColor(dominantColor, 20);

            updateColor(colorString, `rgb(${darkenedColor[0]}, ${darkenedColor[1]}, ${darkenedColor[2]})`);
        });

        document.querySelector('form[action="includes/change-image-request.inc.php"]').addEventListener('submit', function(event) {
            const xhr = new XMLHttpRequest();
            xhr.open('POST', 'includes/change-image-request.inc.php');
            xhr.onload = function() {
                if (xhr.status === 200) {
                    const response = JSON.parse(xhr.responseText);
                    if (response.success) {
                        updateColor(response.color);
                    }
                }
            };

            const formData = new FormData(this);

            xhr.send(formData);
        });
    </script>
</body>
</html>