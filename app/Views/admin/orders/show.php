<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="admin-card p-4">
    <div class="row g-4">
        <div class="col-lg-4">
            <h2 class="h5">Order Summary</h2>
            <p class="mb-1"><strong>Reference:</strong> <?= esc($order['order_reference'] ?: ('#' . $order['id'])) ?></p>
            <p class="mb-1"><?= esc($order['customer_name']) ?></p>
            <p class="mb-1"><?= esc($order['phone'] ?: '-') ?></p>
            <p class="mb-1"><?= esc($order['email'] ?: '-') ?></p>
            <p class="mb-1">Mode: <?= esc(ucwords(str_replace('_', ' ', $order['order_mode']))) ?></p>
            <p class="mb-1">Payment Method: <?= esc(ucfirst($order['payment_method'] ?: 'cash')) ?></p>
            <p class="mb-1">Payment Status: <span class="badge text-bg-secondary"><?= esc(ucfirst(str_replace('_', ' ', $order['payment_status'] ?: 'pending'))) ?></span></p>
            <p class="mb-1">Subtotal: $<?= number_format((float) $order['subtotal'], 2) ?> <?= esc(strtoupper($order['currency'] ?: 'AUD')) ?></p>
            <?php if (! empty($order['stripe_session_id'])): ?>
                <p class="mb-1"><strong>Stripe Session:</strong><br><span class="text-break"><?= esc($order['stripe_session_id']) ?></span></p>
            <?php endif; ?>
            <?php if (! empty($order['stripe_payment_intent_id'])): ?>
                <p class="mb-1"><strong>Payment Intent:</strong><br><span class="text-break"><?= esc($order['stripe_payment_intent_id']) ?></span></p>
            <?php endif; ?>
            <?php if (! empty($order['paid_at'])): ?>
                <p class="mb-1"><strong>Paid At:</strong> <?= esc($order['paid_at']) ?></p>
            <?php endif; ?>
            <form method="post" action="<?= site_url('admin/orders/status/' . $order['id']) ?>" class="mt-3">
                <label class="form-label">Order Status</label>
                <div class="d-flex gap-2">
                    <select name="status" class="form-select">
                        <?php foreach ($statuses as $status): ?>
                            <option value="<?= esc($status) ?>" <?= $order['status'] === $status ? 'selected' : '' ?>><?= esc(ucfirst(str_replace('_', ' ', $status))) ?></option>
                        <?php endforeach; ?>
                    </select>
                    <button class="btn btn-primary">Save</button>
                </div>
            </form>
        </div>
        <div class="col-lg-8">
            <h2 class="h5">Items</h2>
            <div class="table-responsive">
                <table class="table table-dark align-middle mb-0">
                    <thead><tr><th>Dish</th><th>Qty</th><th>Price</th></tr></thead>
                    <tbody>
                    <?php foreach ($order['items'] as $item): ?>
                        <tr>
                            <td><?= esc($item['name'] ?? 'Item') ?></td>
                            <td><?= esc((string) ($item['quantity'] ?? 1)) ?></td>
                            <td>$<?= number_format((float) ($item['price'] ?? 0), 2) ?></td>
                        </tr>
                    <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
            <div class="mt-4">
                <h3 class="h6">Customer Note</h3>
                <p class="mb-0"><?= esc($order['order_notes'] ?: 'No extra note provided.') ?></p>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
