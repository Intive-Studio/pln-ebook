let with_audio = true;
let currentlySpeaking = false;
var voices = [];
let current_pages = [];
var wowBookInit;
$(document).ready(function () {
    var pathname = window.location.hash;

    $("#pin").click(function () {
        $(this).addClass('pinned');
        localStorage.setItem('last', pathname);
        $(".indi").html("account_circle");
    });

    $(".pinned").click(function () {
        // window.location = localStorage.getitem('last');
        // localStorage.clear();
        alert("boom");
        $(".indi").html("home");
    });

    $('#ww').click(function () {
        $(this).hide();
    });


    voices = speechSynthesis.getVoices();
    setTimeout(() => {
        voices = speechSynthesis.getVoices();
        speak();
    }, 500);

    setTimeout(() => {

        //initialization book
        $('#katalog').wowBook({
            height: 600,
            width: 1066.67,
            centeredWhenClosed: true,
            hardcovers: true,
            turnPageDuration: 500,
            numberedPages: [1, 0],
            flipSound: true,
            zoomStep: 0.2,
            zoomMax: 5,
            isOnPage: true,
            controls: {
                zoomIn: '.btn-zoomin',
                zoomOut: '.btn-zoomout',
                next: '.next',
                back: '.prev',
                first: '.cov',
                last: '.bcov',
                slideShow: '.slideshow',
                flipSound: '.flipsound',
                fullscreen: '.btn-fullscreen'
            },
            scaleToFit: "#book-container",
            onFullscreenError: function () {
                var msg = "Fullscreen failed.";
                if (self != top) msg = "The frame is blocking full screen mode. Click on 'remove frame' button above and try to go full screen again."
                alert(msg);
            },
            onShowPage: function (e, page) {
                wowBookInit = e;
                // pause audio and vide smoothly
                $('#katalog').find('video').each(function () {
                    $(this).get(0).pause();
                    $(this).get(0).currentTime = 0;
                });

                $('#katalog').find('audio').each(function () {
                    $(this).get(0).pause();
                    $(this).get(0).currentTime = 0;
                });

                onShowPage(page, e);

            }
        }).css({
            'display': 'none',
            'margin': 'auto'
        }).fadeIn(1000);


        onShowPage(wowBookInit.pages[wowBookInit.currentPage], wowBookInit);

        if (!with_audio) {
            $('.btn-audio').find('i').addClass('fa-volume-off').removeClass('fa-volume-up');
        } else {
            $('.btn-audio').find('i').addClass('fa-volume-up').removeClass('fa-volume-off');
        }
    }, 1000);
});

$('#so').click(function () {
    $('#ww').hide();
})

// fungsi fullscreen
function fullscreen() {
    if ((document.fullScreenElement && document.fullScreenElement !== null) ||
        (!document.mozFullScreen && !document.webkitIsFullScreen)) {
        if (document.documentElement.requestFullScreen) {
            document.documentElement.requestFullScreen();
        } else if (document.documentElement.mozRequestFullScreen) {
            document.documentElement.mozRequestFullScreen();
        } else if (document.documentElement.webkitRequestFullScreen) {
            document.documentElement.webkitRequestFullScreen(Element.ALLOW_KEYBOARD_INPUT);
        }
    } else {
        if (document.cancelFullScreen) {
            document.cancelFullScreen();
        } else if (document.mozCancelFullScreen) {
            document.mozCancelFullScreen();
        } else if (document.webkitCancelFullScreen) {
            document.webkitCancelFullScreen();
        }
    }
}


// nampilkan navigasi ketika layar kecil
$('.li-icon-res').hide();

var oke = false;
$('.li-icon-res-menu').click(function () {
    if (oke == false) {
        $('.li-icon-res').show();
        oke = true;
    } else {
        $('.li-icon-res').hide();
        oke = false;
    }
})

function highlightText(start, end, element, voice_name) {
    if (voice_name == "Google Bahasa Indonesia") {
        element.addClass('highlight');
    } else {
        element.removeClass('highlight');
        const text = element.text();
        const highlightedText = text.slice(0, start) + '<span class="highlight">' + text.slice(start, end) + '</span>' + text.slice(end);
        element.html(highlightedText);
    }
}

