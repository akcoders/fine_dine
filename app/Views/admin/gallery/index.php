<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="admin-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 mb-0">Gallery</h2>
        <a href="<?= site_url('admin/gallery/create') ?>" class="btn btn-primary">Add Image</a>
    </div>
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0">
            <thead><tr><th>Image</th><th>Title</th><th>Sort</th><th>Status</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
            <?php foreach ($items as $item): ?>
                <tr>
                    <td><?php if (! empty($item['image'])): ?><img src="<?= base_url($item['image']) ?>" class="thumb-preview" alt=""><?php endif; ?></td>
                    <td><?= esc($item['title'] ?? '-') ?></td>
                    <td><?= esc((string) $item['sort_order']) ?></td>
                    <td><span class="badge <?= $item['is_active'] ? 'text-bg-success' : 'text-bg-secondary' ?>"><?= $item['is_active'] ? 'Active' : 'Hidden' ?></span></td>
                    <td class="text-end">
                        <a href="<?= site_url('admin/gallery/edit/' . $item['id']) ?>" class="btn btn-sm btn-outline-light">Edit</a>
                        <form class="d-inline" method="post" action="<?= site_url('admin/gallery/delete/' . $item['id']) ?>" onsubmit="return confirm('Delete this item?')">
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
