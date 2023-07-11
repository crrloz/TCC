<?php include_once 'head.php'; ?>
    <title>Agenda | COLETIVO HUMANOS</title>
</head>
<?php require_once "css/style.php" ?>
<style>
    h2 {
        font-family: Glitten;
        color: #7F4AA4;;
        text-transform: uppercase;
    }
    #calendar {
  width: 100%;
  font-family: Arial, sans-serif;
}

table {
  width: 100%;
  border-bottom: 1px solid #ccc;
}

th,
td {
  text-align: center;
  padding: 10px;
  border-bottom: 1px solid #ccc;
}

th,td:hover {
    color: #D99E07;;
}

td {
    transition: 0.4s;
    cursor: pointer;
}
</style>
<body class="animsition" style="background-color: rgb(250, 238, 221);">
    <!-- Header -->
    <?php include_once 'header.php' ?>


    <!-- Title Page -->
    <section class="bg-title-page flex-c-m p-t-160 p-b-80 p-l-15 p-r-15" style="background-image: url(images/fundoteste.jpg);">
        <h2 class="t-center f-glitten color0 fs-80">
            AGENDA
        </h2>
    </section>

    <!-- Calendário -->
    <section class="wrap-calendar" style="padding: 70px;">
        <div id="calendar"></div>
    </section>


    <!-- Footer -->
    <?php include_once 'footer.php' ?>
</body>
<script>
    function createCalendar() {
	// Limpa qualquer conteúdo de calendário existente
	var calendarContainer = document.getElementById('calendar');
	calendarContainer.innerHTML = '';
  
	// Obtém a data atual
	var today = new Date();
	var currentYear = today.getFullYear();
	var currentMonth = today.getMonth();
  
	// Obtém a quantidade de dias no mês atual
	var daysInMonth = new Date(currentYear, currentMonth + 1, 0).getDate();
  
	// Cria o cabeçalho do calendário com o mês e ano atual
	var header = document.createElement('h2');
	header.textContent = new Date(currentYear, currentMonth).toLocaleDateString('pt-BR', {
	  month: 'long',
	  year: 'numeric'
	});
	calendarContainer.appendChild(header);
  
	// Cria a tabela do calendário
	var table = document.createElement('table');
  
	// Cria a linha do cabeçalho da semana
	var headerRow = document.createElement('tr');
	var weekdays = ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'];
	for (var i = 0; i < weekdays.length; i++) {
	  var th = document.createElement('th');
	  th.textContent = weekdays[i];
	  headerRow.appendChild(th);
	}
	table.appendChild(headerRow);
  
	// Obtém o dia da semana do primeiro dia do mês
	var firstDayOfWeek = new Date(currentYear, currentMonth, 1).getDay();
  
	// Calcula o número de células necessárias no calendário
	var totalCells = daysInMonth + firstDayOfWeek;
  
	// Cria as células do calendário
	for (var day = 1; day <= totalCells; day++) {
	  if ((day - 1) % 7 === 0) {
		// Cria uma nova linha no início de cada semana
		var row = document.createElement('tr');
	  }
  
	  var cell = document.createElement('td');
	  if (day > firstDayOfWeek) {
		// Define o número do dia para células além do primeiro dia da semana
		cell.textContent = day - firstDayOfWeek;
	  }
  
	  // Adiciona a célula à linha atual
	  row.appendChild(cell);
  
	  if (day % 7 === 0 || day === totalCells) {
		// Adiciona a linha à tabela no final de cada semana ou no final do calendário
		table.appendChild(row);
	  }
	}
  
	// Adiciona a tabela ao contêiner do calendário
	calendarContainer.appendChild(table);
  }
  
  // Chama a função para criar o calendário
  createCalendar();
</script>
</html>