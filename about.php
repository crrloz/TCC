<?php 
	include_once 'head.php';
	include_once 'includes/dbh.inc.php' 
?>
    <title>Sobre Nós | COLETIVO HUMANOS</title>
</head>
<?php require_once "css/style.php" ?>
<style>
    .bg2 {background-color: #9267b0}

    .wrap-about-title > span > p {
        line-height: 0.9;
        color: #ff9f00;
        font-size: 50px;
    }

	.btn-show-more {
		position: absolute;
		font-size: 20px;
		color: #111111;
		padding: 10px;
		top: -10%;
		right: 2.5%;
	}

	.dancer-editing {
		width: 80px;
		padding: 15px;
  		box-shadow: 0px 2px 5px rgba(0,0,0,0.2);
	}
</style>
<body class="animition" style="background-color: rgb(250, 238, 221);">
    <?php include_once 'header.php' ?>


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/dança5.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            SOBRE NÓS
        </h2>
	</section>


    <!-- Seção ... -->
    <section class="section-hum p-t-60">
        <div class="wrap-about-title p-l-200 p-b-50">
            <span class="fs-50">
                <p><b>A Arte Negra</b></p>
                <p><b>no contexto do</b></p>
                <p>balé brasileiro</p>
            </span>
        </div>

        <div class="wrap-about-sum">
            <div class="row p-b-80" style="margin: 0">
                <div class="col-lg-6 p-l-200">
					Em uma sociedade permeada pela persistência do racismo e pela escassez de representatividade negra em posições de destaque nas artes e na sociedade, desponta o Coletivo Artístico Humanos. Em meio a um cenário pandêmico no ano de 2020, Luan Canellas decidiu tomar uma iniciativa para contornar a problemática da ausência de corpos negros nos grupos de dança, que majoritariamente eram compostos por indivíduos brancos. Dessa forma, o coletivo emergiu com a proposta de valorizar o corpo negro nas artes cênicas, enfatizando sua excelência técnica no balé, na dança contemporânea, no jazz, entre outras formas de expressão, sem jamais objetificar essas corporalidades.<br><br>

					O Coletivo Artístico Humanos, além de se dedicar à valorização da cultura negra, busca promover a inclusão de artistas e ativistas negras na sociedade, especialmente no universo das artes cênicas.
                </div>

                <div class="col-lg-6 p-r-200">
					A arte negra no contexto do balé brasileiro ganha uma relevância ímpar, uma vez que reflete a diversidade cultural de nossa nação e a importância de assegurar a representatividade racial no âmbito artístico. <br><br>

					Embora enfrentem inúmeras dificuldades e obstáculos nesse meio, os artistas negros encontram no Coletivo Artístico Humanos um espaço dedicado à promoção do corpo negro nas artes cênicas, ao fortalecimento da cultura negra e à necessidade de proporcionar um ambiente seguro e acolhedor para artistas e ativistas negras.

					O objetivo primordial do Coletivo é criar um ambiente inclusivo, diversificado e propício para o avanço do balé brasileiro, com a participação ativa de artistas e ativistas negros. Nessa perspectiva, o Coletivo Artístico Humanos assume um papel fundamental não apenas para o balé brasileiro, mas para todo o universo das artes cênicas, representando uma organização cultural de grande relevância.
                </div>
            </div>
        </div>
    </section>


    <!-- Banner -->
    <div class="parallax0 parallax100" style="background-image: url(images/img.JPG); background-position: center 0.166667px;">
		<div class="overlay0-parallax t-center"></div>
	</div>


    <!-- ?? -->
    <section class="p-t-120 p-b-105">
		<div class="container">
			<?php
			$sql = "SELECT * FROM dancers ORDER BY dancersId;";
			$result = mysqli_query($conn, $sql);
			$count = 1;

			if ($result && mysqli_num_rows($result) > 0) {
				while ($row = mysqli_fetch_assoc($result)) {
					$id = $row['dancersId'];
					$name = $row['dancersName'];
					$image = "data:image/jpeg;base64," . base64_encode($row['dancersPic']);
					$text = $row['dancersText'];
					
					if($count%2){ ?>
						<div class="row">
							<div class="col-md-6 p-t-45 p-b-30">
								<div class="wrap-text- t-center">
									<span class="t-center fs-50">
										Alguma
									</span>

									<h3 class="t-center m-b-35 m-t-5 f-glitten color7 fs-70">
										COISA
									</h3>

									<p class="t-center m-b-22 m-l-r-auto">
										<?php echo $text ?>
									</p>
								</div>
							</div>

							<div class="col-md-6 p-b-30">
								<?php if(isset($_SESSION['isadmin'])){ ?>
								<div class="wrap-show-more">
									<!-- Botão Mostrar Mais -->
									<button class="btn-show-more ti-more-alt color7-hov trans-0-4"></button>

									<div class="wrap-dancer-editing t-right">
										<ul class="dancer-editing">
											<li  class="color7-hov trans-0-4 pointer">Editar</li>
											<li  class="color7-hov trans-0-4 pointer">Excluir</li>
										</ul>
									</div>
								</div><?php } ?>

								<div class="wrap-pic- size2 hov-img-zoom m-l-r-auto">
									<img src="<?php echo $image; ?>" alt="IMG-">
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="row p-t-170">
							<div class="col-md-6 p-b-30">
								<div class="wrap-pic- size2 hov-img-zoom m-l-r-auto">
									<img src="<?php echo $image; ?>" alt="IMG-">
								</div>
							</div>

							<div class="col-md-6 p-t-45 p-b-30">
								<div class="wrap-text- t-center">
									<span class="t-center">
										Alguma
									</span>

									<h3 class="t-center m-b-35 m-t-5 f-glitten color7">
										COISA
									</h3>

									<p class="t-center m-b-22 size3 m-l-r-auto">
										Fusce iaculis, quam quis volutpat cursus, tellus quam varius eros, in euismod lorem nisl in ante. Maecenas imperdiet vulputate dui sit amet vestibulum. Nulla quis suscipit nisl.
									</p>
								</div>
							</div>
						</div>
					<?php }
				}
			} ?>
		</div>
	</section>


	<!-- Seção de Administração -->
	<?php if(isset($_SESSION['isadmin'])){ ?>
	<hr class="m-r-45 m-l-45">

	<section class="section-admin-calendar m-b-40">
		<h2 class="m-t-50 m-b-20 f-glitten fs-50 t-center">
			AMUDAR ISSO AQUI DPS N QUERO QUE FIQUE NESSA ESTRUTURA... OUT ALVEZ SIM?
		</h2>

		<form action="includes/dancers.inc.php" method="post" enctype="multipart/form-data" class="wrap-form-event size22 m-l-r-auto">
			<div class="row">
				<div class="col-md-4">
					<!-- Nome -->
					<span>
						Nome
					</span>

					<div class="wrap-inputname size12 bo3 m-t-3 m-b-23">
						<input class="input- sizefull p-l-20" type="text" name="name" placeholder="Nome">
					</div>
				</div>

				<div class="col-md-4">
					<!-- Data -->
					<span>
						Data
					</span>

					<div class="wrap-inputdate size12 bo3 m-t-3 m-b-23">
						<input class="input- my-calendar sizefull p-l-20" type="text" name="date">
					</div>
				</div>

				<div class="col-md-4">
					<!-- Url -->
					<span>
						Url do Insta
					</span>

					<div class="wrap-inputurl size12 bo3 m-t-3 m-b-23">
						<input class="input- sizefull p-l-20" type="text" name="url">
					</div>
				</div>

				<div class="col-12">
					<!-- Texto -->
					<span>
						Texto
					</span>
					<input name="text" class="textarea- bo-rad-10 size35 bo3 p-l-20 p-t-15 m-b-10 m-t-3"  placeholder="Texto do(a) dançarino(a)" style="background-color: rgb(250, 238, 221);"></textarea>
				</div>

				<div class="col-12 flex-c-m bo-rad-10 bg1 bg5-hover trans-0-4">
					<!-- Imagem -->
					<label for="fileInput" class="m-t-10 m-b-10 color0 pointer">
						<span class="ti-plus"></span> Adicionar foto
					</label>
					<input type="file" name="image" id="fileInput" style="display: none;"/>
				</div>
			</div>

			<div class="wrap-btn-send flex-c-m m-t-13">
				<!-- Button3 -->
				<button type="submit" name="submit_dancers" class="btn3 flex-c-m size36 trans-0-4">
					Enviar
				</button>
			</div>
		</form>
	</section>
	<?php } ?>


    <!-- Footer -->
    <hr class="m-r-45 m-l-45">
    
    <?php include_once 'footer.php' ?>
</body>
</html>