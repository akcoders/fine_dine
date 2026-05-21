<?= $this->extend('layouts/store') ?>

<?= $this->section('content') ?>
<section class="inner-banner">
    <div class="image-layer" style="background-image: url(<?= esc(base_url($ui['gallery_banner_image'])) ?>);"></div>
    <div class="auto-container">
        <div class="inner">
            <div class="subtitle"><span><?= esc($ui['gallery_banner_subtitle']) ?></span></div>
            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
            <h1><span><?= esc($ui['gallery_banner_title']) ?></span></h1>
        </div>
    </div>
</section>

<section class="lm-gallery-page">
    <div class="left-bg"><img src="<?= base_url('front_template/images/background/bg-5.png') ?>" alt=""></div>
    <div class="right-bg"><img src="<?= base_url('front_template/images/background/bg-6.png') ?>" alt=""></div>
    <div class="auto-container">
        <div class="title-box centered">
            <div class="subtitle"><span><?= esc($ui['gallery_subtitle']) ?></span></div>
            <div class="pattern-image"><img src="<?= base_url('front_template/images/icons/separator.svg') ?>" alt=""></div>
            <h2><?= esc($ui['gallery_heading']) ?></h2>
            <div class="text"><?= esc($galleryIntro ?? 'A curated glimpse into the warmth of our dining room, our plated signatures, and the textures that shape the La Majestic experience.') ?></div>
        </div>

        <div class="lm-gallery-grid">
            <?php foreach ($galleryImages as $index => $image): ?>
                <div class="lm-gallery-tile <?= $index % 5 === 0 ? 'is-tall' : '' ?>">
                    <a href="<?= esc($image) ?>" class="lightbox-image" data-fancybox="gallery-grid">
                        <img src="<?= esc($image) ?>" alt="<?= esc($brand['name']) ?>">
                    </a>
                </div>
            <?php endforeach; ?>
        </div>
    </div>
</section>
<?= $this->endSection() ?>
