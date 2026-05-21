<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="admin-card p-4">
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0">
            <thead><tr><th>Guest</th><th>Contact</th><th>Guests</th><th>Date</th><th>Time</th><th>Occasion</th><th>Notes</th><th>Status</th></tr></thead>
            <tbody>
            <?php foreach ($reservations as $reservation): ?>
                <tr>
                    <td><?= esc($reservation['name']) ?></td>
                    <td>
                        <div><?= esc($reservation['phone']) ?></div>
                        <div class="text-muted small"><?= esc($reservation['email'] ?: '-') ?></div>
                    </td>
                    <td><?= esc($reservation['guests']) ?></td>
                    <td><?= esc($reservation['reservation_date']) ?></td>
                    <td><?= esc($reservation['reservation_time']) ?></td>
                    <td><?= esc($reservation['occasion'] ?: '-') ?></td>
                    <td class="text-wrap" style="max-width: 220px;"><?= esc($reservation['notes'] ?: '-') ?></td>
                    <td>
                        <form method="post" action="<?= site_url('admin/reservations/status/' . $reservation['id']) ?>" class="d-flex gap-2">
                            <select name="status" class="form-select form-select-sm">
                                <?php foreach (['new', 'confirmed', 'completed', 'cancelled'] as $status): ?>
                                    <option value="<?= $status ?>" <?= $reservation['status'] === $status ? 'selected' : '' ?>><?= ucfirst($status) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
