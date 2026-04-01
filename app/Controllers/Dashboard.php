<?php

namespace App\Controllers;

use App\Models\SaleModel;

class Dashboard extends BaseController
{
    public function index()
    {
        if (!session()->get('isLoggedIn')) {
            return redirect()->to('login');
        }

        $saleModel = new SaleModel();

        // Total transaksi hari ini
        $totalTransaction = $saleModel
            ->where('DATE(created_at)', date('Y-m-d'))
            ->countAllResults();

        // Total penjualan hari ini
        $totalSales = $saleModel
            ->selectSum('total')
            ->where('DATE(created_at)', date('Y-m-d'))
            ->first();

        return view('dashboard/index', [
            'totalTransaction' => $totalTransaction,
            'totalSales' => $totalSales['total'] ?? 0
        ]);
    }
}