<?php
    if($_FILES["photo"]["name"] != '')
    {
        $test = explode(".", $_FILES["photo"]["name"]);
        $extension = end($test);
        $name = rand(100, 999) . '.' . $extension;
        $location = './upload/'.$name;
        move_uploaded_file($_FILES["photo"]["tmp_name"], $location);
        echo '<img src="'.$location.'" height="150" width="255" class="img-thumbnail"/>';
    }
?>