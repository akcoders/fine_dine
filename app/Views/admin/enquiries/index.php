<?= $this->extend('admin/layout') ?>

<?= $this->section('content') ?>
<div class="admin-card p-4">
    <div class="table-responsive">
        <table class="table table-dark align-middle mb-0">
            <thead><tr><th>Name</th><th>Contact</th><th>Subject</th><th>Message</th><th>Status</th><th class="text-end">View</th></tr></thead>
            <tbody>
            <?php foreach ($enquiries as $enquiry): ?>
                <tr>
                    <td><?= esc($enquiry['name']) ?></td>
                    <td>
                        <div><?= esc($enquiry['phone'] ?: '-') ?></div>
                        <div class="text-muted small"><?= esc($enquiry['email'] ?: '-') ?></div>
                    </td>
                    <td><?= esc($enquiry['subject'] ?: 'General enquiry') ?></td>
                    <td class="text-wrap" style="max-width: 260px;"><?= esc(character_limiter($enquiry['message'], 90)) ?></td>
                    <td>
                        <form method="post" action="<?= site_url('admin/enquiries/status/' . $enquiry['id']) ?>" class="d-flex gap-2">
                            <select name="status" class="form-select form-select-sm">
                                <?php foreach (['new', 'replied', 'closed'] as $status): ?>
                                    <option value="<?= $status ?>" <?= $enquiry['status'] === $status ? 'selected' : '' ?>><?= ucfirst($status) ?></option>
                                <?php endforeach; ?>
                            </select>
                            <button class="btn btn-sm btn-primary">Save</button>
                        </form>
                    </td>
                    <td class="text-end"><a href="<?= site_url('admin/enquiries/' . $enquiry['id']) ?>" class="btn btn-sm btn-outline-light">View</a></td>
                </tr>
            <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</div>
<?= $this->endSection() ?>
