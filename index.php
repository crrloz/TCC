<?php
    session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/jpg" href="images/logo/"/>
    
    <!-- ESTILIZAÇÃO SECUNDÁRIA: Ícones -->
    <link rel="stylesheet" type="text/css" href="font-awesome-4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet" type="text/css" href="themify/themify-icons.css">
    <script src="https://kit.fontawesome.com/7511bd6378.js" crossorigin="anonymous"></script>

    <!-- ESTILIZAÇÃO PRINCIPAL -->
	<link rel="stylesheet" type="text/css" href="vendor/bootstrap/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/util.css">
	<link rel="stylesheet" type="text/css" href="css/style.css">

    <title>Coletivo Humanos</title>
</head>
<style>
    .hov-img-zoom {
        display: block;
        overflow: hidden;
    }

    .hov-img-zoom img{
        width: 100%;
        -webkit-transition: all 0.6s;
        -o-transition: all 0.6s;
        -moz-transition: all 0.6s;
        transition: all 0.6s;
    }

    .hov-img-zoom:hover img {
        -webkit-transform: scale(1.1);
        -moz-transform: scale(1.1);
        -ms-transform: scale(1.1);
        -o-transform: scale(1.1);
        transform: scale(1.1);
    }

    .sizefull {
        background-size: cover;
        background-repeat: no-repeat;
    }

    .bg3 {
        background-color: #2A3A1E;
    }

    .entry-shape {
        height: 85vh;
        width: 60vh;
        border-radius: 15rem;
        background-color: black;
        text-align: center;
        position: absolute;
        top: 50%;
        left: 25%;
        transform: translate(-50%, -50%);
    }

    .section-about .container .row {
        padding: 125px 0 95px 0;
    }

    .hov_underline {
        display: inline-block;
        position: relative;
        font-size: 15px;
        margin-top: 5px;
        color: #808080;
    }

    .hov_underline:after {
        content: '';
        position: absolute;
        width: 100%;
        transform: scaleX(1);
        height: 1px;
        bottom: 0;
        left: 0;
        background-color: #808080;
        transform-origin: bottom left;
        transition: transform 0.25s ease-out;
    }

    .hov_underline:hover:after{
        transform: scaleX(0);
        transform-origin: bottom right;
    }

    .wrap-input {
        border-bottom: 0.1rem solid #718928;
        display: inline-flex;
        align-items: center;
        justify-content: space-between;
        padding: 5px;
    }

    .wrap-input input[type="text"] {
        background: none;
        border: none;
        outline: none;
        font-size: 16px;
        padding: 5px;
        width: 100%;
    }

    .btn4 {
        color: #718928;
        background: none;
        border: #718928 solid 0.1rem;
        border-radius: 50px;
        text-transform: uppercase;
        padding: 0.25rem 1rem;
        cursor: pointer;
    }

    .full-star {
        z-index: 10;
        position: absolute;
        left: 81%;
        top: -10%;
    }
