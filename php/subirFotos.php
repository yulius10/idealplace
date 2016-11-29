<?php
/*
    header('Access-Control-Allow-Origin: *');
    $new_image_name = urldecode($_FILES["file"]["name"]).".jpg";
    $rutafinal="/opt/bitnami/apache2/htdocs/idealplace/imagenesPredio/".$new_image_name;
    move_uploaded_file($_FILES["file"]["tmp_name"], $rutafinal);
 * 
 */
    //Allow Headers
    header('Access-Control-Allow-Origin: *');
    //print_r(json_encode($_FILES));
	$target_dir="/opt/bitnami/apache2/htdocs/idealplace/imagenesPredio/";
    $new_image_name = urldecode($_FILES["file"]["name"]).".jpg";
    //Move your files into upload folder
    move_uploaded_file($_FILES["file"]["tmp_name"], $target_dir.$new_image_name);
    
    
?>