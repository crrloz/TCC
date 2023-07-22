<?php include_once 'head.php'; 
if(isset($_GET['event']) && !isset($_SESSION['userid'])){
	header("location: signup.php?error=notlogged");
	exit();
} include_once 'includes/dbh.inc.php'
?>
    <title>Agenda | COLETIVO HUMANOS</title>
</head>
<?php require_once "css/style.php" ?>
<style>
	.clickable-date {
		cursor: pointer;
		background-color: yellow;
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

	.btn-date {
		position: absolute;
		background-color: purple;
		color: white;
		border-radius: 50%;
		top: 55%;
		left: 55%;
		width: 40px;
		height: 40px;
	}
</style>
<body class="animsition" style="background-color: rgb(250, 238, 221);">
	<!-- Header -->
    <?php include_once 'header.php' ?>


	<!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/inaraemulher.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            AGENDA
        </h2>
    </section>


	<!-- Calendário -->
	<section class="section-calendar t-center">
		<div class="wrap-calendar flex-c-m">
			<div id="calendar" class="m-t-80 m-b-40"></div>
		</div>

		<div class="wrap-calendar-description">
			<p>As datas em cor <span class="">AA</span> representam as datas com eventos.</p>
		</div>
	</section>


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

    if ($row = mysqli_fetch_assoc($result)) { ?>
	<!-- POP-UP: Evento -->
	<aside class="section-overlay-event">
		<div class="overlay-event">
		</div>

		<!-- Pop-up -->
		<div class="popup-event">
			<!-- Botão Esconder Popup -->
            <button class="btn-hide-popup ti-close color7-hov trans-0-4"></button>

            <!-- Conteúdo -->
			<div class="popup-event-content t-left">
				<div class="event-image sizefull" style="background-image: url('data:image/jpeg;base64,<?php echo base64_encode($row['eventsPic']) ?>');">

				</div>

				<div class="event-name m-t-40 m-l-25">
					<h3 class="fs-50 f-glitten"><?php echo $row['eventsName']; ?></h3>
				</div>

				<div class="event-description m-l-25">
					<p class="fs-25"><?php echo $row['eventsDesc']; ?></p>
				</div>
			</div>
			
		</div>
	</aside>
	<?php } 

    mysqli_stmt_close($stmt); } ?>
	
	
	<?php if(isset($_SESSION['isadmin'])){ ?>
	<hr class="m-r-45 m-l-45">

	<!-- Seção do Administrador -->
	<section class="section-admin-calendar t-center">
		<form action="includes/events.inc.php" method="post" class="add-event-form">
			<input class="my-calendar sizefull p-l-20 bo3" type="text" name="date">
			<input class="bo3" type="text" name="name" placeholder="Nome">

			<textarea class="textarea-schedule bo-rad-10 bo3 p-l-20 p-t-15 m-b-10 m-t-3 m-r-60 m-l-60" style="width: 80%; min-height: 180px;" name="descri" placeholder="Descrição"></textarea>

			<!-- Button3 -->
			<div class="wrap-btn-send flex-c-m m-t-13">
				<input type="submit" placeholder="Adicionar" class="btn3 flex-c-m size36 trans-0-4">
			</div>
		</form>
	</section>
	<?php } ?>


	<!-- Footer -->
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
				success: function(dates) {
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

				var header = $('<h2></h2>').text(new Date(currentYear, currentMonth).toLocaleDateString('pt-BR', {
					month: 'long',
					year: 'numeric'
				}));

				var calendarContainer = $('#calendar');
				calendarContainer.append(header);

				var nextEventDate = findNextEvent(dates);
				if (nextEventDate) {
					var nextEventHeader = $('<h3></h3>').text('Próximo Evento: ' + nextEventDate.toLocaleDateString('pt-BR'));
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

							var button = $('<button></button>');
							var icon = $('<i></i>').addClass('fa fa-calendar');
							button.addClass('btn-date');
							button.append(icon);
							cell.append(button);
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