</style>
<body style="background-color: rgb(250, 238, 221);">
    <!-- Sidebar -->
	<aside class="sidebar trans-0-4">
		<!-- Button Hide sidebar -->
		<button class="btn-hide-sidebar ti-close color0-hov trans-0-4"></button>

		<!-- - -->
		<ul class="menu-sidebar p-t-95 p-b-70">
			<li class="t-center m-b-13">
				<a href=".html" class="txt19">aaaaa</a>
			</li>

            <li class="t-center m-b-13">
				<a href=".html" class="txt19">aaa</a>
			</li>

			<li class="t-center">
				<!-- SIGNUP/PROFILE -->
				<a href="signup.php" class="btn3 ab-c-m size13 txt11 trans-0-4 m-l-r-auto">
					Cadastrar-se
				</a>
			</li>
		</ul>
	</aside>


    <!-- Header -->
    <?php include_once 'header.php' ?>


	<!-- Entrada -->
    <section class="section-entry">
        <div class="wrap-title-page">
            <div class="entry-shape">
                smthing
            </div>
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


    <!-- Sobre -->
    <section class="section-about">
        <div class="container">
            <div class="wrap-text-about pos-absolute p-t-30">
                <span><i class="f-glitten fs-60 color6">Quem </i></span>
                <span class="f-glitten fs-60 color6">SOMOS?</span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, esse aliquid. Et at iusto dolorem sunt, obcaecati repudiandae recusandae ad eveniet saepe a dignissimos praesentium provident sint dolore dolor ut. <br>
                    <span><a href="about.php" class="hov_underline">Descobrir mais</a></span>
                </div>
                <div class="col-md-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sint sed quaerat delectus fuga beatae molestias? Totam sequi voluptatem hic magni dolorem omnis reiciendis facere, dignissimos mollitia obcaecati accusamus nisi!
                </div>
            </div>
        </div>
    </section>


    <!-- Divisor -->
    <section class="section-divider">
        <div class="item-divider p-t-150 p-b-150" style="background-image: url(images/fundoteste.jpg);"></div>
    </section>


    <!-- Notícias/Novidades -->
    <section class="section-news">
        <!-- Texto -->


        <!-- Notícias -->
        <div class="container">
            <div class="row p-t-30 p-b-30">
                <div class="col-md-6 p-t-250 sizefull" style="background-image: url(images/aaliyahkindabirthedcontemporaryrnbwhenyouthinkaboutit.jpg);">
                    <a href="">Hmmm</a>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 p-t-125 sizefull" style="background-image: url(images/aaliyahkindabirthedcontemporaryrnbwhenyouthinkaboutit.jpg);">
                                    <a href="">Seulgi we freaking luv u likee..........</a>
                                </div>
                                <div class="col-md-12 p-t-125 sizefull" style="background-image: url(images/aaliyahkindabirthedcontemporaryrnbwhenyouthinkaboutit.jpg);">
                                    <a href="">Idk</a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="row">
                                <div class="col-md-12 p-t-125 sizefull" style="background-image: url(images/aaliyahkindabirthedcontemporaryrnbwhenyouthinkaboutit.jpg);">
                                    <a href="">Why am I so good at everything I do</a>
                                </div>
                                <div class="col-md-12 p-t-125 sizefull" style="background-image: url(images/aaliyahkindabirthedcontemporaryrnbwhenyouthinkaboutit.jpg);">
                                    <a href="">Like i rlly lms sm</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>


        <!-- Link/Texto/Sla -->


    </section>


    <!-- Cadastro -->
    <section class="section-signup p-t-60 bg3" style="overflow: hidden;">
        <div class="row p-l-100">
            <div class="col-lg-6 p-b-30">
                <div style="line-height: 0.8">
                    <span class="t-center fs-45">
                        <b class="color6">MANTENHA-SE</b>
                    </span>

                    <h3 class="m-b-35 m-t-2">
                        <i class="f-glitten t-center fs-40 color6">atualizado</i>
                    </h3>
                </div>

                <form class="wrap-form-signup" method="get" action="signup.php">
                    <div class="row p-l-15 p-r-100">
                        <div class="wrap-input size12 m-t-3 m-b-23">
                            <input class="p-b-10 p-r-150" type="text" name="email_home" placeholder="Digite seu e-mail...">
                            <!-- Botão -->
                            <button type="submit" name="submit_home" class="btn4">
                                Cadastrar
                            </button>
                        </div>
                    </div>
                </form>
            </div>

            <div class="col-lg-6 p-b-60">
                <img src="images/icons/fullstar.png" alt="IMG-STAR" class="full-star">
                <div class="wrap-pic-signup bo-rad-10 hov-img-zoom m-l-r-auto" style="max-width: 390px;">
                    <img src="images/ated.jpg" alt="IMG">
                </div>
            </div>
        </div>
    </section>


    <!-- Footer -->
    <?php include_once 'footer.php' ?>
</body>
</html>