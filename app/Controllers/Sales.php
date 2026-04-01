<?php

namespace App\Controllers;

use App\Models\ItemModel;
use App\Models\SaleModel;
use App\Models\SaleItemModel;

class Sales extends BaseController
{
    protected $itemModel;
    protected $saleModel;
    protected $saleItemModel;

    public function __construct()
    {
        $this->itemModel = new ItemModel();
        $this->saleModel = new SaleModel();
        $this->saleItemModel = new SaleItemModel();
    }

    private function checkAuth()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to(base_url('/login'));
        }
    }

    public function index()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        return view('sales/index');
    }

    public function create()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $items = $this->itemModel->findAll();

        return view('sales/form', [
            'items' => $items
        ]);
    }

    public function store()
    {
        $itemId = $this->request->getPost('item_id');
        $qty = (int) $this->request->getPost('qty');

        $item = $this->itemModel->find($itemId);

        if (!$item) {
            return redirect()->back()->with('error', 'Barang tidak ditemukan');
        }

        // Hitung total
        $total = $item['price'] * $qty;

        $db = \Config\Database::connect();
        $db->transStart();

        // Insert sales
        $this->saleModel->insert([
            'total' => $total
        ]);

        $saleId = $this->saleModel->getInsertID();

        // Insert sale_items
        $this->saleItemModel->insert([
            'sale_id' => $saleId,
            'item_id' => $itemId,
            'qty' => $qty,
            'price' => $item['price']
        ]);

        // Update stock
        $this->itemModel->update($itemId, [
            'stock' => $item['stock'] - $qty
        ]);

        $db->transComplete();

        return redirect()->to(base_url(base_url('sales')));
    }
}