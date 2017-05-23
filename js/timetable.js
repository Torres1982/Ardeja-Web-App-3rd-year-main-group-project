//Monday Timetable (load HTML file)
 $(document).ready(function() {
   $('#monday').click(function() {
     $('#displayInfo').load('monday.html');
     return false;
   });
 });

 //Saturday Timetable (load json file)
 $(document).ready(function() {
   $('#saturday').click(function() {
     $.getJSON('json/saturday.json', function(data) {
       $('#displayInfo').empty();
       $.each(data, function(entryIndex, entry) {
         var html = '<div class = "entry">';
         html += '<h3 class = "class">' + entry['class'] + '</h3>';
         html += '<div class = "time">' + entry['time'] + '</div>';
         html += '<div class = "duration">';
         html += entry['duration'];
			 if (entry['lines']) {
			   html += '<div class = "lines">';
			   $.each(entry['lines'], function(lineIndex, line) {
				 html += '<div class = "singleLine">' + line + '</div>';
			   });
			   html += '</div>';
			 }
         html += '</div>';
         html += '</div>';
         $('#displayInfo').append(html);
       });
     });
     return false;
   });
});

 //Sunday Timetable (load json file)
 $(document).ready(function() {
   $('#sunday').click(function() {
     $.getJSON('json/sunday.json', function(data) {
       $('#displayInfo').empty();
       $.each(data, function(entryIndex, entry) {
         var html = '<div class = "entry">';
         html += '<h3 class = "class">' + entry['class'] + '</h3>';
         html += '<div class = "time">' + entry['time'] + '</div>';
         html += '<div class = "duration">';
         html += entry['duration'];
			 if (entry['lines']) {
			   html += '<div class = "lines">';
			   $.each(entry['lines'], function(lineIndex, line) {
				 html += '<div class = "singleLine">' + line + '</div>';
			   });
			   html += '</div>';
			 }
         html += '</div>';
         html += '</div>';
         $('#displayInfo').append(html);
       });
     });
     return false;
   });
});
