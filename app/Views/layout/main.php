<!DOCTYPE html>
<html>
<head>
    <title><?= $title ?? 'POS' ?></title>
    <link href="<?= base_url('bootstrap/css/bootstrap.min.css') ?>" rel="stylesheet">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
    <div class="container-fluid">
        <span class="navbar-brand">POS APP</span>

        <div class="collapse navbar-collapse show">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                <li class="nav-item">
                    <a class="nav-link <?= uri_string() == 'dashboard' ? 'active' : '' ?>"
                       href="<?= base_url('dashboard') ?>">
                        Dashboard
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= strpos(uri_string(), 'inventory') === 0 ? 'active' : '' ?>"
                       href="<?= base_url('inventory') ?>">
                        Inventory
                    </a>
                </li>

                <li class="nav-item">
                    <a class="nav-link <?= strpos(uri_string(), 'sales') === 0 ? 'active' : '' ?>"
                       href="<?= base_url('sales') ?>">
                        Sales
                    </a>
                </li>

            </ul>

            <span class="text-white me-3">
                <?= session()->get('email') ?>
            </span>

            <a href="<?= base_url('logout') ?>" class="btn btn-danger btn-sm">
                Logout
            </a>
        </div>
    </div>
</nav>

<div class="container mt-4">
    <?= $this->renderSection('content') ?>
</div>

</body>
</html>