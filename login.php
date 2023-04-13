<?php include_once 'head.php' ?>
    <title>Login | ASEUL</title>
</head>
<body>
    <?php include_once 'header.php' ?>

    <section class="signup-form m-t-120">
        <h2>Login</h2>
        <form action="includes/login.inc.php" method="post">
            <input type="text" name="uid" placeholder="Usuário/E-mail">
            <input type="password" name="pwd" placeholder="Senha">

            <input type="submit" value="Logar">

            <?php
                if(isset($_GET["error"])){
                    if(isset($_GET["error"]) == "emptyinput"){
                        echo "<p>Preencha todos os campos!</p>";
                    } else if(isset($_GET["error"]) == "wronglogin"){
                        echo "<p>Dados incorretos.</p>";
                    }
                }
            ?>
        </form>
    </section>
</body>