var body = document.body;
var menuTop = document.getElementById('menuTop');
var portfolio = document.getElementById('portfolio');
var btn_arrowLeft = document.getElementById('btn_arrowLeft');
var btn_toggleFullscreen = document.getElementById('btn_toggleFullscreen');

var items = document.querySelectorAll('#portfolio .item');
var mobileEnabled = false;


onload = function () {

    items.forEach(i => {
        i.addEventListener('mouseenter', function (e) {
            var video = i.firstElementChild;
            if (video.tagName === "VIDEO") {
                video.style.opacity = "1";
                video.play();
            }
        });

        i.addEventListener('mouseleave', function (e) {
            var video = i.firstElementChild;
            if (video.tagName === "VIDEO") {
                video.style.opacity = "0";
                video.pause();
            }
        });
    });
};

onwheel = function (e) {
    if (wheelDirection(e) === "DOWN") {
        portfolio.scrollLeft += 50;
    }
    else if (wheelDirection(e) === "UP") {
        portfolio.scrollLeft -= 50;
    }

    majArrowLeft();
};

onkeydown = function (e) {
    var key = getKey(e);

    if (key === "ArrowRight") {
        portfolio.scrollLeft += 330;
    }
    else if (key === "ArrowLeft") {
        portfolio.scrollLeft -= 330;
    }
};

btn_arrowLeft.onclick = function () {
    portfolio.scrollLeft = 0;
};

btn_toggleFullscreen.onclick = function () {
    if (screenfull.enabled) {
        if (window.Promise === undefined) {
            alert('Cette fonction n\'est pas disponible pour votre navigateur.');
            return false;
        }

        toggleClass("fullscreen", this);
        toggleClass("arrow-resize-down", this);

        screenfull.toggle();
    }
};

function majArrowLeft() {
    if (portfolio.scrollLeft > 100) {
        btn_arrowLeft.style.opacity = "1";
        btn_arrowLeft.style.cursor = "pointer";
    }
    else {
        btn_arrowLeft.style.opacity = "0";
        btn_arrowLeft.style.cursor = "default";
    }
}

function enableMobile() {
    portfolio.style.overflow = "scroll";
}

ontouchstart = function () {
    if (!mobileEnabled) {
        enableMobile();
        mobileEnabled = true;
    }
}

function triggerEvent(ele, e) {
    if (document.createEvent) {
        ele.dispatchEvent(new Event(e));
    }
    else {
        ele.fireEvent(e, event);
    }
}

