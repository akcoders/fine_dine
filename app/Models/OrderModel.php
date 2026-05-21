<?php

namespace App\Models;

use CodeIgniter\Model;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'order_reference',
        'customer_name',
        'phone',
        'email',
        'order_mode',
        'payment_method',
        'payment_status',
        'order_notes',
        'subtotal',
        'currency',
        'stripe_session_id',
        'stripe_payment_intent_id',
        'paid_at',
        'items_json',
        'status',
    ];
}
