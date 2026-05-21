<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="admin-card p-4">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h2 class="h5 mb-0">Products</h2>
        <a href="<?= site_url('admin/products/create') ?>" class="btn btn-primary">Add Product</a>
    </div>
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0">
            <thead><tr><th>Image</th><th>Name</th><th>Category</th><th>Price</th><th>Featured</th><th>Status</th><th class="text-end">Actions</th></tr></thead>
            <tbody>
            <?php foreach ($products as $product): ?>
                <tr>
                    <td><?php if (! empty($product['image'])): ?><img src="<?= base_url($product['image']) ?>" class="thumb-preview" alt=""><?php endif; ?></td>
                    <td><?= esc($product['name']) ?></td>
                    <td><?= esc($product['category_name'] ?: '-') ?></td>
                    <td>$<?= number_format((float) $product['price'], 2) ?></td>
                    <td><?= $product['is_featured'] ? 'Yes' : 'No' ?></td>
                    <td><span class="badge <?= $product['is_active'] ? 'text-bg-success' : 'text-bg-secondary' ?>"><?= $product['is_active'] ? 'Active' : 'Hidden' ?></span></td>
                    <td class="text-end">
                        <a href="<?= site_url('admin/products/edit/' . $product['id']) ?>" class="btn btn-sm btn-outline-light">Edit</a>
                        <form class="d-inline" method="post" action="<?= site_url('admin/products/delete/' . $product['id']) ?>" onsubmit="return confirm('Delete this product?')">
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
