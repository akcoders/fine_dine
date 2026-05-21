<?= $this->extend('layouts/store') ?>

<?= $this->section('content') ?>
<section class="inner-banner">
    <div class="image-layer" style="background-image: url(<?= esc(base_url($ui['cart_banner_image'])) ?>);"></div>
    <div class="auto-container">
        <div class="inner">
            <div class="subtitle"><span><?= esc($ui['cart_summary_subtitle']) ?></span></div>
            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
            <h1><span><?= esc($ui['checkout_cancel_title']) ?></span></h1>
        </div>
    </div>
</section>

<section class="contact-page">
    <div class="auto-container">
        <div class="c-page-form-box">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="lm-cart-summary text-center">
                        <div class="title-box centered">
                            <h2><?= esc($ui['checkout_cancel_title']) ?></h2>
                            <div class="text desc"><?= esc($ui['checkout_cancel_text']) ?></div>
                        </div>
                        <?php if (! empty($order)): ?>
                            <ul class="lm-cart-totals">
                                <li><span>Order Reference</span><strong><?= esc($order['order_reference']) ?></strong></li>
                                <li><span>Payment Method</span><strong><?= esc(ucfirst($order['payment_method'])) ?></strong></li>
                                <li><span>Payment Status</span><strong><?= esc(ucfirst(str_replace('_', ' ', $order['payment_status']))) ?></strong></li>
                            </ul>
                        <?php endif; ?>
                        <div class="lm-dual-actions lm-cart-summary-actions justify-content-center">
                            <a href="<?= esc($brand['cart_anchor']) ?>" class="theme-btn btn-style-one clearfix">
                                <span class="btn-wrap">
                                    <span class="text-one"><?= esc($ui['checkout_back_to_cart_label']) ?></span>
                                    <span class="text-two"><?= esc($ui['checkout_back_to_cart_label']) ?></span>
                                </span>
                            </a>
                            <a href="<?= esc($brand['menu_anchor']) ?>" class="theme-btn btn-style-two clearfix">
                                <span class="btn-wrap">
                                    <span class="text-one"><?= esc($ui['checkout_view_menu_label']) ?></span>
                                    <span class="text-two"><?= esc($ui['checkout_view_menu_label']) ?></span>
                                </span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
