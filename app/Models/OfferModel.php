<?php

namespace App\Models;

use CodeIgniter\Model;

class OfferModel extends Model
{
    protected $table            = 'offers';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'title',
        'subtitle',
        'description',
        'image',
        'button_label',
        'button_link',
        'badge',
        'price_label',
        'sort_order',
        'is_active',
    ];
}
