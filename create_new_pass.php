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
</style>
<body>
    <?php include_once 'header.php' ?>


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/fundoteste.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            SENHA
        </h2>
    </section>


    <!-- Seção de [...] -->
    <section class="section-login m-t-120 p-b-30 t-center">
        <?php
        $selector = $_GET["selector"];
        $validator = $_GET["validator"];

        if(empty($validator) || empty($selector)){
            echo "Oops! Não conseguimos validar seu requerimento (request)...";
        } else if (ctype_xdigit($validator) !== false && ctype_xdigit($selector) !== false) { ?>

        <form action="includes/reset.inc.php" method="post">
            <input type="hidden" name=selector value="<?php echo $selector;?>">
            <input type="hidden" name=validator value="<?php echo $validator;?>">

            <input type="password" name="pwdreset" placeholder="Insira sua nova senha...">
            <input type="password" name="pwdresetrepeat" placeholder="Repite sua nova senha...">

            <input type="submit" name="submit_new_pwd" value="Enviar" class="btn3">
        </form>

        <?php 
            if(isset($_GET["error"]) && $_GET["error"] == "emptyinput"){
                echo "<p>Preencha todos os campos com as senhas!</p>";
            } else if(isset($_GET["error"]) && $_GET["error"] == "pwdnotthesame"){
                echo "<p>As senhas devem ser iguais!</p>";
            }
        }
        ?>
    </section>
</body>