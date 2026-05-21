<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="row g-4 mb-4">
    <?php foreach ($stats as $stat): ?>
        <div class="col-sm-6 col-xl-3">
            <div class="admin-card stat-card p-4">
                <div class="d-flex justify-content-between align-items-start mb-4">
                    <span class="stat-icon"><i class="<?= esc($stat['icon']) ?>"></i></span>
                    <span class="badge badge-soft"><?= esc($stat['label']) ?></span>
                </div>
                <div class="display-6 fw-semibold"><?= esc((string) $stat['value']) ?></div>
                <div class="text-muted"><?= esc($stat['label']) ?></div>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="row g-4">
    <div class="col-xl-6">
        <div class="admin-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 mb-0">Recent Takeaway Orders</h2>
                <a href="<?= site_url('admin/orders') ?>" class="btn btn-sm btn-outline-light">View all</a>
            </div>
            <div class="table-responsive">
                <table class="table table-dark align-middle mb-0">
                    <thead><tr><th>Order</th><th>Payment</th><th>Status</th><th>Subtotal</th></tr></thead>
                    <tbody>
                    <?php foreach ($recentOrders as $order): ?>
                        <tr>
                            <td>
                                <div><?= esc($order['customer_name']) ?></div>
                                <div class="text-muted small"><?= esc($order['order_reference'] ?: ('#' . $order['id'])) ?></div>
                            </td>
                            <td><?= esc(ucfirst($order['payment_method'] ?: 'cash')) ?></td>
                            <td><span class="badge text-bg-secondary"><?= esc($order['status']) ?></span></td>
                            <td>$<?= number_format((float) $order['subtotal'], 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="admin-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 mb-0">Recent Reservations</h2>
                <a href="<?= site_url('admin/reservations') ?>" class="btn btn-sm btn-outline-light">View all</a>
            </div>
            <div class="table-responsive">
                <table class="table table-dark align-middle mb-0">
                    <thead><tr><th>Guest</th><th>Date</th><th>Time</th><th>Status</th></tr></thead>
                    <tbody>
                    <?php foreach ($recentReservations as $reservation): ?>
                        <tr>
                            <td><?= esc($reservation['name']) ?></td>
                            <td><?= esc($reservation['reservation_date']) ?></td>
                            <td><?= esc($reservation['reservation_time']) ?></td>
                            <td><span class="badge text-bg-secondary"><?= esc($reservation['status']) ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="admin-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 mb-0">Recent Enquiries</h2>
                <a href="<?= site_url('admin/enquiries') ?>" class="btn btn-sm btn-outline-light">View all</a>
            </div>
            <div class="table-responsive">
                <table class="table table-dark align-middle mb-0">
                    <thead><tr><th>Name</th><th>Subject</th><th>Status</th></tr></thead>
                    <tbody>
                    <?php foreach ($recentEnquiries as $enquiry): ?>
                        <tr>
                            <td><?= esc($enquiry['name']) ?></td>
                            <td><?= esc($enquiry['subject'] ?: 'General enquiry') ?></td>
                            <td><span class="badge text-bg-secondary"><?= esc($enquiry['status']) ?></span></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="col-xl-6">
        <div class="admin-card p-4 h-100">
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2 class="h5 mb-0">Recent Products</h2>
                <a href="<?= site_url('admin/products') ?>" class="btn btn-sm btn-outline-light">View all</a>
            </div>
            <div class="table-responsive">
                <table class="table table-dark align-middle mb-0">
                    <thead><tr><th>Product</th><th>Category</th><th>Price</th><th>Featured</th></tr></thead>
                    <tbody>
                    <?php foreach ($recentProducts as $product): ?>
                        <tr>
                            <td><?= esc($product['name']) ?></td>
                            <td><?= esc($product['category_name'] ?: '-') ?></td>
                            <td>$<?= number_format((float) $product['price'], 2) ?></td>
                            <td><?= $product['is_featured'] ? 'Yes' : 'No' ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
