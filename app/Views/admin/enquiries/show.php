<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="admin-card p-4">
    <div class="row g-4">
        <div class="col-lg-4">
            <h2 class="h5">Customer</h2>
            <p class="mb-1"><?= esc($enquiry['name']) ?></p>
            <p class="mb-1"><?= esc($enquiry['phone'] ?: '-') ?></p>
            <p class="mb-1"><?= esc($enquiry['email'] ?: '-') ?></p>
            <p class="mb-0">Status: <span class="badge text-bg-secondary"><?= esc($enquiry['status']) ?></span></p>
        </div>
        <div class="col-lg-8">
            <h2 class="h5"><?= esc($enquiry['subject'] ?: 'General enquiry') ?></h2>
            <p class="mb-0"><?= nl2br(esc($enquiry['message'])) ?></p>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
