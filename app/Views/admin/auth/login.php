<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Admin Login') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body { min-height: 100vh; display: grid; place-items: center; background: radial-gradient(circle at top, #312318 0%, #101115 55%, #0b0c10 100%); color: #f3ece0; }
        .login-card { width: min(460px, 92vw); background: rgba(24, 26, 31, 0.96); border: 1px solid rgba(212, 175, 109, 0.2); border-radius: 1.4rem; box-shadow: 0 30px 60px rgba(0,0,0,0.35); }
        .form-control { background: #11131a; border-color: rgba(255,255,255,0.12); color: #fff; }
        .form-control:focus { background: #11131a; color: #fff; border-color: #d4af6d; box-shadow: 0 0 0 0.2rem rgba(212,175,109,0.14); }
        .btn-primary { background: #d4af6d; border-color: #d4af6d; color: #111; }
    </style>
</head>
<body>
    <div class="login-card p-4 p-lg-5">
        <div class="text-center mb-4">
            <div class="text-uppercase text-warning small">La Majestic</div>
            <h1 class="h3 mb-2">Admin Login</h1>
            <p class="text-secondary mb-0">Manage products, offers, bookings, enquiries, and takeaway orders.</p>
        </div>
        <?php if (session()->getFlashdata('error')): ?>
            <div class="alert alert-danger"><?= esc(session()->getFlashdata('error')) ?></div>
        <?php endif; ?>
        <?php if (session()->getFlashdata('success')): ?>
            <div class="alert alert-success"><?= esc(session()->getFlashdata('success')) ?></div>
        <?php endif; ?>
        <form method="post" action="<?= site_url('admin/login') ?>">
            <div class="mb-3">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="<?= esc(old('email', 'admin@lamajestic.com')) ?>" required>
            </div>
            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" value="admin123" required>
            </div>
            <button type="submit" class="btn btn-primary w-100">Login</button>
        </form>
    </div>
</body>
</html>
