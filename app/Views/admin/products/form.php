<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<?php $isEdit = ! empty($product); ?>
<form method="post" enctype="multipart/form-data" action="<?= $isEdit ? site_url('admin/products/update/' . $product['id']) : site_url('admin/products/store') ?>">
    <div class="admin-card p-4">
        <div class="row g-4">
            <div class="col-md-6">
                <label class="form-label">Product Name</label>
                <input type="text" name="name" class="form-control" value="<?= esc($product['name'] ?? '') ?>" required>
            </div>
            <div class="col-md-6">
                <label class="form-label">Slug</label>
                <input type="text" name="slug" class="form-control" value="<?= esc($product['slug'] ?? '') ?>">
            </div>
            <div class="col-md-4">
                <label class="form-label">Category</label>
                <select name="category_id" class="form-select">
                    <option value="">Select</option>
                    <?php foreach ($categories as $category): ?>
                        <option value="<?= $category['id'] ?>" <?= (string) ($product['category_id'] ?? '') === (string) $category['id'] ? 'selected' : '' ?>><?= esc($category['name']) ?></option>
                    <?php endforeach; ?>
                </select>
            </div>
            <div class="col-md-4">
                <label class="form-label">Price</label>
                <input type="number" step="0.01" name="price" class="form-control" value="<?= esc((string) ($product['price'] ?? '')) ?>" required>
            </div>
            <div class="col-md-4">
                <label class="form-label">Original Price</label>
                <input type="number" step="0.01" name="original_price" class="form-control" value="<?= esc((string) ($product['original_price'] ?? '')) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Subtitle</label>
                <input type="text" name="subtitle" class="form-control" value="<?= esc($product['subtitle'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Short Description</label>
                <input type="text" name="short_description" class="form-control" value="<?= esc($product['short_description'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Badge</label>
                <input type="text" name="badge" class="form-control" value="<?= esc($product['badge'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Accent</label>
                <input type="text" name="accent" class="form-control" value="<?= esc($product['accent'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Rating</label>
                <input type="text" name="rating" class="form-control" value="<?= esc($product['rating'] ?? '') ?>">
            </div>
            <div class="col-md-3">
                <label class="form-label">Sort Order</label>
                <input type="number" name="sort_order" class="form-control" value="<?= esc((string) ($product['sort_order'] ?? 0)) ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Prep Time / Label</label>
                <input type="text" name="prep_time" class="form-control" value="<?= esc($product['prep_time'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Serves</label>
                <input type="text" name="serves" class="form-control" value="<?= esc($product['serves'] ?? '') ?>">
            </div>
            <div class="col-12">
                <label class="form-label">Description</label>
                <textarea name="description" rows="5" class="form-control"><?= esc($product['description'] ?? '') ?></textarea>
            </div>
            <div class="col-12">
                <label class="form-label">Notes</label>
                <textarea name="notes" rows="4" class="form-control"><?= esc($product['notes'] ?? '') ?></textarea>
                <div class="form-text">Use one note per line.</div>
            </div>
            <div class="col-md-6">
                <label class="form-label">Image Path</label>
                <input type="text" name="image" class="form-control" value="<?= esc($product['image'] ?? '') ?>">
            </div>
            <div class="col-md-6">
                <label class="form-label">Upload New Image</label>
                <input type="file" name="image_file" class="form-control">
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_featured" name="is_featured" value="1" <?= ! empty($product['is_featured']) ? 'checked' : '' ?>>
                    <label class="form-check-label" for="is_featured">Featured on home</label>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-check">
                    <input type="checkbox" class="form-check-input" id="is_active" name="is_active" value="1" <?= ! isset($product['is_active']) || $product['is_active'] ? 'checked' : '' ?>>
                    <label class="form-check-label" for="is_active">Active</label>
                </div>
            </div>
        </div>
    </div>
    <div class="d-flex gap-2 mt-3">
        <button type="submit" class="btn btn-primary">Save Product</button>
        <a href="<?= site_url('admin/products') ?>" class="btn btn-outline-light">Back</a>
    </div>
</form>
<?= $this->endSection() ?>
