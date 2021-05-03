<?php

$data = json_decode(file_get_contents("config.json"));

$items = $data->items;
$socialMedias = $data->social;

?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="node_modules/font_webatlas/webAtlas.css">
    <link rel="stylesheet" href="node_modules/font_webatlas/font-face/webAtlas-original.css">
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/design.css">
    <link rel="stylesheet" href="assets/css/portfolio.css">
    <link href="https://fonts.googleapis.com/css2?family=Rubik:wght@500&display=swap" rel="stylesheet">

    <title>Portfolio Louis Moraes</title>

    <style>
        <?php 
        foreach ($items as $item) {
            echo '#'. $item->id .'.item {background-image:url(assets/content/'. $item->id .'.png);}';
        }
        ?>

        
    </style>
</head>

<body>
    <input type="text" id="inputClipboard" style="display:none" />

    <div id="menuTop">
        PORTFOLIO

        <div class="btns">
            <i id="btn_toggleFullscreen" class="icon fullscreen"></i>
        </div>
    </div>

    <div id="social">
        <?php foreach ($socialMedias as $name => $s) : ?>
            <a class="item" href="<?php echo $s->link; ?>">
                <i class="icon logos <?php echo $s->icon; ?>"></i>
            </a>
        <?php endforeach ?>
    </div>
    <div id="portfolio">
        <?php foreach ($items as $name => $item) : ?>
            <a id="<?php echo $item->id; ?>" class="item" href="<?php echo $item->link; ?>">
                <?php if (file_exists("assets/content/" . $item->id . ".mp4")) : ?>
                    <video src="assets/content/<?php echo $item->id ?>.mp4" loop="true" muted="true"></video>
                <?php endif ?>

                <div class="bottom">
                    <i class="icon <?php echo $item->icon ?>"></i>
                    <?php echo strtoupper($name); ?>
                </div>
            </a>
        <?php endforeach ?>



    </div>

    <div id="btn_arrowLeft" class="btn glass icon arrow2-left"></div>

    </div>

    <script src="node_modules/atom_webatlas/dist/atom.js"></script>
    <script src="node_modules/screenfull/dist/screenfull.js"></script>
    <script src="portfolio.js"></script>
</body>

</html>