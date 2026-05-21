<?php

namespace App\Models;

use CodeIgniter\Model;

class ReservationModel extends Model
{
    protected $table            = 'reservations';
    protected $primaryKey       = 'id';
    protected $returnType       = 'array';
    protected $useAutoIncrement = true;
    protected $useTimestamps    = true;
    protected $allowedFields    = [
        'name',
        'phone',
        'email',
        'guests',
        'reservation_date',
        'reservation_time',
        'occasion',
        'notes',
        'status',
    ];
}
