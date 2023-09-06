let with_audio = localStorage.getItem('with_audio') == 'true' ? true : false;
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
        $('.btn-audio').click(function () {
            with_audio = !with_audio;
            if (!with_audio) {
                if ('speechSynthesis' in window) {
                    speechSynthesis.cancel();
                    $('.highlight').removeClass('highlight');
                }
            }

            if (with_audio) {
                onShowPage(wowBookInit.pages[wowBookInit.currentPage], wowBookInit);
                $('.btn-audio').find('i').addClass('fa-volume-up').removeClass('fa-volume-off');
            } else {
                $('.btn-audio').find('i').addClass('fa-volume-off').removeClass('fa-volume-up');
            }
            localStorage.setItem('with_audio', with_audio);

        });
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
            speech.lang = 'id-ID';
            // speech.rate = 0.95;
            // speech.pitch = 1.1;
            // get all voices from object to json

            // Ambil semua suara dengan bahasa indonesia
            const allIndonesianVoice = voices.filter(voice => voice.lang === 'id-ID');

            speech.voice = allIndonesianVoice[1] ?? allIndonesianVoice[0];
            currentlySpeaking = true;
            let voice_name = speech.voice?.name;

            // Atur peristiwa untuk menambahkan highlight pada teks yang sedang dinarasikan
            speech.onstart = () => {
                highlightText(0, 0, $(element), voice_name); // Mulai dengan highlight pada karakter perta,ma
            };

            speech.onboundary = (event) => {
                resetHighlight($(element)); // Reset highlight sebelum menambahkan highlight baru
                highlightText(event.charIndex, event.charIndex + event.charLength, $(element), voice_name);
            };

            speech.onend = () => {
                resetHighlight($(element)); // Reset highlight setelah ucapan selesai
                currentlySpeaking = false;
            };
            // Memulai sintesis ucapan
            speechSynthesis.speak(speech);
        } else {
            alert('Maaf, browser Anda tidak mendukung fitur Text-to-Speech.');
        }

    } catch (error) {
        alert(error);
    }
}

function playMedia() {
    // revert current pages array
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

    $('#katalog').find('video').each(function () {
        $(this).get(0).pause();
        $(this).get(0).currentTime = 0;
    });

    $('#katalog').find('audio').each(function () {
        $(this).get(0).pause();
        $(this).get(0).currentTime = 0;
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
                    volume: 0.3
                }, 1000);
            });
        });

        audios.forEach((audio) => {
            $(audio).get(0).play();
        });
    }, 1000);
}

function playVoiceOver() {
    let paragraphs = [];
    current_pages.reverse().forEach((page) => {
        $(page).find('p').each(function () {
            paragraphs.push(this);
        });
    });

    console.log(paragraphs);
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

        playMedia();
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
                $('.highlight').removeClass('highlight');
            }

            playMedia();

            if (with_audio) {
                playVoiceOver();
            }
        }
    }
}

document.getElementById('backsound').volume = 0.3;