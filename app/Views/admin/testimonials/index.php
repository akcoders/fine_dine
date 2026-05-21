<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="admin-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 mb-0">Testimonials</h2>
        <a href="<?= site_url('admin/testimonials/create') ?>" class="btn btn-primary">Add Testimonial</a>
    </div>
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0">
            <thead><tr><th>Image</th><th>Author</th><th>Quote</th><th>Status</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
            <?php foreach ($testimonials as $testimonial): ?>
                <tr>
                    <td><?php if (! empty($testimonial['image'])): ?><img src="<?= base_url($testimonial['image']) ?>" class="thumb-preview" alt=""><?php endif; ?></td>
                    <td><?= esc($testimonial['author']) ?></td>
                    <td class="text-wrap" style="max-width: 360px;"><?= esc($testimonial['quote']) ?></td>
                    <td><span class="badge <?= $testimonial['is_active'] ? 'text-bg-success' : 'text-bg-secondary' ?>"><?= $testimonial['is_active'] ? 'Active' : 'Hidden' ?></span></td>
                    <td class="text-end">
                        <a href="<?= site_url('admin/testimonials/edit/' . $testimonial['id']) ?>" class="btn btn-sm btn-outline-light">Edit</a>
                        <form class="d-inline" method="post" action="<?= site_url('admin/testimonials/delete/' . $testimonial['id']) ?>" onsubmit="return confirm('Delete this testimonial?')">
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
