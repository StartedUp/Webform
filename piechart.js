   google.charts.load('current', {'packages':['corechart']});
  // google.charts.setOnLoadCallback(drawChart);
   function drawChart() {
   	var location =Number(document.getElementById('Location').value);
   	var salary =Number(document.getElementById('Salary').value);
   	var technicalExp =Number(document.getElementById('Technical Experience').value);
   	var projectExp =Number(document.getElementById('Project Experience').value);
   	var workHistory =Number(document.getElementById('Stable Work History').value);
   	var scored=(Number(localStorage.getItem("Location"))+Number(localStorage.getItem("Salary"))+Number(localStorage.getItem("Technical Experience"))
      +Number(localStorage.getItem("Project Experience"))+Number(localStorage.getItem("Stable Work History")));
   	var lostScore = 10-scored;
   	var data = google.visualization.arrayToDataTable([
   		['Task', '', { role: "style" }],
   		['Location',     Number(localStorage.getItem("Location")), '#0a290a'],
   		['Salary',      Number(localStorage.getItem("Salary")), '#79d279'],
   		['Tech Exp',  Number(localStorage.getItem("Technical Experience")), '#b3e6b3'],
   		['Project Exp', Number(localStorage.getItem("Project Experience")), '#999999'],
   		['Stable Work-History',    Number(localStorage.getItem("Stable Work History")), '#4d4d4d']
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

      // Wait for the chart to finish drawing before calling the getImageURI() method.
      google.visualization.events.addListener(chart, 'ready', function () {
        piechart.innerHTML = '<img src="' + chart.getImageURI() + '">';
      });
   	chart.draw(view, options);
   }