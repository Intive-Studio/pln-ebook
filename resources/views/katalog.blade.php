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
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/icon.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/animate.css') }} ">
    <link rel="stylesheet" media="screen" type="text/css" href="{{ asset('e-catalog/css/style.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('css/styles.css') }}">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/font-awesome.min.css') }} ">
    <link rel="stylesheet" type="text/css" href="{{ asset('e-catalog/css/toastr.min.css') }} ">
    <link rel="stylesheet" href="{{ asset('e-catalog/css/animation.css') }}">

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
            bottom: 47vh;
            left: 45vw;
            z-index: 100;
            transform: rotate(90deg);
            display: none;
        }

        #navigation2 i {
            transform: rotate(-90deg);
        }

        @media (min-width: 320px) and (max-width: 840px) {
            #navigation {
                display: none;
            }

            #navigation2 {
                display: block;
            }
        }
    </style>
</head>

<body style="overflow: hidden">
    <audio loop autoplay id="backsound">
        <source src="{{ asset('e-catalog/video/backsound.mp3') }}">
    </audio>

    <div class="container-fluid" style="height: 100vh; width: 100vw;">
        <div id="book-container" style="height: 100%; display:flex;">
            <div id="main" style="margin: auto">
                <div id="katalog" class="buku">
                    @for ($i = 1; $i <= 12; $i++)
                        @php
                            $background = asset('e-catalog/images/' . $i . '.jpg');
                        @endphp
                        <div id="p{{ $i + 1 }}" style="background-image: url('{{ $background }}');background-size: 100% 100%;" class="p-0">
                            @include("svg.$i")
                            @if ($i == 2)
                                <div class="p-4 text-center">
                                    <video width="95%" class="rounded" style="overflow:hidden;margin-top:25%">
                                        <source src="{{ asset('e-catalog/video/video.mp4') }}" type="video/mp4">
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
                </div>
            </div>
        </div>

        <div id="navigation2" class="container">
            <div class="row mg-bottom-10 mg-top-15">
                <div class="col-md-12 text-center">
                    <a target="_blank" href="{{ asset('e-catalog/pln-nps-partnership-process.pdf') }}" class="btn btn-danger"><i class="fa fa-download"></i></a>
                    <button class="btn btn-danger cov">
                        <i class="fa fa-angle-double-left"></i>
                    </button>
                    <button class="btn btn-danger prev">
                        <i class="fa fa-angle-left"></i>
                    </button>
                    <button class="btn btn-danger next">
                        <i class="fa fa-angle-right"></i>
                    </button>
                    <button class="btn btn-danger btn-zoomin">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                    <button class="btn btn-danger btn-zoomout">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                    <button class="btn btn-danger btn-fullscreen">
                        <i class="fa fa-expand"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Grab Google CDN's jQuery. fall back to local if necessary -->

    <!-- scripts concatenated and minified via ant build script-->
    <script type="text/javascript" src="{{ asset('e-catalog/js/jquery-3.1.1.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/jquery.hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/hotkeys.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/clipboard.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/main.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/semantic.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/toastr.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('e-catalog/js/stats.js') }}"></script>
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
