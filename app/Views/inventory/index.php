<?= $this->extend('layout/main') ?>
<?= $this->section('content') ?>

<h3>Inventory</h3>

<a href="<?= base_url('inventory/create')?>" class="btn btn-primary mb-3">Tambah Barang</a>

<table class="table table-bordered">
    <thead>
        <tr>
            <th>Nama</th>
            <th>Harga</th>
            <th>Stock</th>
            <th>Aksi</th>
        </tr>
    </thead>
    <tbody>
        <?php foreach ($items as $item): ?>
        <tr>
            <td><?= $item['name'] ?></td>
            <td>Rp <?= number_format($item['price'], 0, ',', '.') ?></td>
            <td><?= $item['stock'] ?></td>
            <td>
                <a href="<?= base_url("inventory/edit/{$item['id']}") ?>" class="btn btn-warning btn-sm">Edit</a>
            </td>
        </tr>
        <?php endforeach; ?>
    </tbody>
</table>

<?= $this->endSection() ?>