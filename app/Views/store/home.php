<?= $this->extend('layouts/store') ?>

<?= $this->section('content') ?>
<?php
$menuGroups = [];
foreach ($products as $product) {
    $menuGroups[$product['category']][] = $product;
}
$tabGroups = array_slice($menuGroups, 0, 4, true);
$whyChoose = $strengths ?? [];
?>

<section class="banner-section">
    <div class="banner-container">
        <div class="banner-slider">
            <div class="swiper-wrapper">
                <?php foreach ($heroSlides as $index => $slide): ?>
                    <div class="swiper-slide slide-item">
                        <div class="image-layer" style="background-image: url(<?= esc($slide['image']) ?>);"></div>
                        <div class="auto-container">
                            <div class="content-box">
                                <div class="content">
                                    <div class="clearfix">
                                        <div class="inner">
                                            <div class="subtitle"><span><?= esc($slide['eyebrow']) ?></span></div>
                                            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
                                            <h1><span><?= nl2br(esc($slide['title'])) ?></span></h1>
                                            <div class="text"><?= esc($slide['text']) ?></div>
                                            <div class="links-box clearfix">
                                                <div class="link">
                                                    <a href="<?= esc($slide['button_link']) ?>" class="theme-btn btn-style-two clearfix">
                                                        <span class="btn-wrap">
                                                            <span class="text-one"><?= esc($slide['button_label']) ?></span>
                                                            <span class="text-two"><?= esc($slide['button_label']) ?></span>
                                                        </span>
                                                    </a>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="swiper-button-prev"><span class="fal fa-angle-left"></span></div>
            <div class="swiper-button-next"><span class="fal fa-angle-right"></span></div>
        </div>
    </div>

    <div class="book-btn"><a href="<?= esc($brand['reserve_anchor']) ?>" class="theme-btn"><span class="icon"><img src="<?= base_url('front_template/images/resource/book-icon-1.png') ?>" alt=""></span><span class="txt"><?= esc($ui['label_book_table']) ?></span></a></div>
</section>

