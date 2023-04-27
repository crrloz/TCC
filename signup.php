<?php include_once 'head.php' ?>
    <title>Cadastro | COLETIVO HUMANOS</title>
</head>
<style>
    @import url('https://fonts.googleapis.com/css2?family=DM+Sans:wght@400;500;700&display=swap');
    .row, .container {
        padding: 0;
        margin: 0;
    }

    input {
        appearance: none;
        border-radius: 0;
        font-family: "DM Sans", sans-serif;
        line-height: 1.5;
        display: flex;
        flex-direction: column-reverse;
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
    }

    .input-field:focus, .input-field:valid {
        outline: 0;
        border-bottom: 0.1rem solid black;
    }

</style>
<body style="background-color: rgb(250, 238, 221);">
    <?php include_once 'header.php' ?>


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/fundoteste.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            CADASTRO
        </h2>
	</section>


    <!-- Seção de Cadastro -->
    <section class="section-signup">
        <div class="signup-form m-t-120 t-center">
            <h2>Cadastre-se Agora!</h2>
            <form action="includes/signup.inc.php" method="post">
                <div class="container">
                    <div class="row">
                        <div class="col-4">
                            <input type="text" name="name" placeholder="Primeiro nome" class="input-field">
                        </div>
                        <div class="col-4">
                            <input type="text" name="email" placeholder="E-mail" class="input-field" value="<?php echo $_GET['email_home'] ?? '';?>">
                        </div>
                        <div class="col-4">
                            <input type="text" name="uid" placeholder="Usuário" class="input-field">
                        </div>
                    </div>
                    <div class="row m-t-10">
                        <div class="col-4">
                            <input type="password" name="pwd" placeholder="Senha" class="input-field">
                        </div>
                        <div class="col-4">
                            <input type="password" name="pwdrepeat" placeholder="Repetir senha" class="input-field">
                        </div>
                        <div class="col-4">
                            <input type="submit" name="submit" value="Cadastrar-se" class="btn3">
                        </div>
                    </div>
                </div>
                <br>

                <a href="login.php">Já possui um cadastro? Clique aqui!</a>
            </form>
            <?php
                if(isset($_GET["error"]) && $_GET["error"] == "emptyinput"){
                    echo "<p>Preencha todos os campos!</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "invaliduid"){
                    echo "<p>Usuário inválido.</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "invalidemail"){
                    echo "<p>Endereço de e-mail inválido.</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "thepassdontmatch"){
                    echo "<p>As senham não batem.</p>";
                } else if(isset($_GET["error"]) && $_GET["error"] == "usernametaken"){
                    echo "<p>Nome de usuário já utilizado.</p>";
                }
            ?>
        </div>
    </section>
</body>