<?php

namespace App\Models;

use CodeIgniter\Model;

class GalleryItemModel extends Model
{
    protected $table            = 'gallery_items';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'title',
        'image',
        'sort_order',
        'is_active',
    ];
}
