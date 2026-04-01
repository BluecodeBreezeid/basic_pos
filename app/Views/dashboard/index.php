<?= $this->extend('layout/main') ?>

<?= $this->section('content') ?>
<h5 class="mb-5">Welcome, <?= session()->get('email') ?></h5>
<h3 class="mb-4">Dashboard</h3>

<div class="row">

    <div class="col-md-6">
        <div class="card text-white bg-primary mb-3">
            <div class="card-body">
                <h5>Total Transaksi Hari Ini</h5>
                <h2><?= $totalTransaction ?></h2>
            </div>
        </div>
    </div>

    <div class="col-md-6">
        <div class="card text-white bg-success mb-3">
            <div class="card-body">
                <h5>Total Penjualan Hari Ini</h5>
                <h2>Rp <?= number_format($totalSales, 0, ',', '.') ?></h2>
            </div>
        </div>
    </div>

</div>

<?= $this->endSection() ?>