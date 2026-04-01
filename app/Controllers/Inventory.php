<?php

namespace App\Controllers;

use App\Models\ItemModel;

class Inventory extends BaseController
{
    protected $itemModel;

    public function __construct()
    {
        $this->itemModel = new ItemModel();
    }

    private function checkAuth()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }
    }

    public function index()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $items = $this->itemModel->findAll();

        return view('inventory/index', [
            'items' => $items
        ]);
    }

    public function create()
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        return view('inventory/form', [
            'title' => 'Tambah Barang',
            'item' => null
        ]);
    }

    public function store()
    {
        $this->itemModel->save([
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ]);

        return redirect()->to(base_url('inventory'));
    }

    public function edit($id)
    {
        if ($redirect = $this->checkAuth()) return $redirect;

        $item = $this->itemModel->find($id);

        return view('inventory/form', [
            'title' => 'Edit Barang',
            'item' => $item
        ]);
    }

    public function update($id)
    {
        $this->itemModel->update($id, [
            'name' => $this->request->getPost('name'),
            'price' => $this->request->getPost('price'),
            'stock' => $this->request->getPost('stock'),
        ]);

        return redirect()->to(base_url('inventory'));
    }
}