   google.charts.load('current', {'packages':['corechart']});
   google.charts.setOnLoadCallback(drawChart);
   function drawChart() {
   	var location =Number(document.getElementById('LOCATION').value);
   	var salary =Number(document.getElementById('SALARY').value);
   	var tecnicalExp =Number(document.getElementById('TEC-EXP').value);
   	var projectExp =Number(document.getElementById('PJT-EXP').value);
   	var workHistory =Number(document.getElementById('WORK').value);
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
   		pieStartAngle:100	
   	};

   	var chart = new google.visualization.PieChart(document.getElementById('piechart'));

   	chart.draw(data, options);
   }