   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart() {
   	var location =Number(document.getElementById('Location_Score').value);
   	var salary =Number(document.getElementById('Salary_Score').value);
   	var tecnicalExp =Number(document.getElementById('TEC_Experience_Score').value);
   	var projectExp =Number(document.getElementById('PJT_Experience_Score').value);
   	var workHistory =Number(document.getElementById('Work_History_Score').value);
   	var scored=(location+salary+tecnicalExp+projectExp+workHistory);
   	var lostScore = 10-scored;
   	var data = google.visualization.arrayToDataTable([
   		['Task', 'Scores obtained'],
   		['Location',     location],
   		['Salary',      salary],
   		['Tecnical Experience',  tecnicalExp],
   		['Project Experience', projectExp],
   		['Stable Work-History',    workHistory],
   		['unscored', lostScore]
   		]);
   	document.getElementById('percentage').value=(scored*10)+"%";
   	document.getElementById('score').value=scored+"/10"
   	var options = {
   		backgroundColor:'#f0f0f5',
   		title: 'Score Chart',
   		is3D: true,
   		pieStartAngle:100,
         colors: ['#e0440e', '#ffff00', '#ffb84d', '#0033cc', '#00802b', '#c653c6']
   	};

   	var chart = new google.visualization.PieChart(document.getElementById('piechart'));

   	chart.draw(data, options);
   }