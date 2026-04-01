<?php

namespace App\Models;

use CodeIgniter\Model;

class SaleItemModel extends Model
{
    protected $table = 'sale_items';
    protected $primaryKey = 'id';

    protected $allowedFields = ['sale_id', 'item_id', 'qty', 'price'];

    protected $returnType = 'array';
}