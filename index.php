<?php
    session_start();
    include_once 'head.php'
?>
    <title>Coletivo Humanos</title>
</head>
<body style="background-color: rgb(250, 238, 221);">
    <!-- Sidebar -->
	<aside class="sidebar trans-0-4">
		<!-- Button Hide sidebar -->
		<button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

		<!-- - -->
		<ul class="menu-sidebar p-t-95 p-b-70">
			<li class="t-center m-b-13">
				<a href="fem.html" class="txt19">Roupas pra ela</a>
			</li>

            <li class="t-center m-b-13">
				<a href="workingonit.html" class="txt19">Roupas pra ele</a>
			</li>

			<li class="t-center">
				<!-- SIGNUP/PROFILE -->
				<a href="signup.php" class="btn3 ab-c-m size13 txt11 trans-0-4 m-l-r-auto">
					Cadastrar-se
				</a>
			</li>
		</ul>
	</aside>

    <?php include_once 'header.php' ?>

	<!-- Entrada -->
    <section class="section-entry">
        <div class="wrap-title-page">
            <div class="item-title-page" style="background-image: url(images/fundoteste.jpg);">
                <div class="wrap-content">
                    <span class="f-glitten">
                        COLETIVO
                    </span>

                    <h2 class="fs-100">
                        <i class="f-glitten">Artístico</i>
                    </h2>

                    <span class="f-glitten">
                        HUMANOS
                    </span>
                </div>
            </div>
        </div>
    </section>

    <section class="section- h-half">
        <div class="container">
            <div class="row">
                <div class="col-md-6">
                    <div class="m-t-27" style="background-color: #88a131; height: 250px; width: 375px;"></div>
                </div>
                <div class="col-md-6">
                    <span class="ab-b-r" style="text-align: right;"><a href="">Lorem ipsum dolor sit amet, consectetur adipisicing elit. Error quod vero rem quam! Ea provident, repellat.</a></span>
                </div>
            </div>
        </div>
    </section>

    <?php include_once 'footer.php' ?>
</body>
</html>