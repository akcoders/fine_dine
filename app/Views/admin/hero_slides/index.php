<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="admin-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 mb-0">Hero Slides</h2>
        <a href="<?= site_url('admin/hero-slides/create') ?>" class="btn btn-primary">Add Slide</a>
    </div>
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0">
            <thead><tr><th>Image</th><th>Title</th><th>Eyebrow</th><th>Button</th><th>Status</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
            <?php foreach ($slides as $slide): ?>
                <tr>
                    <td><?php if (! empty($slide['image'])): ?><img src="<?= base_url($slide['image']) ?>" class="thumb-preview" alt=""><?php endif; ?></td>
                    <td><?= esc($slide['title']) ?></td>
                    <td><?= esc($slide['eyebrow'] ?? '-') ?></td>
                    <td><?= esc($slide['button_label'] ?? '-') ?></td>
                    <td><span class="badge <?= $slide['is_active'] ? 'text-bg-success' : 'text-bg-secondary' ?>"><?= $slide['is_active'] ? 'Active' : 'Hidden' ?></span></td>
                    <td class="text-end">
                        <a href="<?= site_url('admin/hero-slides/edit/' . $slide['id']) ?>" class="btn btn-sm btn-outline-light">Edit</a>
                        <form class="d-inline" method="post" action="<?= site_url('admin/hero-slides/delete/' . $slide['id']) ?>" onsubmit="return confirm('Delete this slide?')">
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
