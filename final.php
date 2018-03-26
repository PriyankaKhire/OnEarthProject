<!DOCTYPE html>
<html>
<head>
<?php
//Function to create folders if they dont exist.
function create_folder($f) {
	if(!file_exists($f))
	{
		mkdir($f, 0777, true);
	}
}

//Funtion to display alert box
function alert($msg) {
    echo '<script type="text/javascript">alert("' . $msg . '")</script>';
}

//Function to convert pdf to png
function pdf2png($pdf_file, $file_path) {
	//Create output images folder
	$images_folder = "images/";
	create_folder($images_folder);
	//Get file name without .pdf extension
	$image_file = preg_replace('/\\.[^.\\s]{3}$/', '', $pdf_file);
	$target_images_folder = $images_folder.$image_file;
	$target_images = $images_folder.$image_file."/".$image_file;
	create_folder($target_images_folder);
	//Run imagemagick on cmd
	echo exec('magick '.$file_path.' '.$target_images.'.png');
	
	//Display the images urls
	
	$imagess = glob($target_images."*.png");
	foreach($imagess as $i) {
		$address = "localhost".$_SERVER['REQUEST_URI']."?image=".$i;
		echo "<a href=final.php?image=".$i.">".$address."</a>";
		echo "<br/>";
	}
	
}

//Getting images
//---------------
if(isset($_GET['image']))
{
	echo '<center><img src="'.$_GET['image'].'"/></center>';
}


//Uploading a pdf file
//---------------------
if(isset($_FILES["fileToUpload"]))
{
	$uploads_dir = 'uploads/';
	$file_name = basename($_FILES["fileToUpload"]["name"]);
	$target_file = $uploads_dir.basename($_FILES["fileToUpload"]["name"]);
	$file_extention = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));
	
	//Check if file is pdf
	if($file_extention != "pdf")
	{
		if($file_extention == "" && $file_name == "")
		{
			alert("No file selected to upload");
		}else {
			alert("Sorry only PDF files are allowed");
		}
	} else {
		//Upload the file 
		create_folder($uploads_dir);
		if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {			
			pdf2png($file_name, $target_file);
			alert("The file ". basename( $_FILES["fileToUpload"]["name"]). " has been uploaded.");
		} else {
			alert("Sorry, there was an error uploading your file.");
		}
	}
}



?>
</head>
<body>

<center>
<form action="final.php" method="post" enctype="multipart/form-data">
    <h1>Select image to upload:</h1><br/>
    <input type="file" name="fileToUpload" id="fileToUpload">
    <input type="submit" value="Upload Image" name="submit">
</form>
</center>

</body>