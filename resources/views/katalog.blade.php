<!DOCTYPE html>
<html lang="en" class="no-js gs">

<head>
    <script>
        (function(H) {
            H.className = H.className.replace(/\bno-js\b/, 'js')
        })(document.documentElement)
    </script>
    <meta charset="utf-8">
    <style>
        .js #katalog {
            margin-left: -12000px;
            width: 100%;
        }
    </style>
    <title id="t">PLN NP’s Partnership Process</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="{{ asset('favico.ico') }}" type="image/x-icon">
    <link rel="stylesheet" href="{{ asset('e-catalog/css/wow_book.css') }} " type="text/css" />
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/main.css') }} ">
    <link rel="stylesheet" media="screen" type="text/css" href="{{ asset('e-catalog/css/style.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('e-catalog/css/animation.css') }}?v=3">

    <style>
        #fbTopBar {
            display: none !important;
        }

        body,
        html {
            width: 100vw;
            height: 100vh;
            overflow: hidden !important;
        }

        /*body{
            width: 100vw;
            height: 100vh;
            overflow: hidden !important;
        }*/
        #navigation {
            position: fixed;
            width: 100%;
            bottom: 0;
            left: 0;
            z-index: 100;
            display: block;
        }

        #navigation2 {
            position: fixed;
            bottom: 0;
            top: 0;
            right: 10px;
            z-index: 100;
            display: none;
            grid-gap: 5px;
            flex-direction: column;
            justify-content: center;
        }

        @media (min-width: 320px) and (max-width: 840px) {
            #navigation {
                display: none;
            }

            #navigation2 {
                display: flex;
            }
        }
    </style>

    @if (!$isIphone && !$isSafari)
        <style>
            .rotate {
                -webkit-animation: rotate-center 1s linear infinite both;
                animation: rotate-center 1s linear infinite both;
                -webkit-transform-origin: center center;
                transform-origin: center center;
                -webkit-transform-box: fill-box;
                transform-box: fill-box;
            }
        </style>
    @endif
</head>

<body style="overflow: hidden">
    <div class="loading-container">
        <div class="loading-spinner"></div>
    </div>
    <audio loop autoplay id="backsound">
        <source src="https://pln.intivestudio.com/storage/video/backsound.mp3">
    </audio>

    <div class="container-fluid" style="height: 100vh; width: 100vw;">
        <div id="book-container" style="height: 100%; display:flex;">
            <div id="main" style="margin: auto">
                <div id="katalog" class="buku">
                    @for ($i = 1; $i <= 16; $i++)
                        @php
                            $background = asset('e-catalog/images/content/' . $i . '.jpg?v=2');
                        @endphp
                        <div id="p{{ $i + 1 }}" class="p-0">
                            <p style="visibility: hidden;font-size:0px;margin: 0px">{{ $voice_overs[$i - 1] ?? '' }}</p>
                            @include("svg.$i")
                            <img src="{{ $background }}" alt="" srcset="" class="w-100 h-100 position-absolute" style="left: 0; top:0;z-index:1">
                            @if ($i == 4)
                                <div class="p-4 text-center">
                                    <video width="95%" class="rounded position-relative" style="overflow:hidden;margin-top:25%;z-index:3" playsinline preload="none" controls>
                                        <source src="https://pln.intivestudio.com/storage/video/video.mp4" type="video/mp4">
                                        Your browser does not support the video tag.
                                    </video>
                                </div>
                            @endif
                        </div>
                    @endfor
                </div>
            </div>
        </div>
        <div id="navigation" class="container-fluid">
            <div class="row mt-5 mb-3">
                <div class="col-md-12 text-center">
                    <a target="_blank" href="{{ asset('e-catalog/pln-nps-partnership-process.pdf') }}" class="btn btn-lg btn-danger">Download PDF</a>
                    <button class="btn btn-lg btn-danger cov">
                        <i class="fa fa-angle-double-left"></i>
                    </button>
                    <button class="btn btn-lg btn-danger prev">
                        <i class="fa fa-angle-left"></i>
                    </button>
                    <button class="btn btn-lg btn-danger next">
                        <i class="fa fa-angle-right"></i>
                    </button>
                    <button class="btn btn-lg btn-danger btn-zoomin">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                    <button class="btn btn-lg btn-danger btn-zoomout">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                    <button class="btn btn-lg btn-danger btn-fullscreen">
                        <i class="fa fa-expand"></i>
                    </button>
                    <button class="btn btn-lg btn-danger btn-audio">
                        <i class="fa fa-volume-up"></i>
                    </button>
                </div>
            </div>
        </div>
        <div class="position-relative">
            <div id="navigation2">
                <a target="_blank" href="{{ asset('e-catalog/pln-nps-partnership-process.pdf') }}" class="btn btn-danger"><i class="fa fa-download"></i></a>
                <button class="btn btn-lg btn-danger cov">
                    <i class="fa fa-angle-double-left"></i>
                </button>
                <button class="btn btn-lg btn-danger prev">
                    <i class="fa fa-angle-left"></i>
                </button>
                <button class="btn btn-lg btn-danger next">
                    <i class="fa fa-angle-right"></i>
                </button>
                <button class="btn btn-lg btn-danger btn-zoomin">
                    <i class="fa fa-plus-circle"></i>
                </button>
                <button class="btn btn-lg btn-danger btn-zoomout">
                    <i class="fa fa-minus-circle"></i>
                </button>
                <button class="btn btn-lg btn-danger btn-fullscreen">
                    <i class="fa fa-expand"></i>
                </button>
                <button class="btn btn-lg btn-danger btn-audio">
                    <i class="fa fa-volume-up"></i>
                </button>
            </div>
        </div>
    </div>
    <!-- Grab Google CDN's jQuery. fall back to local if necessary -->

    <!-- scripts concatenated and minified via ant build script-->
    <script type="text/javascript" src="{{ asset('e-catalog/js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/jquery.hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/main.js') }}?v={{ time() }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/wow_book.min.js') }}"></script>
    <script>
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            if ($(window).width() < $(window).height()) {
                alert("Mohon menggunakan orientasi layar landscape untuk tampilan yang lebih baik.");
            }
        }
    </script>
</body>

</html>
