<?php
$q = $_POST["value"];
$txtFile = fopen("TempTemplate2.txt", "r");
$TemplateHtml = fread($txtFile,filesize("TempTemplate2.txt"));
	fclose($txtFile);
echo "$TemplateHtml";
$end = " </body></html>";
$txtHtml = $TemplateHtml.$q.$end;
$htmlFile = fopen(("Temp2.html"), "w");
fwrite($htmlFile, $txtHtml);
fclose($htmlFile);
?>