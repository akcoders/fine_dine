<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="admin-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 mb-0">Offers</h2>
        <a href="<?= site_url('admin/offers/create') ?>" class="btn btn-primary">Add Offer</a>
    </div>
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0">
            <thead><tr><th>Image</th><th>Title</th><th>Subtitle</th><th>Status</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
            <?php foreach ($offers as $offer): ?>
                <tr>
                    <td><?php if (! empty($offer['image'])): ?><img src="<?= base_url($offer['image']) ?>" class="thumb-preview" alt=""><?php endif; ?></td>
                    <td><?= esc($offer['title']) ?></td>
                    <td><?= esc($offer['subtitle'] ?? '-') ?></td>
                    <td><span class="badge <?= $offer['is_active'] ? 'text-bg-success' : 'text-bg-secondary' ?>"><?= $offer['is_active'] ? 'Active' : 'Hidden' ?></span></td>
                    <td class="text-end">
                        <a href="<?= site_url('admin/offers/edit/' . $offer['id']) ?>" class="btn btn-sm btn-outline-light">Edit</a>
                        <form class="d-inline" method="post" action="<?= site_url('admin/offers/delete/' . $offer['id']) ?>" onsubmit="return confirm('Delete this offer?')">
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
