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
   		['Task', '', { role: "style" }],
   		['Location',     location, '#d95f02'],
   		['Salary',      salary, '#ffff00'],
   		['Tecnical Experience',  tecnicalExp, '#ffb84d'],
   		['Project Experience', projectExp, '#7570b3'],
   		['Stable Work-History',    workHistory, '#1b9e77']
   		]);
   	document.getElementById('percentage').value=(scored*10)+"%";
   	document.getElementById('score').value=scored+"/10";
      var view = new google.visualization.DataView(data);
      view.setColumns([0, 1,
                       { calc: "stringify",
                         sourceColumn: 1,
                         type: "string",
                         role: "annotation" },
                       2]);
   	var options = {
   		backgroundColor:'#f0f0f5',
   		title: 'Score Chart',
      legend: { position: 'none' },
      hAxis: {
      color: '#7570b3',
    }
   	};

   	var chart = new google.visualization.ColumnChart(document.getElementById('piechart'));

   	chart.draw(view, options);
   }