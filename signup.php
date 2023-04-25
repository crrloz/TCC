<?php include_once 'head.php' ?>
    <title>Cadastroooo | HUMANOS</title>
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
    }

    .card {
        margin: 2rem auto;
        display: flex;
        flex-direction: column;
        width: 100%;
        max-width: 425px;
        background-color: #FFF;
        border-radius: 10px;
        box-shadow: 0 10px 20px 0 rgba(#999, .25);
        padding: .75rem;
    }

    .card-image {
        border-radius: 8px;
        overflow: hidden;
        padding-bottom: 65%;
        background-image: url('https://assets.codepen.io/285131/coffee_1.jpg');
        background-repeat: no-repeat;
        background-size: 150%;
        background-position: 0 5%;
        position: relative;
    }

    .card-heading {
        position: absolute;
        left: 10%;
        top: 15%;
        right: 10%;
        font-size: 1.75rem;
        font-weight: 700;
        color: #735400;
        line-height: 1.222;
    }

    .card-heading small {
		display: block;
		font-size: .75em;
		font-weight: 400;
		margin-top: .25em;
	}

    .card-form {
        padding: 2rem 1rem 0;
    }

    .input {
        display: flex;
        flex-direction: column-reverse;
        position: relative;
        padding-top: 1.5rem;
        &+.input {
            margin-top: 1.5rem;
        }
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

    .action {
        margin-top: 2rem;
    }

    .action-button {
        font: inherit;
        font-size: 1.25rem;
        padding: 1em;
        width: 100%;
        font-weight: 500;
        background-color: #6658d3;
        border-radius: 6px;
        color: #FFF;
        border: 0;
    }

    .action-button:focus {
            outline: 0;
        }

    .card-info {
        padding: 1rem 1rem;
        text-align: center;
        font-size: .875rem;
        color: #8597a3;
    }

    .card-info a {
		display: block;
		color: #6658d3;
		text-decoration: none;
	}

</style>
<body style="background-color: rgb(250, 238, 221);">
    <?php include_once 'header.php' ?>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-md-4 col-lg-4 f-glitten fs-80 c-white" style="background-image: url(https://i.pinimg.com/564x/67/f8/8a/67f88ab55bddbd72925187008661a3c5.jpg); background-repeat: no-repeat; background-size: cover; height: 100vh; width: 100%;">
                    Cadastre-se!
                </div>

                <div class="col-md-8 col-lg-8">
                    <div class="signup-form m-t-120 t-center">
                        <h2>Cadastre-se Agora!</h2>
                        <form action="includes/signup.inc.php" method="post">
                            <div class="container">
                                <div class="row">
                                    <div class="col-4">
                                        <input type="text" name="name" placeholder="Nome completo" class="input-field">
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
                            if(isset($_GET["error"])){
                                if(isset($_GET["error"]) == "emptyinput"){
                                    echo "<p>Preencha todos os campos!</p>";
                                } else if(isset($_GET["error"]) == "invaliduid"){
                                    echo "<p>Usuário inválido.</p>";
                                } else if(isset($_GET["error"]) == "invalidemail"){
                                    echo "<p>Endereço de e-mail inválido.</p>";
                                } else if(isset($_GET["error"]) == "thepassdontmatch"){
                                    echo "<p>As senham não batem.</p>";
                                } else if(isset($_GET["error"]) == "usernametaken"){
                                    echo "<p>Nome de usuário já utilizado.</p>";
                                }
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>