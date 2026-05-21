<?= $this->extend('layouts/store') ?>

<?= $this->section('content') ?>
<section class="inner-banner">
    <div class="image-layer" style="background-image: url(<?= esc($product['image']) ?>);"></div>
    <div class="auto-container">
        <div class="inner">
            <div class="subtitle"><span><?= esc(strtolower($product['category'])) ?></span></div>
            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
            <h1><span><?= esc($product['name']) ?></span></h1>
        </div>
    </div>
</section>

<section class="special-dish lm-product-detail">
    <div class="bottom-image"><img src="<?= base_url('front_template/images/resource/image-3.png') ?>" alt=""></div>
    <div class="outer-container">
        <div class="row clearfix">
            <div class="image-col col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="inner wow fadeInLeft" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="image-layer" style="background-image: url(<?= esc($product['image']) ?>);"></div>
                    <div class="image"><img src="<?= esc($product['image']) ?>" alt="<?= esc($product['name']) ?>"></div>
                </div>
            </div>
            <div class="content-col col-xl-6 col-lg-6 col-md-12 col-sm-12">
                <div class="right-bg"><img src="<?= base_url('front_template/images/background/bg-4.png') ?>" alt=""></div>
                <div class="inner wow fadeInRight" data-wow-duration="1500ms" data-wow-delay="0ms">
                    <div class="title-box">
                        <span class="badge-icon"><img src="<?= base_url('front_template/images/resource/badge-2.png') ?>" alt=""></span>
                        <div class="subtitle"><span><?= esc($product['badge']) ?></span></div>
                        <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
                        <h2><?= esc($product['name']) ?></h2>
                        <div class="text"><?= esc($product['long_description']) ?></div>
                    </div>
                    <div class="lm-product-meta">
                        <span><?= esc($product['prep_time']) ?></span>
                        <span><?= esc($product['serves']) ?></span>
                        <span><?= esc($ui['product_rating_label']) ?> <?= esc($product['rating']) ?></span>
                    </div>
                    <div class="price"><span class="old">$<?= number_format($product['original_price'], 2) ?></span> <span class="new">$<?= number_format($product['price'], 2) ?></span></div>
                    <div class="lm-product-notes">
                        <?php foreach ($product['notes'] as $note): ?>
                            <span><?= esc($note) ?></span>
                        <?php endforeach; ?>
                    </div>
                    <div class="link-box lm-dual-actions">
                        <button class="theme-btn btn-style-one clearfix add-to-cart" data-product-slug="<?= esc($product['slug']) ?>" data-product-name="<?= esc($product['name']) ?>" data-product-price="<?= esc((string) $product['price']) ?>" data-product-image="<?= esc($product['image']) ?>">
                            <span class="btn-wrap">
                                <span class="text-one"><?= esc($ui['label_add_to_cart']) ?></span>
                                <span class="text-two"><?= esc($ui['label_add_to_cart']) ?></span>
                            </span>
                        </button>
                        <a href="<?= esc($brand['reserve_anchor']) ?>" class="theme-btn btn-style-two clearfix">
                            <span class="btn-wrap">
                                <span class="text-one"><?= esc($ui['label_book_table']) ?></span>
                                <span class="text-two"><?= esc($ui['label_book_table']) ?></span>
                            </span>
                        </a>
                    </div>
                    <div class="lm-shop-link">
                        <a href="<?= esc($brand['cart_anchor']) ?>"><?= esc($ui['label_view_cart_and_order']) ?></a>
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
                <div class="subtitle"><span><?= esc($ui['product_related_subtitle']) ?></span></div>
                <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
                <h2><?= esc($ui['product_related_heading']) ?></h2>
            </div>
            <div class="dish-gallery-slider owl-theme owl-carousel">
                <?php foreach ($relatedProducts as $index => $item): ?>
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
