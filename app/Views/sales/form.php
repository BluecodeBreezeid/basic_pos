<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Buat Transaksi</h3>

<?php if (session()->getFlashdata('error')): ?>
    <div class="alert alert-danger">
        <?= session()->getFlashdata('error') ?>
    </div>
<?php endif; ?>

<form id="salesForm" method="post" action="<?= base_url('sales/store') ?>">
    <div class="mb-3">
        <label>Barang</label>
        <select id="item_id" name="item_id" class="form-control" required>
            <option value="" data-stock="0">-- Pilih Barang --</option>
            <?php foreach ($items as $item): ?>
                <option value="<?= $item['id'] ?>" data-stock="<?= $item['stock'] ?>">
                    <?= $item['name'] ?> (Stock: <?= $item['stock'] ?>)
                </option>
            <?php endforeach; ?>
        </select>
    </div>

    <div class="mb-3">
        <label>Qty</label>
        <input type="number" id="qty" name="qty" class="form-control" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('sales') ?>" class="btn btn-secondary">Kembali</a>
</form>

<script>
document.getElementById('salesForm').addEventListener('submit', function(e) {
    const select = document.getElementById('item_id');
    const selectedOption = select.options[select.selectedIndex];
    
    const stock = parseInt(selectedOption.getAttribute('data-stock')) || 0;
    const qty = parseInt(document.getElementById('qty').value) || 0;

    if (stock <= 0) {
        alert('Stock habis');
        e.preventDefault();
        return false;
    }
});
</script>

<?= $this->endSection() ?>