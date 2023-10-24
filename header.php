        <!-- Sidebar -->
        <aside class="sidebar trans-0-4">
            <!-- Botão Esconder Sidebar -->
            <button class="btn-hide-sidebar ti-close color6-hov trans-0-4"></button>

            <!-- - -->
            <ul class="menu-sidebar p-t-95 p-b-70">
                <li class="t-center m-b-13">
                    <a href="contact.php">Contato</a>
                </li>

                <li class="t-center m-b-13">
                    <a href="schedule.php">Agenda</a>
                </li>

                <li class="t-center m-b-13">
                    <a href="about.php">Quem somos</a>
                </li>

                <li class="t-center">
                    <!-- Cadastro -->
                    <a href="signup.php" class="btn3 ab-c-m size13 trans-0-4 m-l-r-auto">
                        Cadastro
                    </a>
                </li>
            </ul>
        </aside>


        <!-- Header -->
        <header>
            <!-- Header desktop -->
            <div class="wrap-menu-header trans-0-6">
                <nav class="menu">
                    <div class="list-section">
                        <ul>
                            <li><a href="contact.php" class="m-r-10">Contato</a></li>
                            <li><a href="schedule.php">Agenda</a></li>
                        </ul>
                    </div>
                    <div class="logo t-center">
                        <!-- Logo -->
                        <a href="index.php">
                            <img src="images/logo/logo-branca.png">
                        </a>
                    </div>
                    <div class="list-section">
                        <ul>
                            <li class="p-t-20"><a href="about.php">Quem Somos</a></li>
                            <?php 
                            if(isset($_SESSION["useruid"])){
                                $imageSrc = $_SESSION['imagesrc'];
                                echo '<li><a class="btn-user m-l-10" href="includes/logout.inc.php">Logout</a></li>'
                                    .'<li class="wrap-cir-pic btn-profile btn-url-direct sizefull m-l-15" style="background-image: url('. $imageSrc .');" data-url=profile.php><li>';
                            } else {
                                echo '<li><a class="btn-user m-l-10" href="signup.php">Cadastro</a></li>';
                            } ?>
                        </ul>
                    </div>
                    
                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </nav>
            </div>
        </header>