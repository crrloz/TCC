<?php include_once 'head.php' ?>
    <title>Contate-nos | COLETIVO HUMANOS</title>
</head>
<style>
    .input {
        display: flex;
        flex-direction: column-reverse;
        position: relative;
        padding-top: 1.5rem;
    }

    .input-field {
        border: 0;
        z-index: 1;
        background-color: transparent;
        border-bottom: 2px solid #fff; 
        font: inherit;
        font-size: 1.125rem;
        padding: .25rem 0;
    }

    .input-field:focus, .input-field:valid {
        outline: 0;
        border-bottom: 0.1rem solid black;
    }
</style>
<body>
    <?php include_once 'header.php' ?>


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/fundoteste.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            CONTATO
        </h2>
    </section>


    <!-- Contact form -->
	<section class="section-contact p-t-90 p-b-113">
		<!-- Map -->
		<div class="container">
			<div class="map bo8 bo-rad-10 of-hidden">
				<div class="contact-map size37" id="google_map" data-map-x="40.704644" data-map-y="-74.011987" data-pin="images/icons/icon-position-map.png" data-scrollwhell="0" data-draggable="1"></div>
			</div>
		</div>

		<div class="container">
			<h3 class="tit7 t-center p-b-62 p-t-105">
				Envie-nos uma mensagem!
			</h3>

			<form class="wrap-form-reservation size22 m-l-r-auto">
				<div class="row">
					<div class="col-md-4">
						<!-- Nome -->
						<span class="txt9">
							Nome
						</span>

						<div class="wrap-inputname size12 bo2 m-t-3 m-b-23">
							<input class="sizefull txt10 p-l-20" type="text" name="name" placeholder="Nome">
						</div>
					</div>

					<div class="col-md-4">
						<!-- Email -->
						<span class="txt9">
							Email
						</span>

						<div class="wrap-inputemail size12 bo2 m-t-3 m-b-23">
							<input class="sizefull txt10 p-l-20" type="text" name="email" placeholder="Email">
						</div>
					</div>

					<div class="col-md-4">
						<!-- Telefone -->
						<span class="txt9">
							Telefone (opcional)
						</span>

						<div class="wrap-inputphone size12 bo2 m-t-3 m-b-23">
							<input class="sizefull txt10 p-l-20" type="text" name="phone" placeholder="Telefone">
						</div>
					</div>

					<div class="col-12">
						<!-- Mensagem -->
						<span class="txt9">
							Mensagem
						</span>
						<textarea class="bo-rad-10 size35 bo2 txt10 p-l-20 p-t-15 m-b-10 m-t-3" name="message" placeholder="Mensagem"></textarea>
					</div>
				</div>

				<div class="wrap-btn-booking flex-c-m m-t-13">
					<!-- Button3 -->
					<button type="submit" class="btn3 flex-c-m size36 txt11 trans-0-4">
						Submit
					</button>
				</div>
			</form>

			<div class="row p-t-135">
				<div class="col-sm-8 col-md-4 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6">
							<img src="images/icons/map-icon.png" alt="IMG-ICON">
						</div>

						<div class="flex-col-l">
							<span class="txt5 p-b-10">
								Local
							</span>

							<span class="txt23 size38">
								[...].
							</span>
						</div>
					</div>
				</div>

				<div class="col-sm-8 col-md-3 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6">
							<img src="images/icons/phone-icon.png" alt="IMG-ICON">
						</div>


						<div class="flex-col-l">
							<span class="txt5 p-b-10">
								Ligue-nos
							</span>

							<span class="txt23 size38">
								(+22) 99727-7890
							</span>
						</div>
					</div>
				</div>

				<div class="col-sm-8 col-md-5 col-lg-4 m-l-r-auto p-t-30">
					<div class="dis-flex m-l-23">
						<div class="p-r-40 p-t-6">
							<img src="images/icons/clock-icon.png" alt="IMG-ICON">
						</div>


						<div class="flex-col-l">
							<span class="txt5 p-b-10">
								Horário de Funcionamento
							</span>

							<span class="txt23 size38">
								09:30 AM – 11:00 PM <br/>Todo dia
							</span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</body>