<?php
    require_once('php/classes/simple_html_dom.php');
    $html = file_get_html('https://www.avito.ru/moskva/planshety_i_elektronnye_knigi/planshety-ASgBAgICAUSYAoZO?cd=1');
    echo $html;
