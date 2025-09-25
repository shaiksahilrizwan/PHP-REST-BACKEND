<?php
    $url = "http://localhost:3000";
    $json = file_get_contents($url);
    print_r(json_decode($json));
?>