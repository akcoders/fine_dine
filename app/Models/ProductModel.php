<?php

namespace App\Models;

use CodeIgniter\Model;

class ProductModel extends Model
{
    protected $table            = 'products';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'category_id',
        'name',
        'slug',
        'subtitle',
        'short_description',
        'description',
        'price',
        'original_price',
        'badge',
        'accent',
        'rating',
        'prep_time',
        'serves',
        'image',
        'notes',
        'is_featured',
        'is_active',
        'sort_order',
    ];
}
