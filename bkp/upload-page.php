<?php
if(count($_FILES['uploads']['filesToUpload'])) {
	foreach ($_FILES['uploads']['filesToUpload'] as $file) {
	    
		$newFilePath = "./videos/" . $_FILES['upload']['name'];
		echo $file;
		
	}
}
?>