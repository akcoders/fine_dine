<?= $this->extend('layouts/store') ?>

<?= $this->section('content') ?>
<?php
$menuGroups = [];
foreach ($products as $product) {
    $menuGroups[$product['category']][] = $product;
}

$sectionMeta = [];
foreach ($menuSections as $section) {
    $sectionMeta[$section['title']] = $section;
}
?>

<section class="inner-banner">
    <div class="image-layer" style="background-image: url(<?= esc(base_url($ui['menu_banner_image'])) ?>);"></div>
    <div class="auto-container">
        <div class="inner">
            <div class="subtitle"><span><?= esc($ui['menu_banner_subtitle']) ?></span></div>
            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
            <h1><span><?= esc($ui['menu_banner_title']) ?></span></h1>
            <div class="text mt-3"><?= esc($menuIntro ?? '') ?></div>
        </div>
    </div>
</section>

<?php $sectionIndex = 0; ?>
<?php foreach ($menuGroups as $category => $items): ?>
    <?php
    $meta = $sectionMeta[$category] ?? [
        'title' => $category,
        'subtitle' => 'la majestic selection',
        'description' => 'Explore one of the signature food collections from La Majestic.',
        'image' => $items[0]['image'],
    ];
    ?>
    <section class="menu-one lm-menu-section <?= $sectionIndex % 2 === 1 ? 'alternate' : '' ?>">
        <?php if ($sectionIndex % 2 === 0): ?>
            <div class="right-bg"><img src="<?= base_url('front_template/images/background/bg-16.png') ?>" alt=""></div>
        <?php else: ?>
            <div class="left-bg"><img src="<?= base_url('front_template/images/background/bg-17.png') ?>" alt=""></div>
            <div class="right-bg-2"><img src="<?= base_url('front_template/images/background/bg-18.png') ?>" alt=""></div>
        <?php endif; ?>
        <div class="auto-container">
            <div class="title-box centered">
                <div class="subtitle"><span><?= esc($meta['subtitle']) ?></span></div>
                <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
                <h2><?= esc($meta['title']) ?></h2>
                <div class="text"><?= esc($meta['description']) ?></div>
            </div>

            <div class="row clearfix align-items-start">
                <div class="menu-col col-12">
                    <div class="inner">
                        <div class="lm-menu-card-grid">
                        <?php foreach ($items as $item): ?>
                            <div class="lm-menu-card">
                                <div class="lm-menu-card-media">
                                    <a href="<?= site_url('product/' . $item['slug']) ?>"><img src="<?= esc($item['image']) ?>" alt="<?= esc($item['name']) ?>"></a>
                                </div>
                                <div class="lm-menu-card-body">
                                    <div class="lm-menu-card-top">
                                        <h5><a href="<?= site_url('product/' . $item['slug']) ?>"><?= esc($item['name']) ?></a></h5>
                                        <div class="lm-menu-card-price">$<?= number_format($item['price'], 2) ?></div>
                                    </div>
                                        <div class="lm-menu-card-badge"><?= esc($item['badge']) ?></div>
                                        <div class="lm-menu-card-desc"><?= esc($item['subtitle']) ?></div>
                                        <div class="lm-dish-actions">
                                        <a href="<?= site_url('product/' . $item['slug']) ?>" class="lm-link-btn"><?= esc($ui['label_details']) ?></a>
                                        <button class="lm-link-btn add-to-cart" data-product-slug="<?= esc($item['slug']) ?>" data-product-name="<?= esc($item['name']) ?>" data-product-price="<?= esc((string) $item['price']) ?>" data-product-image="<?= esc($item['image']) ?>"><?= esc($ui['label_add_to_cart']) ?></button>
                                    </div>
                                </div>
                            </div>
                        <?php endforeach; ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <?php $sectionIndex++; ?>
<?php endforeach; ?>

<section class="contact-page lm-cart-cta-section">
    <div class="left-bg"><img src="<?= base_url('front_template/images/background/bg-25.png') ?>" alt=""></div>
    <div class="right-bg"><img src="<?= base_url('front_template/images/background/bg-6.png') ?>" alt=""></div>
    <div class="auto-container">
        <div class="c-page-form-box lm-cart-cta-box">
            <div class="row clearfix">
                <div class="loc-block col-lg-6 col-md-12 col-sm-12">
                    <div class="title-box centered">
                        <h2><?= esc($ui['menu_cta_title']) ?></h2>
                        <div class="text desc"><?= esc($ui['menu_cta_text']) ?></div>
                    </div>
                    <div class="lm-dual-actions lm-cart-cta-actions">
                        <a href="<?= esc($brand['cart_anchor']) ?>" class="theme-btn btn-style-one clearfix">
                            <span class="btn-wrap">
                                <span class="text-one"><?= esc($ui['menu_cta_cart_label']) ?></span>
                                <span class="text-two"><?= esc($ui['menu_cta_cart_label']) ?></span>
                            </span>
                        </a>
                        <a href="<?= esc($brand['reserve_anchor']) ?>" class="theme-btn btn-style-two clearfix">
                            <span class="btn-wrap">
                                <span class="text-one"><?= esc($ui['menu_cta_book_label']) ?></span>
                                <span class="text-two"><?= esc($ui['menu_cta_book_label']) ?></span>
                            </span>
                        </a>
                    </div>
                </div>
                <div class="loc-block col-lg-6 col-md-12 col-sm-12">
                    <img src="<?= esc(base_url($ui['menu_cta_image'])) ?>" alt="<?= esc($brand['name']) ?>">
                </div>
            </div>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
