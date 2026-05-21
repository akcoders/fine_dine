<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php $isEdit = ! empty($offer); ?>
<form method="post" enctype="multipart/form-data" action="<?= $isEdit ? site_url('admin/offers/update/' . $offer['id']) : site_url('admin/offers/store') ?>">
    <div class="admin-card p-4">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="<?= esc($offer['title'] ?? '') ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="<?= esc($offer['subtitle'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Badge</label>
                <input type="text" name="badge" class="form-control" value="<?= esc($offer['badge'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Price Label</label>
                <input type="text" name="price_label" class="form-control" value="<?= esc($offer['price_label'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Button Label</label>
                <input type="text" name="button_label" class="form-control" value="<?= esc($offer['button_label'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Button Link</label>
                <input type="text" name="button_link" class="form-control" value="<?= esc($offer['button_link'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control"><?= esc($offer['description'] ?? '') ?></textarea>
            </div>
            <div class="col-md-4">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="<?= esc((string) ($offer['sort_order'] ?? 0)) ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Image Path</label>
                <input type="text" name="image" class="form-control" value="<?= esc($offer['image'] ?? '') ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Upload New Image</label>
                <input type="file" name="image_file" class="form-control">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" <?= ! isset($offer['is_active']) || $offer['is_active'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn btn-primary">Save Offer</button>
        <a href="<?= site_url('admin/offers') ?>" class="btn btn-outline-light">Back</a>
    </div>
</form>
<?= $this->endSection() ?>
