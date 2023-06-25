$(document).ready(function() {
    // Function to generate a month calendar
    function generateMonthCalendar() {

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
    // Call the updateCalendar function when the page loads
    updateCalendar();
});