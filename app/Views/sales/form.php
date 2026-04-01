<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Buat Transaksi</h3>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<form method="post" action="<?= base_url('sales/store') ?>">

    <div class="mb-3">
        <label>Barang</label>
        <select name="item_id" class="form-control" required>
            <option value="">-- Pilih Barang --</option>
            <?php foreach ($items as $item): ?>
                <option value="<?= $item['id'] ?>">
                    <?= $item['name'] ?> (Stock: <?= $item['stock'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Qty</label>
        <input type="number" name="qty" class="form-control" required>
    </div>

    <button class="btn btn-success">Simpan</button>
    <a href="<?= base_url('sales') ?>" class="btn btn-secondary">Kembali</a>

</form>

<?= $this->endSection() ?>