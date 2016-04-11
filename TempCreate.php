<?php
$q = $_POST["value"];
$txtFile = fopen("TempTemplate.txt", "r");
$TemplateHtml = fread($txtFile,filesize("TempTemplate.txt"));
	fclose($txtFile);
echo "$TemplateHtml";
$end = " </body></html>";
$txtHtml = $TemplateHtml.$q.$end;
$htmlFile = fopen(("Temp.html"), "w");
fwrite($htmlFile, $txtHtml);
fclose($htmlFile);
?>