        <!-- Sidebar -->
        <aside class="sidebar trans-0-4">
            <!-- Botão Esconder Sidebar -->
            <button class="btn-hide-sidebar ti-close color6-hov trans-0-4"></button>

            <!-- - -->
            <ul class="menu-sidebar p-t-95 p-b-70">
                <li class="t-center m-b-13">
                    <a href="contact.php" class="color5 txt19">Contato</a>
                </li>

                <li class="t-center m-b-13">
                    <a href="<?php 
                    if(isset($_SESSION["useruid"])){
                        echo 'schedule.php';
                    } else {
                        echo 'signup.php';
                    } ?>" class="color5 txt19">Agenda</a>
                </li>

                <li class="t-center m-b-13">
                    <a href="about.php" class="color5 txt19">Quem somos</a>
                </li>

                <li class="t-center">
                    <!-- Cadastro -->
                    <a href="signup.php" class="btn3 ab-c-m size13 txt11 trans-0-4 m-l-r-auto">
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
                            <li><a href="contact.php" class="color0 m-r-10">Contato</a></li>
                            <li><a href="<?php 
                                if(isset($_SESSION["useruid"])){
                                    echo 'schedule.php';
                                } else {
                                    echo 'signup.php';
                                } ?>" style="color: white;">Agenda</a></li>
                        </ul>
                    </div>
                    <div class="logo t-center">
                        <!-- Logo -->
                        <a href="index.php">
                            <img src="images/logo/favicon.png">
                        </a>
                    </div>
                    <div class="list-section">
                        <ul>
                            <li class="p-t-20"><a href="about.php" style="color: white;">Quem Somos</a></li>
                            <?php 
                            if(isset($_SESSION["useruid"])){
                                echo '<li><a class="btn-user m-l-10" href="includes/logout.inc.php">Logout</a></li>';
                            } else {
                                echo '<li><a class="btn-user m-l-10" href="signup.php">Cadastro</a></li>';
                            } ?>
                        </ul>
                    </div>
                    
                    <button class="btn-show-sidebar m-l-33 trans-0-4"></button>
                </nav>
            </div>
        </header>