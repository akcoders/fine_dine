<?= $this->extend('layouts/store') ?>

<?= $this->section('content') ?>
<section class="inner-banner">
    <div class="image-layer" style="background-image: url(<?= esc(base_url($ui['booking_banner_image'])) ?>);"></div>
    <div class="auto-container">
        <div class="inner">
            <div class="subtitle"><span><?= esc($ui['booking_banner_subtitle']) ?></span></div>
            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
            <h1><span><?= esc($ui['booking_banner_title']) ?></span></h1>
        </div>
    </div>
</section>

<section class="online-reservation inner-page lm-booking-page">
    <div class="left-bg"><img src="<?= base_url('front_template/images/background/bg-5.png') ?>" alt=""></div>
    <div class="right-bg"><img src="<?= base_url('front_template/images/background/bg-6.png') ?>" alt=""></div>
    <div class="auto-container">
        <div class="title-box centered">
            <div class="subtitle"><span><?= esc($ui['booking_subtitle']) ?></span></div>
            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
            <h2><?= esc($ui['booking_heading']) ?></h2>
            <div class="text desc"><?= esc($bookingIntro ?? 'Book your table for a refined dinner, a private celebration, or a relaxed fine-dining night at La Majestic.') ?></div>
            <div class="text request-info"><?= esc($ui['booking_request_text']) ?> <a href="tel:<?= esc(str_replace(' ', '', $brand['phone_primary'])) ?>"><?= esc($brand['phone_primary']) ?></a> or fill out the table request below.</div>
        </div>

        <div class="default-form reservation-form">
            <form action="<?= site_url('book-table') ?>" method="post">
                <div class="row clearfix">
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
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <div class="field-inner">
                            <input type="text" name="name" placeholder="Your Name" required>
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <div class="field-inner">
                            <input type="text" name="phone" placeholder="Phone Number" required>
                        </div>
                    </div>
                    <div class="form-group col-lg-6 col-md-6 col-sm-12">
                        <div class="field-inner">
                            <input type="email" name="email" placeholder="Email Address" required>
                        </div>
                    </div>
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
                    <div class="form-group col-lg-12 col-md-12 col-sm-12">
                        <div class="field-inner">
                            <textarea name="notes" placeholder="Special request"></textarea>
                        </div>
                    </div>
                </div>
                <button type="submit" class="theme-btn btn-style-one clearfix">
                    <span class="btn-wrap">
                        <span class="text-one"><?= esc($ui['booking_button_label']) ?></span>
                        <span class="text-two"><?= esc($ui['booking_button_label']) ?></span>
                    </span>
                </button>
            </form>
            <div class="powered-by"><?= esc($ui['booking_footer_note']) ?></div>
        </div>
    </div>

    <div class="map-location-section">
        <div class="auto-container">
            <div class="outer-box">
                <div class="row clearfix">
                    <div class="reserv-col col-lg-8 col-md-12 col-sm-12">
                        <div class="inner">
                            <iframe src="<?= esc($ui['booking_map_embed']) ?>" width="100%" height="560" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                        </div>
                    </div>
                    <div class="info-col col-lg-4 col-md-12 col-sm-12">
                        <div class="inner">
                            <div class="title">
                                <h2><?= esc($ui['booking_location_title']) ?></h2>
                            </div>
                            <div class="data">
                                <div class="booking-info">
                                    <div class="bk-title"><?= esc($ui['header_booking_title']) ?></div>
                                    <div class="bk-no"><a href="tel:<?= esc(str_replace(' ', '', $brand['phone_primary'])) ?>"><?= esc($brand['phone_primary']) ?></a></div>
                                </div>
                                <div class="separator"><span></span></div>
                                <ul class="info">
                                    <li><strong><?= esc($ui['booking_address_label']) ?></strong><br><?= esc($brand['address']) ?></li>
                                    <li><strong><?= esc($ui['booking_email_label']) ?></strong><br><a href="mailto:<?= esc($brand['email']) ?>"><?= esc($brand['email']) ?></a></li>
                                    <li><strong><?= esc($ui['booking_hours_label']) ?></strong><br><?= esc($brand['hours_weekday']) ?><br><?= esc($brand['hours_weekend']) ?></li>
                                    <li><strong><?= esc($ui['booking_closed_label']) ?></strong><br><?= esc($brand['hours_note']) ?></li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
