<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Transaksi</h3>

<a href="<?= base_url('sales/create') ?>" class="btn btn-primary mb-3">
    Buat Transaksi
</a>

<?= $this->endSection() ?>