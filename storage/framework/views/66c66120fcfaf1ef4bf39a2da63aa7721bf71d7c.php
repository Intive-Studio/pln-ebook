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
    <link rel="shortcut icon" href="<?php echo e(asset('favico.ico')); ?>" type="image/x-icon">
    <link rel="stylesheet" href="<?php echo e(asset('e-catalog/css/wow_book.css')); ?> " type="text/css" />
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('e-catalog/css/main.css')); ?> ">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('e-catalog/css/icon.css')); ?> ">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('e-catalog/css/animate.css')); ?> ">
    <link rel="stylesheet" media="screen" type="text/css" href="<?php echo e(asset('e-catalog/css/style.css')); ?> ">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('css/styles.css')); ?>">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('e-catalog/css/semantic.min.css')); ?> ">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('e-catalog/css/font-awesome.min.css')); ?> ">
    <link rel="stylesheet" type="text/css" href="<?php echo e(asset('e-catalog/css/toastr.min.css')); ?> ">

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
            bottom: 40vh;
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
    <div class="container-fluid" style="height: 100vh; width: 100vw;">
        <div id="book-container" style="height: 100%; display:flex;">
            <div id="main" style="margin: auto">
                <div id="katalog" class="buku">
                    <?php for($i = 1; $i <= 12; $i++): ?>
                        <?php
                            $background = asset('e-catalog/images/' . $i . '.jpg');
                        ?>
                        <div id="p<?php echo e($i + 1); ?>" style="background-image: url('<?php echo e($background); ?>');background-size: 100% 100%;">
                        </div>
                    <?php endfor; ?>
                </div>
            </div>
        </div>
        <div id="navigation" class="container">
            <div class="row mg-bottom-10 mg-top-15">
                <div class="col-md-12 text-center">
                    <a target="_blank" href="<?php echo e(asset('e-catalog/pln-nps-partnership-process.pdf')); ?>" class="btn btn-primary">Download PDF</a>
                    <button class="btn btn-primary cov">
                        <i class="fa fa-angle-double-left"></i>
                    </button>
                    <button class="btn btn-primary prev">
                        <i class="fa fa-angle-left"></i>
                    </button>
                    <button class="btn btn-primary next">
                        <i class="fa fa-angle-right"></i>
                    </button>
                    <button class="btn btn-primary btn-zoomin">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                    <button class="btn btn-primary btn-zoomout">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </div>
            </div>
        </div>

        <div id="navigation2" class="container">
            <div class="row mg-bottom-10 mg-top-15">
                <div class="col-md-12 text-center">
                    <a target="_blank" href="<?php echo e(asset('e-catalog/pln-nps-partnership-process.pdf')); ?>" class="btn btn-primary"><i class="fa fa-download"></i></a>
                    <button class="btn btn-primary cov">
                        <i class="fa fa-angle-double-left"></i>
                    </button>
                    <button class="btn btn-primary prev">
                        <i class="fa fa-angle-left"></i>
                    </button>
                    <button class="btn btn-primary next">
                        <i class="fa fa-angle-right"></i>
                    </button>
                    <button class="btn btn-primary btn-zoomin">
                        <i class="fa fa-plus-circle"></i>
                    </button>
                    <button class="btn btn-primary btn-zoomout">
                        <i class="fa fa-minus-circle"></i>
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
    <!-- Grab Google CDN's jQuery. fall back to local if necessary -->

    <!-- scripts concatenated and minified via ant build script-->
    <script type="text/javascript" src="<?php echo e(asset('e-catalog/js/jquery-3.1.1.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('e-catalog/js/jquery.hotkeys.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('e-catalog/js/hotkeys.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('e-catalog/js/clipboard.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('e-catalog/js/main.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('e-catalog/js/semantic.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('e-catalog/js/toastr.min.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('e-catalog/js/stats.js')); ?>"></script>
    <script type="text/javascript" src="<?php echo e(asset('e-catalog/js/wow_book.min.js')); ?>"></script>
    <script>
        if (/Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)) {
            if ($(window).width() < $(window).height()) {
                alert("Mohon menggunakan orientasi layar landscape untuk tampilan yang lebih baik.");
            }
        }
    </script>
</body>

</html>
<?php /**PATH /Applications/XAMPP/xamppfiles/htdocs/pln-catalogue/resources/views/katalog.blade.php ENDPATH**/ ?>