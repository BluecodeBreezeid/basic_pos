<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3><?= $title ?></h3>

<form method="post" action="<?= site_url($item ? 'inventory/update/'.$item['id'] : 'inventory/store') ?>">
    <div class="mb-3">
        <label>Nama Barang</label>
        <input type="text" name="name" class="form-control"
            value="<?= $item['name'] ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label>Harga</label>
        <input type="number" name="price" class="form-control"
            value="<?= $item['price'] ?? '' ?>" required>
    </div>

    <div class="mb-3">
        <label>Stock</label>
        <input type="number" name="stock" class="form-control"
            value="<?= $item['stock'] ?? '' ?>" required>
    </div>

    <button type="submit" class="btn btn-success">Simpan</button>
    <a href="<?= base_url('inventory') ?>" class="btn btn-secondary">Kembali</a>

</form>

<?= $this->endSection() ?>