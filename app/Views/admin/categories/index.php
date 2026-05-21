<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="admin-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 mb-0">Menu Categories</h2>
        <a href="<?= site_url('admin/categories/create') ?>" class="btn btn-primary">Add Category</a>
    </div>
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0">
            <thead><tr><th>Image</th><th>Name</th><th>Subtitle</th><th>Sort</th><th>Status</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
            <?php foreach ($categories as $category): ?>
                <tr>
                    <td><?php if (! empty($category['image'])): ?><img src="<?= base_url($category['image']) ?>" class="thumb-preview" alt=""><?php endif; ?></td>
                    <td><?= esc($category['name']) ?></td>
                    <td><?= esc($category['subtitle'] ?? '-') ?></td>
                    <td><?= esc((string) $category['sort_order']) ?></td>
                    <td><span class="badge <?= $category['is_active'] ? 'text-bg-success' : 'text-bg-secondary' ?>"><?= $category['is_active'] ? 'Active' : 'Hidden' ?></span></td>
                    <td class="text-end">
                        <a href="<?= site_url('admin/categories/edit/' . $category['id']) ?>" class="btn btn-sm btn-outline-light">Edit</a>
                        <form class="d-inline" method="post" action="<?= site_url('admin/categories/delete/' . $category['id']) ?>" onsubmit="return confirm('Delete this category?')">
                            <button type="submit" class="btn btn-sm btn-outline-danger">Delete</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
