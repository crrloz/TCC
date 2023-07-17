<?php include_once 'head.php' ?>
    
    <title>Login | COLETIVO HUMANOS</title>
</head>
<?php require_once "css/style.php" ?>
<style>
    .input {
        display: flex;
        flex-direction: column-reverse;
        position: relative;
        padding-top: 1.5rem;
    }

    .input-field {
        color: #7F4AA4;
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
        border-bottom: 0.1rem solid #7F4AA4;
    }

    .input-field::-webkit-input-placeholder {
        color: #9D6EBE;
    }
</style>
<body class="animsition" style="background-color: rgb(250, 238, 221);">
	<!-- Header -->
    <?php include_once 'header.php' ?>


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/inaraemulher.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            LOGIN
        </h2>
    </section>


    <!-- Seção de Login -->
    <section class="section-login m-t-120 p-b-30 t-center">
        <h2>Login</h2><br>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Usuário/E-mail" class="input-field">
            <input type="password" name="pwd" placeholder="Senha" class="input-field"> <br><br>

            <input type="submit" name="submit" value="Logar" class="btn3"><br><br>

            <a href="reset.php" class="color5 m-b-15">Esqueceu sua senha? Clique aqui!</a>

            <?php
            if(isset($_GET["error"]) && $_GET["error"] == "wronglogin"){
                echo "<p>Dados incorretos.</p>";
            } else if(isset($_GET["error"]) && $_GET["error"] == "emptyinput"){
                echo "<p>Preencha todos os campos!</p>";
            }
            ?>
        </form>
    </section>


    <!-- Footer -->
    <?php include_once 'footer.php' ?>
</body>