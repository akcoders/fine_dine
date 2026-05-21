<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title><?= esc($title ?? 'La Majestic') ?></title>
    <meta name="description" content="<?= esc($metaDescription ?? 'La Majestic fine dining and modern European cuisine.') ?>">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@400;500;600;700&family=Manrope:wght@400;500;600;700;800&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="<?= base_url('front_template/images/favicon.png') ?>" type="image/x-icon">
    <link rel="icon" href="<?= base_url('front_template/images/favicon.png') ?>" type="image/x-icon">
    <link href="<?= base_url('front_template/css/bootstrap.css') ?>" rel="stylesheet">
    <link href="<?= base_url('front_template/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('front_template/css/responsive.css') ?>" rel="stylesheet">
    <link href="<?= base_url('front_template/css/la-majestic-shop.css') ?>" rel="stylesheet">
</head>
<body class="lm-theme-body">
<div class="page-wrapper">
    <div class="loader-wrap">
        <div class="preloader">
            <div class="preloader-close">x</div>
            <div id="handle-preloader" class="handle-preloader">
                <div class="animation-preloader">
                    <div class="spinner"></div>
                    <div class="txt-loading">
                        <span data-text-preloader="L" class="letters-loading">L</span>
                        <span data-text-preloader="A" class="letters-loading">A</span>
                        <span data-text-preloader="M" class="letters-loading">M</span>
                        <span data-text-preloader="A" class="letters-loading">A</span>
                        <span data-text-preloader="J" class="letters-loading">J</span>
                        <span data-text-preloader="E" class="letters-loading">E</span>
                        <span data-text-preloader="S" class="letters-loading">S</span>
                        <span data-text-preloader="T" class="letters-loading">T</span>
                        <span data-text-preloader="I" class="letters-loading">I</span>
                        <span data-text-preloader="C" class="letters-loading">C</span>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <header class="main-header header-down">
        <div class="header-top">
            <div class="auto-container">
                <div class="inner clearfix">
                    <div class="top-left clearfix">
                        <ul class="top-info clearfix">
                            <li><i class="icon far fa-map-marker-alt"></i> <?= esc($brand['address']) ?></li>
                            <li><i class="icon far fa-clock"></i> <?= esc($brand['hours_weekday']) ?></li>
                        </ul>
                    </div>
                    <div class="top-right clearfix">
                        <ul class="top-info clearfix">
                            <li><a href="tel:<?= esc(str_replace(' ', '', $brand['phone_secondary'])) ?>"><i class="icon far fa-phone"></i> <?= esc($brand['phone_secondary']) ?></a></li>
                            <li><a href="mailto:<?= esc($brand['email']) ?>"><i class="icon far fa-envelope"></i> <?= esc($brand['email']) ?></a></li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-upper">
            <div class="auto-container">
                <div class="main-box clearfix">
                    <div class="logo-box">
                        <div class="logo">
                            <a href="<?= site_url('/') ?>" title="<?= esc($brand['name']) ?>">
                                <img src="<?= esc($brand['logo']) ?>" alt="<?= esc($brand['name']) ?>" class="lm-main-logo">
                            </a>
                        </div>
                    </div>

                    <div class="nav-box clearfix">
                        <div class="nav-outer clearfix">
                            <nav class="main-menu">
                                <ul class="navigation clearfix">
                                    <li class="<?= ($page ?? '') === 'home' ? 'current' : '' ?>"><a href="<?= site_url('/') ?>"><?= esc($ui['nav_home_label']) ?></a></li>
                                    <li class="<?= ($page ?? '') === 'gallery' ? 'current' : '' ?>"><a href="<?= esc($brand['gallery_anchor']) ?>"><?= esc($ui['nav_gallery_label']) ?></a></li>
                                    <li class="<?= ($page ?? '') === 'menu' ? 'current' : '' ?>"><a href="<?= esc($brand['menu_anchor']) ?>"><?= esc($ui['nav_menu_label']) ?></a></li>
                                    <li class="<?= ($page ?? '') === 'cart' ? 'current' : '' ?>"><a href="<?= esc($brand['cart_anchor']) ?>"><?= esc($ui['nav_cart_label']) ?></a></li>
                                    <li class="<?= ($page ?? '') === 'book' ? 'current' : '' ?>"><a href="<?= esc($brand['reserve_anchor']) ?>"><?= esc($ui['nav_book_label']) ?></a></li>
                                    <li><a href="<?= esc($brand['contact_anchor']) ?>"><?= esc($ui['nav_contact_label']) ?></a></li>
                                </ul>
                            </nav>
                        </div>

                        <div class="links-box clearfix">
                            <div class="link link-btn">
                                <a href="<?= esc($brand['reserve_anchor']) ?>" class="theme-btn btn-style-one clearfix">
                                        <span class="btn-wrap">
                                        <span class="text-one"><?= esc($ui['header_find_table_label']) ?></span>
                                        <span class="text-two"><?= esc($ui['header_find_table_label']) ?></span>
                                        </span>
                                </a>
                            </div>
                            <div class="link link-btn lm-cart-link">
                                <a href="<?= esc($brand['cart_anchor']) ?>" class="theme-btn btn-style-two clearfix">
                                    <span class="btn-wrap">
                                        <span class="text-one"><?= esc($ui['header_cart_label']) ?> <span class="lm-cart-count" id="cartCount">0</span></span>
                                        <span class="text-two"><?= esc($ui['header_cart_label']) ?> <span class="lm-cart-count">0</span></span>
                                    </span>
                                </a>
                            </div>
                            <div class="link info-toggler">
                                <button class="info-btn">
                                    <span class="hamburger">
                                        <span class="top-bun"></span>
                                        <span class="meat"></span>
                                        <span class="bottom-bun"></span>
                                    </span>
                                </button>
                            </div>
                        </div>

                        <div class="nav-toggler">
                            <button class="hidden-bar-opener">
                                <span class="hamburger">
                                    <span class="top-bun"></span>
                                    <span class="meat"></span>
                                    <span class="bottom-bun"></span>
                                </span>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <div class="menu-backdrop"></div>

    <section class="hidden-bar">
        <div class="inner-box">
            <div class="cross-icon hidden-bar-closer"><span class="far fa-close"></span></div>
            <div class="logo-box"><a href="<?= site_url('/') ?>"><img src="<?= esc($brand['logo']) ?>" alt="<?= esc($brand['name']) ?>" class="lm-sidebar-logo"></a></div>
            <div class="side-menu">
                <ul class="navigation clearfix">
                    <li class="<?= ($page ?? '') === 'home' ? 'current' : '' ?>"><a href="<?= site_url('/') ?>"><?= esc($ui['nav_home_label']) ?></a></li>
                    <li class="<?= ($page ?? '') === 'gallery' ? 'current' : '' ?>"><a href="<?= esc($brand['gallery_anchor']) ?>"><?= esc($ui['nav_gallery_label']) ?></a></li>
                    <li class="<?= ($page ?? '') === 'menu' ? 'current' : '' ?>"><a href="<?= esc($brand['menu_anchor']) ?>"><?= esc($ui['nav_menu_label']) ?></a></li>
                    <li class="<?= ($page ?? '') === 'cart' ? 'current' : '' ?>"><a href="<?= esc($brand['cart_anchor']) ?>"><?= esc($ui['nav_cart_label']) ?></a></li>
                    <li class="<?= ($page ?? '') === 'book' ? 'current' : '' ?>"><a href="<?= esc($brand['reserve_anchor']) ?>"><?= esc($ui['nav_book_label']) ?></a></li>
                    <li><a href="<?= esc($brand['contact_anchor']) ?>"><?= esc($ui['nav_contact_label']) ?></a></li>
                </ul>
            </div>
            <h2><?= esc($ui['header_visit_title']) ?></h2>
            <ul class="info">
                <li><?= esc($brand['address']) ?></li>
                <li><?= esc($brand['hours_weekday']) ?><br><?= esc($brand['hours_weekend']) ?></li>
                <li><a href="mailto:<?= esc($brand['email']) ?>"><?= esc($brand['email']) ?></a></li>
            </ul>
            <div class="separator"><span></span></div>
            <div class="booking-info">
                <div class="bk-title"><?= esc($ui['header_booking_title']) ?></div>
                <div class="bk-no"><a href="tel:<?= esc(str_replace(' ', '', $brand['phone_secondary'])) ?>"><?= esc($brand['phone_secondary']) ?></a></div>
            </div>
        </div>
    </section>

    <div class="info-back-drop"></div>

    <section class="info-bar">
        <div class="inner-box">
            <div class="cross-icon"><span class="far fa-close"></span></div>
            <div class="logo-box"><a href="<?= site_url('/') ?>"><img src="<?= esc($brand['logo']) ?>" alt="<?= esc($brand['name']) ?>" class="lm-sidebar-logo"></a></div>
            <div class="image-box"><img src="<?= base_url('assets/img/fine-dining.jpg') ?>" alt="<?= esc($brand['name']) ?>"></div>
            <h2><?= esc($ui['header_visit_title']) ?></h2>
            <ul class="info">
                <li><?= esc($brand['address']) ?></li>
                <li><?= esc($brand['hours_note']) ?></li>
                <li><a href="mailto:<?= esc($brand['email']) ?>"><?= esc($brand['email']) ?></a></li>
            </ul>
            <div class="separator"><span></span></div>
            <div class="booking-info">
                <div class="bk-title"><?= esc($ui['header_booking_title']) ?></div>
                <div class="bk-no"><a href="tel:<?= esc(str_replace(' ', '', $brand['phone_primary'])) ?>"><?= esc($brand['phone_primary']) ?></a></div>
            </div>
        </div>
    </section>

    <?php if (session()->getFlashdata('success') || session()->getFlashdata('error')): ?>
        <div class="auto-container py-3">
            <?php if (session()->getFlashdata('success')): ?>
                <div class="alert alert-success mb-0"><?= esc(session()->getFlashdata('success')) ?></div>
            <?php endif; ?>
            <?php if (session()->getFlashdata('error')): ?>
                <div class="alert alert-danger mb-0"><?= esc(session()->getFlashdata('error')) ?></div>
            <?php endif; ?>
        </div>
    <?php endif; ?>

    <?= $this->renderSection('content') ?>

    <footer class="main-footer" id="contact">
        <div class="image-layer" style="background-image: url(<?= base_url('front_template/images/background/image-4.jpg') ?>);"></div>
        <div class="upper-section">
            <div class="auto-container">
                <div class="row clearfix">
                    <div class="footer-col info-col col-lg-6 col-md-12 col-sm-12">
                        <div class="inner wow fadeInUp" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <div class="content">
                                <div class="logo"><a href="<?= site_url('/') ?>"><img src="<?= esc($brand['logo']) ?>" alt="<?= esc($brand['name']) ?>" class="lm-footer-logo"></a></div>
                                <div class="info">
                                    <ul>
                                        <li><?= esc($brand['address']) ?></li>
                                        <li><a href="mailto:<?= esc($brand['email']) ?>"><?= esc($brand['email']) ?></a></li>
                                        <li><a href="tel:<?= esc(str_replace(' ', '', $brand['phone_primary'])) ?>">Booking Request : <?= esc($brand['phone_primary']) ?></a></li>
                                        <li><?= esc($brand['hours_weekday']) ?><br><?= esc($brand['hours_weekend']) ?></li>
                                    </ul>
                                </div>
                                <div class="separator"><span></span><span></span><span></span></div>
                                <div class="newsletter">
                                    <h3><?= esc($brand['name']) ?></h3>
                                    <div class="text"><?= esc($brand['footer_note'] ?: $brand['tagline']) ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="footer-col links-col col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInLeft" data-wow-delay="0ms" data-wow-duration="1500ms">
                                <h5 class="lm-footer-heading"><?= esc($ui['footer_navigation_heading']) ?></h5>
                            <ul class="links">
                                <li><a href="<?= site_url('/') ?>"><?= esc($ui['nav_home_label']) ?></a></li>
                                <li><a href="<?= esc($brand['gallery_anchor']) ?>"><?= esc($ui['nav_gallery_label']) ?></a></li>
                                <li><a href="<?= esc($brand['menu_anchor']) ?>"><?= esc($ui['nav_menu_label']) ?></a></li>
                                <li><a href="<?= esc($brand['cart_anchor']) ?>"><?= esc($ui['nav_cart_label']) ?></a></li>
                                <li><a href="<?= esc($brand['reserve_anchor']) ?>"><?= esc($ui['nav_book_label']) ?></a></li>
                                <li><a href="<?= esc($brand['contact_anchor']) ?>"><?= esc($ui['nav_contact_label']) ?></a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-col links-col last col-lg-3 col-md-6 col-sm-12">
                        <div class="inner wow fadeInRight" data-wow-delay="0ms" data-wow-duration="1500ms">
                            <h5 class="lm-footer-heading"><?= esc($ui['footer_reservations_heading']) ?></h5>
                            <ul class="links">
                                <li><a href="tel:<?= esc(str_replace(' ', '', $brand['phone_primary'])) ?>"><?= esc($ui['footer_call_label']) ?></a></li>
                                <li><a href="mailto:<?= esc($brand['email']) ?>"><?= esc($ui['footer_email_label']) ?></a></li>
                                <li><a href="https://maps.google.com/?q=<?= rawurlencode($brand['address']) ?>" target="_blank" rel="noopener"><?= esc($ui['footer_map_label']) ?></a></li>
                                <li><a href="<?= esc($brand['reserve_anchor']) ?>"><?= esc($ui['footer_reserve_label']) ?></a></li>
                                <li><a href="<?= esc($brand['cart_anchor']) ?>"><?= esc($ui['footer_cart_summary_label']) ?></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="footer-bottom">
            <div class="auto-container">
                <div class="copyright">&copy; <?= date('Y') ?> <?= esc($brand['name']) ?>. <?= esc($ui['footer_copyright_suffix']) ?></div>
            </div>
        </div>
    </footer>
