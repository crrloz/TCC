<?php require "head.php" ?>
    <title>Esboço de Mudança: SIGN-UP</title>
</head>
<style>
    .bg2 {background-color: #9267b0}

    .color6 {color: #7F4AA4;}

    .color7 {color: #D99E07;}


    input[type="text"] {
        appearance: none;
        border-radius: 0;
        line-height: 1.5;
        position: relative;
        padding-top: 1.5rem;
    }

    .input-label {
        color: #8597a3;
        position: absolute;
        top: 1.5rem;
        transition: .25s ease;
    }

    .input-field {
        border: 0;
        z-index: 1;
        background-color: transparent;
        border-bottom: 2px solid #fff; 
        font: inherit;
        font-size: 1.125rem;
        padding: .25rem 0;
        width: 100%;
    }

    .input-field-password {
        border: 0;
        z-index: 1;
        background-color: transparent;
        font: inherit;
        font-size: 1.125rem;
        padding: .25rem 0;
        width: 100%;
    }

    .input-field:focus, .input-field:valid, .input-field-password:focus, .input-field-password:valid {
        outline: 0;
        border-bottom: 0.1rem solid #9267b0;
    }

    .input-field::-webkit-input-placeholder, .input-field-password::-webkit-input-placeholder {
        color: #9D6EBE;
    }

    .wrap-input-password input[type="password"] {
        background: none;
        border: none;
        outline: none;
        width: 100%;
    }

    .wrap-input-password {
        border-bottom: 2px solid #fff; 
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        padding: .25rem 0;
    }

    .wrap-input-password input[type="password"] {
        padding: .25rem 0;
        background: none;
        border: none;
        outline: none;
        width: 100%;
        
        padding: 24px 0px 0px;
    }
</style>
<body style="background-color: rgb(250, 238, 221);">
<!-- Title Page -->
<section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/dança3.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            CADASTRO
        </h2>
	</section>


    <!-- Seção de Cadastro -->
    <section class="section-signup">
        <div class="signup-form m-t-80 m-b-40 t-center">
            <h2>Cadastre-se Agora!</h2>
            <form action="includes/signup.inc.php" method="post" class="m-t-25">
                <div class="container">
                    <div class="row">
                        <div class="col-12">
                            <input type="text" name="name" placeholder="Nome completo" class="input-field">
                        </div>
                    </div>
                    <div class="row" style="margin-top: 10px;">
                        <div class="col-4">
                            <input type="text" name="email" placeholder="E-mail" class="input-field" value="<?php echo $_GET['email_home'] ?? '';?>">
                        </div>
                        <div class="col-4">
                            <input type="text" name="uid" placeholder="Usuário" class="input-field">
                        </div>
                        <div class="col-4 wrap-input-password">
                            <input type="password" name="pwd" placeholder="Senha" class="input-field-password">
                            <input type="submit" name="submit" value="Cadastrar-se" class="btn3">
                        </div>
                        
                    </div>
                </div>
                <br>

                <a href="login.php" class="color5">Já possui um cadastro? Clique aqui!</a>
            </form>
            <?php
                if(isset($_GET["error"]) && $_GET["error"] == "emptyinput"){
                    echo "<p class='p-b-20'>Preencha todos os campos!</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "invaliduid"){
                    echo "<p class='p-b-20'>Usuário inválido.</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "invalidemail"){
                    echo "<p class='p-b-20'>Endereço de e-mail inválido.</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "thepassdontmatch"){
                    echo "<p class='p-b-20'>As senham não batem.</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "usernametaken"){
                    echo "<p class='p-b-20'>Nome de usuário já utilizado.</p>";
                }
            ?>
        </div>
    </section>
</body>
</html>