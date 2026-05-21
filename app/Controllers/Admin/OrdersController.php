<?php

namespace App\Controllers\Admin;

use App\Models\OrderModel;
use CodeIgniter\Exceptions\PageNotFoundException;

class OrdersController extends BaseAdminController
{
    private const STATUSES = [
        'placed',
        'pending_payment',
        'paid',
        'preparing',
        'completed',
        'payment_cancelled',
        'payment_error',
        'cancelled',
    ];

    public function index(): string
    {
        return $this->render('orders/index', [
            'title' => 'Takeaway Orders',
            'orders' => (new OrderModel())->orderBy('id', 'DESC')->findAll(),
            'statuses' => self::STATUSES,
        ]);
    }

    public function show(int $id): string
    {
        $order = (new OrderModel())->find($id);

        if (! $order) {
            throw PageNotFoundException::forPageNotFound('Order not found.');
        }

        $order['items'] = json_decode($order['items_json'] ?? '[]', true) ?: [];

        return $this->render('orders/show', [
            'title' => 'Order Details',
            'order' => $order,
            'statuses' => self::STATUSES,
        ]);
    }

    public function updateStatus(int $id)
    {
        $status = (string) $this->request->getPost('status');
        if (! in_array($status, self::STATUSES, true)) {
            $status = 'placed';
        }

        (new OrderModel())->update($id, [
            'status' => $status,
        ]);

        return redirect()->to(site_url('admin/orders'))->with('success', 'Order updated.');
    }
}
