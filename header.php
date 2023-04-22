        <!-- Header -->
        <header>
            <!-- Header desktop -->
            <div class="wrap-menu-header trans-0-6">
                <nav class="menu">
                    <div class="list-section">
                        <ul>
                            <li><a href="about.php" style="color: white;">Quem Somos</a></li>
                            <li><a href="contact.php" style="color: white;">Contato</a></li>
                            <li><a href="<?php 
                                if(isset($_SESSION["useruid"])){
                                    echo 'about.php';
                                } else {
                                    echo 'signup.php';
                                } ?>" style="color: white;">Agenda</a></li>
                        </ul>
                    </div>
                    <div class="logo t-center">
                        <!-- Logo -->
                        <a href="index.php">
                            <img src="images/logo/Irene&Seulgi LOGO BRANCO.png">
                        </a>
                    </div>
                    <div class="btn-user">
                    <?php 
                        if(isset($_SESSION["useruid"])){
                            echo '<a href="profile.php">Meu Perfil</a>';
                        } else {
                            echo '<a href="signup.php">Cadastro</a>';
                        } ?>
                    </div>
                    
                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </nav>
            </div>
        </header>