<section class="we-offer-section">
    <div class="left-bot-bg"><img src="<?= base_url('front_template/images/background/bg-1.png') ?>" alt=""></div>
    <div class="right-top-bg"><img src="<?= base_url('front_template/images/background/bg-2.png') ?>" alt=""></div>
    <div class="auto-container">
        <div class="title-box centered">
            <div class="subtitle"><span><?= esc($ui['home_offer_subtitle']) ?></span></div>
            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
            <h2><?= esc($ui['home_offer_heading']) ?></h2>
            <div class="text"><?= esc($ui['home_offer_text']) ?></div>
        </div>
        <div class="row justify-content-center clearfix">
            <?php foreach ($collections as $index => $collection): ?>
                <div class="offer-block col-xl-4 col-lg-4 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="<?= $index * 300 ?>ms">
                        <div class="image"><a href="<?= esc($collection['button_link'] ?? $brand['menu_anchor']) ?>"><img src="<?= esc($collection['image'] ?? ($menuSections[$index]['image'] ?? $heroSlides[0]['image'])) ?>" alt="<?= esc($collection['name']) ?>"></a></div>
                        <h3><a href="<?= esc($collection['button_link'] ?? $brand['menu_anchor']) ?>"><?= esc($collection['name']) ?></a></h3>
                        <div class="more-link"><a href="<?= esc($collection['button_link'] ?? $brand['menu_anchor']) ?>"><?= esc($collection['button_label'] ?? 'view menu') ?></a></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="story-section" id="about">
    <div class="left-bg"><img src="<?= base_url('front_template/images/background/bg-3.png') ?>" alt=""></div>
    <div class="auto-container">
        <div class="row clearfix">
            <div class="text-col col-xl-5 col-lg-5 col-md-12 col-sm-12">
                <div class="inner wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="title-box centered">
                        <div class="subtitle"><span><?= esc($ui['home_story_subtitle']) ?></span></div>
                        <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
                        <h2><?= esc($ui['home_story_title']) ?></h2>
                        <div class="text"><?= esc($ui['home_story_text']) ?></div>
                    </div>
                    <div class="booking-info">
                        <div class="bk-title"><?= esc($ui['header_booking_title']) ?></div>
                        <div class="bk-no"><a href="tel:<?= esc(str_replace(' ', '', $brand['phone_primary'])) ?>"><?= esc($brand['phone_primary']) ?></a></div>
                        <div class="link-box">
                            <a href="<?= esc($brand['menu_anchor']) ?>" class="theme-btn btn-style-two clearfix">
                                <span class="btn-wrap">
                                    <span class="text-one"><?= esc($ui['home_story_cta_label']) ?></span>
                                    <span class="text-two"><?= esc($ui['home_story_cta_label']) ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
            <div class="image-col col-xl-7 col-lg-7 col-md-12 col-sm-12">
                <div class="inner wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="round-stamp"><img src="<?= base_url('front_template/images/resource/badge-1.png') ?>" alt=""></div>
                    <div class="images parallax-scene-1">
                        <div class="image" data-depth="0.15"><img src="<?= esc(base_url($ui['home_story_image_primary'])) ?>" alt="<?= esc($brand['name']) ?>"></div>
                        <div class="image" data-depth="0.30"><img src="<?= esc(base_url($ui['home_story_image_secondary'])) ?>" alt="<?= esc($brand['name']) ?>"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="special-dish">
    <div class="bottom-image"><img src="<?= base_url('front_template/images/resource/image-3.png') ?>" alt=""></div>
    <div class="outer-container">
        <div class="row clearfix">
            <div class="image-col col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="inner wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="image-layer" style="background-image: url(<?= esc($specialDish['image']) ?>);"></div>
                    <div class="image"><img src="<?= esc($specialDish['image']) ?>" alt="<?= esc($specialDish['name']) ?>"></div>
                </div>
            </div>
            <div class="content-col col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="right-bg"><img src="<?= base_url('front_template/images/background/bg-4.png') ?>" alt=""></div>
                <div class="inner wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="title-box">
                        <span class="badge-icon"><img src="<?= base_url('front_template/images/resource/badge-2.png') ?>" alt=""></span>
                        <div class="subtitle"><span><?= esc($ui['home_special_dish_subtitle']) ?></span></div>
                        <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
                        <h2><?= esc($specialDish['name']) ?></h2>
                        <div class="text"><?= esc($specialDish['long_description']) ?></div>
                    </div>
                    <div class="price"><span class="old">$<?= number_format($specialDish['original_price'], 2) ?></span> <span class="new">$<?= number_format($specialDish['price'], 2) ?></span></div>
                    <div class="link-box lm-dual-actions">
                        <a href="<?= site_url('product/' . $specialDish['slug']) ?>" class="theme-btn btn-style-two clearfix">
                            <span class="btn-wrap">
                                <span class="text-one"><?= esc($ui['label_view_details']) ?></span>
                                <span class="text-two"><?= esc($ui['label_view_details']) ?></span>
                            </span>
                        </a>
                        <button class="theme-btn btn-style-one clearfix add-to-cart" data-product-slug="<?= esc($specialDish['slug']) ?>" data-product-name="<?= esc($specialDish['name']) ?>" data-product-price="<?= esc((string) $specialDish['price']) ?>" data-product-image="<?= esc($specialDish['image']) ?>">
                            <span class="btn-wrap">
                                <span class="text-one"><?= esc($ui['label_add_to_cart']) ?></span>
                                <span class="text-two"><?= esc($ui['label_add_to_cart']) ?></span>
                            </span>
                        </button>
                    </div>
                    <div class="lm-shop-link">
                        <a href="<?= esc($brand['cart_anchor']) ?>"><?= esc($ui['label_view_cart_and_order']) ?></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="menu-section" id="menu">
    <div class="left-bg"><img src="<?= base_url('front_template/images/background/bg-5.png') ?>" alt=""></div>
    <div class="right-bg"><img src="<?= base_url('front_template/images/background/bg-6.png') ?>" alt=""></div>
    <div class="auto-container">
        <div class="title-box centered">
            <div class="subtitle"><span><?= esc($ui['home_menu_subtitle']) ?></span></div>
            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
            <h2><?= esc($ui['home_menu_heading']) ?></h2>
        </div>

        <div class="tabs-box menu-tabs">
            <div class="buttons">
                <ul class="tab-buttons clearfix">
                    <?php $tabIndex = 1; foreach ($tabGroups as $category => $items): ?>
                        <li class="tab-btn <?= $tabIndex === 1 ? 'active-btn' : '' ?>" data-tab="#tab-<?= $tabIndex ?>"><span><?= esc(strtoupper($category)) ?></span></li>
                    <?php $tabIndex++; endforeach; ?>
                </ul>
            </div>
            <div class="tabs-content">
                <?php $tabIndex = 1; foreach ($tabGroups as $category => $items): ?>
                    <div class="tab <?= $tabIndex === 1 ? 'active-tab' : '' ?>" id="tab-<?= $tabIndex ?>">
                        <div class="row clearfix">
                            <?php $chunks = array_chunk($items, (int) ceil(count($items) / 2)); ?>
                            <?php foreach ($chunks as $chunk): ?>
                                <div class="menu-col col-lg-6 col-md-12 col-sm-12">
                                    <div class="inner">
                                        <?php foreach ($chunk as $item): ?>
                                            <div class="dish-block">
                                                <div class="inner-box">
                                                    <div class="dish-image"><a href="<?= site_url('product/' . $item['slug']) ?>"><img src="<?= esc($item['image']) ?>" alt="<?= esc($item['name']) ?>"></a></div>
                                                    <div class="title clearfix">
                                                        <div class="ttl clearfix"><h5><a href="<?= site_url('product/' . $item['slug']) ?>"><?= esc($item['name']) ?></a></h5></div>
                                                        <div class="price"><span>$<?= number_format($item['price'], 2) ?></span></div>
                                                    </div>
                                                    <div class="text desc"><a href="<?= site_url('product/' . $item['slug']) ?>"><?= esc($item['subtitle']) ?></a></div>
                                                    <div class="lm-dish-actions">
                                                        <a href="<?= site_url('product/' . $item['slug']) ?>" class="lm-link-btn"><?= esc($ui['label_details']) ?></a>
                                                        <button class="lm-link-btn add-to-cart" data-product-slug="<?= esc($item['slug']) ?>" data-product-name="<?= esc($item['name']) ?>" data-product-price="<?= esc((string) $item['price']) ?>" data-product-image="<?= esc($item['image']) ?>"><?= esc($ui['label_add_to_cart']) ?></button>
                                                    </div>
                                                </div>
                                            </div>
                                        <?php endforeach; ?>
                                    </div>
                                </div>
                            <?php endforeach; ?>
                        </div>
                    </div>
                <?php $tabIndex++; endforeach; ?>
            </div>
        </div>

        <div class="open-timing">
            <div class="hours"><?= esc($brand['hours_weekday']) ?> <span class="theme_color">|</span> <?= esc($brand['hours_weekend']) ?> <span class="theme_color">|</span> <?= esc($brand['hours_note']) ?></div>
            <div class="link-box">
                <a href="<?= esc($brand['menu_anchor']) ?>" class="theme-btn btn-style-two clearfix">
                    <span class="btn-wrap">
                        <span class="text-one"><?= esc($ui['home_menu_cta_label']) ?></span>
                        <span class="text-two"><?= esc($ui['home_menu_cta_label']) ?></span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="special-offer">
    <div class="outer-container">
        <div class="auto-container">
            <div class="title-box centered">
                <div class="subtitle"><span><?= esc($ui['home_special_offer_subtitle']) ?></span></div>
                <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
                <h2><?= esc($ui['home_special_offer_heading']) ?></h2>
            </div>
            <div class="dish-gallery-slider owl-theme owl-carousel">
                <?php foreach ($featuredProducts as $index => $item): ?>
                    <div class="offer-block-two <?= $index % 2 === 1 ? 'margin-top' : '' ?>">
                        <div class="inner-box">
                            <div class="image"><a href="<?= site_url('product/' . $item['slug']) ?>"><img src="<?= esc($item['image']) ?>" alt="<?= esc($item['name']) ?>"></a></div>
                            <h4><a href="<?= site_url('product/' . $item['slug']) ?>"><?= esc($item['name']) ?></a></h4>
                            <div class="text desc"><?= esc($item['description']) ?></div>
                            <div class="price">$<?= number_format($item['price'], 2) ?></div>
                            <div class="lm-offer-actions">
                                <a href="<?= site_url('product/' . $item['slug']) ?>" class="lm-link-btn"><?= esc($ui['label_details']) ?></a>
                                <button class="lm-link-btn add-to-cart" data-product-slug="<?= esc($item['slug']) ?>" data-product-name="<?= esc($item['name']) ?>" data-product-price="<?= esc((string) $item['price']) ?>" data-product-image="<?= esc($item['image']) ?>"><?= esc($ui['label_add_to_cart']) ?></button>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="lower-link-box text-center">
                <a href="<?= esc($brand['menu_anchor']) ?>" class="theme-btn btn-style-two clearfix">
                    <span class="btn-wrap">
                        <span class="text-one"><?= esc($ui['home_special_offer_cta_label']) ?></span>
                        <span class="text-two"><?= esc($ui['home_special_offer_cta_label']) ?></span>
                    </span>
                </a>
            </div>
        </div>
    </div>