function resetHighlight(element) {
    element.text(element.text())
    element.removeClass('highlight');
}

function speak(element) {
    try {
        const text = $(element).text();

        // Cek apakah browser mendukung Web Speech API
        if ('speechSynthesis' in window) {
            const speech = new SpeechSynthesisUtterance(text);
            const desiredLanguage = 'en-US'; // Desired language (e.g., English, United States)

            speech.rate = 0.95; // Speech rate (adjust as needed)
            speech.pitch = 1.0; // Speech pitch (adjust as needed)
            speech.volume = 1.0; // Speech volume (adjust as needed)

            // get all voices from object to json
            voices = voices.filter(voice => voice.lang.includes(desiredLanguage));
            var name_options = [
                'Goggle US English',
                'Samantha',
                'Microsoft David Desktop - English (United States)',
                'Alex',
            ];

            // get all voices based on name options
            var selectedVoice = voices.find(function (voice) {
                return name_options.includes(voice.name);
            });

            // Set the selected voice (or the first available voice if not found)
            speech.voice = selectedVoice || voices[0];

            currentlySpeaking = true;
            speech.onend = () => {
                currentlySpeaking = false;
                playMedia();
            };

            speechSynthesis.speak(speech);
        } else {
            alert('Maaf, browser Anda tidak mendukung fitur Text-to-Speech.');
        }

    } catch (error) {
        alert(error);
    }
}

function playMedia() {
    let videos = [];
    let audios = [];
    current_pages.forEach((page) => {
        $(page).find('video').each(function () {
            videos.push(this);
        });

        $(page).find('audio').each(function () {
            audios.push(this);
        });
    });

    setTimeout(() => {
        videos.forEach((video) => {
            $(video).get(0).play();
            // on video play mute background sound volume to 0 with smooth transition
            $(video).on('play', function () {
                $('#backsound').animate({
                    volume: 0
                }, 1000);
            });

            // on video pause unmute background sound volume
            $(video).on('pause', function () {
                $('#backsound').animate({
                    volume: 0.1
                }, 1000);
            });
        });

        audios.forEach((audio) => {
            $(audio).get(0).play();
        });
    }, 2000);
}

function playVoiceOver() {
    let paragraphs = [];
    current_pages.reverse().forEach((page) => {
        $(page).find('p').each(function () {
            paragraphs.push(this);
        });
    });
    paragraphs.forEach(function (element) {
        speak(element);
    });
}

function onShowPage(page, e) {
    if (page.pageIndex == 0 || page.pageIndex == e.pages.length - 1) {
        current_pages = [];
        current_pages.push(page);

        if ('speechSynthesis' in window) {
            speechSynthesis.cancel();
            $('.highlight').removeClass('highlight');
        }

        if (with_audio) {
            playVoiceOver();
        }
    } else {
        if (page.onLeft) {
            current_pages = [];
            current_pages.push(e.pages[page.pageIndex + 1]);
            current_pages.push(page);

            if ('speechSynthesis' in window) {
                speechSynthesis.cancel();
            }

            if (with_audio) {
                playVoiceOver();
            }
        }
    }
}

document.getElementById('backsound').volume = 0.1;

$('.btn-audio').click(function () {
    if ($('#backsound').get(0).paused) {
        $('#backsound').get(0).play();
        $(this).find('i').addClass('fa-volume-up').removeClass('fa-volume-off');
    } else {
        $('#backsound').get(0).pause();
        $(this).find('i').addClass('fa-volume-off').removeClass('fa-volume-up');
    }
});

document.addEventListener('click', function (event) {
    const isiOS = navigator.platform && /iPad|iPhone|iPod/.test(navigator.platform);
    if (isiOS) {
        if ('speechSynthesis' in window) {
            const lecture = new SpeechSynthesisUtterance('');
            speechSynthesis.speak(lecture);
        }
    }
});
