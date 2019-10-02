<?php
    const EXCLUDES = ".:..:.git:assets:node_modules";

    $dir = scandir(".");
    $dir = array_filter($dir, function($arg) {
        return is_dir($arg);
    });
    $dir = array_filter($dir, function($arg) {
        $excludes = explode(":", EXCLUDES);
        return !in_array($arg, $excludes);
    });
    sort($dir);
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" href="favicon.png">

    <link rel="stylesheet" href="node_modules/font_webatlas/dist/css/webAtlas-icons.css" />
    <link rel="stylesheet" href="node_modules/font_webatlas/dist/css/font-face/webAtlas-icons.css" />
    <link rel="stylesheet" href="node_modules/font_webatlas/dist/css/font-face/webAtlas-alphanumeric.css" />
    <link rel="stylesheet" href="assets/css/style.css">
    <link rel="stylesheet" href="assets/css/design.css">
    <link rel="stylesheet" href="assets/css/portfolio.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:700&display=swap" rel="stylesheet"> 

    <title>Portfolio Louis Moraes</title>
</head>
<body>
    <input type="text" id="inputClipboard" style="display:none" />

    <div id="menuTop">
        PORTFOLIO

        <!-- <div id="btn_toggleFullscreen" class="btn icon arrow-resize-up"></div> -->
    </div>

    <div id="portfolio">
        <?php foreach ($dir as $d): ?>
            <a
                href="<?php echo $d; ?>"
                class="item"
                <?php
                    if(file_exists($d."/favicon.png"))
                        echo "style='background-image: url(". $d ."/favicon.png);'";
                ?>
            >
                <?php
                    echo ucfirst($d);
                ?>
            </a>
        <?php endforeach; ?>
    </div>

    <div id="btn_arrowUp" class="btn glass icon arrow-up"></div>

    </div>

<script src="node_modules/atom_webatlas/dist/atom.js"></script>
<script src="node_modules/screenfull/dist/screenfull.js"></script>
<script>
    var body = document.body;
    var menuTop = document.getElementById('menuTop');
    var portfolio = document.getElementById('portfolio');
    var btn_arrowUp = document.getElementById('btn_arrowUp');
    var btn_toggleFullscreen = document.getElementById('btn_toggleFullscreen');


    onscroll = function() {
        if (getScrollY() === 0) {
            btn_arrowUp.style.opacity = "0";
            btn_arrowUp.style.cursor = "default";
        }
        else {
            btn_arrowUp.style.opacity = "1";
            btn_arrowUp.style.cursor = "pointer";
        }
    };

    btn_arrowUp.onclick = function() {
        if(getScrollY() !== 0) {
            window.scroll(0, 0);
        }
    };

    btn_toggleFullscreen.onclick = function() {
        if (screenfull.enabled) {
            if (window.Promise === undefined) {
                alert('Cette fonction n\'est pas disponible pour votre navigateur.');
                return false;
            }

            toggleClass("arrow-resize-up", this);
            toggleClass("arrow-resize-down", this);

            screenfull.toggle();
        }
    };

</script>
</body>
</html>