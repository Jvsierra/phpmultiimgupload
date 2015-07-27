<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8" />
<title>PHP Multi Image Uploader</title>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!-- Latest compiled and minified CSS -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

<!-- Optional theme -->
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap-theme.min.css">

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
</head>
<body>
<?php
if (empty($_FILES)) {
  echo "<center><h1>Please, select the files</center>";
} else {
   $number_add = 0;
    foreach ($_FILES['file']['name'] as $key => $name) {
        $_FILES['file']['size'][$key];
        if ($_FILES['file']['error'][$key] == 0) { 
            if (!file_exists("files/" . $_FILES['file']['name'][$key])) {
               $link = "files/" . $_FILES['file']['name'][$key];
               $name = $_FILES['file']['name'][$key];
            } else {
               $link = "files/" . $number_add .'_'. $_FILES['file']['name'][$key];
               $name = $number_add .'_'. $_FILES['file']['name'][$key];
               $number_add++;
            }
            move_uploaded_file($_FILES['file']['tmp_name'][$key], $link);
            $uploaded[] = $name;
        }
    }
}
?>
<br>
<div class="container">
<div class="row">
<div class="jumbotron">
<form  method="post" action="" enctype="multipart/form-data">
  <p><input type="file" name="file[]" id="file_upload" class="form-control" multiple="multiple" accept="image/*" /></p>
 <button onClick="$('#upload_progress').show(1500);" class="btn btn-success" />Upload</button>
</form>
</div></div></div>

<div id=" jumbotron" style="">
<center><h1>Upload files will appear here</h1></center>
<?php 
if(!empty($uploaded)){
	foreach($uploaded as $name){
		echo '<center>';
		echo '<img src="files/', $name,'" class="img img-responsive" width="300" height="300">	' ;
		echo '<a href="files/', $name,'">', $name, '</a>';
		echo '</center>';
		
		}
	?>
    
	
	<?php
	}
?>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
</body>

</html>
