<?php
$uploaddir = "files/";  //set this to where your files should be uploaded.  Make sure to chmod to 777. 
  if ($_FILES['file']) { 
    $count =0;
    foreach($_FILES['file']['type'] as $key => $value) { 
      $ispdf = end(explode(".",$_FILES['file']['name'][$key]));   
      $ispdf = strtolower($ispdf); 
      if ($value && $ispdf=='pdf') {
        $filename = $_FILES['file']['name'][$key];
        if ($filename!=$_GET['fileName']) {
        $uploadfile = $uploaddir . $count++.'.pdf'; 
        move_uploaded_file($_FILES['file']['tmp_name'][$key], $uploadfile);
        }
        else{
            $filename = str_replace(" ","",$filename); //remove spaces from file name 
            $uploadfile = $uploaddir . $filename; 
            move_uploaded_file($_FILES['file']['tmp_name'][$key], $uploadfile); 
        }
      }
    }
    include 'PDFMerger/PDFMerger.php';
        $fileName = $_GET['fileName'];
        $files = glob('files/*.{pdf}', GLOB_BRACE);
         $pdf = new PDFMerger;
foreach($files as $file) {
 $pdf->addPDF(''.$file, 'all');
}
        $pdf->merge('file', 'files/'.$fileName.'Merged.pdf');
       //REPLACE 'file' WITH 'browser', 'download', 'string', or 'file' for output options
       //You do not need to give a file path for browser, string, or download - just the name.

  }
  if ($_GET['merged']=='true') {
    $files = glob('files/*'); // get all file names
foreach($files as $file){ // iterate files
  if(is_file($file))
    unlink($file); // delete file
}
  }
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd"> 
<html xmlns="http://www.w3.org/1999/xhtml"> 
<head> 
<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css">

<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>

<!-- Latest compiled JavaScript -->
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
function mergedPdf (argument) {
  window.open('files/<?php echo $fileName ?>Merged.pdf');
  setTimeout(backPage, 2000);
}
function backPage (argument) {
  $.ajax({url: "merge.php",type: 'GET', data : {merged: 'true'}, success: function(result){
    }});
  window.open('../webform.html','_self');
}
  
</script>
</head> 
<body> 
<form action="" method="post" enctype = "multipart/form-data" name="form1" id="form1"> 
  <span class="style1">Merge Multiple PDF Files</span><br /> 
  <br /> 
  Upload your PDF files below: <br /> 
  <br /> 
  <input size="60" name="file[]" type="file" id="file[]" /> 
  <br /> 
  <input size="60" name="file[]" type="file" id="file[]" /> 
  <br /> 
  <input size="60" name="file[]" type="file" id="file[]" /> 
  <br /> 
  <input size="60" name="file[]" type="file" id="file[]" /> 
  <br /> 
  <br /> 
  <input class="btn btn-success" type="submit" name="Submit" value="Merge"/> 

  <input class="btn btn-success" type="button" name="Submit" value="Download" onclick="mergedPdf()"/> 
  <br /> 
  <br />  
</form> 
</body> 
</html>