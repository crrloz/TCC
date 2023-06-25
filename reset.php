<?php include_once 'head.php' ?>
    <title>Login | COLETIVO HUMANOS</title>
</head>
<style>
    .input {
        display: flex;
        flex-direction: column-reverse;
        position: relative;
        padding-top: 1.5rem;
    }

    .input-field {
        border: 0;
        z-index: 1;
        background-color: transparent;
        border-bottom: 2px solid #fff; 
        font: inherit;
        font-size: 1.125rem;
        padding: .25rem 0;
    }

    .input-field:focus, .input-field:valid {
        outline: 0;
        border-bottom: 0.1rem solid black;
    }

    .wrap-input {
        border-bottom: 0.1rem solid #9267b0;
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        padding: 5px;
    }

    .wrap-input input[type="text"] {
        background: none;
        border: none;
        outline: none;
        font-size: 16px;
        padding: 5px;
        width: 100%;
    }

    input[name="email_home"]{
        color: #9267b0;
    }

    ::-webkit-input-placeholder {
        color: #9267b0;
    }

    .section-wrap-input {
        padding: 0 30%;
    }

    .color10 {color: #9267b0;}

    .bo-color-2 {border-color: #9267b0;}
</style>
<body style="background-color: rgb(250, 238, 221);">
    <?php include_once 'header.php' ?>


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/dança4.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            SENHA
        </h2>
    </section>


    <!-- Seção de Login -->
    <section class="section-wrap-input m-t-120 m-b-100 t-center">
        <h2>RESETE SUA SENHA!</h2>
        <p>Digite o e-mail da sua conta. Enviaremos as instruções para mudar sua senha.</p>
        <form action="includes/reset-request.inc.php" method="post">
            <div class="wrap-input size12 m-t-3 m-b-23">
                <input class="p-b-10 color6" type="text" name="email_reset" placeholder="Digite seu e-mail...">
                <!-- Botão -->
                <button type="submit" name="submit_reset" value="Receber" class="btn4 color10 bo-color-0">
                    Receber
                </button>
            </div>
        </form>

            <?php
            if(isset($_GET["error"]) && $_GET["error"] == "none"){
                echo "<p style='padding-bottom: 20px;'>Cheque seu e-mail.</p>";
            } else if(isset($_GET["error"]) && $_GET["error"] == "emptyinput"){
                echo "<p style='padding-bottom: 20px;'>Preencha o campo de e-mail!</p>";
            }
            ?>
    </section>
</body>