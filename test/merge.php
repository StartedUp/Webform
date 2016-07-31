<?php 
$uploaddir = "files/";  //set this to where your files should be uploaded.  Make sure to chmod to 777. 
if ($_FILES['file']) { 
  $command = "";
  foreach($_FILES['file']['type'] as $key => $value) { 
    $ispdf = end(explode(".",$_FILES['file']['name'][$key]));  //make sure it's a PDF file     
    $ispdf = strtolower($ispdf); 
    if ($value && $ispdf=='pdf') { 
            //upload each file to the server 
      $filename = $_FILES['file']['name'][$key]; 
            $filename = str_replace(" ","",$filename); //remove spaces from file name 
            $uploadfile = $uploaddir . $filename; 
            move_uploaded_file($_FILES['file']['tmp_name'][$key], $uploadfile); 
            // 
            //build an array for the command being sent to output the merged PDF using pdftk 
            $command = $command." files/".$filename; 
            // 
          }
        }
        include 'PDFMerger/PDFMerger.php';
        $fileName = $_GET['fileName'];
        $pdf = new PDFMerger;
        $pdf->addPDF('files/Prithvi.pdf', 'all')
        ->addPDF('files/Prithvi.pdf', 'all')
        ->merge('file', 'files/'.$fileName.'Merged.pdf');
       //REPLACE 'file' WITH 'browser', 'download', 'string', or 'file' for output options
       //You do not need to give a file path for browser, string, or download - just the name.
      }
      ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.1/js/bootstrap.min.js"></script>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.1/css/bootstrap.min.css" rel="stylesheet">
<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
<title>Merge Multiple PDF Files Using PHP and pdftk</title> 
<style type="text/css"> 
<!-- 
body { 
    font-family: Georgia, "Times New Roman", Times, serif; 
    font-size: 12px; 
    color: #333333; 
    width: 500px; 
    margin: 50px auto 0px auto; 
} 
.style1 {font-size: 24px} 
--> 
</style>
<script type="text/javascript">
function back (argument) {
  window.open('files/<?php echo $fileName ?>Merged.pdf');
  setTimeout(backPage, 2000);
}
function backPage (argument) {
  window.open('../webform.html','_self');
}
  
</script>
</head> 
<body> 
<form action="" method="post" name="form1" id="form1"> 
  <span class="style1">Merge Multiple PDF Files Using PHP </span><br /> 
  <br /> 
  Upload your PDF files below: <br /> 
  <br /> 
  <input class="btn btn-success" name="file[]" type="file" id="file[]" /> 
  <br /> 
  <input class="btn btn-success" name="file[]" type="file" id="file[]" /> 
  <br /> 
  <input class="btn btn-success" name="file[]" type="file" id="file[]" /> 
  <br /> 
  <input class="btn btn-success" name="file[]" type="file" id="file[]" /> 
  <br /> 
  <br /> 
  <input class="btn btn-success" type="button" name="Submit" value="Merge!" onclick="back()"/> 
  <br /> 
  <br /> 
  <a href="http://www.johnboy.com/about-us/news/merge-multiple-pdf-files-with-php">Back to article  
  </a> 
</form> 
</body> 
</html>