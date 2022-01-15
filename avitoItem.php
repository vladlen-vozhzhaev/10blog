<?php
    require_once('php/classes/simple_html_dom.php');
    $url = "https://www.avito.ru".$_GET['url'];
    $src = $_GET['src'];
    $html = file_get_html($url);
    echo "<img src='$src'>";