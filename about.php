<?php 
	include_once 'head.php';
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

	input[type="text"], input[type="date"], input[type="time"] {
		width: 100%;
		height: 100%;
		background-color: rgb(250, 238, 221);
		border: none;
		color: #9267b0;
	}

	::-webkit-input-placeholder {
		color: #9267b0;
	}

	<?php if(!isset($_SESSION['isadmin'])){ ?>
	.btn-edit {
		display: none;
	}
	<?php } ?>

	.input-field-subject {
        border: 0;
        background-color: transparent;
        border-bottom: 0.5px solid; 
        font: inherit;
        font-size: 1.125rem;
        padding: .25rem 0;
        width: 100%;
    }

    .input-field-subject:focus, .input-field-subject:valid {
        outline: 0;
        border-bottom: 1px solid;
    }
</style>
<body class="animition" style="background-color: rgb(250, 238, 221);">
	<!-- POP-UP: Editar dançarino -->
    <aside class="section-overlay section-overlay-dancers">
        <div class="overlay overlay-dancerse" style="display: block;">
        </div>

        <!-- Pop-up -->
        <div class="popup-dancers" style="display: block;">
            <!-- Conteúdo -->
			<form class="popup-dancers-content" action="dancers.inc.php" method="POST">
				<div class="wrap-dancers-image flex-c-m">
					<i class="fa fa-camera fs-60" style="padding: 30px; background: grey;"></i>
				</div>

				<div class="dancers-content">
					<div class="wrap-dancers-inputs m-b-20" style="line-height: 1;">
						<span><i class="f-glitten fs-60 color-user">Editar </i></span>
						<span class="f-glitten fs-60 color-user">BAILARINO</span>
					</div>

					<div class="wrap-dancers-inputs p-r-15">
						<span>
							Nome
						</span><br>
						<input type="text" name="name" class="input-field-subject m-b-15">

						<span>
							Data de nascimento
						</span><br>
						<input type="date" name="date" class="input-field-subject m-b-15">

						<span>
							Texto do(a) bailarino(a)
						</span>
						<textarea name="text" class="textarea-contact bo-rad-10 size35 bo-color-user color-user p-r-10 p-l-10 p-t-5 m-t-10 bg4"></textarea>
					</div>

					<div class="wrap-dancers-buttons m-t-20">
						<button class="btn4 bo-color-user color-user btn-url-direct" data-url="includes/delete.inc.php?delete_user">Excluir</button>
						<button class="btn-close-popup btn4 bg-user color0">Cancelar</button>
					</div>
				</div>
			</form>
        </div>
    </aside>


	<!-- Header -->
    <?php include_once 'header.php' ?>


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/dança5.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            SOBRE NÓS
        </h2>
	</section>


    <!-- Nossa História -->
    <section class="section-our_history">
        <div class="wrap-about-title p-b-50">
			<h2 class="m-t-50 m-b-20 f-glitten fs-50 t-center">
				NOSSA HISTÓRIA
			</h2>
        </div>

        <div class="wrap-our_history-text">
            <div class="row p-b-80 p-r-100 p-l-100" style="margin: 0">
                <div class="col-lg-6">
					Com objetivo de valorização do corpo negro e suas potencialidades na sociedade, nascemos em circunstâncias pandemicas para movimentar o cenário artístisco do povo negro de Arraial do Cabo e de municípios vizinhos.<br><br>

					Criado para valorização do corpo negro na dança, o Coletivo Humanos, hoje apresenta novas áreas de atuações. <b>[colocar o texto que o luan mandou pra malu]</b>
                </div>

                <div class="col-lg-6">
					O CAH tem como missão elevar as artes a toda sua potencialidade e alcance tem como propósito inspirar as pessoas com a beleza e vitalidade da mesma.<br><br>

					“Não lutamos por integração ou por separação. Lutamos para sermos reconhecidos como seres humanos.”<br>
					<p class="t-right">— Malcolm X.</p>
                </div>
            </div>
			
			<!-- Banner -->
			<div class="parallax1 parallax100" style="background-image: url(images/am1-26.JPG); background-position: center 0.166667px;">
				<div class="overlay1-parallax t-center"></div>
			</div>
			
			<div class="row p-t-80 p-b-80 p-r-100 p-l-100" style="margin: 0">
                <div class="col-lg-6">
					O Coletivo Artístico hoje tem como primeiro nome a palavra “RESISTÊNCIA”. Na verdade, ela nasceu desse conceito, muito embora não tivéssemos atentado sobre isso. Com um pequeno percentual de coragem, mas grande percentual de força de vontade e trabalho, a família HUMANOS nasceu em 01 de JULHO de 2021. <br><br>

					O elo e a confiança tornaram-se tão fortes, que o termo “RESISTÊNCIA” surgiu espontaneamente, entre os próprios bailarinos, e desde então, esse tratamento familiar continua a encabeçar o trabalho da CIA e assim oferece alternativas para uma vida mais saudável e ativa, bailarinos conscientes de seu próprio corpo e sensíveis às manifestações artísticas.
                </div>

                <div class="col-lg-6">
					Nós acreditamos que a cultura é uma ferramenta de transformação social, alimento de esperança e sonhos de muitas pessoas; 
					Apoio para ministração de oficinas de artes nas escolas, para assim manifestar e fomentar a mesma dentro do ensino educacional.<br><br>

					“A arte sempre me presenteou com grandes conquistas pessoais e profissionais. Poder construir sonhos e realizá-los, não tem preço.”
					<p class="t-right">— Luan Canellas, diretor e fundador.</p>
                </div>
			</div>
        </div>
    </section>


	<!-- Banner -->
    <div class="parallax0 parallax100" style="background-image: url(images/am1-26.JPG); background-position: center 0.166667px;">
		<div class="overlay0-parallax t-center"></div>
	</div>


	<!-- Conheça Luan -->
    <section class="section-know_luan">
        <div class="wrap-luan-title p-b-50">
			<h2 class="m-t-50 m-b-20 f-glitten fs-50 t-center">
				CONHEÇA LUAN CANELLAS
			</h2>

			<p class="t-center">
				Diretor e Fundador do CAH
			</p>
        </div>

        <div class="wrap-our_history-text">
            <div class="row p-b-80 p-r-100 p-l-100" style="margin: 0">
			<?php
			$sql = "SELECT * FROM dancers WHERE dancersName = 'LUAN CANELLAS'";
			$result = mysqli_query($conn, $sql);

			if ($result) {
				$row = mysqli_fetch_assoc($result);
				$id = $row['dancersId'];

				$name = $row['dancersName'];
				$nameParts = explode(' ', $name);
				$firstName = $nameParts[0];
				if(isset($nameParts[1])){
					$secondName = $nameParts[1];
				}

				$date = $row['dancersBirthDate'];
				$birthDate = new DateTime($date);
				$currentAge = new DateTime();
				$diff = $birthDate->diff($currentAge);
				$age = $diff->y;

				$image = "data:image/jpeg;base64," . base64_encode($row['dancersPic']);
				$text = $row['dancersText'];
				$url = $row['dancersUrl']; ?>

                <div class="col-lg-6">
					<?php echo $text?>
                </div>

                <div class="col-lg-6">
				    <div class="wrap-pic-<?php echo $name?> size2 hov-img-zoom m-l-r-auto">
						<img src="<?php echo $image?>" alt="IMG-<?php echo $name?>">
					</div>
                </div>
            </div>
			<?php }?>
        </div>
    </section>


	<!-- Banner -->
    <div class="parallax0 parallax100" style="background-image: url(images/img.JPG); background-position: center 0.166667px;">
		<div class="overlay0-parallax t-center"></div>
	</div>


    <!-- Nossos Artistas/Dançarinos -->
    <section class="p-b-105">
		<div class="wrap-about-title p-b-50">
			<h2 class="m-t-50 m-b-20 f-glitten fs-50 t-center">
				ELENCO
			</h2>
        </div>

		<div class="wrap-artists container">
			<?php
			$sql = "SELECT * FROM dancers WHERE dancersName != 'LUAN CANELLAS' ORDER BY dancersId;";
			$result = mysqli_query($conn, $sql);

			if ($result && mysqli_num_rows($result) > 0) {
				for ($count = 1; $count <= mysqli_num_rows($result); $count++) {
					$row = mysqli_fetch_assoc($result);
					$id = $row['dancersId'];

					$name = $row['dancersName'];
					$nameParts = explode(' ', $name);
					$firstName = $nameParts[0];
					if(isset($nameParts[1])){
						$secondName = $nameParts[1];
					}

					$date = $row['dancersBirthDate'];
					$birthDate = new DateTime($date);
					$currentAge = new DateTime();
					$diff = $birthDate->diff($currentAge);
					$age = $diff->y;

					$image = "data:image/jpeg;base64," . base64_encode($row['dancersPic']);
					$text = $row['dancersText'];
					$url = $row['dancersUrl'];
					
					if($count%2){ ?>
						<div class="row p-t-100">
							<div class="col-md-6 p-t-45 p-b-30">
								<div class="wrap-text-<?php echo $name?> t-center">
									<span class="t-center f-glitten fs-50">
										<?php echo $firstName?>
									</span>

									<?php if(isset($secondName)){ ?>
									<h3 class="t-center m-b-35 m-t-5 f-glitten color7 fs-70">
										<?php echo $secondName?>
									</h3><?php } ?>

									<p class="t-center m-b-22 m-l-r-auto">
										<?php echo $text?>
									</p>
								</div>
							</div>

							<div class="col-md-6 p-b-30 dancer-pic-column pos-relative">
								<div class="wrap-pic-<?php echo $name?> size2 hov-img-zoom m-l-r-auto">
									<img src="<?php echo $image?>" alt="IMG-<?php echo $firstName?>">
									<button class="btn-edit bg4-pattern" style="top: 86%; left: 12%;"><i class="fa fa-edit symbol-btn-edit"></i></button>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="row p-t-100">
							<div class="col-md-6 p-b-30 dancer-pic-column pos-relative">
								<div class="wrap-pic-<?php echo $name?> size2 hov-img-zoom m-l-r-auto">
									<img src="<?php echo $image?>" alt="IMG-<?php echo $firstName?>">
									<button class="btn-edit bg4-pattern" style="top: 72.5%; left: 80%;"><i class="fa fa-edit symbol-btn-edit"></i></button>
								</div>
							</div>

							<div class="col-md-6 p-t-45 p-b-30">
								<div class="wrap-text-<?php echo $name?> t-center">
									<span class="t-center f-glitten fs-50">
										<?php echo $firstName ?>
									</span>

									<?php if(isset($secondName)){ ?>
									<h3 class="t-center m-t-5 m-b-10 f-glitten fs-50 color7">
										<?php echo $secondName?>
									</h3><?php } ?>

									<h6 class="t-center m-b-25">
										<?php echo $age?> anos
									</h6>

									<p class="t-center m-b-22 m-l-r-auto">
										<?php echo $text?>

										<a href="<?php echo $url?>"><i class="fa fa-instagram"></i></a>
									</p>
								</div>
							</div>
						</div>
					<?php } $secondName = null;
				}
			} ?>
		</div>
	</section>


	<!-- Seção de Administração -->
	<?php if(isset($_SESSION['isadmin'])){ ?>
	<hr class="m-r-45 m-l-45">

	<section class="section-admin-calendar m-b-40">
		<h2 class="m-t-50 m-b-20 f-glitten fs-50 t-center">
			ADICIONAR BAILARINO
		</h2>

		<form action="includes/dancers.inc.php" method="post" enctype="multipart/form-data" class="wrap-form-event size22 m-l-r-auto">
			<div class="row">
				<div class="col-md-4">
					<!-- Nome -->
					<span>
						Nome Artístico
					</span>

					<div class="wrap-inputname size12 bo3 m-t-3 m-b-23">
						<input class="input-about sizefull p-l-20" type="text" name="name" placeholder="Nome Artístico">
					</div>
				</div>

				<div class="col-md-4">
					<!-- Data -->
					<span>
						Data
					</span>

					<div class="wrap-inputdate size12 bo3 m-t-3 m-b-23">
						<input class="input-about my-calendar sizefull p-l-20" type="text" name="date">
					</div>
				</div>

				<div class="col-md-4">
					<!-- Url -->
					<span>
						Usuário do Insta (sem o @)
					</span>

					<div class="wrap-inputurl size12 bo3 m-t-3 m-b-23">
						<input class="input-about sizefull p-l-20" type="text" name="url" placeholder="Usuário">
					</div>
				</div>

				<div class="col-12">
					<!-- Texto -->
					<span>
						Texto
					</span>
					<textarea name="text" class="textarea-about bo-rad-10 size35 bo3 p-l-20 p-t-15 m-b-10 m-t-3"  placeholder="Texto do(a) dançarino(a)" style="background-color: rgb(250, 238, 221);"></textarea>
				</div>

				<div class="col-12 t-center m-b-10">
					<p>Deseja pular uma linha no texto? Digite um "&ltbr&gt" ou dois para pular um parágrafo</p>
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
	<script>
		/*[DATERANGEPICKER]
		===========================================================*/
		/* Aqui eu reconfigurei o DateRangePicker para apresentar as datas em Português.
		Créditos do código: https://gist.github.com/fernandosavio/680a2549e417befea930*/
		(function (factory) {
			if (typeof define === 'function' && define.amd) {
				define(['moment'], factory); // AMD
			} else if (typeof exports === 'object') {
				module.exports = factory(require('../moment')); // Node
			} else {
				factory(window.moment); // Browser global
			}
		}(function (moment) {
			return moment.defineLocale('pt-br', {
				months : 'Janeiro_Fevereiro_Março_Abril_Maio_Junho_Julho_Agosto_Setembro_Outubro_Novembro_Dezembro'.split('_'),
				monthsShort : 'Jan_Fev_Mar_Abr_Mai_Jun_Jul_Ago_Set_Out_Nov_Dez'.split('_'),
				weekdays : 'Domingo_Segunda_Terça_Quarta_Quinta_Sexta_Sábado'.split('_'),
				weekdaysShort : 'Dom_Seg_Ter_Qua_Qui_Sex_Sáb'.split('_'),
				weekdaysMin : 'Dom_2ª_3ª_4ª_5ª_6ª_Sáb'.split('_'),
				longDateFormat : {
					LT : 'HH:mm',
					LL : 'D [de] MMMM [de] YYYY',
					LLL : 'D [de] MMMM [de] YYYY [às] LT',
					LLLL : 'dddd, D [de] MMMM [de] YYYY [às] LT'
				}
			});
		}));

		$('.my-calendar').daterangepicker({
			"singleDatePicker": true,
			"showDropdowns": true,
			locale: {
				format: 'DD/MM/YYYY',
				daysOfWeek: moment.weekdaysMin(),
        		monthNames: moment.monthsShort()
			},
		});

		var myCalendar = $('.my-calendar');
		var isClick = 0;

		$(window).on('click',function(){ 
			isClick = 0;
		});

		$(myCalendar).on('apply.daterangepicker',function(){ 
			isClick = 0;
		});

		$('.btn-calendar').on('click',function(e){ 
			e.stopPropagation();

			if(isClick == 1) isClick = 0;   
			else if(isClick == 0) isClick = 1;

			if (isClick == 1) {
				myCalendar.focus();
			}
		});

		$(myCalendar).on('click',function(e){ 
			e.stopPropagation();
			isClick = 1;
		});

		$('.daterangepicker').on('click',function(e){ 
			e.stopPropagation();
		});
	</script>
</body>
</html>