<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="admin-card p-4">
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0">
            <thead><tr><th>Order</th><th>Customer</th><th>Contact</th><th>Payment</th><th>Subtotal</th><th>Created</th><th>Status</th><th class="text-end">View</th></tr></thead>
            <tbody>
            <?php foreach ($orders as $order): ?>
                <tr>
                    <td>
                        <div class="fw-semibold"><?= esc($order['order_reference'] ?: ('#' . $order['id'])) ?></div>
                        <div class="text-muted small"><?= esc(ucwords(str_replace('_', ' ', $order['order_mode']))) ?></div>
                    </td>
                    <td><?= esc($order['customer_name']) ?></td>
                    <td>
                        <div><?= esc($order['phone'] ?: '-') ?></div>
                        <div class="text-muted small"><?= esc($order['email'] ?: '-') ?></div>
                    </td>
                    <td>
                        <div><?= esc(ucfirst($order['payment_method'] ?: 'cash')) ?></div>
                        <div class="text-muted small"><?= esc(ucfirst(str_replace('_', ' ', $order['payment_status'] ?: 'pending'))) ?></div>
                    </td>
                    <td>$<?= number_format((float) $order['subtotal'], 2) ?> <?= esc(strtoupper($order['currency'] ?: 'AUD')) ?></td>
                    <td><?= esc($order['created_at']) ?></td>
                    <td>
                        <form method="post" action="<?= site_url('admin/orders/status/' . $order['id']) ?>" class="d-flex gap-2">
                            <select name="status" class="form-select form-select-sm">
                                <?php foreach ($statuses as $status): ?>
                                    <option value="<?= esc($status) ?>" <?= $order['status'] === $status ? 'selected' : '' ?>><?= esc(ucfirst(str_replace('_', ' ', $status))) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </td>
                    <td class="text-end"><a href="<?= site_url('admin/orders/' . $order['id']) ?>" class="btn btn-sm btn-outline-light">Details</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
