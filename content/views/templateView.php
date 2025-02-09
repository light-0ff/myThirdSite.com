<!DOCTYPE html>
<html lang=<?php echo $data['options']['locale'];        ?>>

<head>
    <!-- set the encoding of your site -->
    <meta charset="utf-8">
    <!-- set the Compatible of your site -->
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- set the page title -->
    <title> <?php echo $data['options']['title'];        ?> </title>
    <!-- include the site Google Fonts stylesheet -->
    <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700%7CRoboto:300,400,500,700,900&display=swap" rel="stylesheet">
    <!-- include the site bootstrap stylesheet -->
    <link rel="stylesheet" href="/content/static/css/bootstrap.css">
    <!-- include the site fontawesome stylesheet -->
    <link rel="stylesheet" href="/content/static/css/fontawesome.css">
    <!-- include the site stylesheet -->
    <link rel="stylesheet" href="/content/static/style.css">
    <!-- include theme plugins setting stylesheet -->
    <link rel="stylesheet" href="/content/static/css/plugins.css">
    <!-- include theme color setting stylesheet -->
    <link rel="stylesheet" href="/content/static/css/color.css">
    <!-- include theme responsive setting stylesheet -->
    <link rel="stylesheet" href="/content/static/css/responsive.css">
    <!-- include jQuery library -->
    <script src="/content/static/js/jquery-3.4.1.min.js"></script>

</head>

