<?php
    session_start();
    include_once 'head.php'
?>
    <title>Coletivo Humanos</title>
</head>
<style>
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

    .section-half .container .row {
        padding: 95px 0;
    }

    .col-gr {
        color: #718928;
    }

    .hov_underline {
        display: inline-block;
        position: relative;
        font-size: 15px;
        margin-top: 5px;
    }

    .hov_underline:after {
        content: '';
        position: absolute;
        width: 100%;
        transform: scaleX(0);
        height: 1px;
        bottom: 0;
        left: 0;
        color: #808080;
        background-color: #808080;
        transform-origin: bottom right;
        transition: transform 0.25s ease-out;
    }

    .hov_underline:hover:after{
        transform: scaleX(1);
        transform-origin: bottom left;
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

    <section class="section-half">
        <div class="container">
            <div class="wrap-text-about pos-absolute p-t-15">
                <span><i class="f-glitten fs-60 col-gr">Quem </i></span>
                <span class="f-glitten fs-60 col-gr">SOMOS?</span>
            </div>
            <div class="row">
                <div class="col-md-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quisquam, esse aliquid. Et at iusto dolorem sunt, obcaecati repudiandae recusandae ad eveniet saepe a dignissimos praesentium provident sint dolore dolor ut. <br>
                    <span class="hov_underline">Descobrir mais</span>
                </div>
                <div class="col-md-6">
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Obcaecati sint sed quaerat delectus fuga beatae molestias? Totam sequi voluptatem hic magni dolorem omnis reiciendis facere, dignissimos mollitia obcaecati accusamus nisi!
                </div>
            </div>
        </div>
    </section>

    <section class="section-divider">
        <div class="divider-image p-t-150 p-b-150" style="background-image: url(images/aaliyahkindabirthedcontemporaryrnbwhenyouthinkaboutit.jpg); background-size: cover; background-repeat: no repeat;"></div>
    </section>

    <div class="section-section-news">
        <div class="container">
            <div class="row p-t-30 p-b-30">
                <div class="col-md-6 p-t-60 p-b-60" style="background-image: url(images/aaliyahkindabirthedcontemporaryrnbwhenyouthinkaboutit.jpg); background-size: cover; background-repeat: no repeat;">
                    <a href="">Red Velvet o melhor grupo atualmente ativo... Sinto muito.</a>
                </div>
                <div class="col-md-6">
                    <div class="row">
                        <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 p-t-30 p-b-30" style="background-image: url(images/aaliyahkindabirthedcontemporaryrnbwhenyouthinkaboutit.jpg); background-size: cover; background-repeat: no repeat;">
                            </div>
                            <div class="col-md-12 p-t-30 p-b-30" style="background-image: url(images/aaliyahkindabirthedcontemporaryrnbwhenyouthinkaboutit.jpg); background-size: cover; background-repeat: no repeat;">
                                <!-- conteúdo da segunda div da primeira coluna da segunda metade -->
                            </div>
                        </div>
                        </div>
                        <div class="col-md-6">
                        <div class="row">
                            <div class="col-md-12 p-t-30 p-b-30" style="background-image: url(images/aaliyahkindabirthedcontemporaryrnbwhenyouthinkaboutit.jpg); background-size: cover; background-repeat: no repeat;">
                                <!-- conteúdo da primeira div da segunda coluna da segunda metade -->
                            </div>
                            <div class="col-md-12 p-t-30 p-b-30" style="background-image: url(images/aaliyahkindabirthedcontemporaryrnbwhenyouthinkaboutit.jpg); background-size: cover; background-repeat: no repeat;">
                                <!-- conteúdo da segunda div da segunda coluna da segunda metade -->
                            </div>
                        </div>
                        </div>
                    </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
    </div>

    <?php include_once 'footer.php' ?>
</body>
</html>