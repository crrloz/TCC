<?php include_once 'head.php' ?>
</head>
<?php require_once "css/style.php" ?>
<style>
    .bg-email-title {
        background-position: center;
    }

    .container {
        margin-right: auto;
        margin-left: auto;
        width: 100%;
    }

    @media (max-width: 540px) {
        .container {
            max-width: 720px;
        }
    }

    .row {
        display: flex;
        flex-wrap: wrap;
    }

    .col-md-6 {
        position: relative;
        width: 100%;
        min-height: 1px;
        text-align: center;
        padding: 0 15px;
    }

    @media (min-width: 768px) {
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }

    @media (max-width: 768px) {
        .col-md-6 {
            padding: 10px 0;
        }
    }
</style>
<body style="background-color: rgb(250, 238, 221);">
    <!-- "Title Page" -->
    <section class="section-email-title">
        <div class="bg-email-title sizefull p-t-160 p-b-160 p-l-15 p-r-15" style="background-image: url(images/inaraemulher.jpg);">

        </div>
    </section>


    <!-- Conteúdo -->
    <section class="section-email-content">
        <!-- Título de Boas Vindas -->
        <div class="wrap-welcome-text t-center p-t-50 color6">
            <span class="f-glitten fs-75">Bem-vindo<span class="f-glitten fs-30"> (a)<span>!</span>
        </div>

        <!-- Texto -->
        <div class="wrap-content-text">
            <div class="container">
                <div class="row">
                    <div class="col-md-6">
                        <span class="f-glitten fs-20 color6">Olá, <span class="tt-up"><?php echo $_SESSION['username']; ?>.</span></span>
                        Seu cadastro no site do Coletivo Artístico Humanos foi finalizado. O nosso Coletivo é um grupo de dança situado em Arraial do Cabo, dedicado a representar e celebrar a rica cultura afro-brasileira por meio da expressão corporal.
                    </div>
                    <div class="col-md-6">
                        Por favor, <a href="index.php" class="hov_underline">explore nosso site</a> e suas funcionalidades. Caso não tenha criado uma conta a partir deste E-mail, contate-nos através do <a href="contact.php" class="hov_underline">nosso site</a> ou E-mail para resolvermos qualquer problema.
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>
</html>