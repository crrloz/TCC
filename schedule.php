<?php include_once 'head.php'; 
if(isset($_GET['event']) && !isset($_SESSION['userid'])){
	header("location: signup.php?error=notlogged");
	exit();
}
?>
    <title>Agenda | COLETIVO HUMANOS</title>
</head>
<?php require_once "css/style.php" ?>
<style>
	.clickable-date {
		border-radius: 50%;
		cursor: pointer;
		background-color: #fdf33e;
	}
	
	td {
		position: relative;
		text-align: center;
		width: 65px;
		height: 65px;
	}

	th {
		padding: 4px;
		text-align: center;
	}

	.date {
        width: 100px;
        height: 100px;
    }

    .description {
        height: 100px;
        width: 90%;
    }

	input {
		width: 100%;
		height: 100%;
		background-color: rgb(250, 238, 221);
		border: none;
		color: #9267b0;
	}

	::-webkit-input-placeholder {
		color: #9267b0;
	}

	.wrap-btn-order {
		position: absolute;
		bottom: 0;
		padding: 2.5% 0;
		left: 50%;
		transform: translateX(-50%);
		width: 100%;
		background-color: rgb(250, 238, 221);
		border-radius: 7px;
	}

	.section-admin section-admin-schedule {
		transition: height 0.5s ease-in-out;
	}

	.bg5-hover:hover {background-color: #FDF33E;}

	.arrow-slick_right {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 60px;
		height: 60px;
		font-size: 18px;
		color: white;
		position: absolute;
		background-color: black;
		bottom: 30%;
		transform: translateY(-50%);
		border-radius: 50%;
		transition: all 0.4s;
		right: 50px;
	}

	.arrow-slick_left {
		display: flex;
		justify-content: center;
		align-items: center;
		width: 60px;
		height: 60px;
		font-size: 18px;
		color: white;
		position: absolute;
		background-color: black;
		bottom: 30%;
		transform: translateY(-50%);
		border-radius: 50%;
		transition: all 0.4s;
		left: 50px;
	}

	.calendar-carousel {
		display: flex;
	}

	.month {
		width: 100%;
	}

	::-webkit-scrollbar {
		width: 0px;
	}

	.popup-event-content {
		padding: 10px 40px 0 40px;
	}
</style>
<body class="animsition" style="background-color: rgb(250, 238, 221);">
	<!-- POP-UP: Evento -->
	<?php if(isset($_GET['event'])){
	$eventName = $_GET['event'];

	$sql = "SELECT * FROM events WHERE eventsName = ?;";
	$stmt = mysqli_stmt_init($conn);
	if (!mysqli_stmt_prepare($stmt, $sql)) {
		header("location: schedule.php?error=stmtfailed");
		exit();
	}
	mysqli_stmt_bind_param($stmt, "s", $eventName);
	mysqli_stmt_execute($stmt);

	$result = mysqli_stmt_get_result($stmt);

	if ($row = mysqli_fetch_assoc($result)) {
	$eventsDate = $row['eventsDate'];
	$dateComponents = explode('-', $eventsDate);
	$eventsDate = $dateComponents[2] . '/' . $dateComponents[1] . '/' . $dateComponents[0];
	?>
	<aside class="section-overlay section-overlay-event">
		<div class="overlay overlay-event">
		</div>

		<!-- Pop-up -->
		<div class="popup-event">
			<!-- Botão Esconder Popup -->
			<button class="btn-hide-popup ti-close color7-hov trans-0-4"></button>

			<!-- Conteúdo -->
			<div class="popup-event-content t-left">
				<?php $eventsPic = "data:image/jpeg;base64,". base64_encode($row['eventsPic'])?>
				<div class="event-image sizefull m-t-30 m-b-30 p-t-250 bo-rad-4" style="background-image: url('<?php echo $eventsPic?>');">
				</div>

				<div class="event-name m-t-10 m-l-25">
					<h3 class="fs-50 f-glitten"><?php echo $row['eventsName']; ?></h3>
				</div>

				<div class="event-date m-l-25">
					<p class="fs-25"><?php echo $eventsDate; ?><span class="fs-20"> • <?php echo "R$". $row['eventsPrice'];?></span></p>
				</div>

				<div class="event-description m-l-25 m-t-10">
					<p class="fs-20 color5"><?php echo $row['eventsDesc']; ?><br><br><br><br></p>
				</div>

				<!-- Botão Pedir -->
				<div class="wrap-btn-order flex-c-m">
					<!-- Button3 -->
					<button class="btn3 flex-c-m size36 trans-0-4">
						AGENDAR
					</button>
				</div>
			</div>
		</div>
	</aside>
	<?php } mysqli_stmt_close($stmt); } ?>


	<!-- Header -->
    <?php include_once 'header.php' ?>


	<!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/inaraemulher.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            AGENDA
        </h2>
    </section>


	<?php
		setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');

		$nextEventDate = false;
		$nextEventName = false;
		$nextEventDay = false;

		$sql = "SELECT eventsName, eventsDate FROM events WHERE eventsDate >= CURDATE() ORDER BY eventsDate ASC LIMIT 1;";
		$stmt = mysqli_stmt_init($conn);
		if (!mysqli_stmt_prepare($stmt, $sql)) {
		} else {
			mysqli_stmt_execute($stmt);
			$result = mysqli_stmt_get_result($stmt);
			if ($row = mysqli_fetch_assoc($result)) {
				$nextEventDate = $row['eventsDate'];
				$nextEventName = $row['eventsName'];
				$nextEventDay = date('d', strtotime($nextEventDate));
			}
		}
		mysqli_stmt_close($stmt);
	?>


	<!-- Calendário -->
	<section class="section-calendar t-center m-t-30 m-b-40">
		<div class="next-event flex-sa-m m-r-30 m-l-30">
			<div class="date pos-relative bg1 t-center">
				<?php if ($nextEventDate) { ?>
					<span class="ab-c-m f-glitten fs-40 color0"><?php echo $nextEventDay;?></span>
					<span class="ab-c-b color0"><?php echo date('D', strtotime($nextEventDate)); ?></span>
				<?php } ?>
			</div>

			<div class="description bg2 t-center flex-c-m">
				<?php if ($nextEventDate) { ?>
					<span class="color0">O próximo evento "<b><?php echo $nextEventName; ?></b>" será realizado no dia <?php echo date('d', strtotime($nextEventDate)); ?>. Agende já o seu ingresso!</span>
				<?php } else { ?>
					<span class="color0">Nenhum evento agendado.</span>
				<?php } ?>
			</div>
		</div>

		<div class="wrap-calendar flex-c-m pos-relative">
			<button class="arrow-slick_right"><i class="fa fa-angle-right" aria-hidden="true"></i></button>
			<button class="arrow-slick_left"><i class="fa fa-angle-left" aria-hidden="true"></i></button>
    
			<div id="calendar" class="m-t-80 m-b-40 t-center"></div>
		</div>

		<div class="wrap-calendar-description">
			<p>As datas em cor <span class="">Amarela</span> representam as datas com eventos.</p>
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


	<section class="section-admin section-admin-schedule m-b-40 dis-none">
		<hr class="m-r-150 m-l-150">
		<h2 class="m-t-50 m-b-20 f-glitten fs-50 t-center">
			ADICIONAR EVENTO
		</h2>

		<form action="includes/events.inc.php" method="post" enctype="multipart/form-data" class="wrap-form-event size22 m-l-r-auto">
			<div class="row">
				<div class="col-md-4">
					<!-- Nome -->
					<span>
						Nome
					</span>

					<div class="wrap-inputname size12 bo3 m-t-3 m-b-23">
						<input class="input-schedule sizefull p-l-20" type="text" name="name" placeholder="Nome">
					</div>
				</div>

				<div class="col-md-4">
					<!-- Data -->
					<span>
						Data
					</span>

					<div class="wrap-inputdate size12 bo3 m-t-3 m-b-23">
						<input class="input-schedule my-calendar sizefull p-l-20" type="text" name="date">
					</div>
				</div>

				<div class="col-md-4">
					<!-- Horário -->
					<span>
						Horário
					</span>

					<div class="wrap-inputtime size12 bo3 m-t-3 m-b-23">
						<input class="input-schedule sizefull p-l-20" type="time" name="time">
					</div>
				</div>

				<div class="col-md-6">
					<!-- Quantidade -->
					<span>
						Quantidade
					</span>

					<div class="wrap-inputquantity size12 bo3 m-t-3 m-b-23">
						<input class="input-schedule sizefull p-l-20" type="number" name="quantity" placeholder="Quantidade de ingressos">
					</div>

					<p>
						Caso não haja um limite, digite um valor grande
					</p>

				</div>

				<div class="col-md-6">
					<!-- Ingressos -->
					<span>
						Preço
					</span>

					<div class="wrap-inputprice size12 bo3 m-t-3 m-b-23">
						<input class="input-schedule sizefull p-l-20" type="text" pattern="[0-9]+([.][0-9]+)?" name="price" placeholder="Preço por ingresso">
					</div>

					<p>
						Para valores com centavos, utilize "." e não ","
					</p>
				</div>

				<div class="col-12 m-t-7">
					<!-- Descrição -->
					<span>
						Descrição do evento
					</span>
					<textarea class="textarea-schedule bo-rad-10 size35 bo3 p-l-20 p-t-15 m-b-10 m-t-3" name="descri" placeholder="Descrição" style="background-color: rgb(250, 238, 221);"></textarea>
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
				<button type="submit" class="btn3 flex-c-m size36 trans-0-4">
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

		/*[ADQUIRIR DATAS]
		===========================================================*/
		$(document).ready(function() {
			function getDatesFromServer() {
				$.ajax({
					url: 'includes/dates.inc.php',
					type: 'GET',
					dataType: 'json',
					success: function(data) {
						var dates = data.dates;
						renderCalendar(dates);
					},
					error: function(xhr, status, error) {
						console.error('Erro na requisição AJAX');
					}
				});
			}

			function sendDatesToServer(dates) {
				$.ajax({
					url: 'schedule.php',
					type: 'POST',
					dataType: 'json',
					contentType: 'application/json',
					data: JSON.stringify(dates),
					success: function(response) {
						console.log('Dados enviados com sucesso para schedule.php');
					},
					error: function(xhr, status, error) {
						console.error('Erro ao enviar os dados para schedule.php');
					}
				});
			}

			function renderCalendar(dates) {
				var today = new Date();
				var currentYear = today.getFullYear();
				var currentMonth = today.getMonth();

				var daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();

				var monthNames = [
					'JANEIRO', 'FEVEREIRO', 'MARÇO', 'ABRIL',
					'MAIO', 'JUNHO', 'JULHO', 'AGOSTO',
					'SETEMBRO', 'OUTUBRO', 'NOVEMBRO', 'DEZEMBRO'
				];

				var currentMonthName = monthNames[currentMonth];

				var header = $('<h2 class="m-b-20 f-glitten fs-50"></h2>').text(currentMonthName + ' de ' + currentYear);

				var calendarContainer = $('#calendar');
				calendarContainer.append(header);

				var nextEventDate = findNextEvent(dates);
				if (nextEventDate) {
					var nextEventHeader = $('<h3 class="fs-20 m-b-30"></h3>').text('Próximo Evento: ' + nextEventDate.toLocaleDateString('pt-BR'));
					calendarContainer.append(nextEventHeader);
				}

				var table = $('<table></table>');

				var headerRow = $('<tr></tr>');
				var weekdays = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];

				for (var i = 0; i < weekdays.length; i++) {
					var th = $('<th></th>').text(weekdays[i]);
					headerRow.append(th);
				}

				table.append(headerRow);

				var firstDayOfWeek = new Date(currentYear, currentMonth, 1).getDay();

				var totalCells = daysInMonth + firstDayOfWeek;

				for (var day = 1; day <= totalCells; day++) {
					if ((day - 1) % 7 === 0) {
						var row = $('<tr></tr>');
					}

					var cell = $('<td></td>');
					if (day > firstDayOfWeek) {
						cell.text(day - firstDayOfWeek);
						var date = currentYear + '-' + (currentMonth + 1).toString().padStart(2, '0') + '-' + (day - firstDayOfWeek).toString().padStart(2, '0');
						var url = findUrlByDate(date, dates);
						if (url) {
							cell.attr('id', date);
							cell.addClass('clickable-date');
						}
					}

					row.append(cell);

					if (day % 7 === 0 || day === totalCells) {
						table.append(row);
					}
				}

				calendarContainer.append(table);

				$('.clickable-date').on('click', function(event) {
					var clickedDate = event.target.id;
					var url = findUrlByDate(clickedDate, dates);
					if (url) {
						window.location.href = url;
					}
				});

				sendDatesToServer(dates);
			}

			function findUrlByDate(date, dates) {
				for (var i = 0; i < dates.length; i++) {
					if (dates[i].data === date) {
						return dates[i].url;
					}
				}

				return null;
			}

			function findNextEvent(dates) {
				var today = new Date();
				var nextEventDate = null;

				for (var i = 0; i < dates.length; i++) {
					var currentDate = new Date(dates[i].data + 'T00:00:00');

					if (currentDate >= today && (nextEventDate === null || currentDate < nextEventDate)) {
						nextEventDate = currentDate;
					}
				}

				return nextEventDate;
			}

			getDatesFromServer();
		});
	</script>
</body>