<body>
    <div id="pageWrapper">
        <!-- header -->
        <header id="header" class="position-relative">
            <!-- headerHolderCol -->
            <div class="headerHolderCol pt-lg-4 pb-lg-5 py-3">
                <div class="container">
                    <div class="row">
                        <div class="col-12 col-sm-4">
                            <a href="javascript:void(0);" class="tel d-flex align-items-end"><i class="icon-call mr-2"></i> Hotline: <?php echo $data['options']['contactphone']; ?></a>
                        </div>
                        <div class="col-12 col-sm-4 text-center">
                            <span class="txt d-block">Wellcome To Botanical Store <?php echo $data['options']['tagline']; ?></span>
                        </div>
                        <div class="col-12 col-sm-4">
                            <!-- langListII -->
                            <ul class="nav nav-tabs langListII justify-content-end border-bottom-0">
                                <li class="dropdown">
                                    <span>Currency: </span>
                                    <a class="d-inline dropdown-toggle text-uppercase" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">USD</a>
                                    <div class="dropdown-menu text-uppercase pl-4 pr-4 border-0">
                                        <a class="dropdown-item" href="javascript:void(0);">USD</a>
                                        <a class="dropdown-item" href="javascript:void(0);">VND</a>
                                        <a class="dropdown-item" href="javascript:void(0);">euro</a>
                                    </div>
                                </li>
                                <li class="dropdown m-0">
                                    <span>Languages: </span>
                                    <a class="d-inline dropdown-toggle text-uppercase" data-toggle="dropdown" href="javascript:void(0);" role="button" aria-haspopup="true" aria-expanded="false">EN</a>
                                    <div class="dropdown-menu pl-4 pr-4">
                                        <a class="dropdown-item" href="javascript:void(0);">English</a>
                                        <a class="dropdown-item" href="javascript:void(0);">Vietnamese</a>
                                        <a class="dropdown-item" href="javascript:void(0);">French</a>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <!-- headerHolder -->
            <div class="headerHolder container pt-lg-5 pb-lg-7 py-4">
                <div class="row">
                    <div class="col-6 col-sm-2">
                        <!-- mainLogo -->
                        <div class="logo">
                            <a href="/"><img src="/content/static/images/logo.png" alt="Botanical" class="img-fluid"></a>
                        </div>
                    </div>
                    <div class="col-6 col-sm-7 col-lg-8 static-block">
                        <!-- mainHolder -->
                        <div class="mainHolder pt-lg-5 pt-3 justify-content-center">
                            <!-- pageNav2 -->
                            <nav class="navbar navbar-expand-lg navbar-light p-0 pageNav2 position-static">
                                <button type="button" class="navbar-toggle collapsed position-relative" data-toggle="collapse" data-target="#navbarNav" aria-expanded="false">
                                    <span class="sr-only">Toggle navigation</span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                    <span class="icon-bar"></span>
                                </button>
                                <div class="collapse navbar-collapse" id="navbarNav">
                                    <ul class="navbar-nav mx-auto text-uppercase d-inline-block">
                                        <?php
                                        for ($i = 0; $i < count($data['navigate']); $i++) {
                                            $title = $data['navigate'][$i]['title'];
                                            $href = $data['navigate'][$i]['href'];
                                            if ($data['navigate'][$i]['childs'] == null) {
                                                echo "<li class='nav-item'><a class='d-block' href='" .
                                                    $href . "'>" .
                                                    $title . "</a></li>";
                                            } else {
                                                echo '<li class="nav-item active dropdown">
											     <a class="dropdown-toggle d-block" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">' . $title . '</a>
                                                <ul class="list-unstyled text-capitalize dropdown-menu mt-0 py-0">';
                                                for ($j = 0; $j < count($data['navigate'][$i]['childs']); $j++) {
                                                    $chTitle = $data['navigate'][$i]['childs'][$j]['title'];
                                                    $chHref = $data['navigate'][$i]['childs'][$j]['href'];
                                                    echo '<li class="d-block mx-0"><a href="' . $chHref . '">' . $chTitle . '</a></li>';
                                                }
                                                echo '</ul>
										    </li>';
                                            }
                                        }
                                        // foreach ($data['navbar'] as $key => $value) {
                                        //     echo "<li class='nav-item'><a class='d-block' href='" .
                                        //         $value['href'] . "'>" .
                                        //         $value['title'] . "</a></li>";
                                        // }
                                        ?>
                                    </ul>
                                </div>
                            </nav>
                        </div>
                    </div>
                    <div class="col-sm-3 col-lg-2">
                        <!-- wishListII -->
                        <ul class="nav nav-tabs wishListII pt-5 justify-content-end border-bottom-0">
                            <li class="nav-item ml-0"><a class="nav-link icon-search" href="javascript:void(0);"></a></li>
                            <li class="nav-item"><a class="nav-link position-relative icon-cat" href="/kart"><span class="num rounded d-block">0</span></a></li>
                            <li class="nav-item"><a class="nav-link icon-profile" href="/main/login"></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </header>
        <!-- /////////////////////////////////////////////////////////// -->

        <?php
        if (isset($data['succsess'])) {
            echo "<div class='row'><div class='col-md-6'><div class='alert alert-success' role='alert'>" . $data['succsess'] . "</div></div></div>";
        }
        if (isset($data['error'])) {
            echo "<div class='alert alert-danger' role='alert'>" . $data['error'] . "</div>";
        }
        // varDump($data['userprofile']);
        ?>
        <?php require_once $contentView; ?>

        <!-- /////////////////////////////////////////////////////////// -->
        <aside class="footerHolder overflow-hidden bg-lightGray pt-xl-23 pb-xl-8 pt-lg-10 pb-lg-8 pt-md-12 pb-md-8 pt-10">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-6 col-lg-4 mb-lg-0 mb-4">
                        <h3 class="headingVI fwEbold text-uppercase mb-7">Contact Us</h3>
                        <ul class="list-unstyled footerContactList mb-3">
                            <li class="mb-3 d-flex flex-nowrap pr-xl-20 pr-0"><span class="icon icon-place mr-3"></span>
                                <address class="fwEbold m-0">Address: London Oxford Street, 012 United Kingdom.</address>
                            </li>
                            <li class="mb-3 d-flex flex-nowrap"><span class="icon icon-phone mr-3"></span> <span class="leftAlign">Phone : <a href="javascript:void(0);">(+032) 3456 7890</a></span></li>
                            <li class="email d-flex flex-nowrap"><span class="icon icon-email mr-2"></span> <span class="leftAlign">Email: <a href="javascript:void(0);">Botanicalstore@gmail.com</a></span></li>
                        </ul>
                        <ul class="list-unstyled followSocailNetwork d-flex flex-nowrap">
                            <li class="fwEbold mr-xl-11 mr-md-8 mr-3">Follow us:</li>
                            <li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-facebook-f"></a></li>
                            <li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-twitter"></a></li>
                            <li class="mr-xl-6 mr-md-5 mr-2"><a href="javascript:void(0);" class="fab fa-pinterest"></a></li>
                            <li class="mr-2"><a href="javascript:void(0);" class="fab fa-google-plus-g"></a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 pl-xl-14 mb-lg-0 mb-4">
                        <h3 class="headingVI fwEbold text-uppercase mb-6">Information</h3>
                        <ul class="list-unstyled footerNavList">
                            <li class="mb-1"><a href="javascript:void(0);">New Products</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Top Sellers</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Our Blog</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">About Our Shop</a></li>
                            <li><a href="javascript:void(0);">Privacy policy</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-3 pl-xl-12 mb-lg-0 mb-4">
                        <h3 class="headingVI fwEbold text-uppercase mb-7">My Account</h3>
                        <ul class="list-unstyled footerNavList">
                            <li class="mb-1"><a href="javascript:void(0);">My account</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Discount</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Orders history</a></li>
                            <li><a href="javascript:void(0);">Personal information</a></li>
                        </ul>
                    </div>
                    <div class="col-12 col-sm-6 col-lg-2 pl-xl-18 mb-lg-0 mb-4">
                        <h3 class="headingVI fwEbold text-uppercase mb-5">PRODUCTS</h3>
                        <ul class="list-unstyled footerNavList">
                            <li class="mb-2"><a href="javascript:void(0);">Delivery</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Legal notice</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">Prices drop</a></li>
                            <li class="mb-2"><a href="javascript:void(0);">New products</a></li>
                            <li><a href="javascript:void(0);">Best sales</a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </aside>
        <footer id="footer" class="overflow-hidden bg-dark">
            <div class="container">
                <div class="row">
                    <div class="col-12 copyRightHolder v-II text-center pt-md-3 pb-md-4 py-2">
                        <p class="mb-0">Coppyright 2019 by <a href="javascript:void(0);">Botanical Store</a> - All right reserved</p>
                    </div>
                </div>
            </div>
        </footer>

    </div>
    <!-- cart count -->
    <script src="/content/static/js/addproductcard.js"></script>
    <!-- include bootstrap popper JavaScript -->
    <script src="/content/static/js/popper.min.js"></script>
    <!-- include bootstrap JavaScript -->
    <script src="/content/static/js/bootstrap.min.js"></script>
    <!-- include custom JavaScript -->
    <script src="/content/static/js/jqueryCustome.js"></script>

</body>

</html>