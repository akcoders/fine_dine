<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php $isEdit = ! empty($category); ?>
<form method="post" enctype="multipart/form-data" action="<?= $isEdit ? site_url('admin/categories/update/' . $category['id']) : site_url('admin/categories/store') ?>">
    <div class="admin-card p-4">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">Category Name</label>
                <input type="text" name="name" class="form-control" value="<?= esc($category['name'] ?? '') ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="<?= esc($category['slug'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="<?= esc($category['subtitle'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="<?= esc((string) ($category['sort_order'] ?? 0)) ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" rows="4" class="form-control"><?= esc($category['description'] ?? '') ?></textarea>
            </div>
            <div class="col-md-6">
                <label class="form-label">Image Path</label>
                <input type="text" name="image" class="form-control" value="<?= esc($category['image'] ?? '') ?>">
                <div class="form-text">Use an existing asset path like `assets/img/hero-seafood.jpg` or upload a new file.</div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Upload New Image</label>
                <input type="file" name="image_file" class="form-control">
            </div>
            <div class="col-12">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" <?= ! isset($category['is_active']) || $category['is_active'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn btn-primary">Save Category</button>
        <a href="<?= site_url('admin/categories') ?>" class="btn btn-outline-light">Back</a>
    </div>
</form>
<?= $this->endSection() ?>
