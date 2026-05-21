<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php $isEdit = ! empty($item); ?>
<form method="post" enctype="multipart/form-data" action="<?= $isEdit ? site_url('admin/gallery/update/' . $item['id']) : site_url('admin/gallery/store') ?>">
    <div class="admin-card p-4">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">Title</label>
                <input type="text" name="title" class="form-control" value="<?= esc($item['title'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="<?= esc((string) ($item['sort_order'] ?? 0)) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Image Path</label>
                <input type="text" name="image" class="form-control" value="<?= esc($item['image'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Upload New Image</label>
                <input type="file" name="image_file" class="form-control">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" <?= ! isset($item['is_active']) || $item['is_active'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn btn-primary">Save Gallery Item</button>
        <a href="<?= site_url('admin/gallery') ?>" class="btn btn-outline-light">Back</a>
    </div>
</form>
<?= $this->endSection() ?>
