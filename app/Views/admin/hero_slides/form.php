<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php $isEdit = ! empty($slide); ?>
<form method="post" enctype="multipart/form-data" action="<?= $isEdit ? site_url('admin/hero-slides/update/' . $slide['id']) : site_url('admin/hero-slides/store') ?>">
    <div class="admin-card p-4">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">Eyebrow</label>
                <input type="text" name="eyebrow" class="form-control" value="<?= esc($slide['eyebrow'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="<?= esc((string) ($slide['sort_order'] ?? 0)) ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="<?= esc($slide['title'] ?? '') ?>" required>
            </div>
            <div class="col-12">
                <label class="form-label">Text</label>
                <textarea name="text" rows="4" class="form-control"><?= esc($slide['text'] ?? '') ?></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Button Label</label>
                <input type="text" name="button_label" class="form-control" value="<?= esc($slide['button_label'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Button Link</label>
                <input type="text" name="button_link" class="form-control" value="<?= esc($slide['button_link'] ?? '') ?>">
                <div class="form-text">Example: `menu`, `book-table`, or `product/lobster-bisque`.</div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Image Path</label>
                <input type="text" name="image" class="form-control" value="<?= esc($slide['image'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Upload New Image</label>
                <input type="file" name="image_file" class="form-control">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" <?= ! isset($slide['is_active']) || $slide['is_active'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn btn-primary">Save Slide</button>
        <a href="<?= site_url('admin/hero-slides') ?>" class="btn btn-outline-light">Back</a>
    </div>
</form>
<?= $this->endSection() ?>
