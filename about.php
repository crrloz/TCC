<?php 
	include_once 'head.php';

	if(isset($_SESSION['isadmin']) && isset($_GET['id'])){ 
		$id = $_GET['id'];
		$sql = "SELECT * FROM dancers WHERE dancersId = ?";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
			header("location: about.php?error=stmtfailed");
			exit();
		}
		mysqli_stmt_bind_param($stmt, "i", $id);
		mysqli_stmt_execute($stmt);

		$result = mysqli_stmt_get_result($stmt);

		if ($row = mysqli_fetch_assoc($result)) {
			$name = $row['dancersName'];

			$dateParts = explode('-', $row["dancersBirthDate"]);
			$date = $dateParts[2] . '/' . $dateParts[1] . '/' . $dateParts[0];

			$image = $row['dancersPic'];
			$text = $row['dancersText'];
			$url = $row['dancersUrl'];
		} else {
			header("location: about.php?error=dancernotfound");
			exit();
		}
		mysqli_stmt_close($stmt);
	}
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

	
	.btn-edit {
		display: none;
	}

	<?php if(isset($_SESSION['isadmin'])){ ?>
	.wrap-pic-dancer:hover > .btn-edit {
		display: block;
	}
	<?php }?>

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
<body class="animsition" style="background-color: rgb(250, 238, 221);">
	<!-- POP-UP: Editar dançarino -->
	<?php if(isset($_SESSION['isadmin']) && isset($_GET['id'])){ ?>
    <aside class="section-overlay section-overlay-dancers">
        <div class="overlay overlay-dancers" style="display: block;">
        </div>

        <!-- Pop-up -->
        <div class="popup-dancers" style="display: block;">
            <!-- Conteúdo -->
			<form class="popup-dancers-content" action="includes/dancers.inc.php" enctype="multipart/form-data" method="POST">
				<div class="wrap-dancers-image flex-c-m">
					<label for="image" class="m-t-10 m-b-10 color0 pointer">
						<i class="fa fa-camera fs-60" style="padding: 30px; background: grey;"></i>
					</label>
					<input type="file" name="image" id="image" style="display: none;"/>
				</div>

				<div class="dancers-content">
					<div class="wrap-dancers-inputs m-b-20" style="line-height: 1;">
						<span><i class="f-glitten fs-60 color-user">Editar </i></span>
						<span class="f-glitten fs-60 color-user">BAILARINO</span>
						<p>Caso não queira modificar a foto atual do bailarino, não selecione outra.</p>
					</div>

					<div class="wrap-dancers-inputs p-r-15">
						<input type="hidden" name="id" value="<?php echo $_GET['id']?>">

						<span>
							Nome
						</span><br>
						<input type="text" name="name" value="<?php echo $name?>" class="input-field-subject m-b-15">

						<span>
							Data de nascimento
						</span><br>
						<input type="text" name="date" value="<?php echo $date?>" class="input-field-subject m-b-15">

						<span>
							Url
						</span><br>
						<input type="text" name="url" value="<?php echo $url?>" class="input-field-subject m-b-15">

						<span>
							Texto do(a) bailarino(a)
						</span>
						<input type="text" name="text" value="<?php echo $text?>" class="input-field-subject m-b-15"></textarea>
					</div>

					<div class="wrap-dancers-buttons m-t-20">
						<button type="submit" name="edit_dancers" class="btn4 bo-color-0 color6" style="background: #7F4AA4; color: white;">Editar</button>
						<button type="submit" name="delete_dancers" class="btn4 bo-color-0 color6 m-r-10">Excluir</button>
						<input type="button" value="CANCELAR" class="btn-close-popup btn4 color5" style="border-color: black;">
					</div>
				</div>
			</form>
        </div>
    </aside>
	<?php } ?>


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

					Criado para valorização do corpo negro na dança, o Coletivo Humanos, hoje apresenta novas áreas de atuações.
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

			if($result) {
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
					<?php echo $text;
					if(isset($url)){ ?><br><br>
					<button class="btn4 bo-color-1"><a class="color7" href="<?php echo $url?>" target="_blank"><i class="fa fa-instagram m-r-5"></i>Ver</a></button>
					<?php } ?>
                </div>

                <div class="col-lg-6">
				    <div class="wrap-pic-dancer size2 hov-img-zoom m-l-r-auto">
						<img src="<?php echo $image?>" alt="IMG-<?php echo $name?>">
					</div>
                </div>
            </div>
			<?php } $secondName = null; ?>
        </div>
    </section>


	<!-- Banner -->
    <div class="parallax0 parallax100" style="background-image: url(images/img.JPG); background-position: center 0.166667px;">
		<div class="overlay0-parallax t-center"></div>
	</div>


	<!-- O que é um coletivo -->
    <section class="section-what_is">
        <div class="wrap-what-title p-b-50">
			<h2 class="m-t-50 m-b-20 f-glitten fs-50 t-center">
				O QUE É UM COLETIVO ARTÍSTICO?
			</h2>
        </div>

        <div class="wrap-what_is-text">
            <div class="row p-b-80 p-r-100 p-l-100" style="margin: 0">
                <div class="col-lg-6">
					Um coletivo artístico é um grupo de artistas que trabalham juntos para realizar espetáculos ou entretenimento. Existem muitos tipos diferentes de coletivos artísticos, algumas empresas são formadas por membros de estúdios ou por artistas autônomos. Em geral alguns grupos de academias são formados para fins de competição. Muitas companhias são estabelecidas nas cidades para estar perto de teatros ou outros locais de arte performática.
                </div>

                <div class="col-lg-6">
					Há evidências que mostram o início das trupes nos tempos romano e grego. Esses grupos eram originalmente para musicais e se apresentavam nos cinemas. As companhias se apresentavam para a classe alta como uma forma de entretenimento. À medida que a música evoluiu, também evoluíram os tipos de companhias. Nos últimos anos, grupos são vistos em programas de televisão musical.
                </div>
            </div>
		</div>
	</section>
			

	<!-- Banner -->
	<div class="parallax1 parallax100" style="background-image: url(images/am1-26.JPG); background-position: center 0.166667px;">
		<div class="overlay1-parallax t-center"></div>
	</div>


	<section class="section-black_art">
        <div class="wrap-art-title p-b-50">
			<h2 class="m-t-50 m-b-20 f-glitten fs-50 t-center">
				A ARTE NEGRA<br>NO CONTEXTO DO BALÉ BRASILEIRO
			</h2>
        </div>

        <div class="wrap-art-text">	
			<div class="row p-b-80 p-r-100 p-l-100" style="margin: 0">
                <div class="col-lg-6">
					Em uma sociedade permeada pela persistência do racismo e pela escassez de representatividade negra em posições de destaque nas artes e na sociedade, desponta o Coletivo Artístico Humanos. Em meio a um cenário pandêmico no ano de 2020, Luan Canellas decidiu tomar uma iniciativa para contornar a problemática da ausência de corpos negros nos grupos de dança, que majoritariamente eram compostos por indivíduos brancos. Dessa forma, o coletivo emergiu com a proposta de valorizar o corpo negro nas artes cênicas, enfatizando sua excelência técnica no balé, na dança contemporânea, no jazz, entre outras formas de expressão, sem jamais objetificar essas corporalidades.<br><br>


					Embora enfrentem inúmeras dificuldades e obstáculos nesse meio, os artistas negros encontram no Coletivo Artístico Humanos um espaço dedicado à promoção do corpo negro nas artes cênicas, ao fortalecimento da cultura negra e à necessidade de proporcionar um ambiente seguro e acolhedor para artistas e ativistas negras.
                </div>

                <div class="col-lg-6">
					A arte negra no contexto do balé brasileiro ganha uma relevância ímpar, uma vez que reflete a diversidade cultural de nossa nação e a importância de assegurar a representatividade racial no âmbito artístico. <br><br>

					O objetivo primordial do Coletivo é criar um ambiente inclusivo, diversificado e propício para o avanço do balé brasileiro, com a participação ativa de artistas e ativistas negros. Nessa perspectiva, o Coletivo Artístico Humanos assume um papel fundamental não apenas para o balé brasileiro, mas para todo o universo das artes cênicas, representando uma organização cultural de grande relevância.<br><br>

					“Os desafios de ser artista em um país que desconsidera e, ultimamente, chega a demonizar a educação e a cultura, são enormes para qualquer pessoa. E, quando se trata de pessoas negras, esse desafio aumenta. Assim queremos buscamos a cada instante ampliar o cenário artístico para o nosso povo.”

					<p class="t-right">— Luan Canellas, diretor e fundador.</p>
                </div>
			</div>
        </div>
    </section>


	<!-- Banner -->
    <div class="parallax0 parallax100" style="background-image: url(images/img.JPG); background-position: center 0.166667px;">
		<div class="overlay0-parallax t-center"></div>
	</div>


    <!-- Nossos Artistas/Dançarinos -->
    <section class="p-b-80">
		<div class="wrap-about-title p-b-50">
			<h2 class="m-t-50 m-b-20 f-glitten fs-50 t-center">
				ELENCO
			</h2>
        </div>

		<div class="wrap-artists container">
			<?php
			$sql = "SELECT * FROM dancers WHERE dancersName != 'LUAN CANELLAS' ORDER BY dancersId;";
			$result = mysqli_query($conn, $sql);

			if($result && mysqli_num_rows($result) > 0) {
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
									<span class="t-center f-glitten fs-50" style="line-height: 0.7;">
										<?php echo $firstName?>
									</span>

									<?php if(isset($secondName)){ ?>
									<h3 class="t-center m-b-10 m-t-5 f-glitten color7 fs-70" style="line-height: 0.8;">
										<?php echo $secondName?>
									</h3><?php } ?>

									<h6 class="t-center m-b-25">
										<?php echo $age?> anos
									</h6>

									<p class="t-center m-b-22 m-l-r-auto">
										<?php echo $text;
										if(isset($url)){ ?><br><br>
										<button class="btn4 bo-color-1"><a class="color7" href="<?php echo $url?>" target="_blank"><i class="fa fa-instagram m-r-5"></i>Ver</a></button>
										<?php } ?>
									</p>
								</div>
							</div>

							<div class="col-md-6 p-b-30 dancer-pic-column pos-relative flex-c-m">
								<div class="wrap-pic-dancer size2 m-l-r-auto">
									<div class="sizefull m-l-r-auto" style="width: 390px; height: 390px; background-image: url(<?php echo $image?>)"></div>
									<button class="btn-edit" style="top: 86%; left: 13%; background: #D99E07;" data-id="<?php echo $id; ?>"><i class="fa fa-edit symbol-btn-edit"></i></button>
								</div>
							</div>
						</div>
					<?php } else { ?>
						<div class="row p-t-100">
							<div class="col-md-6 p-b-30 dancer-pic-column pos-relative flex-c-m">
								<div class="wrap-pic-dancer size2 m-l-r-auto">
									<div class="sizefull m-l-r-auto" style="width: 390px; height: 390px; background-image: url(<?php echo $image?>)"></div>
									<button class="btn-edit" style="top: 80.5%; left: 80%; background: #D99E07;" data-id="<?php echo $id; ?>"><i class="fa fa-edit symbol-btn-edit"></i></button>
								</div>
							</div>

							<div class="col-md-6 p-t-45 p-b-30">
								<div class="wrap-text-<?php echo $name?> t-center">
									<span class="t-center f-glitten fs-50" style="line-height: 0.7;">
										<?php echo $firstName ?>
									</span>

									<?php if(isset($secondName)){ ?>
									<h3 class="t-center m-t-5 m-b-10 f-glitten fs-50 color7" style="line-height: 0.8;">
										<?php echo $secondName?>
									</h3><?php } ?>

									<h6 class="t-center m-b-25">
										<?php echo $age?> anos
									</h6>

									<p class="t-center m-b-22 m-l-r-auto">
										<?php echo $text;
										if(isset($url)){ ?><br><br>
										<button class="btn4 bo-color-1"><a class="color7" href="<?php echo $url?>" target="_blank"><i class="fa fa-instagram m-r-5"></i>Ver</a></button>
										<?php } ?>
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
	<!-- Botão de Toggle para Administração -->
	<div class="wrap-toggle-btn flex-c-m">
		<button id="adminToggleBtn" class="admin-toggle-btn">
			<span id="btnToggleIcon" class="ti-angle-down"></span>
		</button>
	</div>

	<section class="section-admin section-admin-calendar m-b-40 dis-none">
		<hr class="m-r-150 m-l-150">
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
					<p>Deseja pular uma linha no texto? Digite um "&ltbr&gt" para pular uma linha ou dois para pular um parágrafo</p>
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

		/*[APARECER E REMOVER POPUP]
    	===========================================================*/
		$('.btn-edit').on('click', function(event) {
			event.preventDefault();
			
			var dancerId = $(this).data('id');
			
			window.location.href = 'about.php?id=' + dancerId;
		});

		 

		$('.btn-close-popup').on('click', function(){
			$('.section-overlay').css('display','none');
		});
	</script>
</body>
</html>