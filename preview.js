function previewForm(){
	var name = document.getElementById('Name').value;
	var mobile = document.getElementById('Mobile').value;
	var email = document.getElementById('Email').value;
	var jobTitle = document.getElementById('JobTitle').value;
	var location = document.getElementById('Location').value;
	//var mailOption = document.getElementById('Schedule_Interview').value;
	var locationScore = document.getElementById('Location_Score').value;
	var salaryScore = document.getElementById('Salary_Score').value;
	var techExpScore = document.getElementById('TEC_Experience_Score').value;
	var pjtExpScore = document.getElementById('PJT_Experience_Score').value;
	var workExpScore = document.getElementById('Work_History_Score').value;
	var positive1 = document.getElementById('pos1').value;
	var positive2 = document.getElementById('pos2').value;
	var positive3 = document.getElementById('pos3').value;
	var concern1 = document.getElementById('conc1').value;
	var concern2 = document.getElementById('conc2').value;
	var concern3 = document.getElementById('conc3').value;
	var comment = document.getElementById('comment').value;
	var linkedin = document.getElementById('linkedin').value;
	if (name=="") {alert("Fill Name")}
	else if (mobile=="") {alert("Fill Mobile")}
	else if (email=="") {alert("Fill Email")}
	else if (jobTitle=="") {alert("Fill JobTitle")}
	else if (location=="") {alert("Fill Location")}
	//else if (mailOption=="") {alert("Fill MailOption")}
	else if (locationScore=="") {alert("Fill Location_Score")}
	else if (salaryScore=="") {alert("Fill Salary_Score")}
	else if (techExpScore=="") {alert("Fill TEC_Experience_Score")}
	else if (pjtExpScore=="") {alert("Fill PJT_Experience_Score")}
	else if (workExpScore=="") {alert("Fill Work_History_Score")}
	else if (positive1=="") {alert("Fill positive1")}
	else if (positive2=="") {alert("Fill positive2")}
	else if (positive3=="") {alert("Fill positive3")}
	else if (concern1=="") {alert("Fill concern1")}
	else if (concern2=="") {alert("Fill concern2")}
	else if (concern3=="") {alert("Fill concern3")}
	else if (comment=="") {alert("Fill comment")}
	//else if (linkedin=="") {alert("Fill linkedin")}
	else{
	$("[name='previewData']").show();
		$("[name='formData']").hide();
	};
}