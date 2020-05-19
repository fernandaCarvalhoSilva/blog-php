<?php
$target_dir= "uploads/";
$target_file= $target_dir . basename($_FILES["img"]["name"]);
$upload0k= 1;
$imageFileType= strtolower(pathinfo($target_file, PATHINFO_EXTENSION));
if(isset($_POST["submit"])){
	$check= getimagesize($_FILES["img"]["tmp_name"]);
	if($check !== false){
		/*echo "O arquivo é uma imagem - " . $check["mime"] . ".";*/
		echo $target_file;
		$upload0k= 1;
	}
	else{
		echo "O arquivo não é uma imagem";
		$upload0k= 0;
	}
}
?>