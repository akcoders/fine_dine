<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title><?= esc($title ?? 'Admin Panel') ?></title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
    <style>
        body { background: #0f1115; color: #e7e3d8; }
        .admin-shell { min-height: 100vh; }
        .admin-sidebar { width: 280px; background: linear-gradient(180deg, #171311 0%, #0d0f12 100%); border-right: 1px solid rgba(212, 175, 109, 0.18); }
        .admin-sidebar .nav-link { color: #d8d5cc; border-radius: 0.85rem; padding: 0.8rem 1rem; }
        .admin-sidebar .nav-link:hover, .admin-sidebar .nav-link.active { background: rgba(212, 175, 109, 0.14); color: #f2d08b; }
        .admin-main { background: #16181d; }
        .admin-card { background: #1c1f25; border: 1px solid rgba(212, 175, 109, 0.12); border-radius: 1.1rem; box-shadow: 0 20px 40px rgba(0, 0, 0, 0.18); }
        .table { color: #ece7da; }
        .table thead th { color: #f2d08b; border-color: rgba(255,255,255,0.08); }
        .table td, .table th { border-color: rgba(255,255,255,0.08); vertical-align: middle; }
        .form-control, .form-select, .form-check-input, textarea { background: #101216; color: #f6f1e8; border-color: rgba(255,255,255,0.12); }
        .form-control:focus, .form-select:focus, textarea:focus { background: #101216; color: #fff; border-color: #d4af6d; box-shadow: 0 0 0 0.2rem rgba(212, 175, 109, 0.14); }
        .form-text, .text-muted { color: #bcb4a3 !important; }
        .btn-primary { background: #d4af6d; border-color: #d4af6d; color: #111; }
        .btn-primary:hover { background: #e5bf79; border-color: #e5bf79; color: #111; }
        .btn-outline-light { border-color: rgba(255,255,255,0.16); }
        .badge-soft { background: rgba(212, 175, 109, 0.14); color: #f2d08b; }
        .thumb-preview { width: 72px; height: 72px; object-fit: cover; border-radius: 0.85rem; border: 1px solid rgba(212, 175, 109, 0.15); }
        a { color: #f2d08b; }
        .stat-card { min-height: 160px; }
        .stat-icon { width: 48px; height: 48px; display: inline-flex; align-items: center; justify-content: center; border-radius: 1rem; background: rgba(212, 175, 109, 0.14); color: #f2d08b; font-size: 1.3rem; }
        .accordion-item { background: transparent; border: 0; }
        .accordion-button { background: #1c1f25; color: #f3ede0; box-shadow: none; }
        .accordion-button:not(.collapsed) { background: #221d18; color: #f2d08b; }
        .accordion-button::after { filter: invert(1) brightness(1.6); }
        .accordion-body { background: #1c1f25; color: #ece7da; }
        @media (max-width: 991.98px) {
            .admin-sidebar { width: 100%; }
        }
    </style>
</head>
<body>
<?php $segment = service('uri')->getSegment(2) ?: 'dashboard'; ?>
<div class="admin-shell d-lg-flex">
    <aside class="admin-sidebar p-4">
        <div class="d-flex align-items-center justify-content-between mb-4">
            <div>
                <div class="text-uppercase small text-warning-emphasis">La Majestic</div>
                <h4 class="mb-0">Admin Panel</h4>
            </div>
            <a href="<?= site_url('/') ?>" class="btn btn-sm btn-outline-light">View Site</a>
        </div>
        <div class="small text-uppercase text-secondary mb-2">Management</div>
        <nav class="nav flex-column gap-2">
            <a class="nav-link <?= $segment === 'admin' || $segment === 'dashboard' ? 'active' : '' ?>" href="<?= site_url('admin') ?>"><i class="bi bi-speedometer2 me-2"></i>Dashboard</a>
            <a class="nav-link <?= $segment === 'settings' ? 'active' : '' ?>" href="<?= site_url('admin/settings') ?>"><i class="bi bi-sliders me-2"></i>Site Settings</a>
            <a class="nav-link <?= $segment === 'categories' ? 'active' : '' ?>" href="<?= site_url('admin/categories') ?>"><i class="bi bi-grid me-2"></i>Categories</a>
            <a class="nav-link <?= $segment === 'products' ? 'active' : '' ?>" href="<?= site_url('admin/products') ?>"><i class="bi bi-cup-hot me-2"></i>Products</a>
            <a class="nav-link <?= $segment === 'hero-slides' ? 'active' : '' ?>" href="<?= site_url('admin/hero-slides') ?>"><i class="bi bi-layout-text-window me-2"></i>Hero Slides</a>
            <a class="nav-link <?= $segment === 'offers' ? 'active' : '' ?>" href="<?= site_url('admin/offers') ?>"><i class="bi bi-stars me-2"></i>Offers</a>
            <a class="nav-link <?= $segment === 'gallery' ? 'active' : '' ?>" href="<?= site_url('admin/gallery') ?>"><i class="bi bi-images me-2"></i>Gallery</a>
            <a class="nav-link <?= $segment === 'testimonials' ? 'active' : '' ?>" href="<?= site_url('admin/testimonials') ?>"><i class="bi bi-chat-quote me-2"></i>Testimonials</a>
            <a class="nav-link <?= $segment === 'orders' ? 'active' : '' ?>" href="<?= site_url('admin/orders') ?>"><i class="bi bi-bag-check me-2"></i>Takeaway Orders</a>
            <a class="nav-link <?= $segment === 'reservations' ? 'active' : '' ?>" href="<?= site_url('admin/reservations') ?>"><i class="bi bi-calendar2-check me-2"></i>Reservations</a>
            <a class="nav-link <?= $segment === 'enquiries' ? 'active' : '' ?>" href="<?= site_url('admin/enquiries') ?>"><i class="bi bi-chat-left-text me-2"></i>Enquiries</a>
        </nav>
    </aside>

    <main class="admin-main flex-grow-1 p-3 p-lg-4">
        <div class="admin-card p-3 p-lg-4 mb-4">
            <div class="d-flex flex-column flex-md-row align-items-md-center justify-content-between gap-3">
                <div>
                    <h1 class="h3 mb-1"><?= esc($title ?? 'Admin Panel') ?></h1>
                    <div class="text-muted">Manage the fine-dining storefront, content, bookings, takeaway orders, and customer messages.</div>
                </div>
                <div class="d-flex align-items-center gap-3">
                    <div class="text-end">
                        <div class="small text-muted">Logged in as</div>
                        <div><?= esc($adminUser['name'] ?? 'Admin') ?></div>
                    </div>
                    <a href="<?= site_url('admin/logout') ?>" class="btn btn-outline-light">Logout</a>
                </div>
            </div>
        </div>

        <?= view('admin/partials/alerts') ?>
        <?= $this->renderSection('content') ?>
    </main>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
