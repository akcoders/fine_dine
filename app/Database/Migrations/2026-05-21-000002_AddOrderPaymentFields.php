<?php

namespace App\Database\Migrations;

use CodeIgniter\Database\Migration;

class AddOrderPaymentFields extends Migration
{
    public function up()
    {
        $fields = [
            'order_reference' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'null'       => true,
                'after'      => 'id',
            ],
            'payment_method' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'default'    => 'cash',
                'after'      => 'order_mode',
            ],
            'payment_status' => [
                'type'       => 'VARCHAR',
                'constraint' => 40,
                'default'    => 'pending',
                'after'      => 'payment_method',
            ],
            'currency' => [
                'type'       => 'VARCHAR',
                'constraint' => 10,
                'default'    => 'aud',
                'after'      => 'subtotal',
            ],
            'stripe_session_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'currency',
            ],
            'stripe_payment_intent_id' => [
                'type'       => 'VARCHAR',
                'constraint' => 255,
                'null'       => true,
                'after'      => 'stripe_session_id',
            ],
            'paid_at' => [
                'type' => 'DATETIME',
                'null' => true,
                'after' => 'stripe_payment_intent_id',
            ],
        ];

        $this->forge->addColumn('orders', $fields);
        $this->db->query("UPDATE orders SET order_reference = CONCAT('LM', LPAD(id, 6, '0')) WHERE order_reference IS NULL");
    }

    public function down()
    {
        $this->forge->dropColumn('orders', [
            'order_reference',
            'payment_method',
            'payment_status',
            'currency',
            'stripe_session_id',
            'stripe_payment_intent_id',
            'paid_at',
        ]);
    }
}