</div>

<div class="scroll-to-top scroll-to-target" data-target="html"><span class="icon fa fa-angle-up"></span></div>
<a href="<?= esc($brand['reserve_anchor']) ?>" class="lm-mobile-book" aria-label="Book a table">
    <span class="icon far fa-calendar-alt"></span>
    <span class="text"><?= esc($ui['mobile_book_label']) ?></span>
</a>

<div class="lm-toast" id="cartToast">Item added to cart</div>

<script src="<?= base_url('front_template/js/jquery.js') ?>"></script>
<script src="<?= base_url('front_template/js/popper.min.js') ?>"></script>
<script src="<?= base_url('front_template/js/bootstrap.min.js') ?>"></script>
<script src="<?= base_url('front_template/js/jquery-ui.js') ?>"></script>
<script src="<?= base_url('front_template/js/jquery.fancybox.js') ?>"></script>
<script src="<?= base_url('front_template/js/swiper.js') ?>"></script>
<script src="<?= base_url('front_template/js/owl.js') ?>"></script>
<script src="<?= base_url('front_template/js/appear.js') ?>"></script>
<script src="<?= base_url('front_template/js/wow.js') ?>"></script>
<script src="<?= base_url('front_template/js/parallax.min.js') ?>"></script>
<script src="<?= base_url('front_template/js/custom-script.js') ?>"></script>
<script src="<?= base_url('front_template/js/la-majestic-shop.js') ?>"></script>
</body>
</html>
