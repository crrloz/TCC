<?php include_once 'head.php' ?>
    <title>Contate-nos | COLETIVO HUMANOS</title>
</head>
<?php require_once "css/style.php" ?>
<style>
	input {
		width: 100%;
		height: 100%;
		background-color: rgb(250, 238, 221);
		border: none;
	}
</style>
<body class="animsition" style="background-color: rgb(250, 238, 221);">
    <?php include_once 'header.php' ?>


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/dança5.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            CONTATO
        </h2>
    </section>


    <!-- Contact form -->
	<section class="section-contact p-b-113">
		<div class="container">
			<h3 class="tit7 t-center p-b-62 p-t-105">
				Envie-nos uma mensagem!
			</h3>

			<form class="wrap-form-reservation size22 m-l-r-auto">
				<div class="row">
					<div class="col-md-4">
						<!-- Nome -->
						<span>
							Nome
						</span>

						<div class="wrap-inputname size12 bo3 m-t-3 m-b-23">
							<input class="input-contact sizefull p-l-20" type="text" name="name" placeholder="Nome">
						</div>
					</div>

					<div class="col-md-4">
						<!-- Email -->
						<span>
							Email
						</span>

						<div class="wrap-inputemail size12 bo3 m-t-3 m-b-23">
							<input class="input-contact sizefull p-l-20" type="text" name="email" placeholder="Email">
						</div>
					</div>

					<div class="col-md-4">
						<!-- Telefone -->
						<span>
							Telefone (opcional)
						</span>

						<div class="wrap-inputphone size12 bo3 m-t-3 m-b-23">
							<input class="input-contact sizefull p-l-20" type="text" name="phone" placeholder="Telefone">
						</div>
					</div>

					<div class="col-12">
						<!-- Mensagem -->
						<span>
							Mensagem
						</span>
						<textarea class="textarea-contact bo-rad-10 size35 bo3 p-l-20 p-t-15 m-b-10 m-t-3" name="message" placeholder="Mensagem" style="background-color: rgb(250, 238, 221);"></textarea>
					</div>
				</div>

				<div class="wrap-btn-send flex-c-m m-t-13">
					<!-- Button3 -->
					<button type="submit" class="btn3 flex-c-m size36 trans-0-4">
						Enviar
					</button>
				</div>
			</form>

			<div class="row p-t-135">
				<div class="col-sm-8 col-md-3 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6 p-b-10">
							<img src="images/icons/phone-icon.png" alt="IMG-ICON">
						</div>


						<div class="flex-col-l">
							<span class="p-b-10 tt-up">
								<b>Ligue-nos</b>
							</span>

							<span class="size38">
								(22) 99727-7890
							</span>
						</div>
					</div>
				</div>

				<div class="col-sm-8 col-md-5 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6 p-b-10">
							<img src="images/icons/clock-icon.png" alt="IMG-ICON">
						</div>


						<div class="flex-col-l">
							<span class="p-b-10 tt-up">
								<b>Horário de Funcionamento</b>
							</span>

							<span class="size38">
								09:30 AM – 11:00 PM <br/>
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>


	<!-- Footer -->
    <?php include_once 'footer.php' ?>
</body>