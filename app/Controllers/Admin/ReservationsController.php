<?php

namespace App\Controllers\Admin;

use App\Models\ReservationModel;

class ReservationsController extends BaseAdminController
{
    public function index(): string
    {
        return $this->render('reservations/index', [
            'title' => 'Table Reservations',
            'reservations' => (new ReservationModel())->orderBy('id', 'DESC')->findAll(),
        ]);
    }

    public function updateStatus(int $id)
    {
        (new ReservationModel())->update($id, [
            'status' => $this->request->getPost('status') ?: 'new',
        ]);

        return redirect()->to(site_url('admin/reservations'))->with('success', 'Reservation updated.');
    }
}
