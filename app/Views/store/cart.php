<?= $this->extend('layouts/store') ?>

<?= $this->section('content') ?>
<section class="inner-banner">
    <div class="image-layer" style="background-image: url(<?= esc(base_url($ui['cart_banner_image'])) ?>);"></div>
    <div class="auto-container">
        <div class="inner">
            <div class="subtitle"><span><?= esc($ui['cart_banner_subtitle']) ?></span></div>
            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
            <h1><span><?= esc($ui['cart_banner_title']) ?></span></h1>
        </div>
    </div>
</section>

<section class="contact-page lm-cart-page" data-clear-cart="<?= session()->getFlashdata('clearCart') ? '1' : '0' ?>" data-online-payment-enabled="<?= $onlinePaymentEnabled ? '1' : '0' ?>">
    <div class="left-bg"><img src="<?= base_url('front_template/images/background/bg-25.png') ?>" alt=""></div>
    <div class="right-bg"><img src="<?= base_url('front_template/images/background/bg-6.png') ?>" alt=""></div>
    <div class="auto-container">
        <div class="c-page-form-box">
            <div class="row clearfix">
                <div class="loc-block col-lg-7 col-md-12 col-sm-12">
                    <div class="title-box centered">
                        <h2><?= esc($ui['cart_title']) ?></h2>
                        <div class="text desc"><?= esc($ui['cart_intro']) ?></div>
                    </div>
                    <div id="cartEmptyState" class="lm-cart-empty">
                        <h4><?= esc($ui['cart_empty_title']) ?></h4>
                        <p><?= esc($ui['cart_empty_text']) ?></p>
                        <a href="<?= esc($brand['menu_anchor']) ?>" class="theme-btn btn-style-one clearfix">
                            <span class="btn-wrap">
                                <span class="text-one"><?= esc($ui['label_browse_menu']) ?></span>
                                <span class="text-two"><?= esc($ui['label_browse_menu']) ?></span>
                            </span>
                        </a>
                    </div>
                    <div id="cartItems" class="lm-cart-items"></div>
                </div>

                <div class="loc-block col-lg-5 col-md-12 col-sm-12">
                    <div class="lm-cart-summary">
                        <div class="title-box centered">
                            <div class="subtitle"><span><?= esc($ui['cart_summary_subtitle']) ?></span></div>
                            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
                            <h2><?= esc($ui['cart_summary_title']) ?></h2>
                        </div>
                        <ul class="lm-cart-totals">
                            <li><span><?= esc($ui['cart_items_label']) ?></span><strong id="cartItemsCount">0</strong></li>
                            <li><span><?= esc($ui['cart_subtotal_label']) ?></span><strong id="cartSubtotal">$0.00</strong></li>
                        </ul>

                        <form method="post" action="<?= site_url('cart/checkout') ?>" id="cartCheckoutForm">
                            <input type="hidden" name="payment_method" id="checkoutPaymentMethod" value="cash">
                            <input type="hidden" name="subtotal" id="checkoutSubtotal" value="0">
                            <input type="hidden" name="items_json" id="checkoutItemsJson" value="[]">

                            <div class="lm-order-mode">
                                <h5><?= esc($ui['checkout_payment_heading']) ?></h5>
                                <label class="lm-order-option">
                                    <input type="radio" name="payment_method_choice" value="cash" checked>
                                    <span>
                                        <strong><?= esc($ui['checkout_cash_title']) ?></strong>
                                        <em><?= esc($ui['checkout_cash_text']) ?></em>
                                    </span>
                                </label>
                                <label class="lm-order-option <?= $onlinePaymentEnabled ? '' : 'is-disabled' ?>">
                                    <input type="radio" name="payment_method_choice" value="online" <?= $onlinePaymentEnabled ? '' : 'disabled' ?>>
                                    <span>
                                        <strong><?= esc($ui['checkout_online_title']) ?></strong>
                                        <em><?= esc($onlinePaymentEnabled ? $ui['checkout_online_text'] : $ui['checkout_online_unavailable_text']) ?></em>
                                    </span>
                                </label>
                            </div>

                            <div class="lm-cart-summary-copy">
                                <p><?= esc($cartSummaryText ?? $ui['cart_summary_text']) ?></p>
                            </div>

                            <div class="row g-3">
                                <div class="col-12">
                                    <label class="form-label"><?= esc($ui['cart_form_name_label']) ?></label>
                                    <input type="text" name="customer_name" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><?= esc($ui['cart_form_phone_label']) ?></label>
                                    <input type="text" name="phone" class="form-control" required>
                                </div>
                                <div class="col-md-6">
                                    <label class="form-label"><?= esc($ui['cart_form_email_label']) ?></label>
                                    <input type="email" name="email" class="form-control" required>
                                </div>
                                <div class="col-12">
                                    <label class="form-label"><?= esc($ui['cart_form_notes_label']) ?></label>
                                    <textarea name="order_notes" rows="4" class="form-control" placeholder="<?= esc($ui['cart_form_notes_placeholder']) ?>"></textarea>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="theme-btn btn-style-one clearfix w-100" id="submitOrderBtn">
                                        <span class="btn-wrap">
                                            <span class="text-one"><?= esc($ui['label_submit_takeaway']) ?></span>
                                            <span class="text-two"><?= esc($ui['label_submit_takeaway']) ?></span>
                                        </span>
                                    </button>
                                </div>
                            </div>
                        </form>

                        <div class="lm-dual-actions lm-cart-summary-actions mt-4">
                            <button type="button" id="clearCart" class="lm-link-btn"><?= esc($ui['label_clear_cart']) ?></button>
                            <a href="<?= esc($brand['menu_anchor']) ?>" class="lm-link-btn"><?= esc($ui['label_continue_takeaway']) ?></a>
                        </div>
                        <div class="lm-cart-contact">
                            <h5><?= esc($ui['cart_help_title']) ?></h5>
                            <p><a href="tel:<?= esc(str_replace(' ', '', $brand['phone_primary'])) ?>"><?= esc($brand['phone_primary']) ?></a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="special-offer">
    <div class="outer-container">
        <div class="auto-container">
            <div class="title-box centered">
                <div class="subtitle"><span><?= esc($ui['cart_recommended_subtitle']) ?></span></div>
                <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
                <h2><?= esc($ui['cart_recommended_heading']) ?></h2>
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
        </div>
    </div>
</section>
<?= $this->endSection() ?>
