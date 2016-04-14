<?php
$q = $_POST["value"];
$txtFile = fopen("TempTemplate2.html", "r");
$TemplateHtml = fread($txtFile,filesize("TempTemplate2.html"));
	fclose($txtFile);
echo "$TemplateHtml";
$end = " </body></html>";
$txtHtml = $TemplateHtml.$q.$end;
$htmlFile = fopen(("TempTemplate2.html"), "w");
fwrite($htmlFile, $txtHtml);
fclose($htmlFile);
?>