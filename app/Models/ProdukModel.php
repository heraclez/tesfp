<?php

namespace App\Models;

use CodeIgniter\Model;

class ProdukModel extends Model
{
    protected $table      = 'produk';
    protected $returnType     = 'object';
    protected $primaryKey = 'id_produk';
    protected $allowedFields = ['id_produk', 'nama_produk','kategori', 'harga','status'];
}