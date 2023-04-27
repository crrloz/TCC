// Wait for the DOM to be ready
$(document).ready(function() {
	// Handle form submission
	$('form').submit(function(event) {
		// Prevent default form submission behavior
		event.preventDefault();

		// Get the selected calendar type
		var calendarType = $('#calendar-type').val();

		// Generate the appropriate calendar based on the selected type
		if (calendarType === 'day') {
			// Generate a single day calendar
			generateDayCalendar();
		} else if (calendarType === 'week') {
			// Generate a week calendar
			generateWeekCalendar();
		} else if (calendarType === 'month') {
			// Generate a month calendar
			generateMonthCalendar();
		}
	});

	// Function to generate a single day calendar
	function generateDayCalendar() {
		// Clear any existing calendar content
		$('.calendar').empty();

		// Get the current date
		var today = new Date();

		// Create a table to display the calendar
		var table = $('<table>').addClass('table');

		// Create the table header
		var headerRow = $('<tr>');
		headerRow.append($('<th>').text('Time'));
		headerRow.append($('<th>').text('Event'));
		table.append(headerRow);

		// Create the table rows for the day
		for (var i = 0; i < 24; i++) {
			var hour = i < 10 ? '0' + i : i;
			var start = new Date(today.getFullYear(), today.getMonth(), today.getDate(), i, 0, 0);
			var end = new Date(today.getFullYear(), today.getMonth(), today.getDate(), i + 1, 0, 0);
			var row = $('<tr>');
			row.append($('<td>').text(hour+ ':00'));
            row.append($('<td>').text(''));
            table.append(row);
        }
    
        // Add the table to the calendar container
        $('.calendar').append(table);
    }
    
    // Function to generate a week calendar
    function generateWeekCalendar() {
        // Clear any existing calendar content
        $('.calendar').empty();
    
        // Get the current date
        var today = new Date();
        var weekStart = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay() + 1);
        var weekEnd = new Date(today.getFullYear(), today.getMonth(), today.getDate() - today.getDay() + 7);
    
        // Create a table to display the calendar
        var table = $('<table>').addClass('table');
    
        // Create the table header
        var headerRow = $('<tr>');
        headerRow.append($('<th>').text('Time'));
        for (var i = 0; i < 7; i++) {
            var date = new Date(weekStart);
            date.setDate(date.getDate() + i);
            headerRow.append($('<th>').text(date.toLocaleDateString()));
        }
        table.append(headerRow);
    
        // Create the table rows for the week
        for (var j = 0; j < 24; j++) {
            var hour = j < 10 ? '0' + j : j;
            var row = $('<tr>');
            row.append($('<td>').text(hour + ':00'));
            for (var k = 0; k < 7; k++) {
                var date = new Date(weekStart);
                date.setDate(date.getDate() + k);
                row.append($('<td>').text(''));
            }
            table.append(row);
        }
    
        // Add the table to the calendar container
        $('.calendar').append(table);
    }
    
    // Function to generate a month calendar
    function generateMonthCalendar() {
        // Clear any existing calendar content
        $('.calendar').empty();
    
        // Get the current date
        var today = new Date();
        var monthStart = new Date(today.getFullYear(), today.getMonth(), 1);
        var monthEnd = new Date(today.getFullYear(), today.getMonth() + 1, 0);
    
        // Create a table to display the calendar
        var table = $('<table>').addClass('table');
    
        // Create the table header
        var headerRow = $('<tr>');
        headerRow.append($('<th>').text('Week'));
        for (var i = 0; i < 7; i++) {
            var day = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'][i];
            headerRow.append($('<th>').text(day));
        }
        table.append(headerRow);
    
        // Create the table rows for the month
        var currentRow = $('<tr>');
        var currentWeek = 1;
        for (var j = 1; j <= monthEnd.getDate(); j++) {
            var date = new Date(today.getFullYear(), today.getMonth(), j);
            var day = date.getDay();
            if (j === 1) {
                // Fill in the empty cells at the start of the first week
                for (var k = 0; k < day; k++) {
                    currentRow.append($('<td>'));
                }
            }
            currentRow.append($('<td>').text(j));
            if (day === 6) {
                // End the current row at the end of the week
                currentRow.prepend($('<td>').text(currentWeek));
                table.append(currentRow);
                currentRow = $('<tr>');
                currentWeek++;
            }
        }

        // Fill in the empty cells at the end of the last week
	var lastDay = monthEnd.getDay();
	for (var m = lastDay + 1; m < 7; m++) {
		currentRow.append($('<td>'));
	}

	// Add the final row to the table
	currentRow.prepend($('<td>').text(currentWeek));
	table.append(currentRow);

	// Add the table to the calendar container
	$('.calendar').append(table);
}

// Function to update the calendar based on the selected period
function updateCalendar() {
	var period = $('#period').val();
	if (period === 'day') {
		generateDayCalendar();
	} else if (period === 'week') {
		generateWeekCalendar();
	} else if (period === 'month') {
		generateMonthCalendar();
	}
}

// Call the updateCalendar function when the page loads
updateCalendar();

// Call the updateCalendar function when the period select box is changed
$('#period').change(function() {
	updateCalendar();
});

});