</section>

<section class="image-gallery" id="gallery">
    <div class="carousel-box">
        <div class="auto-container">
            <div class="title-box centered">
                <div class="subtitle"><span><?= esc($ui['home_gallery_subtitle']) ?></span></div>
                <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
                <h2><?= esc($ui['home_gallery_heading']) ?></h2>
            </div>
            <div class="image-gallery-slider owl-theme owl-carousel">
                <?php foreach ($galleryImages as $image): ?>
                    <div class="gallery-block">
                        <div class="image">
                            <a href="<?= esc($image) ?>" class="lightbox-image" data-fancybox="gallery">
                                <img src="<?= esc($image) ?>" alt="<?= esc($brand['name']) ?>">
                            </a>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
</section>

<section class="testimonials-section" id="testimonials">
    <div class="image-layer" style="background-image: url(<?= base_url('front_template/images/background/image-2.jpg') ?>);"></div>
    <div class="auto-container">
        <div class="carousel-box">
            <div class="testi-top owl-theme owl-carousel">
                <?php foreach ($testimonials as $testimonial): ?>
                    <div class="slide-item">
                        <div class="slide-content">
                            <div class="quotes">"</div>
                            <div class="text quote-text"><?= esc($testimonial['quote']) ?></div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
            <div class="separator"><span></span><span></span><span></span></div>
            <div class="thumbs-carousel-box">
                <div class="testi-thumbs owl-theme owl-carousel">
                    <?php foreach ($testimonials as $index => $testimonial): ?>
                        <div class="slide-item">
                            <div class="image"><img src="<?= esc($testimonial['image'] ?: base_url('front_template/images/resource/author-thumb-' . (($index % 3) + 1) . '.jpg')) ?>" alt="<?= esc($testimonial['author']) ?>"></div>
                            <div class="auth-title"><?= esc($testimonial['author']) ?></div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="reserve-section" id="reserve">
    <div class="auto-container">
        <div class="outer-box">
            <div class="row clearfix">
                <div class="reserv-col col-lg-8 col-md-12 col-sm-12">
                    <div class="inner">
                        <div class="title">
                            <h2><?= esc($ui['reservation_heading']) ?></h2>
                            <div class="request-info"><?= esc($ui['reservation_text']) ?> <a href="tel:<?= esc(str_replace(' ', '', $brand['phone_primary'])) ?>"><?= esc($brand['phone_primary']) ?></a></div>
                        </div>
                        <div class="default-form reservation-form">
                            <form action="<?= site_url('book-table') ?>" method="post">
                                <div class="row clearfix">
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12"><div class="field-inner"><input type="text" name="name" placeholder="Your Name" required></div></div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12"><div class="field-inner"><input type="text" name="phone" placeholder="Phone Number" required></div></div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12"><div class="field-inner"><input type="email" name="email" placeholder="Email Address"></div></div>
                                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                                        <div class="field-inner">
                                            <select class="l-icon" name="occasion">
                                                <?php foreach ($serviceModes as $mode): ?>
                                                    <option><?= esc($mode) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="arrow-icon far fa-angle-down"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <div class="field-inner">
                                            <span class="alt-icon far fa-user"></span>
                                            <select class="l-icon" name="guests">
                                                <?php foreach ($reservationSlots as $slot): ?>
                                                    <option><?= esc($slot) ?></option>
                                                <?php endforeach; ?>
                                            </select>
                                            <span class="arrow-icon far fa-angle-down"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-6 col-sm-12">
                                        <div class="field-inner">
                                            <span class="alt-icon far fa-calendar"></span>
                                            <input class="l-icon datepicker" type="text" name="reservation_date" placeholder="DD-MM-YYYY" required readonly>
                                            <span class="arrow-icon far fa-angle-down"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-4 col-md-12 col-sm-12">
                                        <div class="field-inner">
                                            <span class="alt-icon far fa-clock"></span>
                                            <select class="l-icon" name="reservation_time">
                                                <option>05 : 00 pm</option>
                                                <option>06 : 00 pm</option>
                                                <option>07 : 00 pm</option>
                                                <option>08 : 00 pm</option>
                                                <option>09 : 00 pm</option>
                                                <option>10 : 00 pm</option>
                                            </select>
                                            <span class="arrow-icon far fa-angle-down"></span>
                                        </div>
                                    </div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12"><div class="field-inner"><textarea name="notes" placeholder="Message"></textarea></div></div>
                                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                                        <div class="field-inner">
                                            <button type="submit" class="theme-btn btn-style-one clearfix">
                                                <span class="btn-wrap">
                                                    <span class="text-one"><?= esc($ui['label_book_table']) ?></span>
                                                    <span class="text-two"><?= esc($ui['label_book_table']) ?></span>
                                                </span>
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="info-col col-lg-4 col-md-12 col-sm-12" id="reserve-contact">
                    <div class="inner">
                        <div class="title"><h2><?= esc($ui['home_contact_title']) ?></h2></div>
                        <div class="data">
                            <div class="booking-info">
                                <div class="bk-title"><?= esc($ui['header_booking_title']) ?></div>
                                <div class="bk-no"><a href="tel:<?= esc(str_replace(' ', '', $brand['phone_secondary'])) ?>"><?= esc($brand['phone_secondary']) ?></a></div>
                            </div>
                            <div class="separator"><span></span></div>
                            <ul class="info">
                                <li><strong><?= esc($ui['booking_address_label']) ?></strong><br><?= esc($brand['address']) ?></li>
                                <li><strong><?= esc($ui['booking_hours_label']) ?></strong><br><?= esc($brand['hours_weekday']) ?><br><?= esc($brand['hours_weekend']) ?></li>
                                <li><strong><?= esc($ui['booking_closed_label']) ?></strong><br><?= esc($brand['hours_note']) ?></li>
                            </ul>
                            <div class="separator"><span></span></div>
                            <div class="link-box text-center">
                                <a href="<?= esc($brand['reserve_anchor']) ?>" class="theme-btn btn-style-two clearfix">
                                    <span class="btn-wrap">
                                        <span class="text-one"><?= esc($ui['label_book_table']) ?></span>
                                        <span class="text-two"><?= esc($ui['label_book_table']) ?></span>
                                    </span>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="why-us">
    <div class="left-bg"><img src="<?= base_url('front_template/images/background/bg-8.png') ?>" alt=""></div>
    <div class="right-bg"><img src="<?= base_url('front_template/images/background/bg-7.png') ?>" alt=""></div>
    <div class="auto-container">
        <div class="title-box centered">
            <div class="subtitle"><span><?= esc($ui['home_strength_subtitle']) ?></span></div>
            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
            <h2><?= esc($ui['home_strength_heading']) ?></h2>
        </div>
        <div class="row clearfix">
            <?php foreach ($whyChoose as $index => $item): ?>
                <div class="why-block col-xl-3 col-lg-6 col-md-6 col-sm-12">
                    <div class="inner-box wow fadeInUp" data-wow-duration="1500ms" data-wow-delay="<?= $index * 300 ?>ms">
                        <div class="icon-box"><img src="<?= esc($item['icon']) ?>" alt="<?= esc($item['title']) ?>"></div>
                        <h4><?= esc($item['title']) ?></h4>
                        <div class="text"><?= esc($item['text']) ?></div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
