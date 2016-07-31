<?php 
$uploaddir = "files/";  //set this to where your files should be uploaded.  Make sure to chmod to 777. 
if ($_FILES['file']) { 
  foreach($_FILES['file']['type'] as $key => $value) { 
    $ispdf = end(explode(".",$_FILES['file']['name'][$key]));  //make sure it's a PDF file     
    $ispdf = strtolower($ispdf); 
    if ($value && $ispdf=='pdf') {
            //upload each file to the server 
      $filename = $_FILES['file']['name'][$key]; 
            $filename = str_replace(" ","",$filename); //remove spaces from file name 
            $uploadfile = $uploaddir . $filename; 
           echo move_uploaded_file($_FILES['file']['tmp_name'][$key], $uploadfile); 
          }
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
      ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" /> 
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
<form action="" method="post" enctype = "multipart/form-data" name="form1" id="form1"> 
  <span class="style1">Merge Multiple PDF Files Using PHP </span><br /> 
  <br /> 
  Upload your PDF files below: <br /> 
  <br /> 
  <input name="file[]" type="file" id="file[]" /> 
  <br /> 
  <input name="file[]" type="file" id="file[]" /> 
  <br /> 
  <input name="file[]" type="file" id="file[]" /> 
  <br /> 
  <input name="file[]" type="file" id="file[]" /> 
  <br /> 
  <br /> 
  <input type="submit" name="Submit" value="submit"/> 
  <br /> 
  <br /> 
  <input type="button" name="merge" value="Merge!" onclick="back()"/>  
</form> 
</body> 
</html>