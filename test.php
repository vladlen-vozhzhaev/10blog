<?php
    require_once('php/classes/simple_html_dom.php');
    $html = file_get_html('https://www.avito.ru/moskva/planshety_i_elektronnye_knigi/planshety-ASgBAgICAUSYAoZO?cd=1');
?>
<!doctype html>
<html lang="ru">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
        <title>Парсер Avito</title>
    </head>
    <body>
    <div class="container">
        <div class="row">
            <? foreach ($html->find('div[data-marker="item"]') as $div):
                $dataMarker = $div->find('li',0)->getAttribute('data-marker');
                $src = explode('slider-image/image-', $dataMarker)[1];
                $href = $div->find('a', 0)->href;
            ?>
                <div class="card col-sm-3">
                    <img src="<?= $src ?>" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title"><?= $div->find('h3', 0)->plaintext ?></h5>
                        <p class="card-text">
                            <?= $div->find('div.geo-georeferences-Yd_m5', 0) ?>
                            <hr>
                            <strong>Цена:</strong> <?= $div->find('meta[itemprop="price"]',0)->content ?>руб.
                        </p>
                        <a href="/avitoItem.php?url=<?= $href ?>&src=<?= $src ?>" class="btn btn-primary w-100">Подробнее >></a>
                    </div>
                </div>
            <?endforeach;?>

        </div>
    </div>



    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    </body>
</html>
