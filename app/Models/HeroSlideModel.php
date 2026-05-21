<?php

namespace App\Models;

use CodeIgniter\Model;

class HeroSlideModel extends Model
{
    protected $table            = 'hero_slides';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'eyebrow',
        'title',
        'text',
        'image',
        'button_label',
        'button_link',
        'sort_order',
        'is_active',
    ];
}
