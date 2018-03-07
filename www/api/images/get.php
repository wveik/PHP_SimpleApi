<?php

    $id = isset($_GET['id']) ? $_GET['id'] : die();

    $filename = "../../images/$id.jpg";

    if (file_exists($filename)) {
        echo "<img src='$filename' />";
    } else {
        echo json_encode(
            array("message" => "No image found.")
        );
    }

    
?>