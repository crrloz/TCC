<?php include_once 'head.php' ?>
    <title>Cadastro | COLETIVO HUMANOS</title>
</head>
<?php require_once "css/style.php" ?>
<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap');

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

    .input-field:focus, .input-field:valid {
        outline: 0;
        border-bottom: 0.1rem solid #9267b0;
    }

    .input-field::-webkit-input-placeholder {
        color: #9D6EBE;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .loader {
        border: 8px solid #f3f3f3;
        border-top: 8px solid #7F4AA4;
        border-radius: 50%;
        width: 75px;
        height: 75px;
        animation: spin 1s linear infinite;
    }

    .wrap-loading-content {
        position: fixed;
        top: 50%;
        left: 50%;
        transform: translate(-50%, -50%);
        background-color: rgb(250, 238, 221);
        padding: 80px;
        text-align: center;
        z-index: 200;
        display: block;
        border-radius: 4px;
    }
</style>
<body class="animsition" style="background-color: rgb(250, 238, 221);">
    <?php include_once 'header.php';
    
    
    if(isset($_GET['error'])){?>
    <!-- Mensagens de Erro -->
    <aside class="section-alert m-r-15 m-l-15 m-t-80 pos-fixed">
        <div class="alert alert-warning">
            <strong>Oops!</strong> Parece que houve um erro: <strong><?php
            if($_GET['error'] == "notlogged"){ echo "você precisa estar logado para ver os eventos.";} else if($_GET['error'] == "emptyinput"){ echo "preencha todos os campos."; } else if($_GET['error'] == "invaliduid"){ echo "o nome de usuário é invalído. Insira letras e não símbolos nem números isolados."; } else if($_GET['error'] == "invalidemail"){ echo "endereço de e-mail inválido.";
            } else if($_GET['error'] == "thepassdontmatch"){ echo "as senhas não batem."; } else if($_GET['error'] == "usernametaken"){ echo "este nome de usuário já está sendo utilizado.";}?></strong>
        </div>
    </aside>
    <?php } ?>


    <!-- Modal de Carregamento -->
    <aside class="section-overlay-loading">
        <div class="overlay overlay-loading" style="display: block;">
        </div>

        <div class="wrap-loading-content">
            <div class="loader"></div>
        </div>
    </aside>


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/dança3.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            CADASTRO
        </h2>
	</section>


    <!-- Seção de Cadastro -->
    <section class="section-signup">
        <div class="signup-form m-t-120 m-b-40 t-center">
            <h2 class="p-b-20">CADASTRE-SE</h2>
            <p>Preencha os dados abaixo corretamente e realize seu cadastro em nosso site!</p>
            <form action="includes/signup.inc.php" method="post" class="signup-form m-t-25">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" name="name" placeholder="Nome completo" class="input-field" value="<?php echo $_GET['name'] ?? '';?>">
                        </div>
                        <div class="col-4">
                            <input type="text" name="email" placeholder="E-mail" class="input-field" value="<?php echo $_GET['email'] ?? '';?>">
                        </div>
                        <div class="col-4">
                            <input type="text" name="uid" placeholder="Usuário" class="input-field" value="<?php echo $_GET['uid'] ?? '';?>">
                        </div>
                    </div>
                    <div class="row m-t-20">
                        <div class="col-12">
                            <input type="password" name="pwd" placeholder="Senha" class="input-field">
                        </div>
                    </div>
                    <div class="row m-t-20">
                        <div class="col-12">
                            <input type="password" name="pwdrepeat" placeholder="Repetir senha" class="input-field">
                        </div>
                    </div>
                    <div class="row m-t-20">
                        <div class="col-12 t-center">
                            <input type="submit" name="submit_signup" value="Cadastrar" class="btn3">
                        </div>
                    </div>
                </div>
                <br>

                <?php
                if(isset($_GET["error"]) && $_GET["error"] == "emptyinput"){
                    echo "<p class='p-b-5'>Preencha todos os campos!</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "invaliduid"){
                    echo "<p class='p-b-5'>Usuário inválido.</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "invalidemail"){
                    echo "<p class='p-b-5'>Endereço de e-mail inválido.</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "thepassdontmatch"){
                    echo "<p class='p-b-5'>As senham não batem.</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "usernametaken"){
                    echo "<p class='p-b-5'>Nome de usuário já utilizado.</p>";
                }
                ?>

                <a href="login.php" class="color5">Já possui um cadastro? Clique aqui!</a>
            </form>
        </div>
    </section>


    <!-- Footer -->
    <hr class="m-r-45 m-l-45">
    
    <?php include_once 'footer.php' ?>
    <script>
        $(document).ready(function() {
            $('.signup-form').submit(function() {
                $('.section-overlay-loading, .wrap-loading-content').show();
            });
        });
    </script>
</body>