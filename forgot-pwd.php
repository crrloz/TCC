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
            ESQUECEU SENHA
        </h2>
    </section>


    <!-- Seção de [...] -->
    <section class="section-login m-t-120 p-b-30 t-center">
        <h2>Login</h2>
        <form action="includes/reset-request.inc.php" method="post">
            <input type="text" name="email_reset" placeholder="E-mail da conta" class="input-field">

            <input type="submit" name="submit_reset" value="Logar">

            <?php
            if(isset($_GET["error"]) && $_GET["error"] == "emptyinput"){
                echo "<p>Preencha o campo!</p>";
            }
            ?>
        </form>
    </section>
</body>